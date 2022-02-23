@extends('leyouts.tema')
@section('title','Editar Contacto')
@section('content')
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body" style="margin-left: 30%; margin-right: 30%;">
              <form role="form"  method="GET"  action="/admin/editar/{{$edit->id}}">
                  @csrf
               
                <div class="mb-3">
                  <input type="number" class="form-control" placeholder="Identidade" aria-label="contacto" aria-describedby="contacto-addon" name="numero" value="{{$edit->numero}}">
                  @error('numero')
                    <span style="color:red"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class="mb-3">
                  <select name="cod" id="" class="form-control">
                    <option value="{{$edit->cod}}">{{$edit->cod}}</option>
                    <option value="Portugal(35)">Portugal(35)</option>
                    <option value="Angola(45)">Angola(45)</option>
                    <option value="US(35">US(35)</option>
                  </select>
                  @error('cod')
                    <span style="color:red;"><small>{{$message}}</small></span>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> <br><br><br><br><br>@endsection 