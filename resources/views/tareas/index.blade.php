@extends('plantillas.app')

@section("titulo")
Mis tareas
@endsection

@section("content")

<div class="container mt-3">
    <div class="card">
        <form class="p-5" method="POST">
            @csrf
            @if(session()->has("success"))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session()->get("success") }}</strong>
              </div>  
            @endif
          
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              })
            </script>
            
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input value="{{ @old("nombre") }}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Digite el nombre de la tarea">
            </div>
            @error("nombre")
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea  class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Digite una descipción para la tarea...">{{ @old("descripcion") }}</textarea> 
            </div>
            @error("descripcion")
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror


            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select form-select-lg" name="categoria_id" id="categoria_id">
                    <option selected disabled>Seleccione una opción</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @error("categoria")
            <div class="alert alert-warning" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha"  value="{{ @old("fecha") }}">
            </div>
            @error("fecha")
            <div class="alert alert-warning" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror

            <div  style="float:right">
                <button type="submit" class="btn btn-success">Crear Tarea</button>
            </div>

          </form>
    </div>

    {{-- Listado de tareas --}}

    <div class="row">
    @foreach ($tareas as $tarea )
        <div class="mt-3 col-sm-12 col-md-4 " >
            <div class="card text-start " style="background-color:{{ $tarea->estado ? ""  : "" }}">
                <div style="display: flex; align-items: center;gap:10px;justify-content:end;margin-bottom:-18px;margin-right:10px">
                    <small>{{ $tarea->fecha }}</small>
                    <strong><small >{{ $tarea->estado ? "Realizada" : "Pendiente" }}</small></strong>
                </div>
                <hr>
              <div class="card-body">
                <h4 class="card-title">{{ $tarea->nombre }}</h4>
                <p class="card-text">{{ $tarea->descripcion }}</p>
              </div>
              <hr style="margin-bottom: -2px">

              <div style="display:flex;align-items:center;gap:10px;padding:10px;box-sizing:border-box;justify-content:end">
                
                <a class="btn btn-warning" href="{{ route("tareas.edit",$tarea->id) }}">Editar</a>
                <form action="{{ route("tareas.destroy",$tarea->id) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger" href="">Eliminar</button>
                </form>
              </div>
            </div>
        </div>
    @endforeach
    </div>

</div>


    
@endsection