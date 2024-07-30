<?php
    include 'Conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fecha = date('Y-m-d H:i:s');
        $correo = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $asunto = $_POST['asunto'];
        $comentario = $_POST['comentario'];

        $libreria = new DbConexion();
        $pdoConexion = $libreria->getConexion();
        $libreria->InsertarContacto($correo, $nombre, $asunto, $comentario);

    }
        

?>
<html lang="en">

   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>limelight</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout in_page">
      <!-- loader  -->
      <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-10 offset-md-1">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                             <li class="nav-item ">
                                 <a class="nav-link" href="index.html">Inicio</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="libros.php">Libros</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gallery.html">Galeria</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="comentarios.php"> Comentarios </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contacto.php">Contactanos</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
        
      </header>
      <!-- end header inner -->
 
<body>
    
    <section id="books" class="books-section">
            <div class="container">
              <div class="titlepage">
                  <br><br><br>
                     <h2>Nuestros <span class="green">   Libros</span></h2>
                  </div>
                <div class="row">
                    <?php
                        $libreria = new DbConexion();
                        $libros = $libreria->GetLibros();
                        if (!empty($libros)):
                            foreach ($libros as $libro):
                    ?>
                    <div class="col-md-4">
                        <div class="card book-card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($libro['titulo']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($libro['tipo']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                            endforeach;
                        else:
                    ?>
                    <p class="text-center">No se encontraron libros.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
         <section id="authors" class="authors-section">
            <div class="container">
                 <div class="titlepage">
                  <br><br><br>
                     <h2>Nuestros <span class="green">   Autores destacados</span></h2>
                  </div>
                <div class="row">
                    <?php
                        $autores = $libreria->GetAutores();
                        if (!empty($autores)):
                            foreach ($autores as $autor):
                    ?>
                    <div class="col-md-4">
                        <div class="card author-card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($autor['nombre'] . ' ' . htmlspecialchars($autor['apellido'])); ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                            endforeach;
                        else:
                    ?>
                    <p class="text-center">No se encontraron autores.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

</body>
      <!-- end header -->
      
      <!-- Javascript files-->
      <script src="js/index.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>