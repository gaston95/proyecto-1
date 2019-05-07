@extends('layouts.app')


<title>Home | Tus vehiculos</title>

@section('content')

 <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<form class="form-inline"  method="POST" action="Categorias" >
  @csrf
  <pre>  </pre><div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Ingresar vehiculo">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="name" class="form-control">
  </div>
   <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Ingresar CV">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="cv" class="form-control">
  </div>
  <div class="form-group">
    <label>Categorias <pre>  </pre></label>
    <select class="form-control" name="categoria">
      @foreach ($caters as $cater)
      <option value="{{$cater->categoria}}">{{$cater->categoria}}</option>
         @endforeach
    </select><pre>  </pre>
  </div>
  <button type="submit" class="btn btn-outline-danger">Confirmar</button>
</form>

        


 
    

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
       
       <table class="table table-borderless">
       <thead>
       <tr> 
      <th scope="col">Vehiculo</th>
      <th scope="col">Potencia</th>
      <th scope="col">Accion</th> 
      </tr>
     </thead>
   <tbody>
     
    <tr>

      <td>{{$auto->auto}}</td>
      <td>{{$auto->cv}} </td>
      <td><a  href="{{ url('/home',['nom' => $auto->auto, 'cate' => $cater->categoria])}}"
            class="btn btn-outline-dark btn-sm">  Eliminar</a>
            @if($auto->publico=='false')
           <a href="{{ url('/home',['nom' => $auto->auto])}}"
            class="btn btn-outline-dark btn-sm">       Publicar</a></td>
            @else
            <a href="{{ url('/home',['nom' => $auto->auto])}}"
            class="btn btn-outline-dark btn-sm">       Privado</a></td>
            @endif
    </tr>
  </tbody>
</table>
            

           
       @endif
      @endforeach
      </div>
    </div>
  </div>
  @endforeach


<!--<form class="form-inline" method="POST" action="Coleccion">
   @csrf
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="agregar categoria">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" name="name">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Añadir</button>
</form>-->

  
@endsection
