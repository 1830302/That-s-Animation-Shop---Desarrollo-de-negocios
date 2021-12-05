<?php 
 include '2conexion.php';
 require 'conexion.php';
 require 'secion/abre_sesion.php'; 

$db = getPDO();
$consulta_lista= $db->prepare('SELECT * FROM bodega');
$consulta_lista->execute();
$lista=$consulta_lista->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- BOOTSTRAP 5-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- FONT AWESOME(LIBRERIA PARA LOS ICONOS)-->
    <script src="https://kit.fontawesome.com/f351e6e743.js" crossorigin="anonymous"></script>


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
    <title>Administrar productos</title>
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
                                        <li> <a href="info_ganancias.php">Informe de ganancias</a> </li>
                                        <li><a href="realizar_venta.php">Informe de ventas</a></li>
                                        <li><a href="admin_usuarios.php">Administrar usuarios</a></li>
                                        <li><a href="secion\cerrar_secion.php">Salir</a></li>
                                        
                                    </ul>
                                </nav>
                            </div>
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
                        <h2>Administrar productos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about -->
    <div class="about">
    <div class="container">
<!-- APARTADO DEL CONTENIDO-->
	
	<!-- HEADER-->
	<div class="content">
		<div class="cont-header mt-5">
		
		<button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#formAgregar">Agregar producto</button>
	</div>

	<!-- DATATABLE -->
	<div class="cont-table mt-3">

		<div class="card" style="width: 100%;">
		  <div class="card-body">

		  		<table id="tablaProductos" class="table table-striped table-bordered text-center" style="width:100%">
					<thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Nombre</th>
			              <th scope="col">Precio</th>
			              <th scope="col">Cantidad</th>
			              <th scope="col">Imagen</th>
			              <th scope="col">Opciones</th>
					    </tr>
					</thead>
					<tbody>
					  	<!-- CICLO FOREACH PARA RECORRER EL ARRAY DE LOS DATOS DE LOS PRODUCTOS Y MOSTRARLOS
					  	 EN LA TABLA-->
					  	<?php foreach ($lista as $list) {
					  		//VARIABLE QUE GUARDA LOS DATOS DE UN PRODUCTO PARA PODER MOSTRARLOS EN EL FORMULARIO
					  		//DE EDITAR PRODUCTO MEDIANTE JAVASCRIPT
					  		$info=$list['id'].'-'.$list['nombre'].'-'.$list['precio'].'-'.$list['cantidad'].'-'.$list['img'];
					  		?>
					    <tr>
					      <th scope="row"><?php echo $list['id']; ?></th>
					      <td><?php echo $list['nombre']; ?></td>
					      <td><?php echo $list['precio']; ?></td>
					      <td><?php echo $list['cantidad']; ?></td>
					      <td> <img width="50px" src="<?php echo $list['img']; ?>" ></td>
					      <td>
					
					      	<!--BOTON PARA ABRIR EL FORMULARIO DE EDITAR PRODUCTO-->
					      	<button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#formEditar" onclick="enviarDatos('<?php echo $info; ?>')"><i class="fas fa-pencil-alt"></i></button>

					      	<!--BOTON PARA ABRIR EL MENSAJE DE ELIMINAR PRODUCTO-->
					      	<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#msgEliminar" onclick="enviarId('<?php echo $list['id']; ?>')"><i class="far fa-trash-alt"></i></button>

					      </td>
					    </tr>
						<?php } ?>
					  
					</tbody>
				</table>

		  </div>
		</div>
		
	</div>
	</div>

</div>
    </div>
    <!-- end about -->

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

<!-- MODALES-->

<!-- FORMULARIO DE AGREGAR PRODUCTO -->
<div class="modal fade" id="formAgregar" tabindex="-1" aria-labelledby="formAgregar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="adm_produc/add.php" class="form-add form-group" enctype="multipart/form-data">
        	<label>Nombre:</label>
        	<input type="text" placeholder="Nombre" name="name" required/><br>

        	<label class="mt-2">Precio:</label>
        	<input type="number" placeholder="Precio" name="nickname" step="any" required/><br>

        	<label class="mt-2">Cantidad:</label>
        	<input type="number" placeholder="Candidad" name="pass" required/>

        	<label class="mt-2">Foto:</label>
        	<input type="file" accept="image/*" name="foto">

        	<div class="float-right">
		        <button type="submit" class="btn btn-primary">Agregar</button>
		        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
		    </div>
        </form>
      </div>
    </div>
  </div>
</div>






<!-- FORMULARIO DE EDITAR PRODUCTO -->
<div class="modal fade" id="formEditar" tabindex="-1" aria-labelledby="formEditar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">EDITAR USUARIO</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="adm_produc/update.php" class="form-edit form-group" enctype="multipart/form-data">
        	<input type="hidden" name="id_user" id="id_user">

        	<label>Nombre:</label>
        	<input type="text" placeholder="Nombre" name="name" id="name1" required/><br>

        	<label class="mt-2">Precio:</label>
        	<input type="number" placeholder="Precio" name="nickname" id="nickname" step="any" required/><br>

        	<label class="mt-2">Cantidad:</label>
        	<input type="number" placeholder="Contraseña" name="pass" id="pass" required/>

        	<label class="mt-2">Foto:</label>
        	<input type="file" accept="image/*" name="foto" id="foto">

        	<div class="float-right">
		        <button type="submit" class="btn btn-primary">Guardar</button>
		        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
		    </div>
        </form>
      </div>
    </div>
  </div>
</div>






<!-- MENSAJE DE ELIMINAR -->
<div class="modal fade" id="msgEliminar" tabindex="-1" aria-labelledby="msgEliminar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body msg-text">
      	<form method="POST" action="adm_produc/delete.php">
      		<label>¿ESTAS SEGURO QUE DESEAS ELIMINAR ESTE REGISTRO?</label>
      		<input type="text" name="id_product" id="id_product_MSG">
      	    <div class="modal-footer text-center">
	        	<button type="submit" class="btn btn-danger">ACEPTAR</button>
	        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
	      	</div>
      	</form>
      </div>
    </div>
  </div>
</div>


<!--////////////////////////////////////////////////////////////////////////////////////////////////-->




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










<!-- METODO JAVASCRIPT PARA MOSTRAR LOS DATOS DEL PRODUCTO EN EL FORMULARIO DE EDITAR-->
<script type="text/javascript">
  function enviarDatos(datos){
  	var d = datos.split('-');

  	var id = d[0];
  	var nomb = d[1];
  	var nickna = d[2];
  	var passs = d[3];
   //----------------------------------------------

    $("#id_user").val(id);
    $("#name1").val(nomb);
    $("#nickname").val(nickna);
    $("#pass").val(passs);
  }

  function enviarId(id){
	$("#id_product_MSG").val(id);
  }
</script>