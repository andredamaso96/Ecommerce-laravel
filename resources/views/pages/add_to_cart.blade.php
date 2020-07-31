@extends('layout')
@section('content')

<div class="container-fluid bg-light-gray">


<div class="container pt-5">
   
  <div class="row">
    <h3>Carrinho de Compras</h3>
  </div>
    <div class="row">
    <div class="underline"></div>
  </div>
</div>

      <div class="container cart">
      	<?php
      		$contents=Cart::content();
      	?>
    
    <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:20%"></th>
              <th style="width:25%">Nome do Produto</th>
              <th style="width:10%">Preço</th>
              <th style="width:8%">Quantidade</th>
              <th style="width:17%" class="text-center">Subtotal</th>
              <th style="width:20%"></th>
            </tr>
          </thead>
          <tbody>
          	<?php foreach($contents as $v_contents) {?>
            <tr>
              <td data-th="Product">
                
                  <img src="{{URL::to($v_contents->options->image)}}" alt="..." class="img-responsive" height="100px" width="100px" />
              </td>
              <td data-th="Description">{{$v_contents->name}}</td>
              <td data-th="Price">{{$v_contents->price}} €</td>
              <form action="{{url('/update-cart')}}" method="post">
              	{{ csrf_field() }}
              <td class="actions" data-th="">
                <input type="number" class="form-control text-center" name="qty" value="{{$v_contents->qty}}">
                <input type="hidden" name="rowId" value="{{$v_contents->rowId}}"></input>
                
              </td>
              
              <td data-th="Subtotal" class="text-center">{{$v_contents->total}} €</td>
              <td class="actions" data-th="">
                
            	<input type="submit" name="submit" value="Atualizar" class="btn btn-info btn-sm"></input>
            	</form>
                <a class="btn btn-danger btn-sm" href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-trash-o"></i></a>                
              </td>
            </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td><a href="{{URL::to('/')}}" class="btn"><i class="fa fa-angle-left"></i> Continuar a Comprar</a></td>
              <td colspan="3" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong>Total {{Cart::total()}} €</strong></td>
              
              <?php $costumer_id=Session::get('costumer_id');
                    $shipping_id=Session::get('shipping_id'); ?>

              <?php if($costumer_id != NULL && $shipping_id==NULL){?>
              <td><a href="{{URL::to('/checkout')}}" class="btn hvr-skew-backward">Checkout</a></td>
              <?php }if($costumer_id != NULL && $shipping_id!=NULL){?>
                <td><a href="{{URL::to('/payment')}}" class="btn hvr-skew-backward">Checkout</a></td>
              <?php }else{?>
              <td><a href="{{URL::to('/login-check')}}" class="btn hvr-skew-backward">Checkout</a></td>
              <?php } ?>
            </tr>
          </tfoot>
        </table>
       </div>


</div>

@endsection