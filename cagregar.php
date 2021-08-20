<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
    <style type="text/css">
        .valido{
            background-color:rgb(216, 218, 216);
            height:30px;
        }
        .invalido{
            background-color:rgb(226, 155, 138);
            height:30px;
        }
    </style>
</head>
<body background="fondo1.jpg">
<div id="menu">
<center><h1> <font size="+7" >AGREGAR CLIENTE</center> </font></h1>
    </div>
    <div id="separador">
    </div>
<br>
<!--PHP-->
    <div id="slices">
    <form method="GET"> <!--EMPIEZA FORMULARIO-->
    <center>
    <input type="submit" onclick = "return validar();" value='AGREGAR'> <input type="reset" value="CANCELAR">
    </center>
<center><table width="100%" border>
    <tr>
<td>Correo electronico &nbsp;  <input type="EMAIL" ID="correo" CLASS="valido" name="correo" size="30" MAXLENGTH="40"></td>
<td>Password de ingreso <input type="Text" ID="passwor" CLASS="valido" name="passwor" size="20" MAXLENGTH="10"> </td>

</tr>
<tr>
<td>Nombre &nbsp;  <input type="text" ID="nombre" CLASS="valido" name="nombre" size="30" MAXLENGTH="40"></td>
<td>Ciudad <input type="Text" ID="ciudad" CLASS="valido" name="ciudad" size="20" MAXLENGTH="50"> </td>
<br>
<tr>
<td>Estado &nbsp;  <input type="text" ID="estado" CLASS="valido" name="estado" size="30" MAXLENGTH="40"></td>
<td>Telefono  &nbsp;  <input type="tel" ID="telefono" CLASS="valido" name="telefono" MAXLENGTH="10" pattern="[0-9]+"required>
<br><br>
    FECHA DE NACIMIENTO <input type="DATE" ID="fechaI" CLASS="valido" name="fechaIngr" STEP="1"></td>
    
    </tr>


<tr>
<!--RADIO BUTTON-->
<td>GENERO<br><br>
        
    <div ID="escojergenero"></div>
    <input type="radio" id="masculino" NAME="genero" VALUE="Masculino">Masculino &nbsp;&nbsp;
    <input type="radio" id="femenino" NAME="genero" VALUE="Femenino">Femenino &nbsp;&nbsp;</td>
    

<td>¿QUIERE RECIBIR CATALOGOS POR CORREO?<br><br>
    <div ID="catalogo"></div>
    <input type="radio" id="si" NAME="cata" VALUE="Si">SI &nbsp;&nbsp;
    <input type="radio" id="no" NAME="cata" VALUE="No">NO &nbsp;&nbsp;</td>

</tr>



 

    </table></center>
</form> <!--TERMINA FORMULARIO-->


<div ID="errores"> </div>

<!--El script que ejecuta toda la validación debe estar despés del formulario,
de este modo antes de ejecutar JavaScript se carga en el DOM el formulario -->

    <SCRIPT type="text/javascript" SRC="validacionf.js"></SCRIPT>
    <?php
    if (isset($_GET['correo'])&&isset($_GET['passwor'])&&isset($_GET['nombre'])&&isset($_GET['ciudad'])&&isset($_GET['estado'])&&isset($_GET['telefono'])&&isset($_GET['fechaIngr'])&&isset($_GET['genero'])&&isset($_GET['cata']))
  {
      //VARIABLES
$corr=$_GET['correo'];
$pass=$_GET['passwor'];
$nom=$_GET['nombre'];
$cid=$_GET['ciudad'];
$esta=$_GET['estado'];
$tel=$_GET['telefono'];
$feNa=$_GET['fechaIngr'];
$gene=$_GET['genero'];
$cat=$_GET['cata'];
//PONER UNA FECHA
if($feNa == null)
{
    $feNa=date("Y")."-".date("m")."-".date("d");
}
    $servidor="localhost";
    $usuario="root";

    //conexion
    $conection=mysqli_connect($servidor,$usuario);
    mysqli_select_db($conection,"biblioteca");


    $comando="SELECT correo FROM acervo WHERE correo = '{$corr}'";
    $comando2="SELECT passwor FROM acervo WHERE passwor = '{$pass}'";

    $consulta = mysqli_query($conection,$comando);
    $consulta2 = mysqli_query($conection,$comando2);

    //CONDICIOION PARA VER SI YA EXISTE EL CORREo

    ///
    if (mysqli_fetch_array($consulta))
    {
echo"<center><h2>¡¡¡NO SE PUDO HACER EL REGISTRO!!! &nbsp; ESE CORREO YA EXISTE, POR FAVOR INTENTE CON OTRO</center></h2>";
    }
    else
    if (mysqli_fetch_array($consulta2))
    {
echo"<center><h2>¡¡¡NO SE PUDO HACER EL REGISTRO!!! &nbsp; ESA PASSWORD YA EXISTE, POR FAVOR INTENTE CON OTRA</center></h2>";
    }
    else{
        $comando="INSERT INTO acervo (correo,passwor,nombre,ciudad,estado,telefono,nacimiento,genero,catalogo) VALUES ('$corr',$pass,'$nom','$cid','$esta',$tel,'$feNa','$gene','$cat') ";
  mysqli_query($conection,$comando);
  echo"<center><h2>¡¡¡EL REGISTRO SE HIZO CON EXITO!!!</center></h2>";
    }
mysqli_close($conection);
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