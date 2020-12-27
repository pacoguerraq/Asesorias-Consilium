<?php 

$conn = mysqli_connect('localhost', 'hidden', 'hidden', 'asesor14_datos');

if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$numero = $_POST['numero'];
$correo = $_POST['email'];
$grado = $_POST['grado'];
$salon = $_POST['salon'];
$_POST['dia'] = implode(', ', $_POST['dia']);
$horarios = $_POST['horarios'];
$materias = $_POST['materias'];
$temas = $_POST['temas'];
$contacto = $_POST['contacto'];
$asesor = $_POST['asesor'];

$sql = "INSERT INTO asesorias (nombre, apellidos, numero, correo, grado, salon, materias, temas, contacto, asesor) VALUES ('$nombre' , '$apellidos', '$numero', '$correo', '$grado', '$salon', '$materias', '$temas', '$contacto', '$asesor');";
mysqli_query($conn, $sql);

mysqli_close($link);

$data = $nombre.",".$apellidos.",".$numero.",".$correo.",".$grado.",".$salon.",".$_POST['dia'].",".$horarios.",".$materias.",".$temas.",".$asesor.",".$contacto;

$file="pedidos.csv"; 

file_put_contents($file, $data.PHP_EOL,FILE_APPEND);

$email_subject = "Pedido de asesoría";

$email_body = "Nombre: $nombre.\n". 
                "Apellidos: $apellidos.\n".
                    "Número: $numero.\n".    
                        "Email: $correo.\n".
                            "Grado: $grado.\n".
                                "Salón: $salon.\n".
                                    "Día: {$_POST['dia']}.\n".
                                        "Horarios: $horarios.\n".
                                            "Materias: $materias.\n".
                                                "Temas: $temas.\n".
                                                    "Asesor: $asesor.\n".
                                                        "Forma de contacto: $contacto.\n".


$to = "consiliumasesorias.contacto@gmail.com";

$headers = "From: Asesorías Consilium <contacto@asesoriasconsilium.x10host.com> \r\n";

$headers .= "Reply-To: $correo \r\n";

mail($to,$email_subject,$email_body,$headers);

?> 
<html>
<head>
<meta charset="utf-8">
<title>Agendado</title>
<style type="text/css">

    body {
        background: rgb(205, 147, 0);
    }
    #titulo {
        text-align: center;
        color: rgb(165, 31, 31);
        font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 60px;
        margin-top: 60px;
        margin-bottom: 0;
    }
    #regreso {
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: white;
        font-size: 30px;
    }
    #parrafo {
        text-align: center;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: white;
        font-size: 30px;
    }
    
</style>
</head> 
<body> 
<p id="titulo">Tu información ha sido enviada con éxito</p>
<p id="parrafo">Se te contactará lo más pronto posible. ¡Gracias por elegir nuestros servicios!</p>
<p id="regreso"><a href="index.html"> <= Regresar </a></p> 
</body>
</html>
