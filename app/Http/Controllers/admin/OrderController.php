<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function addData(Request $request){
        $data = new Order();
        $rules = array(
            "first_name"=> "required",
            "last_name"=> "required",
            "email"=> "required",
            "street"=>"required",
            "city"=> "required",
            "state"=> "required",
            "country"=> "required",
            "zipcode"=>"required",
            "phone_no"=>"required"
        );

        $validatore = Validator::make($request->all(), $rules);
        if($validatore->fails())
        {
            return response()->json($validatore->errors(),401);
        }
        else{
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->email = $request->email;
            $data->street = $request->street;
            $data->city = $request->city;
            $data->state = $request->state;
            $data->country = $request->country;
            $data->zipcode = $request->zipcode;
            $data->phone_no = $request->phone_no;

            $result = $data->save();

            if($result){
                return response([
                    "status"=> "success",
                    "result" => "Data has been Submitted",
                    'data' => $data
                ]);
            }
        }
    }
}
