<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>


    <title>TugaKits</title>
</head>

<body>



<nav class="navbar navbar-expand-md navbar-dark bg-black sticky-top" >
    <div class="container">
        <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{URL::to('frontend/img/tuga.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <?php

                $all_published_category=DB::table('tbl_category')
                                        ->where('publication_satus',1)
                                        ->get();
                foreach ($all_published_category as $v_category){?>


                <li class="nav-item dropdown megamenu-li">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$v_category->category_name}}</a>
                    <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                        <h3 class="panel-title" style="text-align: center;"><a class="" href="{{URL::to('/product_by_category/'.$v_category->category_id)}}">Coleção {{$v_category->category_name}} 2019 ></a></h3>
                        <p></p>
                        
                        <div class="row">
                            <?php

                             $all_published_subcategory=DB::table('tbl_subcategories')
                                                     ->where('publication_status',1)
                                                     ->get();

                            foreach ($all_published_subcategory as $v_subcategory){?>
                            <div class="col-sm-6 col-lg-3">
                                
                                <h5>{{$v_subcategory->subcategories_name}}</h5>
                                
                            
                            <?php
                                $product_by_subcategory=DB::table('tbl_products')
                                        ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
                                        ->join('tbl_subcategories', 'tbl_products.subcategories_id','=','tbl_subcategories.subcategories_id')
                                        ->where('tbl_category.category_id', $v_category->category_id)
                                        ->where('tbl_subcategories.subcategories_id', $v_subcategory->subcategories_id)
                                        ->where('tbl_products.publication_status', 1)
                                        ->get();

                            foreach ($product_by_subcategory as $v_subproduct){?>
                                <a class="dropdown-item" href="{{URL::to('/view_product/'.$v_subproduct->product_id)}}">{{$v_subproduct->product_name}}</a>

                            <?php } ?>
                                <a class="dropdown-item" href="{{URL::to('/product_by_subcategory/'.$v_category->category_id .$v_subcategory->subcategories_id)}}">Ver Todos ></a>
                            </div>
                            <?php } ?>
                            <div class="col-sm-6 col-lg-3">
                                <img src="{{URL::to($v_category->category_image)}}" alt="..." style="width: 100%; height: 100%">
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="#">Marcas</a>
                </li>


            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" id="search" href="#">
                        <i class="fa fa-search"  aria-hidden="true" title="Pesquisar"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/show-cart')}}">
                        <i class="fa fa-shopping-bag" title="Carrinho de Compras"></i></a>
                </li>

                <?php $costumer_id=Session::get('costumer_id'); ?>

                <?php if($costumer_id != NULL){?>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/customer_logout')}}">
                        <i class="fa fa-sign-out" aria-hidden="true" title="Terminar Sessão"></i> Terminar Sessão</a>
                </li>
                <?php }else{?>

                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/login-check')}}">
                        <i class="fa fa-user-o" aria-hidden="true" title="Iniciar Sessão"></i></a>
                </li>
                 <?php } ?>

                
            </ul>


        </div>

    </div>
</nav>





    @yield('content')




<div class="container-fluid pt-5 pb-5">
    <div class="container">
        <div class="brand">
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/img/adidas.png')}}" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/img/nike.png')}}" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/img/puma.png')}}" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/img/nb.png')}}" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="{{asset('frontend/img/macroon.png')}}" class="img-responsive" alt="">
            </div>
            <div class="clearfix"></div>
        </div>

    </div>


</div>








<footer>
    <div class="container-fluid pt-5 pb-5 bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <h5>Descobrir e Comprar</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="underline bg-light" style="width: 50px;"></div>
                    </div>

                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Homem</p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Mulher</p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Criança</p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Marca</p>

                </div>


                <div class="col-md-3">
                    <div class="row">
                        <h5>Apoio ao Cliente</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="underline bg-light" style="width: 50px;"></div>
                    </div>

                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Ajuda</p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Contactos</p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Informações de Entregas</p>


                </div>

                <div class="col-md-3 pl-4">
                    <div class="row">
                        <h5>Sobre a TugaKits</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="underline bg-light" style="width: 50px;"></div>
                    </div>

                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> TugaKits</p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Serviços</p>
                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Perguntas Frequentes</p>


                </div>

                <div class="col-md-3">
                    <div class="row">
                        <h5>NEWSLETTER</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="underline bg-light" style="width: 50px;"></div>
                    </div>
                    <p>Recebe todas as Novidades</p>
                    <form>
                        <input type="text" value="Insere o teu E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                        <input type="submit" value="Enviar">
                    </form>
                </div>

            </div>
        </div>


    </div>

    </div>
    <div class="footer-bottom">
        <div class="container">
            <ul class="footer-bottom-top">
                <li><a href="#"><img src="{{asset('frontend/img/f1.png')}}" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="{{asset('frontend/img/f2.png')}}" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="{{asset('frontend/img/f3.png')}}" class="img-responsive" alt=""></a></li>
            </ul>
            <p class="footer-class">&copy; 2018 TugaKits, Lda. Todos os direitos reservados</p>
            <div class="clearfix"> </div>
        </div>
    </div>

</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js')}}"></script>
<script>
        $('#confirm_checkout').submit(function(e){
            var currentForm = this;
            e.preventDefault();
            bootbox.confirm("Tem a certeza que pretende concluir??", function(result){
                if (result){
                    currentForm.submit();
                };
            });
        });
</script>


</body>
</html>

