<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    protected $database;

    public function __construct(FirebaseService $firebase)
    {
        $this->database = $firebase->getDatabase();
    }

    /*
    |--------------------------------------------------------------------------
    | PUBLIK
    |--------------------------------------------------------------------------
    */

    // HALAMAN UTAMA (PUBLIK)
    public function publicCreate()
    {
        $quote = null;
        try {
            $response = Http::get('https://quotes.liupurnomo.com/api/quotes/random');
            if ($response->successful()) {
                $quote = $response->json()['data'];
            }
        } catch (\Exception $e) {
            $quote = null;
        }

        return view('service.home', compact('quote'));
    }

    // SIMPAN DATA PUBLIK
    public function publicStore(Request $request)
    {
        $request->validate([
            'plat' => 'required',
            'jenis' => 'required',
            'tipe_service' => 'required',
            'biaya' => 'required|numeric',
            'km' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        // SIMPAN DATA (SATU KALI SAJA)
        $this->database
            ->getReference('service_motor')
            ->push([
                'plat' => $request->plat,
                'jenis' => $request->jenis,
                'tipe_service' => $request->tipe_service,
                'biaya' => (int) $request->biaya,
                'km' => (int) $request->km,
                'tanggal' => $request->tanggal,
                'created_at' => now()->toDateTimeString(),
                'source' => 'publik', // penanda (opsional, tapi bagus)
            ]);

        // PUBLIK → KEMBALI KE HOMEPAGE
        return redirect('/')
            ->with('success', 'Data servis berhasil dikirim')
            ->with('preview', [
                'plat' => $request->plat,
                'jenis' => $request->jenis,
                'tipe_service' => $request->tipe_service,
                'biaya' => (int) $request->biaya,
                'km' => (int) $request->km,
                'tanggal' => $request->tanggal,
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    // DASHBOARD
    public function index()
    {
        $snapshot = $this->database
            ->getReference('service_motor')
            ->getValue();

        $services = $snapshot ? array_values($snapshot) : [];

        return view('service.dashboard', compact('services'));
    }

    // FORM TAMBAH DATA (ADMIN)
    public function create()
    {
        return view('service.create');
    }

    // SIMPAN DATA (ADMIN)
    public function store(Request $request)
    {
        $request->validate([
            'plat' => 'required',
            'jenis' => 'required',
            'tipe_service' => 'required',
            'biaya' => 'required|numeric',
            'km' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $this->database
            ->getReference('service_motor')
            ->push([
                'plat' => $request->plat,
                'jenis' => $request->jenis,
                'tipe_service' => $request->tipe_service,
                'biaya' => (int) $request->biaya,
                'km' => (int) $request->km,
                'tanggal' => $request->tanggal,
                'created_at' => now()->toDateTimeString(),
                'source' => 'admin', // penanda admin
            ]);

        return redirect('/dashboard')
            ->with('success', 'Data berhasil disimpan');
    }
    public function update(Request $request)
    {
        $plat = $request->plat;

        // ambil semua data
        $services = $this->database
            ->getReference('service_motor')
            ->getValue();

        if ($services) {
            foreach ($services as $key => $service) {
                if ($service['plat'] === $plat) {
                    // update node yang sesuai
                    $this->database
                        ->getReference('service_motor/' . $key)
                        ->update([
                            'jenis' => $request->jenis,
                            'tipe_service' => $request->tipe_service,
                            'km' => (int) $request->km,
                            'biaya' => (int) $request->biaya,
                            'tanggal' => $request->tanggal,
                        ]);
                    break;
                }
            }
        }

        return redirect('/dashboard')
            ->with('success', 'Data servis berhasil diperbarui');
    }

    public function destroy(Request $request)
    {
        $plat = $request->plat;

        $services = $this->database
            ->getReference('service_motor')
            ->getValue();

        if ($services) {
            foreach ($services as $key => $service) {
                if ($service['plat'] === $plat) {
                    // hapus node berdasarkan firebase key
                    $this->database
                        ->getReference('service_motor/' . $key)
                        ->remove();
                    break;
                }
            }
        }

        return redirect('/dashboard')
            ->with('success', 'Data servis berhasil dihapus');
    }
}
