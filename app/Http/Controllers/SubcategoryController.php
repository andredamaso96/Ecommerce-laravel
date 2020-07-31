<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SubcategoryController extends Controller
{
    public function index(){

    	$this->AdminAuthCheck();
        return view('admin.add_subcategory');
    }

    public function save_subcategory(Request $request){

    	$data=array();
    	$data['subcategories_id']=$request->subcategories_id;
    	$data['subcategories_name']=$request->subcategories_name;
    	$data['subcategories_description']=$request->subcategories_description;
    	$data['publication_status']=$request->publication_status;

    	DB::table('tbl_subcategories')->insert($data);
    	Session::put('message', 'Sub-categoria adicionada com sucesso!!');
    	return Redirect::to('/add-subcategory');
    }

     public function all_subcategory(){

        $this->AdminAuthCheck();
        $all_subcategory_info=DB::table('tbl_subcategories')->get();
        $manage_subcategory=view('admin.all_subcategory')
            ->with('all_subcategory_info',$all_subcategory_info);

        return view('admin_layout')
            ->with('admin.all_subcategory', $manage_subcategory);

        //return view('admin.all_category');
    }

    public function delete_subcategory($subcategories_id){

        DB::table('tbl_subcategories')
            ->where('subcategories_id', $subcategories_id)
            ->delete();
        Session::get('message', 'Sub-categoria removida com sucesso!!');
        return Redirect::to('/all-subcategory');

    }

    public function unactive_subcategory($subcategories_id){

        DB::table('tbl_subcategories')
            ->where('subcategories_id', $subcategories_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'Sub-categoria desativada com sucesso!!');
            return Redirect::to('/all-subcategory');
    }

    public function active_subcategory($subcategories_id){

        DB::table('tbl_subcategories')
            ->where('subcategories_id', $subcategories_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'Sub-categoria ativada com sucesso!!');
            return Redirect::to('/all-subcategory');
    }

    public function edit_subcategory($subcategories_id){

        $this->AdminAuthCheck();
        $subcategory_info=DB::table('tbl_subcategories')
                    ->where('subcategories_id', $subcategories_id)
                    ->first();
        $subcategory_info=view('admin.edit_subcategory')
            ->with('subcategory_info',$subcategory_info);
        return view('admin_layout')
            ->with('admin.edit_subcategory', $subcategory_info);

        //return view('admin.edit_category');

    }

    public function update_subcategory(Request $request, $subcategories_id){

        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategories_name']=$request->subcategories_name;
        $data['subcategories_description']=$request->subcategories_description;

        DB::table('tbl_subcategories')
            ->where('subcategories_id', $subcategories_id)
            ->update($data);

            Session::get('message', 'Sub-categoria editada com sucesso!!');
            return Redirect::to('/all-subcategory');

    }

    public function AdminAuthCheck(){

        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}
