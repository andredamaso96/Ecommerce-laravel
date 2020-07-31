@extends('layout')
@section('content')


<div class="banner-top"> 
	<div class="container">

		<h1>{{$product_by_subcategory[0]->category_name}}</h1>
		<em></em>
		<h2><a href="{{URL::to('/')}}">Início</a><label>/</label>{{$product_by_subcategory[0]->category_name}}</a></h2>
	</div>
</div>



<div class="container-fluid bg-light-gray">


	<div class="container">

      <div class="row">

        <div class="col-lg-3 d-none d-md-block">

          <div class="container mt-5">
		   
			<div class="row">
				<div class="col-8">
			  		<h4>Filtrar</h4>
				</div>
				<div class="col">
			  		<a class="" href="{{URL::to('/product_by_category/'.$product_by_subcategory[0]->category_id)}}">Limpar</a>
				</div>
			</div>
				<div class="row">
				<div class="underline"></div>
			</div>
		</div>

          <div class="my-4 list-group">

            <div class="cd-filter">
			<form>
        
       		 <div class="cd-filter-block">
					<h5>Sub-Categoria</h5>
					<?php

                             $all_published_subcategory=DB::table('tbl_subcategories')
                                                     ->where('publication_status',1)
                                                     ->get();

                            foreach ($all_published_subcategory as $v_subcategory){?>
						<a class="dropdown-item" href="{{URL::to('/product_by_subcategory_b/'.$product_by_subcategory[0]->category_id .$v_subcategory->subcategories_id)}}">{{$v_subcategory->subcategories_name}}</a>

						<?php } ?>

						<!-- <li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1">
							<label class="radio-label" for="radio1">Liga Portuguesa</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Outras Ligas</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Seleções</label>
						</li> -->
            	
				</div> <!-- cd-filter-block -->
        

				<div class="cd-filter-block">
					<h5>Marcas</h5>
					<?php

                $all_published_brand=DB::table('tbl_brands')
                                        ->where('brands_status',1)
                                        ->get();
                		foreach ($all_published_brand as $v_brand){?>

                		<a class="dropdown-item" href="{{URL::to('/product_by_brand/'.$product_by_subcategory[0]->category_id .$v_brand->brands_id)}}">{{$v_brand->brands_name}}</a>



					<?php } ?>
         
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h5>Preços</h5>
          				<a class="dropdown-item" href="{{URL::to('/price_by_1/'.$product_by_subcategory[0]->category_id)}}">€30 - €60</a>
          				<a class="dropdown-item" href="{{URL::to('/price_by_1/'.$product_by_subcategory[0]->category_id)}}">€60 - €65</a>
          				<a class="dropdown-item" href="{{URL::to('/price_by_1/'.$product_by_subcategory[0]->category_id)}}">€65 - €80</a>


				</div> <!-- cd-filter-block -->
				
			</form>

          </div>

          
		</div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

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
            <div class="col-lg-4 col-md-6 mb-4">
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
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>


</div>

@endsection