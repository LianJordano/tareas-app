@extends('plantillas.app')

@section("titulo")
Mis tareas editar
@endsection

@section("content")
<div class="container pt-3">
    <a href="{{ route("tareas.index") }}" class="btn btn-info">Volver</a>
</div>
<div class="container mt-3">
    <div class="card">
        <form class="p-5" method="POST" action="{{ route("tareas.update",$tarea->id) }}">
            @method("PUT")
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
              <input value="{{ @old("nombre") ?? $tarea->nombre }}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Digite el nombre de la tarea">
            </div>
            @error("nombre")
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea  class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Digite una descipción para la tarea...">{{ @old("descripcion") ?? $tarea->descripcion }}</textarea> 
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
                        <option {{ $tarea->categoria_id == $categoria->id ? "selected" : ""  }} value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
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
                <input type="date" class="form-control" id="fecha" name="fecha"  value="{{ @old("fecha") ?? $tarea->fecha }}">
            </div>
            @error("fecha")
            <div class="alert alert-warning" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select form-select-lg" name="estado" id="estado">
                    <option {{ $tarea->estado ? "selected" : ""  }} value="0">Pendiente</option>
                    <option {{ $tarea->estado ? "selected" : ""  }} value="1">Finalizado</option>
                </select>
            </div>

            <div  style="float:right">
                <button type="submit" class="btn btn-success">Editar Tarea</button>
            </div>

          </form>
    </div>

</div>


    
@endsection