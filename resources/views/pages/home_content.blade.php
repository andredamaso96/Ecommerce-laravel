@extends('layout')
@section('content')



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{URL::to('frontend/img/benfica.png')}}" alt="img1">
            <div class="carousel-caption d-none d-md-block">
                <h1>NOVA COLEÇÃO BENFICA</h1>
                <p>Equipamento Principal S.L. Benfica 2018/19</p>
                <button class="btn btn-info btn-lg">Compre Agora</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::to('frontend/img/porto.png')}}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>NOVA COLEÇÃO PORTO</h1>
                <p>Equipamento Principal F.C. Porto 2018/19</p>
                <button class="btn btn-info btn-lg">Compre Agora</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::to('frontend/img/sporting.png')}}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>NOVA COLEÇÃO SPORTING</h1>
                <p>Equipamento Principal Sporting C.P. 2018/19</p>
                <button class="btn btn-info btn-lg">Compre Agora</button>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<div class="container-fluid offer pt-3 pb-3 bg-orange d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 m-right">
                <h4>PORTES GRATIS</h4>
                <p>Em qualquer local do país</p>
            </div>

            <div class="col-md-4 m-right">
                <h4>CONTACTOS</h4>
                <p>+91 7396403672</p>
            </div>

            <div class="col-md-4">
                <h4>LOCALIZAÇÃO</h4>
                <p>Beja</p>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid bg-light-gray">

    <div class="container pt-5">

        <div class="row">
            <h3>Destaques</h3>
        </div>
        <div class="row">
            <div class="underline"></div>
        </div>
    </div>



    <div class="container mt-5 pb-5">
        <div class="row">
            
            <?php

            $product_destaque=DB::table('tbl_products')
                                        ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
                                        ->join('tbl_subcategories', 'tbl_products.subcategories_id','=','tbl_subcategories.subcategories_id')
                                        ->join('tbl_brands', 'tbl_products.brands_id','=','tbl_brands.brands_id')
                                        ->select('tbl_products.*','tbl_category.category_name','tbl_category.category_image','tbl_subcategories.subcategories_name','tbl_brands.brands_name')
                                        ->where('tbl_category.category_id', 1)
                                        ->where('tbl_subcategories.subcategories_id', 1)
                                        ->where('tbl_products.publication_status', 1)
                                        ->limit(4)
                                        ->get(); 


            foreach($product_destaque as $v_subcategory_by_product){?>
            <div class="col-md-3">
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
        


        </div>



    <div class="container mt-5">

        <div class="row">
            <h3>Promoções</h3>
        </div>
        <div class="row">
            <div class="underline"></div>
        </div>
    </div>


    <div class="container mt-5 pb-5">
        <div class="row">
            
            <?php

            $product_destaque=DB::table('tbl_products')
                                        ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
                                        ->join('tbl_subcategories', 'tbl_products.subcategories_id','=','tbl_subcategories.subcategories_id')
                                        ->join('tbl_brands', 'tbl_products.brands_id','=','tbl_brands.brands_id')
                                        ->select('tbl_products.*','tbl_category.category_name','tbl_category.category_image','tbl_subcategories.subcategories_name','tbl_brands.brands_name')
                                        ->where('tbl_products.product_price', '<', 48)
                                        ->where('tbl_products.publication_status', 1)
                                        ->limit(4)
                                        ->get(); 


            foreach($product_destaque as $v_subcategory_by_product){?>
            <div class="col-md-3">
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


        </div>
    </div>
</div>

@endsection