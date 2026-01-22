<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class AuthController extends Controller
{
    protected Auth $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        $request->validate([
            'idToken' => 'required'
        ]);

        try {
            $verifiedToken = $this->auth->verifyIdToken($request->idToken);
            $uid = $verifiedToken->claims()->get('sub');

            return response()->json([
                'status' => 'success',
                'uid' => $uid
            ]);
        } catch (FailedToVerifyToken $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }
    }
}
