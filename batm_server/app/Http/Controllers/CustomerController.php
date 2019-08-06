<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $data = \App\Customer::all();

        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['api'] = Auth::user()->api_token;
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        // check email format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data = new \App\Customer();
            $data->name = $name;
            $data->email = $email;
            $data->phone = $phone;
            $data->address = $address;

            if ($data->save()) {
                return response()->json([
                    'message' => 'Success!',
                    'code' => 200,
                ]);
            } else {
                return response()->json([
                    'message' => 'Failed!',
                    'code' => 500,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Email Format Invalid',
                'code' => 123,
            ]);
        }
    }

    public function show($id)
    {
        $data = \App\Customer::where('id',$id)->get();

        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $data = \App\Customer::where('id',$id)->first();
        $data->name = $name;
        $data->email = $email;
        $data->phone = $phone;
        $data->address = $address;

        if ($data->save()) {
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        } else {
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function destroy($id)
    {
        $data = \App\Customer::where('id',$id)->first();

        if ($data->delete()) {
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        } else {
            $res['message'] = "Failed!";
            return response($res);
        }
    }
}
