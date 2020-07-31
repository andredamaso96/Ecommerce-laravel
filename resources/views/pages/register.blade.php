@extends('layout')
@section('content')

<div class="container-fluid bg-light-gray">


<div class="container pt-5">
   
  <div class="row">
    <h3>Criar uma Conta</h3>
  </div>
    <div class="row">
    <div class="underline"></div>
  </div>
</div>

      
    <div class="container login">

      <div class="row">
    
      <div class="col-md-6 login-do">
        <h5>Registe-se connosco aqui!</h5>
        <form action="{{url('/customer_registration')}}" method="post">
          {{csrf_field()}}
          <div class="login-mail">
          <input type="text" placeholder="Nome Completo" name="costumer_name" required="">
          <i  class="glyphicon glyphicon-envelope"></i>
        </div>
        <div class="login-mail">
          <input type="text" placeholder="Email" name="costumer_email" required="">
          <i  class="glyphicon glyphicon-envelope"></i>
        </div>
        <div class="login-mail">
          <input type="password" placeholder="Password" name="password" required="">
          <i class="glyphicon glyphicon-lock"></i>
        </div>
        <div class="login-mail">
          <input type="text" placeholder="Número de Telemóvel" name="mobile_number" required="">
          <i class="glyphicon glyphicon-lock"></i>
        </div>
           
        <button type="submit" class=" btn hvr-skew-backward">Registar</button>
    	</form>
      </div>
    
      
      </div>
      
    </div>
       

    </div>


</div>

@endsection