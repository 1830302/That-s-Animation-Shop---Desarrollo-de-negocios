<?php
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Iniciar sesion</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
    </head>

    <body>
        
        
                 
        <center>
        <img src="img/logo_large.png"  id="img">            
        </center>
       
        <div class="container">
            <div class="jumbotron">
            
                <center>
                    <h1>Favor de iniciar sesion</h1>
                </center>
            </div>
        </div>

        <main>
            <center>
            <form name="form_login" action="login.php" method="POST" >
                <div class="row">
                    
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                            <input  id="user" name="user" type="text" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="basic-addon1"  required>
                        </div>

                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" placeholder="Contraseña" required>
                        </div>

                    </div>
                
                    <div class="row mt-2">
                       
                       <button type="submit" class="btn btn-success">Entrar</button>
                        
                        
                    </div> 
            </form>
            </center>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        
    </body>
</html>