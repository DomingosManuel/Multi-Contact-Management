@extends('leyouts.tema')
@section('title','Adicionar Contacto')
@section('content')
@if(session('smg'))
<div class="container-fluid py-4">

    <div style="padding=10px; background-color:#14f3a9;">

        <h5 style="color:#fff; text-align:center;">{{(session('smg'))}}</h5>
    </div>
    @endif
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body" style="margin-left: 30%; margin-right: 30%;">
              <form role="form"  method="POST"  action="">
                @csrf
                <div class="mb-3">
                  <input type="number" class="form-control" placeholder="Número" aria-label="contacto" aria-describedby="contacto-addon" name="numero">
                  @error('numero')
                    <span style="color:red"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class="mb-3">
                  <select name="cod" id="" class="form-control">
                    <option value="">Selecione seu CountryCod</option>
                    <option value="Portugal(351)">Portugal(351)</option>
                    <option value="Angola(244)">Angola(244)</option>
                    <option value="Brasil(55)">Brasil(55)</option>
                  </select>
                  @error('cod')
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