<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['titulo']) || !isset($_POST['descripcion']) || !isset($_POST['ubicacion']) || !isset($_POST['estado']) || !isset($_POST['ciudadano']) || !isset($_POST['telefono_ciudadano']) || empty($_POST['titulo']) || empty($_POST['descripcion']) || empty($_POST['ubicacion']) || empty($_POST['estado']) || empty($_POST['ciudadano']) || empty($_POST['telefono_ciudadano'])) {
        echo "Por favor, complete todos los campos.";
    } else {
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $ubicacion = $_POST["ubicacion"];
        $estado = $_POST["estado"];
        $ciudadano = $_POST["ciudadano"];
        $telefono_ciudadano = $_POST["telefono_ciudadano"];
        include "modelo/modelo.php";
        $nuevo = new Denuncias();
        $asd = $nuevo->setDenuncia($titulo, $descripcion, $ubicacion, $estado, $ciudadano, $telefono_ciudadano);
        if ($asd) {
            echo "Denuncia registrada exitosamente.";
        } else {
            echo "Error al registrar la denuncia.";
        }
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo MVC con PHP - Denuncias</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Ejemplo MVC con PHP - Denuncias</h1>
                <hr/>
                <p class="lead">Sistema de registro y gestión de denuncias <br/>
                    utilizando el paradigma MVC</p>
            </header>
            <div class="row">
                <div class="col-lg-6">

                    <form action="#" method="post" class="col-lg-5">
                        <h3>Nueva Denuncia</h3>                
                        Título: <input type="text" name="titulo" class="form-control" required />    
                        Descripción: <input type="text" name="descripcion" class="form-control" required />    
                        Ubicación: <input type="text" name="ubicacion" class="form-control" required />    
                        Estado:
                        <select name="estado" class="form-control" required>
                            <option value="pendiente">Pendiente</option>
                            <option value="en proceso">En proceso</option>
                            <option value="resuelto">Resuelto</option>
                        </select>
                        Ciudadano: <input type="text" name="ciudadano" class="form-control" required />    
                        Teléfono del Ciudadano: <input type="text" name="telefono_ciudadano" class="form-control" required />    
                        <br/>
                        <input type="submit" value="Registrar" class="btn btn-success"/>
                    </form>
                </div>
                <div class="col-lg-6 text-center">
                    <hr/>
                    <h3>Listado de Denuncias</h3>
                    <a href="controlador/controlador.php"><i class="fa fa-align-justify"></i> Acceder al listado de denuncias</a>
                    <hr/>
                </div> 
            </div>
            <footer class="col-lg-12 text-center">
                Adaweb - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>
