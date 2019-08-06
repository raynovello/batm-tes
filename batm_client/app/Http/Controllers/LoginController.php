<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request) 
    {
        $client = new \GuzzleHttp\Client();

        $url = "localhost/batm_server/public/api/login";

        $myBody['email'] = $request->input('email');
        $myBody['password'] = $request->input('password');
        
        $response = $client->post($url, ['form_params'=>$myBody]);

        $data = json_decode($response->getBody()->getContents());

        if ($data->code == 200) {
            $request->session()->put('data', $data);
            $request->session()->put('api_token', $data->data->api_token);
            $request->session()->put('name', $data->data->name);
            $request->session()->put('email', $data->data->email);
            $request->session()->put('login', true);
            return redirect('/customer');
        } else {
            $request->session()->flush();
            $request->session()->flash('failed',TRUE);
            return redirect('/');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_form(Request $request) 
    {
        $client = new \GuzzleHttp\Client();

        $url = "localhost/batm_server/public/api/register";

        $myBody['name'] = $request->input('name');
        $myBody['email'] = $request->input('email');
        $myBody['password'] = $request->input('password');
        $myBody['password_confirmation'] = $request->input('password_confirmation');
        
        if ($myBody['password'] != $myBody['password_confirmation']) {
            $request->session()->flash('register',TRUE);
            return redirect('/register');
        }

        $response = $client->post($url, ['form_params' => $myBody]);

        $data = json_decode($response->getBody()->getContents());

        if ($data->code == 200) {
            $request->session()->flash('register',TRUE);
            $request->session()->put('data', $data);
            return redirect('/');
        } else {
            $request->session()->flash('register',TRUE);
            return redirect('/register');
        }
    }

    public function logout(Request $request) 
    {
        if (! Session::has('login')) {
            Session::flush();
            Session::flash('warning', TRUE);
            return redirect('/');
        }

        $client = new \GuzzleHttp\Client();

        $url = "localhost/batm_server/public/api/logout?api_token=".$request->session()->get('api_token');
        $myBody['api_token'] = $request->session()->get('api_token');

        $response = $client->post($url, ['form_params' => $myBody]);
        
        $data = json_decode($response->getBody()->getContents());

        $request->session()->flush();
        $request->session()->flash('logout',TRUE);

        return redirect('/');
    }
}
