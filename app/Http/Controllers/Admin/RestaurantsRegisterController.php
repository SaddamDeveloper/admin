<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use DB;
use Carbon\Carbon;
class RestaurantsRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $restaurant_name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        
        $insert_restaurant = DB::table('restaurant')
        ->insertGetId([
            'restaurant_name' => $restaurant_name,
            'email' => $email,
            'password' => $password,
            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
        ]);

        if($insert_restaurant){
            return redirect()->back()->with('message', 'Restaurant added successfully');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
