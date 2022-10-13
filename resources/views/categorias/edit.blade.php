@extends('plantillas.app')

@section("titulo")
Mis categorias editar
@endsection

@section("content")
<div class="container pt-3">
    <a href="{{ route("categorias.index") }}" class="btn btn-info">Volver</a>
</div>
<div class="container mt-3">
    <div class="card">
        <form class="p-5" method="POST" action="{{ route("categorias.update",$categoria->id) }}">
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
              <input value="{{ @old("nombre") ?? $categoria->nombre }}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Digite el nombre de la categoria">
            </div>
            @error("nombre")
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea  class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Digite una descripción para la tarea...">{{ @old("descripcion") ?? $categoria->descripcion }}</textarea> 
              </div>
              @error("descripcion")
                  <div class="alert alert-warning" role="alert">
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror

            <div  style="float:right">
                <button type="submit" class="btn btn-success">Editar Categoria</button>
            </div>

          </form>
    </div>

</div>


    
@endsection