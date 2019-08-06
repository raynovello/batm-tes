<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinalCustomerController extends Controller
{
    public function index() 
    {
    	$data = \App\FinalCustomer::all();

        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function show($id)
    {
        $data = \App\FinalCustomer::where('id',$id)->get();

        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "Failed!";
            return response($res);
        }
    }
}
