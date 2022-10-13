@extends('plantillas.app')

@section("titulo")
Mis categorias
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
              <input value="{{ @old("nombre") }}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Digite el nombre de la categoría">
            </div>
            @error("nombre")
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea  class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Digite una descipción para la categoría...">{{ @old("descripcion") }}</textarea> 
            </div>
            @error("descripcion")
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div  style="float:right">
                <button type="submit" class="btn btn-success">Crear Categoría</button>
            </div>

          </form>
    </div>

     {{-- Listado de categorias --}}

     <div class="mt-3">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($categorias as $categoria )
                      <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre}}</td>
                        <td>{{ $categoria->descripcion}}</td>
                        <td>
                            <div style="display: flex;gap:10px">
                              <a class="btn btn-warning " href="{{ route("categorias.edit",$categoria->id) }}">Editar</a>
                                  <form  action="{{ route("categorias.destroy",$categoria->id) }}" method="POST">
                                      @method("DELETE")
                                      @csrf
                                      <button class=" btn btn-danger" >Eliminar</button>
                                  </form>
                            </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        
    </div>


</div>


    
@endsection