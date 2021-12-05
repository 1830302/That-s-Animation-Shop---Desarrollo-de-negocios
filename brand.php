<?php 

  include '2conexion.php';
 require 'conexion.php';

$db = getPDO();
$consulta_lista= $db->prepare('SELECT * FROM ventas');
$consulta_lista->execute();
$lista=$consulta_lista->fetchAll(PDO::FETCH_ASSOC);
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

 <!-- BOOTSTRAP 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- DATATABLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Productos</title>
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
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="index.php">Inicio</a> </li>
                                        <li> <a href="about.php">Acerca de</a> </li>
                                        <li><a href="brand.php">Productos</a></li>
                                        <li><a href="admin.php">Administración</a></li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="icon/call.png" />(+52)8342669134</li>
                                <li><img src="icon/email.png" />thatsanimation@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Nuestros productos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- brand -->
    <div class="brand">
        <div class="container">

        </div>
        <div class="brand-bg">
            <div class="container">
                <div class="row">
                <?php
                
                $contador = 0;
                $sql="SELECT * FROM bodega";
                $result=$conexion->query($sql);

                $db = getPDO();
                $consulta_lista= $db->prepare('SELECT * FROM bodega');
                $consulta_lista->execute();
                $lista=$consulta_lista->fetchAll(PDO::FETCH_ASSOC);

                while (($mostrar=$result->fetch_array())) {
                ?>

                            <?php foreach ($lista as $list) {
					  		//VARIABLE QUE GUARDA LOS DATOS DE UN PRODUCTO PARA PODER MOSTRARLOS EN EL FORMULARIO
					  		//DE EDITAR PRODUCTO MEDIANTE JAVASCRIPT
					  		$info=$list['nombre'].'-'.$list['precio'].'-'.$list['img'];
					  		?>

                 


                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                        <div class="brand_box">
                            <img src=<?php echo $list['img']; ?> alt="img" />
                            <h3>$<strong class="red"><?php echo $list['precio']; ?></strong></h3>
                            <span><?php echo $list['nombre']; ?></span>

                          <div class="container">
                             <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#formAgregar" onclick="enviarDatos('<?php echo $info; ?>')" >Comprar</button>
                             
                        </div>
                        </div>
                    </div>


                <?php 

                $contador++;
                }
            }
                 ?>
                    
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end brand -->











    <!-- footer -->
    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row pdn-top-30">
                    <div class="col-md-12 ">
                        <div class="footer-box">
                            <div class="headinga">
                                <h3></h3>
                    
                            </div>
                            <ul class="location_icon">
                                <li> <a href="https://www.facebook.com/Thatsanimation"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="https://twitter.com/home"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="https://www.instagram.com/in_alswl030/"><i class="fa fa-instagram"></i></a></li>

                            </ul>
                            <div class="menu-bottom">
                                <ul class="link">
                                    <li> <a href="index.php">Inicio</a></li>
                                    <li> <a href="about.php">Acerca de</a></li>
                                    <li> <a href="brand.php">Productos</a></li>
                                    <li> <a href="admin.php">Administracion</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>










    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>


<!-- FORMULARIO DE AGREGAR PRODUCTO -->
<div class="modal fade" id="formAgregar" tabindex="-1" aria-labelledby="formAgregar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="adm_ventas/add.php" class="form-add form-group" enctype="multipart/form-data">
            <label>Nombre del producto:</label>
            <input type="text" placeholder="Nombre del producto" name="name" id="nam"  readonly required/><br>

            <label>Forma de pago:</label>
            <input type="text" placeholder="Forma de pago" name="pago" value="Paypal" readonly required/><br>

            <label>Dirección de entrega:</label>
            <input type="text" placeholder="Dirección de entrega" name="direccion"   required/><br>

            <label>Teléfono del comprador:</label>
            <input type="number" placeholder="Teléfono del comprador" name="telefono" required/><br>

            <label>Nombre:</label>
            <input type="text" placeholder="Nombre" name="producto"  required/><br>

            <label>Total:</label>
            <input type="number" placeholder="Total" name="total" id="prec" readonly required/><br>

            <input type="hidden" placeholder="" name="foto" id="img" readonly required/><br>

            

            <div class="float-right">
                <button type="submit" class="btn btn-primary">Comprar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- SCRIPTS PARA EL FUNCIONAMIENTO DE LOS DATATABLES-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            //creacion del datatable
            var table = $('#tablaProductos').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                responsive:true
            });
        } );
    </script>

<!-- METODO JAVASCRIPT PARA MOSTRAR LOS DATOS DEL PRODUCTO EN EL FORMULARIO-->
<script type="text/javascript">
  function enviarDatos(datos){
  	var d = datos.split('-');

  	var nam = d[0];
  	var prec = d[1];
    var img = d[2];  
  	
   //----------------------------------------------

    $("#nam").val(nam);
    $("#prec").val(prec);
    $("#img").val(img);
    
  }


</script>