<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class CustomerController extends Controller
{
    public function index()
    {
        if (! Session::has('login')) {
            Session::flush();
            Session::flash('warning', TRUE);
            return redirect('/');
        }

        return view('form_customer');
    }

    public function customer_form(Request $request)
    {
        if (! Session::has('login')) {
            Session::flush();
            Session::flash('warning', TRUE);
            return redirect('/');
        }

        $client = new \GuzzleHttp\Client();

        $url = "localhost/batm_server/public/api/customer/store?api_token=".$request->session()->get('api_token');

        $myBody['name'] = $request->input('name');
        $myBody['email'] = $request->input('email');
        $myBody['phone'] = $request->input('phone');
        $myBody['address'] = $request->input('address');

        $response = $client->post($url,  ['form_params' => $myBody]);

        $data = json_decode($response->getBody()->getContents());

        print_r($data);

        if ($data->code == 200) {
            $request->session()->flash('success',TRUE);
        } elseif ($data->code == 123) {
            $request->session()->flash('email_format',TRUE);
        } else {
            $request->session()->flash('failed',TRUE);
        }

        return redirect('/customer');
    }
}
