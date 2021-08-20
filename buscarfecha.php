<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>
<body background="fondo1.jpg">
    



<div id="menu">
<center><h1> <font size="+7" >BUSCAR CLIENTE POR FECHA</center> </font></h1>
    </div>
    <div id="separador">
    </div>

<!--PHP-->
    <div id="slices2">
   <h2> <FORM method="GET">
FECHA DE NACIMIENTO <input type="DATE" ID="fechaI" CLASS="valido" name="nacimiento" STEP="1"></td>
  <INPUT type="image" src="icono.png">
</FORM></h2>
<?php
if (isset($_GET['nacimiento']))
{
    $ci=$_GET['nacimiento'];
    $servidor="localhost";
    $usuario="root";

    $conexion=mysqli_connect($servidor,$usuario);
    mysqli_select_db($conexion,"biblioteca");

    $comandoSql="SELECT * FROM acervo WHERE nacimiento LIKE '".$ci."'";

    $resultados=mysqli_query($conexion,$comandoSql);

    echo"<table width=100% height=80% border=1>
    <tr>
    <th>CORREOS</th>
    <th>CLAVES</th>
    <th>NOMBRE</th>
    <th>CIUDAD</th>
    <th>ESTADO</th>
    <th>TELEFONO</th>
    <th>NACIMIENTO</th>
    <th>GENERO</th>
    <th>CATALOGO</th>

    </tr>
    ";
    while($visualizacion=mysqli_fetch_array($resultados))
    {
        echo "<tr>";
        echo "<td>". $visualizacion['correo']."</td>";
        echo "<td>". $visualizacion['passwor']."</td>";
        echo "<td>". $visualizacion['nombre']."</td>";
        echo "<td>". $visualizacion['ciudad']."</td>";
        echo "<td>". $visualizacion['estado']."</td>"; //MOSTRAR CAMPO DE CORREO DEL REGISTRO 
        echo "<td>". $visualizacion['telefono']."</td>";
        echo "<td>". $visualizacion['nacimiento']."</td>";
        echo "<td>". $visualizacion['genero']."</td>";
        echo "<td>". $visualizacion['catalogo']."</td>";

        echo "</tr>";
    }
    echo "</table>";
    }
?>
    </div>

  <!--BOTONES-->
  <div id="botones">
  <br>
 <div class="flex-container">
  <A id="btnestilos" HREF="cagregar.php">AGREGAR CLIENTE</A>
  <A id="btnestilos" HREF="eliminar.php">ELIMINAR CLIENTE</A>
  <A id="btnestilos" HREF="general.php">CONSULTA GENERAL</A>  
  <A id="btnestilos" HREF="buscargenero.php">BUSCAR POR GENERO</A>  
</div>
<br><br><br><br>
<div class="flex-container">
  <A id="btnestilos" HREF="buscarciudad.php">BUCAR POR CIUDAD</A>
  <A id="btnestilos" HREF="buscarfecha.php">BUSCAR POR FECHA DE NACIMIENTO</A>
  <A id="btnestilos" HREF="buscarcliente.php">BUSCAR POR CORREO O PASSWORD</A>  
  <A id="btnestilos" HREF="index.html">PAGINA DE INICIO</A>
</div>

</body>
</html>