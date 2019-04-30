@extends('layouts.app')

@section('content')

Su lista de categorias:
@if(sizeof($caters)==0)
<br>
      EL usuario no ingreso ningun vehiculo
@endif
 @foreach ($caters as $cater)
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          {{$cater->categoria}}
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      @foreach ($autos as $auto)
        @if($auto->categoria==$cater->categoria)
           {{$auto->auto}} CV:{{$auto->cv}}  
       @endif
      @endforeach
      </div>
    </div>
  </div>
  @endforeach
@endsection