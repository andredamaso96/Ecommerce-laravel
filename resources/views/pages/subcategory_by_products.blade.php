@extends('layout')
@section('content')


<div class="banner-top"> 
	<div class="container">

		<h1>{{$product_by_subcategory[0]->category_name}}</h1>
		<em></em>
		<h2><a href="{{URL::to('/')}}">Início</a><label>/</label>{{$product_by_subcategory[0]->category_name}} - {{$product_by_subcategory[0]->subcategories_name}}</a></h2>
	</div>
</div>



<div class="container-fluid bg-light-gray">


	<div class="container">

      <div class="row">


        

		<div class="filtros">
          <div class="my-4 text-right">
          	<a>
		<select size="1" id="input-categoria" name="Country"  aria-describedby="sizing-addon3" >
									<option>Revelância</option>
									<option>Preço Ascendente</option>
									<option>Preço Descendente</option>
									

								</select></a>
		<a href="#"><i class="fa fa-th"></i></a>
		<a href="#"><i class="fa fa-th-list"></i></a>
	</div>
	</div>

          <div class="row">
          	<?php foreach($product_by_subcategory as $v_subcategory_by_product){?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100">
                <a href="{{URL::to('/view_product/'.$v_subcategory_by_product->product_id)}}"><img class="card-img-top" src="{{URL::to($v_subcategory_by_product->product_image)}}" style="height: 300px;" alt=""></a>
                <div class="card-body">
                  <h5 >
                    <a href="{{URL::to('/view_product/'.$v_subcategory_by_product->product_id)}}">{{$v_subcategory_by_product->product_short_description}}</a>
                  </h5>
                  <small>{{$v_subcategory_by_product->brands_name}}</small>
                  <h6><b>{{$v_subcategory_by_product->product_price}} €</b></h6>
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
        <?php } ?>
           

          </div>
          <!-- /.row -->


      </div>
      <!-- /.row -->

    </div>


</div>

@endsection