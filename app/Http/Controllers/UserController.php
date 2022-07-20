<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    } 
    public function dashboard(Request $request)
    {
        // return Auth::user();
        return view('dashboard');
    }
    public function login(Request $request)
    {
        // $email = $request->email;
        // $username = strstr($email, '@', true);
        // return $username;
        try {
            $email = $request->email;
            $username = $request->email;
            // $username = strstr($email, '@', true);
            $response = http::asForm()->post('https://switchwebapi.azurewebsites.net/token', [
                'username' => $username,  
                 'password' => $request->password, 
                 'grant_type' => 'password'
                  ]);
                  $token=session()->put('token', json_decode((string) $response->getBody(), true));
                //   return $response;
            if(json_decode((string) $response->getBody(), true)['access_token']){
                
            session()->put('authenticated', time());
            // $request->session()->put('authenticated', time());
            // return redirect()->intended('success');
            // return redirect()->intended('dashboard')
            // ->withSuccess('Signed in');
            return redirect()->intended('/')
                                  ->withSuccess('Signed in');
            }
 return $response;
} catch (\Throwable $th) {
    throw $th;
}
    }


    public function atmwithdrawalapi(Request $request)
    {
        $token = session()->get('token.access_token');
        $response = http::withToken($token)->post('https://switchwebapi.azurewebsites.net/api/user/atm', [
            'Balance' => $request->Balance, 
              ]);

              return redirect()->intended('dashboard')
              ->with( ['data' => $response->json()] );
        // return $response->json();
    }
    public function atmwithdrawal(Request $request)
    {
        $token = $request->token;
        $response = http::withToken($token)->post('https://switchwebapi.azurewebsites.net/api/user/atm', [
            'Balance' => $request->Balance, 
              ]);
        return $response->json();
    }

    
    public function fundtransfer(Request $request)
    {
        // $token = session()->get('token.access_token');
        $token = $request->token;
        // $response = http::asForm()->post('https://switchwebapi.azurewebsites.net/api/user/transfer', [
            $response = http::withToken($token)->post('https://switchwebapi.azurewebsites.net/api/user/transfer', [
            'Balance' => $request->amount, 
            // 'UserID' => $request->accountid, 
            'CustomerId' => $request->accountid, 
             //'grant_type' => 'password'
              ]);
        return $response->json();
    }  
    public function fundtransferapi(Request $request)
    {
        $token = session()->get('token.access_token');
        // $response = http::asForm()->post('https://switchwebapi.azurewebsites.net/api/user/transfer', [
            $response = http::withToken($token)->post('https://switchwebapi.azurewebsites.net/api/user/transfer', [
            'Balance' => $request->amount, 
             'CustomerId' => $request->accountid, 
             //'grant_type' => 'password'
              ]);
              return redirect()->intended('dashboard')
              ->with( ['tdata' => $response->json()] );
        // return $response->json();
    }
}
