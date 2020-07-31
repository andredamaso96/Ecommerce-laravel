@extends('layout')
@section('content')

<div class="container-fluid bg-light-gray">


<div class="container pt-5">
   
  <div class="row">
    <h3>Checkout</h3>
  </div>
    <div class="row">
    <div class="underline"></div>
  </div>
</div>



    <div class="container">
      <div class="py-5 text-center">
        
        <p class="lead">Selecione o seu método de pagamento.</p>
      </div>

      <div class="row">
        <div class="col-md-6 order-md-2 mb-4">
          <?php
          $contents=Cart::content();
        ?>
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Seu Carrinho</span>
          </h4>
          <ul class="list-group mb-3">
            <?php foreach($contents as $v_contents) {?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$v_contents->name}}</h6>
                <small class="text-muted">Quantidade: {{$v_contents->qty}}</small>
              </div>
              <span class="text-muted">{{$v_contents->price}} €</span>
            </li>
            <?php } ?>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (EURO)</span>
              <strong>{{Cart::total()}} €</strong>
            </li>
          </ul>

        </div>
        <div class="col-md-6 order-md-1">
          
          <h4 class="mb-3">Tipo de Pagamento</h4>
          <form action="{{url('/order-place')}}" method="post" id="confirm_checkout">
            {{csrf_field()}}
            <div class="d-block my-3">

              <label class="container">
                <input type="radio" name="payment_method" value="credit_card">
                <span class="checkmark">Cartão de Crédito</span>
              </label>
              <label class="container">
                <input type="radio" name="payment_method" value="debit_cart">
                <span class="checkmark">Cartão de Débito</span>
              </label>

              <label class="container">
                <input type="radio" name="payment_method" value="paypal">
                <span class="checkmark">PayPal</span>
              </label>
             

            <hr class="mb-4">
            <button class="btn hvr-skew-backward btn-lg btn-block " type="submit" >Confirmar checkout</button>
          </form>
        </div>
      
      </div>

      
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  



</div>
</div>

@endsection