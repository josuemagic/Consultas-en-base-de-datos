function validar()
{
    var enviado=true;
    var Co = document.getElementById("correo");
    var Pass = document.getElementById("passwor");
    var Nom = document.getElementById("nombre");
    var Cid = document.getElementById("ciudad");
    var Esta = document.getElementById("estado");
    var Tel = document.getElementById("telefono");
    var Fech = document.getElementById("fechaI");
     
    //RADIO BUTTON
    var G=document.getElementsByName("genero");
    var EscojGene=document.getElementsByName("escojergenero");


    //RADIO BUTTON DE CATALOGOS

    var Ca=document.getElementsByName("catalogo");
    var Cat=document.getElementsByName("cata");


    //VARIABLES DE ERROR Y MENSAJES

    var error = document.getElementById("errores");    
    var mensaje="<b>Errores de captura dedatos:</b>";

    //SECCION DE VALIDOS
    Co.className="valido";
    Pass.className="valido";
    Nom.className="valido";
    Cid.className="valido";
    Esta.className="valido";
    Tel.className="valido";
    Fech.className="valido";
    EscojGene.className="valido"

    //RADIO BUTTON
    EscojGene.className="escojergenero";
    Ca.className="catalogo";
    Cat.className="cata";


    //VALIDACIONES
    
    //AQUI VA LA VALIDACION DE CORREO
    
    if (!(/^\w*[\.\w]*[@]\w+[\.]\w+[\.\w]*$/.test(Co.value)))
    {
        Co.className="invalido";
        mensaje=mensaje+"<br>La dirección de correo electrónico no es válida";
        enviado=false;
    }
    if (Pass.value < 1)
    {
       Pass.className="invalido";
       mensaje=mensaje+"<br>Número de actividad no es válida, debe ser mayor de 0"; 
       enviado=false;
    }
     
    if (isNaN(Pass.value))
    {
       Pass.className="invalido";
       mensaje=mensaje+"<br>La password debe ser de valor numerico.";
       enviado=false;
    }
    if (Nom.value > 50)
    {
       Nom.className="invalido";
       mensaje=mensaje+"<br>EL NOMBRE DE USUARIO ES INCORRECTO, debe ser menor a 50"; 
       enviado=false;
    }
    if (Nom.value =="")
    {
        Nom.className="invalido";
        mensaje=mensaje+"<br>Introduce el nombre";
        enviado=false;
    }
    if (Cid.value > 50)
    {
       CId.className="invalido";
       mensaje=mensaje+"<br>EL NOMBRE DE CIUDAD ES INCORRECTO, debe ser menor a 30"; 
       enviado=false;
    }
    if (Cid.value =="")
    {
        Cid.className="invalido";
        mensaje=mensaje+"<br>Introduce la ciudad ";
        enviado=false;
    }
    if (Esta.value > 50)
    {
       Esta.className="invalido";
       mensaje=mensaje+"<br>EL NOMBRE DEL ESTADO ES INCORRECTO, debe ser menor a 30"; 
       enviado=false;
    }
    if (Esta.value =="")
    {
        Esta.className="invalido";
        mensaje=mensaje+"<br>Introduce el estado ";
        enviado=false;
    }
    //TELEFONO
    if (Tel.value =="")
    {
        Tel.className="invalido";
        mensaje=mensaje+"<br>Introduce el teléfono de contacto";
        enviado=false;
    }

   
    if (isNaN(Tel.value))
    {
       Tel.className="invalido";
       mensaje=mensaje+"<br>Número de telefono debe ser un valor numérico.";
       enviado=false;
    }
//TERMINA TELEFONO
if (Fech.value=="")
    {
        Fech.className="invalido";
        mensaje=mensaje+"<br>Ingresa la fecha de nacimiento";
        enviado=false;
    }

//GENERO

var seleccionado="no";
for (var x=0;x<G.length;x++)
{
    if (G[x].checked)
    {
        seleccionado="si";
        break;
    }
}
if (seleccionado == "no")
{
    EscojGene.className="invalido";
    mensaje=mensaje+"<br>Seleccione el genero";
    enviado=false;
    
}
//CATALOGOS
var seleccionado="no";
for (var x=0;x<Cat.length;x++)
{
    if (Cat[x].checked)
    {
        seleccionado="si";
        break;
    }
}
if (seleccionado == "no")
{
    Ca.className="invalido";
    mensaje=mensaje+"<br>Seleccione SI QUIERE RECIBIR CATALOGOS";
    enviado=false;
}




error.innerHTML=mensaje;
     
return enviado; 

  //Si retorna un false se impidedirá que el formulario se envíe al servidor
                  //si retorna un true el formulario se envía al servidor
}