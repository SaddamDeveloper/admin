<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Carbon\Carbon;
class RestaurantController extends Controller
{
    public function addRestaurantForm(){
        $state = DB::table('state')
            ->orderBy('id','desc')
            ->get();
        $city = DB::table('city')
            ->orderBy('id','desc')
            ->get();
        return view('admin.add_restaurant_form', compact('state', 'city'));
    }

    public function GetRestaurantList (){
        return view('admin.restaurant_list_table');
    }

    public function ajaxGetRestaurantList(){
        $restaurants = DB::table('restaurant')
        ->orderBy('id','desc');
        if (request()->ajax()) {
            return datatables()->of($restaurants->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn ='<a href="#" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                <a href="'.route('admin.restaurant_edit', encrypt($row->id)).'" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>&nbsp;';
                if($row->status == '1'){
                    $btn = '<a href="'.route('admin.restaurant_status', ['id' => encrypt($row->id), 'status' => encrypt(2)]).'" class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i></a>';
                    return $btn;
                }else{
                    $btn ='<a href="'.route('admin.restaurant_status', ['id' => encrypt($row->id), 'status' => encrypt(1)]).'" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                    return $btn;
                }
                return $btn;
            })
            ->addColumn('menu', function($row){
                $menu ='<a href="'.route('admin.restaurant_menu', ['id' => encrypt($row->id)]).'" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-plus"></i></a>';
                return $menu;
            })
            ->rawColumns(['action', 'menu'])
            ->make(true);
        }else{
            return view('admin.restaurant_list_table', compact('restaurants'));
        }
    }

    public function restaurantStatus($restaurantId, $statusId){
        try {
            $id = decrypt($restaurantId);
            $sId = decrypt($statusId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $status_restaurant = DB::table('restaurant')
            ->where('id', $id)
            ->update([
                'status' => $sId,
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
            ]);

        if($sId == 1){
            return redirect()->back()->with('message', 'Activated Successfully!');
        }else{
            return redirect()->back()->with('message', 'Deactivated Successfully');
        }

    }

    public function restaurantEdit($restaurantId){
        try {
            $id = decrypt($restaurantId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }   

        $single_restaurant = DB::table('restaurant')->where('id',$id)->first();
        return view('admin.edit_restaurant_form', compact('single_restaurant'));
    }

    public function updateRestaurant(Request $request, $restaurantId){
        try {
            $id = decrypt($restaurantId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $this->validate($request, [
            'name'   => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $restaurant_name = $request->input('name');
        $email = $request->input('email');
        
        $insert_restaurant = DB::table('restaurant')
        ->where('id', $id)
        ->update([
            'restaurant_name' => $restaurant_name,
            'email' => $email,
            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
        ]);

        if($insert_restaurant){
            return redirect()->back()->with('message', 'Restaurant updated successfully');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function tax(){
        $tax = DB::table('tax')->first();
        $tax_final = $tax->tax;
        return view('admin.tax', compact('tax_final'));
    }

    public function addTax(Request $request){
        $this->validate($request, [
            'tax'   => 'required|numeric'
        ]);

        $tax_id = DB::table('tax')
            ->update([
                'tax' => $request->input('tax'),
            ]);
        return redirect()->back()->with('message','Inserted Successfully');
    }

    public function state(){
        return view('admin.state');
    }

    public function addState(Request $request){
        $this->validate($request, [
            'state'   => 'required'
        ]);

        $add = DB::table('state')
            ->insertGetId([
                'state' => $request->input('state'),
                'status' => 1,
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
            ]);

        if($add){
            return redirect()->back()->with('message', 'State Successfully Added');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function ajaxGetStateList(){
        $state = DB::table('state')
        ->orderBy('id','desc');

        if (request()->ajax()) {
            return datatables()->of($state->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->status == '1'){
                    $btn = '<a href="'.route('admin.state_status', ['id' => encrypt($row->id), 'status' => encrypt(2)]).'" class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i></a>';
                    return $btn;
                }else{
                    $btn ='<a href="'.route('admin.state_status', ['id' => encrypt($row->id), 'status' => encrypt(1)]).'" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                    return $btn;
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{
            return view('admin.state', compact('state'));
        }
    }

    public function stateStatus($stateId, $statusId){
        try {
            $id = decrypt($stateId);
            $sId = decrypt($statusId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $status_state = DB::table('state')
        ->where('id', $id)
        ->update([
            'status' => $sId,
            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
        ]);

        if($sId == 1){
            return redirect()->back()->with('message', 'State Activated Successfully!');
        }else{
            return redirect()->back()->with('error', 'State Deactivated Successfully');
        }

    }

    public function city(){
        return view('admin.city');
    }

    public function addCity(Request $request){
        $this->validate($request, [
            'city'   => 'required'
        ]);

        $add = DB::table('city')
            ->insertGetId([
                'city' => $request->input('city'),
                'status' => 1,
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
            ]);

        if($add){
            return redirect()->back()->with('message', 'City Successfully Added');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function ajaxGetCityList(){
        $city = DB::table('city')
        ->orderBy('id','desc');
        if (request()->ajax()) {
            return datatables()->of($city->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->status == '1'){
                    $btn = '<a href="'.route('admin.city_status', ['id' => encrypt($row->id), 'status' => encrypt(2)]).'" class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i></a>';
                    return $btn;
                }else{
                    $btn ='<a href="'.route('admin.city_status', ['id' => encrypt($row->id), 'status' => encrypt(1)]).'" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                    return $btn;
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{
            return view('admin.city', compact('city'));
        }
    }

    public function cityStatus($cityId, $statusId){
        try {
            $id = decrypt($cityId);
            $sId = decrypt($statusId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $status_city = DB::table('city')
        ->where('id', $id)
        ->update([
            'status' => $sId,
            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
        ]);

        if($sId == 1){
            return redirect()->back()->with('message', 'City Activated Successfully!');
        }else{
            return redirect()->back()->with('error', 'City Deactivated Successfully');
        }

    }

    public function manageMenu($resId){
        try {
            $id = decrypt($resId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $fetch_restaurant = DB::table('restaurant')->where('id', $id)->first();
        return view('admin.manage_menu', compact('fetch_restaurant'));
    }

    public function addMenu(){
        return view('admin.add_menu');
    }
    public function storeMenu(Request $request){
        $this->validate($request, [
            'name'   => 'required',
            'description' => 'required'
        ]);
    
        $add = DB::table('restaurant_menu')
        ->insertGetId([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => 1,
            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
        ]);

        if($add){
            return redirect()->back()->with('message', 'Restaurant Menu Successfully Added');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }  
    }
    public function updateMenu(Request $request){
        
    }

    public function ajaxGetMenuList(){
        $restaurant_menu = DB::table('restaurant_menu')
        ->orderBy('id','desc');
        if (request()->ajax()) {
            return datatables()->of($restaurant_menu->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->status == '1'){
                    $btn = '<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i></a>';
                    return $btn;
                }else{
                    $btn ='<a href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                    return $btn;
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{
            return view('admin.manage_menu', compact('restaurant_menu'));
        }
    }
}
