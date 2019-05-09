@extends('layouts.app')


<title>Home | Tus vehiculos</title>

@section('content')

 <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
 <form class="form-inline"  method="POST" action="{{ url('/Categorias'.'/'.Auth::user()->id)}}" >
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
    <input  type="number" min="1" max="999" name="cv" class="form-control">
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
      <th scope="col">Acciones</th> 
      
      </tr>
     </thead>
   <tbody>
     
    <tr>

      <td>{{$auto->auto}}</td>
      <td>{{$auto->cv}} </td>
      <td>
       <form class="form-inline"  method="POST" action="{{ url('/home/'.$auto->auto.'/'.$cater->categoria.'/'.Auth::user()->id)}}" >
        @csrf
         <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="btn btn-outline-dark btn-sm">Eliminar</button>
         @csrf
      </form>
            @if($auto->publico=='false')
            <td>  <form class="form-inline"  method="POST" action="{{ url('/home/'.$auto->auto.'/'.Auth::user()->id)}}" >
             @csrf
             <input name="_method" type="hidden" value="PUT">
            <button type="submit" class="btn btn-outline-dark btn-sm">Publicar</button>
             @csrf
             </form></td>
            @else
           <td>  <form class="form-inline"  method="POST" action="{{ url('/home/'.$auto->auto.'/'.Auth::user()->id)}}" >
            @csrf
            <input name="_method" type="hidden" value="PUT">
           <button type="submit" class="btn btn-outline-dark btn-sm">Privado</button>
            @csrf
           </form></td>
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
