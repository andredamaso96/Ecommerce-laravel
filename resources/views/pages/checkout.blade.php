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
        
        <p class="lead">Aqui poderá finalizar as compras do seu carrinho.</p>
      </div>

      <div class="row">
        <div class="col-md-5 order-md-2 mb-4">
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
        <div class="col-md-7 order-md-1">
          <h4 class="mb-3">Endereço de cobrança</h4>
          <div class="d-block my-3">
          <form class="needs-validation" action="{{url('save-shipping-details')}}" method="post" novalidate="">
          	{{csrf_field()}}
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Primeiro nome</label>
                <input type="text" name="shipping_first_name" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  O primeiro nome válido é obrigatório.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Último nome</label>
                <input type="text" name="shipping_last_name" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  O último nome válido é obrigatório.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="shipping_email" class="form-control" id="email" placeholder="abc@example.com">
              <div class="invalid-feedback">
                Por favor, insira um endereço de e-mail válido para atualizações de envio.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Morada</label>
              <input type="text" name="shipping_address" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Por favor insira seu endereço de entrega.
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">País</label>
                <select class="custom-select d-block w-100" name="shipping_country" id="country" required="">
                  <option value="">Escolha...</option>
                  <option>Portugal</option>
                  <option>Espanha</option>
                  <option>França</option>
                </select>
                <div class="invalid-feedback">
                  Por favor, selecione um país válido.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Cidade</label>
                <input type="text" name="shipping_city" class="form-control" id="cidade" placeholder="" required="">
                <div class="invalid-feedback">
                  Por favor, selecione uma cidade válida.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" name="shipping_zip" class="form-control" id="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Zip obrigatório.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn hvr-skew-backward btn-lg btn-block " type="submit">Continuar</button>
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