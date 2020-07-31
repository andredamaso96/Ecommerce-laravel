<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandController extends Controller
{
    public function index(){

        $this->AdminAuthCheck();
    	return view('admin.add_brand');
    }

    public function AdminAuthCheck(){

        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function save_brand(Request $request){

    	$data=array();
    	$data['brands_id']=$request->brands_id;
    	$data['brands_name']=$request->brands_name;
    	$data['brands_description']=$request->brands_description;
    	$data['brands_status']=$request->brands_status;

    	DB::table('tbl_brands')->insert($data);
    	Session::put('message', 'Marca adicionada com sucesso!!');
    	return Redirect::to('/add-brand');
    }

    public function all_brand(){

        $this->AdminAuthCheck();
    	$all_brand_info=DB::table('tbl_brands')->get();
    	$manage_brand=view('admin.all_brand')
    		->with('all_brand_info',$all_brand_info);

    	return view('admin_layout')
    		->with('admin.all_brand', $manage_brand);

    	//return view('admin.all_category');
    }

    public function delete_brand($brands_id){

    	DB::table('tbl_brands')
    		->where('brands_id', $brands_id)
    		->delete();
    	Session::get('message', 'Marca removida com sucesso!!');
    	return Redirect::to('/all-brand');

    }

    public function unactive_brand($brands_id){

    	DB::table('tbl_brands')
    		->where('brands_id', $brands_id)
    		->update(['brands_status' => 0]);
    	Session::put('message', 'Marca desativada com sucesso!!');
    		return Redirect::to('/all-brand');
    }

    public function active_brand($brands_id){

    	DB::table('tbl_brands')
    		->where('brands_id', $brands_id)
    		->update(['brands_status' => 1]);
    	Session::put('message', 'Marca ativada com sucesso!!');
    		return Redirect::to('/all-brand');
    }

    public function edit_brand($brands_id){

    	$this->AdminAuthCheck();
        $brand_info=DB::table('tbl_brands')
    				->where('brands_id', $brands_id)
    				->first();
    	$brand_info=view('admin.edit_brand')
    		->with('brand_info',$brand_info);
    	return view('admin_layout')
    		->with('admin.edit_brand', $brand_info);

    	//return view('admin.edit_category');

    }

    public function update_brand(Request $request, $brands_id){

    	$data=array();
    	$data['brands_name']=$request->brands_name;
    	$data['brands_description']=$request->brands_description;

    	DB::table('tbl_brands')
    		->where('brands_id', $brands_id)
    		->update($data);

    		Session::get('message', 'Marca editada com sucesso!!');
    		return Redirect::to('/all-brand');

    }
}
