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
<center><h1> <font size="+7" > ELIMINAR CLIENTE</center> </font></h1>

    </div>
    <div id="separador">
    </div>

<!--PHP-->
    <div id="slices2">
  
  <h2><FORM method="GET">
  CORREO DEL USUARIO <INPUT TYPE="text" NAME="correo" >  
  &nbsp;
  <INPUT type="image" src="iconoeliminar.png" onclick="return pregunta();">
</FORM></h2>
    <?php

if (isset($_GET['correo']))
{
    $corre=$_GET['correo'];
    $servidor="localhost";
    $usuario="root";
    $conexion=mysqli_connect($servidor,$usuario);
    mysqli_select_db($conexion,"biblioteca");

    /*BUSQUEDA DEL CORREO EN LA BASE DE DATOS*/ 
    $comandoSQL="SELECT * FROM acervo WHERE correo LIKE '".$corre."'";

    $resultados=mysqli_query($conexion,$comandoSQL);
    $cliente=mysqli_fetch_array($resultados);

    /*VER EXISTENCIA DEL CLIENTE*/
    if ($cliente)
    {
    echo"<br> <b>Correo:------".$cliente['correo']."</b>";
    echo"<br> <b> Password:------".$cliente['passwor']."</b>";
    echo"<br> <b> Nombre:------".$cliente['nombre']."</b>";
    echo"<br> <b> Ciudad:------".$cliente['ciudad']."</b>";
    echo"<br> <b> Estado:------".$cliente['estado']."</b>";
    echo"<br> <b> Telefon:------".$cliente['telefono'];
    echo"<br> <b> Dia de nacimiento:------".$cliente['nacimiento']."</b>";
    echo"<br> <b> Genero:------".$cliente['genero']."</b>";
    echo"<br> <b> Catalgo:------".$cliente['catalogo']."</b>";

/*ELIMINACION DEL REGISTRO DE LA BASE DE DATOS*/
mysqli_query($conexion,"DELETE FROM acervo WHERE correo LIKE '".$corre."'");
echo "<center><br><h2>¡¡¡SE HA REALIZADO LA ELIMINACION DEL CLIENTE!!!</center></h2><br>";
}
else
{
    /*SI NO EXISTE TAL REGISTRO, SE LE NOTIFOCA AL USUARIO, ESTO PASA SI EL ARRAY RESURADO DE LA BUSQUEDA ESTA VACIO*/
echo"<center><b><br><h2>NO EXISTE EL CORREO QUE INGRESO: &nbsp;<i>".$corre."</center></h2><i></b>";
}
mysqli_close($conexion);
}
?>
<script>
 function pregunta()
 {
   son=true;
   var pregunta= confirm("Confirme SI quiere borrar al cliente permanentemente");
   if (pregunta==true)
   {
    son=true;
   }
   if (pregunta==false)
   {
     son=false;
     return false;
   }
 }

 </script>
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