<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function index(){

        $this->AdminAuthCheck();

    	return view('admin.add_category');
    }

    public function all_category(){

        $this->AdminAuthCheck();

    	$all_category_info=DB::table('tbl_category')->get();
    	$manage_category=view('admin.all_category')
    		->with('all_category_info',$all_category_info);

    	return view('admin_layout')
    		->with('admin.all_category', $manage_category);

    	//return view('admin.all_category');
    }

    public function save_category(Request $request){

    	$data=array();
    	$data['category_id']=$request->category_id;
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
        $data['publication_satus']=$request->publication_satus;
    	// $data['category_image']=$request->category_image;

        $image=$request->file('category_image');
        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path, $image_full_name);
            if ($success) {
                $data['category_image']=$image_url;
                    DB::table('tbl_category')->insert($data);
                    Session::put('message','Categoria adicionada com sucesso!!');
                    return Redirect::to('/add-category');
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit();
            }
        }
        
       $data['category_image']='';
    	DB::table('tbl_category')->insert($data);
    	Session::put('message', 'Categoria adicionada sem Imagem!!');
    	return Redirect::to('/add-category');
    	
    }

    public function unactive_category($category_id){

    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->update(['publication_satus' => 0]);
    	Session::put('message', 'Categoria desativada com sucesso!!');
    		return Redirect::to('/all-category');
    }

    public function active_category($category_id){

    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->update(['publication_satus' => 1]);
    	Session::put('message', 'Categoria ativada com sucesso!!');
    		return Redirect::to('/all-category');
    }

    public function edit_category($category_id){

        $this->AdminAuthCheck();

    	$category_info=DB::table('tbl_category')
    				->where('category_id', $category_id)
    				->first();
    	$category_info=view('admin.edit_category')
    		->with('category_info',$category_info);
    	return view('admin_layout')
    		->with('admin.edit_category', $category_info);

    	//return view('admin.edit_category');

    }

    public function update_category(Request $request, $category_id){

    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;

    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->update($data);

    		Session::get('message', 'Categoria editada com sucesso!!');
    		return Redirect::to('/all-category');

    }

    public function delete_category($category_id){

    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->delete();
    	Session::get('message', 'Categoria removida com sucesso!!');
    	return Redirect::to('/all-category');

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
