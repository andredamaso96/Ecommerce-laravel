<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;


class CheckoutController extends Controller
{
    public function login_check(){

    	return view('pages.login');
    }

    public function register_check(){

    	return view('pages.register');
    }

    public function customer_registration(Request $request){

    	$data=array();
    	$data['costumer_name']=$request->costumer_name;
    	$data['costumer_email']=$request->costumer_email;
    	$data['password']=$request->password;
    	$data['mobile_number']=$request->mobile_number;

    	$costumer_id=DB::table('tbl_customer')
    			->insertGetId($data);

    		Session::put('costumer_id',$costumer_id);
    		Session::put('costumer_name',$request->costumer_name);
    		return Redirect('/checkout');

    }

    public function checkout(){

    	// $all_published_category=DB::table('tbl_category')
    	// 					->where('publication_satus', 1)
    	// 					->get();
    	// $manage_published_category=view('pages.payment')
    	// 	->with('all_published_category',$all_published_category);

    	// return view('layout')
    	// 	->with('pages.payment', $manage_published_category);

    	return view('pages.checkout');
    }

    public function save_shipping_details(Request $request){

    	$data=array();
    	$data['shipping_first_name']=$request->shipping_first_name;
    	$data['shipping_last_name']=$request->shipping_last_name;
    	$data['shipping_email']=$request->shipping_email;
    	$data['shipping_address']=$request->shipping_address;
    	$data['shipping_country']=$request->shipping_country;
    	$data['shipping_city']=$request->shipping_city;
    	$data['shipping_zip']=$request->shipping_zip;

    	$shipping_id=DB::table('tbl_shipping')
    			->insertGetId($data);

    		Session::put('shipping_id',$shipping_id);

    		return Redirect::to('/payment');



    }

    public function customer_login(Request $request){

    	$costumer_email=$request->costumer_email;
    	$password=$request->password;
    	$result=DB::table('tbl_customer')
    		->where('costumer_email', $costumer_email)
    		->where('password', $password)
    		->first();

    			if ($result){
    				Session::put('costumer_id',$result->costumer_id);
    				return Redirect::to('/checkout');
    			}else{
    				return Redirect::to('/login-check');
    			}
    }

    public function payment(){

    	return view('pages.payment');
    }

    public function order_place(Request $request){

    	$payment_gateway=$request->payment_method;
    	// $shipping_id=Session::get('shipping_id');
    	// $costumer_id=Session::get('costumer_id');

    	$pdata=array();
    	$pdata['payment_method']=$payment_gateway;
    	$pdata['payment_status']='pending';
    	$payment_id=DB::table('tbl_payment')
    			->insertGetId($pdata);

    	$odata=array();
    	$odata['costumer_id']=Session::get('costumer_id');
    	$odata['shipping_id']=Session::get('shipping_id');
    	$odata['payment_id']=$payment_id;
    	$odata['order_total']=Cart::total();
    	$odata['order_status']='pending';
    	$order_id=DB::table('tbl_order')
    			->insertGetId($odata);

    	$contents=Cart::content();
    	$oddata=array();

    	foreach ($contents as $v_content){

    		$oddata['order_id']=$order_id;
    		$oddata['product_id']=$v_content->id;
    		$oddata['product_name']=$v_content->name;
    		$oddata['product_price']=$v_content->price;
    		$oddata['product_sales_quantity']=$v_content->qty;

    		DB::table('tbl_order_details')
    			->insert($oddata);
    	}

    	if($payment_gateway=='credit_card'){
    		// echo "pagamento escolhido por cartão de credito";
    		Cart::destroy();
    		return view('pages.debit_cart');

    	}elseif($payment_gateway=='debit_cart'){   		
    		//echo "pagamento escolhido por cartão de débito";
    		Cart::destroy();
    		return view('pages.debit_cart');
    	}elseif($payment_gateway=='paypal'){   		
    		//echo "pagamento escolhido por paypal";
    		Cart::destroy();
    		return view('pages.debit_cart');
    	}else{
    		//echo "nenhum pagamento selecionado";
    	}

    }

    public function customer_logout(){

    	Session::flush();
    	return Redirect::to('/');
    }

}
