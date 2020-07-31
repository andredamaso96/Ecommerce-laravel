@extends('layout')
@section('content')

<div class="container-fluid bg-light-gray">
  <div class="container">

<!-- breadcrumb -->
  <ul class="breadcrumb">
  <li><a href="{{URL::to('/')}}">Início</a></li>
  <li><a href="{{URL::to('/product_by_category/'.$product_by_details->category_id)}}">{{$product_by_details->category_name}}</a></li>
  <li>{{$product_by_details->product_short_description}}</li>

</ul>

  <div class="single">
   
     <div class="single-main">
      <div class="single-top-main">
        <div class="row">
        <div class="col-md-5 single-top"> 
         <div class="flexslider">
          <img class="card-img-top" src="{{URL::to($product_by_details->product_image)}}" style="height: 450px;" alt="">
      </div>
      </div>
      <div class="col-md-7 single-top-left simpleCart_shelfItem">
        
        <h1>{{$product_by_details->product_short_description}}</h1>
        <h2>{{$product_by_details->brands_name}}</h2>
        <h3><b>{{$product_by_details->product_price}} €</b></h3>     
        <p>{{$product_by_details->product_long_description}}</p>
        <ul class="bann-btns">
        	<li><h4>Tamanhos disponíveis:</h4></li>
        	<li>{{$product_by_details->product_size}}</li>
        </ul>
        <form action="{{url('/add-to-cart')}}" method="post">
        	{{ csrf_field() }}
        <ul class="bann-btns">
        	<li><h4>Selecione a quantidade:</h4></li>
        	<li><input type="text" name="qty" value="1" style="width: 20%; text-align: center;"></li>     
          	<li><input type="hidden" name="product_id" value="{{$product_by_details->product_id}}"></li>
                  
        </ul>
              <button type="submit" class="btn hvr-skew-backward">Adicionar ao Carrinho</button>
          </form>
      </div>
       <div class="clearfix"> </div>
     </div>
   </div>
     </div>
     </div>
   </div>
</div>




</div>

@endsection