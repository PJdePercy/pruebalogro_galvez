<?php 

if (isset($_GET["accion"]) && $_GET["accion"] === 'eliminar') {
    if (isset($_GET["id"]) && $_GET["id"] !== '') {
        $id = $_GET["id"];

        $denuncias = new Denuncias();
        $denuncias->deleteDenuncia($id);
        header("location: ../controlador/controlador.php");
        exit();
    }
}

if (isset($_GET["accion"]) && $_GET["accion"] === 'actualizar') {
    if (!isset($_POST['id']) || empty($_POST['id']) || !isset($_POST['titulo']) || empty($_POST['titulo']) || !isset($_POST['descripcion']) || empty($_POST['descripcion']) || !isset($_POST['ubicacion']) || empty($_POST['ubicacion']) || !isset($_POST['estado']) || empty($_POST['estado']) || !isset($_POST['ciudadano']) || empty($_POST['ciudadano']) || !isset($_POST['telefono_ciudadano']) || empty($_POST['telefono_ciudadano'])) {
        echo "Por favor, complete todos los campos.";
    } else {
        $denuncias = new Denuncias();
        $denuncias->updateDenuncia($_POST['id'], $_POST['titulo'], $_POST['descripcion'], $_POST['ubicacion'], $_POST['estado'], $_POST['ciudadano'], $_POST['telefono_ciudadano']);
        header("location: ../controlador/controlador.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo MVC con PHP - Denuncias</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 0.2em;
        }
        h3 {
            font-size: 1.8em;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px; /* Width for uniformity */
            height: 35px; /* Height for uniformity */
            font-size: 18px; /* Icon size */
        }
        .btn-warning {
            background-color: #ff9800;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-success {
            background-color: #4CAF50;
        }
        .btn-secondary {
            background-color: #9e9e9e;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        footer {
            text-align: center;
            margin-top: 20px;
        }
        @media (max-width: 600px) {
            table, th, td {
                display: block;
                width: 100%;
            }
            th, td {
                box-sizing: border-box;
                padding: 10px;
            }
            th {
                background-color: transparent;
                color: #333;
                text-align: left;
            }
            tr {
                margin-bottom: 10px;
                border-bottom: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Ejemplo MVC con PHP - Denuncias</h1>
            <p class="lead">Sistema de registro y gestión de denuncias</p>
        </header>

        <h3>Listado de Denuncias</h3>
        <table id="tabla-denuncias">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Ciudadano</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            <?php
                $denuncias = new Denuncias();
                $datos = $denuncias->getDenuncias();
                foreach ($datos as $denuncia) {
                    ?>
                    <tr>
                        <td><?php echo $denuncia["id"]; ?></td>
                        <td><?php echo $denuncia["titulo"]; ?></td>
                        <td><?php echo $denuncia["descripcion"]; ?></td>
                        <td><?php echo $denuncia["ubicacion"]; ?></td>
                        <td><?php echo $denuncia["estado"]; ?></td>
                        <td><?php echo $denuncia["ciudadano"]; ?></td>
                        <td><?php echo $denuncia["telefono_ciudadano"]; ?></td>
                        <td>
                            <a class="btn btn-warning update-btn" href="#" data-toggle="modal" data-target="#actualizar" data-index="<?php echo $denuncia["id"]; ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger" href="controlador.php?accion=eliminar&id=<?php echo $denuncia["id"]; ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        <a href="../index.php" class="btn btn-secondary"> <i class="fa fa-arrow-circle-left"></i></a>

        <!-- Modal para actualizar denuncia -->
        <div class="modal" id="actualizar">
            <div class="modal-content">
                <span class="close" data-dismiss="modal">&times;</span>
                <h5>Actualizar Denuncia</h5>
                <form action="controlador.php?accion=actualizar" method="post">
                    <input type="hidden" name="id" id="id"/>
                    <div>
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" required />
                    </div>
                    <div>
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" required />
                    </div>
                    <div>
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" name="ubicacion" id="ubicacion" required />
                    </div>
                    <div>
                        <label for="estado">Estado:</label>
                        <select name="estado" id="estado" required>
                            <option value="pendiente">Pendiente</option>
                            <option value="en proceso">En proceso</option>
                            <option value="resuelto">Resuelto</option>
                        </select>
                    </div>
                    <div>
                        <label for="ciudadano">Ciudadano:</label>
                        <input type="text" name="ciudadano" id="ciudadano" required />
                    </div>
                    <div>
                        <label for="telefono_ciudadano">Teléfono del Ciudadano:</label>
                        <input type="text" name="telefono_ciudadano" id="telefono_ciudadano" required />
                    </div>
                    <div>
                        <input type="submit" value="Actualizar" class="btn btn-success"/>
                        <button type="button" class="btn btn-secondary close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <footer>
            Adaweb - <?php echo date("Y"); ?>
        </footer>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Cargar datos en el modal para actualizar denuncia
            $('.update-btn').click(function() {
                var datos = <?php echo json_encode($datos);?>;
                var index = $(this).data('index');
                var denuncia = datos.find(d => d.id == index);
                $('#id').val(denuncia.id);
                $('#titulo').val(denuncia.titulo);
                $('#descripcion').val(denuncia.descripcion);
                $('#ubicacion').val(denuncia.ubicacion);
                $('#estado').val(denuncia.estado);
                $('#ciudadano').val(denuncia.ciudadano);
                $('#telefono_ciudadano').val(denuncia.telefono_ciudadano);
                $('#actualizar').css('display', 'block');
            });

            // Cerrar modal
            $('.close').click(function() {
                $('#actualizar').css('display', 'none');
            });
        });
    </script>
</body>
</html>
