@extends('layout.corpo_pagina')

@section('body')

<div id="login">
    <img id="logo-cliente" class="w3-margin-top" src="{{asset('static/imagens/logo_cliente.jpg')}}"/>
       <form method="post" id="form_login" enctype="multipart/form-data"> 
            <input class="w3-input w3-border w3-margin-top" name="LOGIN" id="nome" type="text" placeholder="Usuário">
            <input class="w3-input w3-border w3-margin-top" name="SENHA" id="senha" type="password" placeholder="Senha">
            <button class="w3-button w3-theme w3-margin-top w3-block" >Logar</button>
        </form>
    <a href="http://www.santri.com.br">
    <img id="logo-santri" class="w3-right w3-margin-top" src="{{asset('static/imagens/logo_santri.svg')}}"/>
    </a>
</div>

@section('javascript')

<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':"{{csrf_token()}}"
    }
});

$("#form_login").submit(function(){
      
    event.preventDefault();

      //Ajax com JQuery
      $.ajax({     
        url: "api/login",
        type: "POST",
        data: $('#form_login').serialize(),
        context:this,
        success: function (data) {
      
            if(data.status == 404 ) {
            toastr["error"]("Login não encontrado!");
           }

           if(data.status == 201 ) {
                toastr["success"]("Você está sendo redirecionado!");
                setTimeout(function() {
                     window.location.href = "usuarios/";
                }, 1000);
           }

           if(data.status == 422 ) {
            toastr["success"]("Login e/ou senha não informado!");
           }

      
        },
        error:function () {
            toastr["error"]("Login e/ou senha não informado!")
      }    
    });
  
});
  
</script>

@endsection