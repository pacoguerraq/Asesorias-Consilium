<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reseñas</title>
    <link rel="stylesheet" type="text/css" media="screen" href="estilo-res.css">
    <link rel="shortcut icon" type="image/x-icon" href="fotos/gorro.png" />
</head>

<body>
    <br>
    <header>
        <div class="container">
            <img src="fotos/logo.png" alt="logo" class="logo" width="250">

            <nav>
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="asesores.html">Asesores</a></li>
                    <li><a href="res.php">Reseñas</a></li>
                    <li><a href="info-precios.html">Información y precios</a></li>
                    <li><a href="agendar.html">Agendar asesoría</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <br>
    <hr>
    <br>
    <div class="container">
        <h1 class="titulo">RESEÑAS</h1>
        <p class="intro">En esta página podrás encontrar comentarios de otras personas con respecto a nuestros
            servicios, ya sean para dar una buena crítica o felicitación así como deciros en que podemos mejorar a
            través de una retroalimentación.</p>
    </div>
    <hr>
    <br>
    <br>
    <div class="calif-contenedor">
        <div class="calif-contenedor1">
            <h1 class="calif-serv">Califica el servicio</h1>
            <img src="fotos/five-stars.png" class="estrellas" alt="five-stars" class="logo" width="250">
            <p class="p-calif-serv">
                A continuación se encuentra un formulario donde puedes compartir tu experiencia en la asesoría. Sientete
                libre
                de
                decirnos que te pareció el servicio, ya sea con retroalimentación o mencionando los aspectos en los que
                podamos
                mejorar. Te pedimos seas prudente con tu lenguaje.
            </p>
            <hr>
            <form class="form" action="comentarios.php" method="POST">
                <tr>
                    <fieldset>
                        <legend>
                            <h3 style="text-align:left">Nombre</h3>
                        </legend>
                        <input name="nombre" type="text" required>
                    </fieldset>
                </tr>
                <br>
                <tr>
                    <div class="contenedor-input">
                        <fieldset>
                            <legend>
                                <h3>Asesor y fecha de asesoría</h3>
                            </legend>
                            <td><select name="asesor" class="uno" required>
                                    <option value="Francisco Guerra"> Francisco Guerra </option>
                                    <option value="Roberto Zermeño"> Roberto Zermeño </option>
                                    <option value="Federico Garza"> Federico Garza </option>
                            </td>
                            <td><input type="text" name="year" class="dos" value="2019" readonly></td>
                            <td><input type="text" name="mes" class="dos" placeholder="mm" maxlength="2" required></td>
                            <td><input type="text" name="dia" class="dos" placeholder="dd" maxlength="2" required></td>
                        </fieldset>
                    </div>
                </tr>
                <br>
                <tr>
                    <td>
                        <fieldset>
                            <legend>
                                <h3 style="text-align:center">Comentario</h3>
                            </legend>
                            <textarea rows="5" style="width:95%;font-family: Verdana, Geneva, Tahoma, sans-serif;
                        font-size: 14px;
                        text-align: center;" name="comentario" maxlength="255" required></textarea>
                        </fieldset>
                    </td>
                </tr>
                <br>
                <tr>
                    <fieldset>
                        <legend>
                            <h3 style="text-align:center">Calificación de la asesoría</h3>
                        </legend>
                        <div class="ratings">
                            <input type="radio" name="calificacion" value="1 estrella" id="1" required> <label for="1"><img
                                    src="fotos/1-star.png" alt="1-star" width="200"
                                    style="padding-bottom: 10px;padding-top:10px;border-color:black;border-width:1px;border-style: dotted"></label><br>
                            <input type="radio" name="calificacion" value="2 estrellas" id="2" required> <label for="2"><img
                                    src="fotos/2-star.png" alt="2-star" width="200"
                                    style="padding-bottom: 10px;padding-top:10px;border-color:black;border-width:1px;border-style: dotted"></label><br>
                            <input type="radio" name="calificacion" value="3 estrellas" id="3" required><label for="3">
                                <img src="fotos/3-star.png" alt="3-star" width="200"
                                    style="padding-bottom: 10px;padding-top:10px;border-color:black;border-width:1px;border-style: dotted"></label><br>
                            <input type="radio" name="calificacion" value="4 estrellas" id="4" required> <label for="4"><img
                                    src="fotos/4-star.png" alt="4-star" width="200"
                                    style="padding-bottom: 10px;padding-top:10px;border-color:black;border-width:1px;border-style: dotted"></label><br>
                            <input type="radio" name="calificacion" value="5 estrellas" id="5" required><label for="5">
                                <img src="fotos/5-star.png" alt="5-star" width="200"
                                    style="padding-bottom: 10px;padding-top:10px;border-color:black;border-width:1px;border-style: dotted"></label>
                        </div>
                    </fieldset>
                </tr>
                <br>
                <input type="submit" class="submit" value="Enviar">

            </form>
        </div>
        <div class="calif-contenedor2">
            <h1 class="calif-serv">Respuestas</h1>
            <p class="p-calif-serv">En esta sección se muestran las respuestas de recientes asesorados.</p>
            <hr>
            <div class="respuestas">

<?php

$conn = mysqli_connect("localhost", "asesor14_q", "Consilium.01", "asesor14_datos");
 
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM comentarios;";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table style='text-align:left;font-family:Verdana, Geneva, Tahoma, sans-serif'>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td style='color:darkblue'><h1>" . $row['nombre'] . "</h1></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='color:gray'>" . $row['hora'] . "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='color:orange;font-weight:bold'>" . $row['calificacion'] . "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='color:black'>" . $row['comentario'] . "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='color:red'> Recibió asesoría de " . $row['asesor'] . "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='color:red'>Día de la asesoría: " . $row['dia'] . " - " . $row['mes'] . " - " . $row['year'] . "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><hr></td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "Aún no hay comentarios.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

mysqli_close($conn);

?>

            </div>
        </div>
    </div>
    <br>
    <br>
    <footer>
        <p>Consilium Asesorías, 2019. <br> Por Paco Guerra.</p>
    </footer>
</body>

</html>
