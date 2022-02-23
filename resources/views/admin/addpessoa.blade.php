@extends('leyouts.tema')
@section('title','Adicionar Pessoa')
@section('content')
@if(session('smg6'))
<div class="container-fluid py-4">

    <div style="padding=10px; background-color:#14f3a9;">

        <h5 style="color:#fff; text-align:center;">{{(session('smg6'))}}</h5>
    </div>
    @endif
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body" style="margin-left: 30%; margin-right: 30%;">
              <form role="form"  method="POST"  action="">
                  @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nome" aria-label="Nome" aria-describedby="nome-addon" name="nome">
                  @error('nome')
                    <span style="color:red ">  <small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="number" class="form-control" placeholder="Identidade" aria-label="contacto" aria-describedby="contacto-addon" name="identidade">
                  @error('identidade')
                    <span style="color:red"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="E-mail" aria-label="email" aria-describedby="email-addon" name="email">
                  @error('email')
                    <span style="color:red"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Cadastrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> <br><br><br><br><br>@endsection 