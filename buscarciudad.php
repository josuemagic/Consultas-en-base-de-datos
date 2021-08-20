<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css" media=screen>
</head>
<body background="fondo1.jpg">
<div id="menu">
<center><h1> <font size="+7" >BUSCAR CLIENTE POR CIUDAD</center> </font>
    </div>
    <div id="separador">
    </div>
    <br>

<!--CENTRO-->
    <div id="slices2">
      <br>
      <h2><FORM method="GET">
  INTRODUCE LA CIUDAD DEL USUARIO <INPUT TYPE="text" NAME="ciudad">
  <INPUT type="image" src="icono.png" >
</FORM></h2>
     


<?php
if (isset($_GET['ciudad']))
{
    $ci=$_GET['ciudad'];
    $servidor="localhost";
    $usuario="root";

    $conexion=mysqli_connect($servidor,$usuario);
    mysqli_select_db($conexion,"biblioteca");

    $comandoSql="SELECT * FROM acervo WHERE ciudad LIKE '".$ci."'";

    $resultados=mysqli_query($conexion,$comandoSql);

    echo"<table width=100% height=60% border=1>
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
        echo "<td><b>". $visualizacion['correo']."</b></td>";
        echo "<td><b>". $visualizacion['passwor']."</b></td>";
        echo "<td><b>". $visualizacion['nombre']."</b></td>";
        echo "<td><b>". $visualizacion['ciudad']."</b></td>";
        echo "<td><b>". $visualizacion['estado']."</b></td>"; //MOSTRAR CAMPO DE CORREO DEL REGISTRO 
        echo "<td><b>". $visualizacion['telefono']."</b></td>";
        echo "<td><b>". $visualizacion['nacimiento']."</b></td>";
        echo "<td><b>". $visualizacion['genero']."</b></td>";
        echo "<td><b>". $visualizacion['catalogo']."</b></td>";
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