@extends('layout.corpo_pagina')

@section('body')

<style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

<div>
      <div id="lista_usuarios" class="w3-margin">
        <input class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
        <button class="w3-button w3-theme w3-margin-top">Buscar</button>
        <a class="button w3-button w3-theme w3-margin-top w3-right" href="http://localhost:8000/usuarios/cadastrar">Cadastrar novo usuário</a>

        <table>
          <thead>
            <tr>
              <th>Nome</td>
              <th>Login</td>
              <th>Ativo</td>
              <th>Opções</td>  
            </tr>
          </thead>
          <tbody id="table_usuarios">
           
          </tbody>
        </table>

      </div>
    </div>



@section('javascript')

<script type="text/javascript">

$(document).ready(function(){
    carregarUsuarios();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':"{{csrf_token()}}"
    }
});


function carregarUsuarios() {
       
    $.getJSON('/api/usuarios',function(usuarios){
        console.log(usuarios);
        for(i=0;i<usuarios.length;i++){
            let nome = usuarios[i].NOME_COMPLETO != null ? usuarios[i].NOME_COMPLETO : '';
            
            html = "<tr><td>"+nome +"</td><td>"+usuarios[i].LOGIN+"</td><td>"+usuarios[i].ATIVO+"</td><td><a class='button w3-button w3-theme w3-margin-top' ><i class='fas fa-user-times'></i></a> <a class='button w3-button w3-theme w3-margin-top' href='usuarios/editar/"+usuarios[i].USUARIO_ID+"'><i class='fas fa-edit'></i></a></td></tr>"; 
            $('#table_usuarios').append(html);
        }
    });
}

function cadastrarNovo() {
    location.href = './usuarios/cadastrar';
}

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
            toastr["error"]("O Campo login e senha e/ou senha não informado!")
      }    
    });
  
});
  


function criarusuario() {
        contato = $("#formContatos").serialize();
        html = "";
        $.post("/api/contatos", contato, function(data){
            data = JSON.parse(data);

            html = "<tr><td>"+data[0].id+"</td><td>"+data[0].telefone+"</td><td>"+data[0].email+"</td><td>"+data[0].whatsapp+"</td><td>"+data[0].name+"</td><td><a href='javascript:void(0)'onclick='editarContato("+data[0].id+")'>Editar</a> | <a href='javascript:void(0)' onclick='excluirContato("+data[0].id+")'>Excluir</a></td></tr>"; 
                $('#table_contatos').append(html);
       
        });
}




</script>

@endsection