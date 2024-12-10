<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delyberry</title>
</head>
<body>
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <nav class="-mx-3 flex flex-1 justify-end">
            <ul>
                @auth
                    <li><a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a></li>
                @else
                    <li><a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>
                    </li>
                    @if (Route::has('register'))
                        <li><a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a></li>
                    @endif
                @endauth
                <li><a href="/">Home</a></li>
                <li><a href="/productos">Productos</a></li>
                <li><a href="/contact">Contact</a></li>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <li><a href="/admin">Admin Panel</a></li>
                    @endif
                @endauth
                
            </ul>    
        </nav>
    </header>

    <main>

<?php

  echo "<h2>Nuestros productos</h2>";
   
  if($con!=NULL){

      $consulta = "SELECT * FROM productos";

      $resultado = mysqli_query($con, $consulta);
  
      if ($resultado!=NULL) {
        while($filas = mysqli_fetch_array($resultado)){ 
          echo "
            <section class='product-card'>
              <img src='../imagines/".$filas['imagen']."' alt='".$filas['nombre']."' class='product-image'>
              <div class='product-info'>
                <h3 class='product-name'>".$filas['nombre']."</h3>
                <p class='product-price'>".$filas['precio']."</p>
                <p class='product-description'>".$filas['descripcion']."</p>
              </div>
            </section>
          ";
        }
      }
  } else {
    echo "<h1>Algo se rompio</h1>";
  }
?>
</main>
</body>
</html>
