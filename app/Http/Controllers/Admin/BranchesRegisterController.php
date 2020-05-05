<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
class BranchesRegisterController extends Controller
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
        // dd($request);
        $this->validate($request, [
            'br_name'   => 'required',
            'city' => 'required',
            'ps' => 'required',
            'dist' => 'required',
            'pin' => 'required|numeric',
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'email:rfc,dns',
            'password' => 'required|confirmed|min:6'
        ]);
        
        $branch_name = $request->input('br_name');
        $city = $request->input('city');
        $ps = $request->input('ps');
        $dist = $request->input('dist');
        $pin = $request->input('pin');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        return $request;
        $branch = new Branch;
        if($branch->save()){
            return redirect()->back()->with('message', 'Branch Added Successfully');
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
