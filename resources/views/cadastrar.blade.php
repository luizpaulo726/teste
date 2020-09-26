@extends('layout.corpo_pagina')

@section('body')


<div>
    <div id="lista_usuarios" class="w3-margin">

      <h4>Cadastro de usuários</h4>

      <form id="formUsuariosCadastro">
        <div>
          <label>Nome</label>
          <input type="text" name="NOME_COMPLETO" class="w3-input w3-block w3-border">
        </div>

        <div>
          <label>Login*</label>
            <input type="text" name="LOGIN" class="w3-input w3-block w3-border">
        </div>

        <div>
          <label>Senha*</label>
            <input type="password" name="SENHA" class="w3-input w3-block w3-border">
        </div>


        <div>
          <label>Ativo</label>
            <select class="w3-input w3-block w3-border" name="ATIVO">
              <option value="S">Sim</option>
              <option value="N">Não</option>
            </select>
        </div>

        <ul>
          <li id="opt_cadastrar_clientes"><input type="checkbox" name="cadastrar_clientes" value="cadastrar_clientes"> <label>Cadastrar clientes</label></li>
          <li id="opt_excluir_clientes"><input type="checkbox" name="excluir_clientes" value="excluir_clientes"> <label>Excluir clientes</label></li>
          <li id="opt_mais"><input type="checkbox" value="mais"> <label>E assim sucessivamente</label></li>
        </ul>

        <button class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
        <button class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</button>
      </form>
    </div>
  </div>



  @section('javascript')

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':"{{csrf_token()}}"
        }
    });


  function cadastrarNovo() {
      location.href = './cadastrar';
  }


  $("#formUsuariosCadastro").submit(function(){

      event.preventDefault();

          //Ajax com JQuery
          $.ajax({     
          url: "../api/usuarios",
          type: "POST",
          data: $('#formUsuariosCadastro').serialize(),
          context:this,
          success: function (data) {

              if(data.status == 201 ) {
                  toastr["success"]("Usuario cadastrado com sucesso!");
                  setTimeout(function() {
                      window.location.href = "../usuarios";
                  }, 1000);
              }

          },
          error:function () {
            toastr["error"]("O Campo login e senha devem ser informados!");
          }    
      });
  });


</script>

@endsection

