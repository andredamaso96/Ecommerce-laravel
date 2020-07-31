@extends('layout')
@section('content')

<div class="container-fluid bg-light-gray">


<div class="container pt-5">
   
  <div class="row">
    <h3>Iniciar Sessão ou criar uma Conta</h3>
  </div>
    <div class="row">
    <div class="underline"></div>
  </div>
</div>

      
    <div class="container login">

      <div class="row">
    
      <div class="col-md-6 login-do">
        <h5>Já se encontra Registado?</h5>
        <form action="{{url('/customer_login')}}" method="post">
        	{{csrf_field()}}
        <div class="login-mail">
          <input type="text" placeholder="Email" name="costumer_email" required="">
          <i  class="glyphicon glyphicon-envelope"></i>
        </div>
        <div class="login-mail">
          <input type="password" placeholder="Password" name="password" required="">
          <i class="glyphicon glyphicon-lock"></i>
        </div>
           <a class="news-letter " href="#">

             <label class="checkbox1"></i>Esqueceu da palavra-passe</label>
             </a>
        <button type="submit" class=" btn hvr-skew-backward">Iniciar Sessão</button>
    	</form>
      </div>
      <div class="col-md-6 login-right">
         <h5>Não tem conta?</h5>
         
             <p>>Checkout num Passo</p>
                  <p>>Possibilidade de ter múltiplos endereços</p>
                  <p>>Visualizar o estado das suas encomendas</p>
        <a href="{{URL::to('/register')}}" class=" btn hvr-skew-backward">Registar</a>

      </div>
      
    </div>
       

    </div>


</div>

@endsection