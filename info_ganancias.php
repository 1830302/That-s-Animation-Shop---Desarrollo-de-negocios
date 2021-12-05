<?php 
 include '2conexion.php';
 require 'conexion.php';
 require 'secion/abre_sesion.php'; 

$db = getPDO();
$consulta_lista= $db->prepare('SELECT * FROM ventas');
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
    <title>Informe de ventas</title>
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
                                        <li><a href="realizar_venta.php">Informe de ventas</a></li>
                                         <li> <a href="info_ganancias.php">Informe de ganancias</a> </li>
                                        <li><a href="admin.php">Administrar productos</a></li>
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
                        <h2>Informe de ganancias</h2>
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
		
     <h3>Para imprimir presione CTRL + P</h3>
	</div>

	<!-- DATATABLE -->
	<div class="cont-table mt-3">

		<div class="card" style="width: 100%;">
		  <div class="card-body">

		  		<table id="tablaProductos" class="table table-striped table-bordered text-center" style="width:100%">
					<thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Nombre del comprador</th>
			              <th scope="col">Forma de pago</th>
                          <th scope="col">Total</th>
			              <th scope="col">Opciones</th>
					    </tr>
					</thead>
					<tbody>
					  	<!-- CICLO FOREACH PARA RECORRER EL ARRAY DE LOS DATOS DE LOS PRODUCTOS Y MOSTRARLOS
					  	 EN LA TABLA-->
					  	<?php foreach ($lista as $list) {
					  		//VARIABLE QUE GUARDA LOS DATOS DE UN PRODUCTO PARA PODER MOSTRARLOS EN EL FORMULARIO
					  		//DE EDITAR PRODUCTO MEDIANTE JAVASCRIPT
					  		$info=$list['id'].'-'.$list['nombre_del_comprador'].'-'.$list['forma_de_pago'].'-'.$list['direccion_de_entrega'].'-'.$list['telefono_del_comprador'].'-'.$list['nombre_del_producto'].'-'.$list['fecha'].'-'.$list['total'].'-'.$list['imagen'];
					  		?>
					    <tr>
					      <th scope="row"><?php echo $list['id']; ?></th>
					      <td><?php echo $list['nombre_del_comprador']; ?></td>
					      <td><?php echo $list['forma_de_pago']; ?></td>
                          <td><?php echo $list['total']; ?></td>
					      <td>

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
        <form method="POST" action="adm_ventas/add.php" class="form-add form-group" enctype="multipart/form-data">
        	<label>Nombre del producto:</label>
            <input type="text" placeholder="Nombre del comprador" name="name"  required/><br>

            <label>Forma de pago:</label>
            <input type="text" placeholder="Forma de pago" name="pago"  required/><br>

            <label>Dirección de entrega:</label>
            <input type="text" placeholder="Dirección de entrega" name="direccion"   required/><br>

            <label>Teléfono del comprador:</label>
            <input type="number" placeholder="Teléfono del comprador" name="telefono" required/><br>

            <label>Nombre del producto:</label>
            <input type="text" placeholder="Nombre del producto" name="producto" required/><br>

            <label>Fecha:</label>
            <input type="date" placeholder="Fecha" name="fecha" required/><br>

            <label>Total:</label>
            <input type="number" placeholder="Total" name="total" required/><br>

            <label class="mt-2">Foto:</label>
            <input type="file" accept="image/*" name="foto" >

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
        <form method="POST" action="adm_ventas/update.php" class="form-edit form-group" enctype="multipart/form-data">
        	<input type="hidden" name="id_user" id="id_user">

            <label>Nombre del producto:</label>
            <input type="text" placeholder="Nombre del comprador" name="name" id="name" required/><br>

            <label>Forma de pago:</label>
            <input type="text" placeholder="Forma de pago" name="pago" id="nombre" required/><br>

            <label>Dirección de entrega:</label>
            <input type="text" placeholder="Dirección de entrega" name="direccion"  id="" required/><br>

            <label>Teléfono del comprador:</label>
            <input type="number" placeholder="Teléfono del comprador" name="telefono" required/><br>

            <label>Nombre del producto:</label>
            <input type="text" placeholder="Nombre del producto" name="producto" id="producto" required/><br>

            <label>Total:</label>
            <input type="number" placeholder="Total" name="total" id="total" required/><br>


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
      	<form method="POST" action="adm_ventas/delete.php">
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
  	var pag = d[2];
  	var dire = d[3];
    var tel = d[4];
    var prod = d[5];
    var fec = d[6];
    var tot = d[7];
    var imag = d[8];
  	var per_ger = d[9];
  	var per_caj = d[10];
  	var per_gere = d[11];
   //----------------------------------------------

    $("#A1").val(id);
    $("#A2").val(nomb);
    $("#A3").val(pag);
    $("#A4").val(dire);
    $("#A5").val(tel);
    $("#A6").val(prod);
    $("#A7").val(fec);
    $("#A8").val(tot);
    $("#A9").val(image);
    $("#p_g").val(per_ger);
    $("#p_c").val(per_caj);
    $("#p_b").val(per_gere);
  }

  function enviarId(id){
	$("#id_product_MSG").val(id);
  }
</script>
