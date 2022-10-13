<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@yield('styles')

</head>

<body>

 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
     <div class="container">
         <a class="navbar-brand" href="{{ route("tareas.index") }}">Mis tareas</a>
         <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
             aria-expanded="false" aria-label="Toggle navigation"></button>
         <div class="collapse navbar-collapse" id="collapsibleNavId">
             <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route("tareas.index") }}">Tareas</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route("categorias.index") }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" class="">
                      <form action="/logout" method="POST">
                        @csrf
                        <li><button class="dropdown-item" href="#">Cerrar sesion</button></li>
                      </form>
                    </ul>
                  </li>
             </ul>
        
         </div>
     </div>
 </nav>
    {{-- crear plantilla --}}
    @yield('content')

    
    @yield('scripts')
</body>
</html>
