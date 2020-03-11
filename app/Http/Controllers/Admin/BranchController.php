<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function ajaxGetRestaurantList(Request $request){
        //
    }

    public function addBranchForm(){
        return view('admin.add_branch_form');
    }
}
