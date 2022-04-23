<?php 
//include_once'Viaje.php';
require_once ('Viaje.php');
require_once('personaResponsableV.php');
require_once('objPersona.php');
echo "¡Información del Pasajero! \n";
echo"/--------------------------------/\n";
echo"Ingrese nombre: \n";
$nombre=trim(fgets(STDIN))."\n";
echo"/--------------------------------/\n";
echo"Ingrese el apellido: \n";
$apellido=trim(fgets(STDIN))."\n";
echo"/--------------------------------/\n";
echo"Ingrese el DNI: \n";
$numDocumento=trim(fgets(STDIN))."\n";
echo"/--------------------------------/\n";
echo"Ingrese su Número de Telefono: \n";
$telefono=trim(fgets(STDIN))."\n";
echo"/--------------------------------/\n";
echo "¡Información del Viaje! \n";
echo"/--------------------------------/\n";
echo"Ingrese destino: \n";
$destino=trim(fgets(STDIN))."\n";
echo"/-------------------------------/\n";
echo"Ingrese codigo del viaje: \n";
$codigo=trim(fgets(STDIN))."\n";

$objViaje=new Viaje($nombre,$apellido,$numDocumento,$telefono,$destino,$codigo);
$objPersonaRes=new personaResponsableV($numEmpleado,$numlicencia,$nombre,$apellido); 
/**
 * es un string con el menu de opciones que pude realizar el cliente
 * @return int
 */
function menu()
{
     $menu="--------------------Opciones-------------------\n";
      "opcion 1 "."\n"."Agregar pasajero: \n";
      "opcion 2 "."\n"."Quitar pasajero: \n";
      "opcion 3 "."\n"."Modificar pasajero: \n";
      "opcion 4 "."\n"."Ver viaje :\n";
      "opcion 5 "."\n"."Modificar el destino del viaje: \n";
      "opcion 6 "."\n"."Modificar el codigo : \n"; 
      "opcion 7 "."\n"."Modificar la cantidad de pasajes : \n";
      "opcion 8"."\n"."Mostrar datos del responsable:\n";
      "opcion 9"."\n"."Modificar datos del responable:\n";
      "opcion 10"."\n"."salir.\n";
     
     
return $menu;
}

/**
 * obtiene los datos y los devuelve en un arreglo
 */
function obtenerDatos(){
   
    echo"Nombre\n";
    $nombre=trim(fgets(STDIN))."\n";
    echo"Apellido\n";
    $apellido=trim(fgets(STDIN))."\n"; 
    echo"DNI\n";
    $numeDocumento=strval(trim(fgets(STDIN)))."\n";
    echo "Telefono \n";
    $telefono=trim(fgets(STDIN))."\n";
    $pasajero=["Nombre"=>$nombre,
               "Apellido"=>$apellido,
               "DNI"=>$numeDocumento,
               "Telefono"=>$telefono];
    return $pasajero;
} 
$ejecucion=true;

do {
    print menu();
    $opc=trim(fgets(STDIN));
    switch ($opc==1) {
        case 'opcion 1':
            if($objViaje->PasajesDisponibles()){
                echo "Ingrese los datos del pasajero: \n";
                $pasajero = obtenerDatos();
                echo $objViaje->incremetar($pasajero);
            }else{
                echo "No hay mas pasajes en este viaje.\n";
            }            
            break;
         
        case 'opcion 2':
                echo "Ingrese los datos del pasajero a quitar: \n";
                $pasajero = obtenerDatos();
                echo $objViaje->reducir($pasajero);
                break;

        case 'opcion 3':
                 echo "Ingrese los datos del pasajero a modificar: \n";
                 $pasajero = obtenerDatos();
                 echo "Ingrese los nuevos datos: \n";
                 $otroPasajero = obtenerDatos();
                 echo $objViaje->modificarDatos($pasajero, $otroPasajero);
                 break;

        case 'opcion 4':
                 echo $objViaje;
                 break;

        case 'opcion 5':
            echo "El viaje con destino a: {$objViaje->getDestino()}. \n";
            echo "Ingrese el nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $objViaje->setDestino($destino);
            break;
        
        
       case 'opcion 6':
                echo "El viaje posee el código: {$objViaje->getCodigo()}. \n";
                echo "Ingrese el nuevo código: \n";
                $codigo = trim(fgets(STDIN));
                $codigo = intval($codigo);
                $objViaje->setCodigo($codigo);
                break;
        
        case 'opcion 7':
            echo "El viaje posee {$objViaje->getCantidadMaxPasajeros()} de pasajes. \n";
            echo "Ingrese la nueva cantidad de pasajes: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $objViaje->setCantidadMaxPasajeros($cantidadAsientos);
            break;
            case 'opcion 8':
                $ResponsableV=$objViaje->getResponsableV();
                echo $ResponsableV;
                break;
            
            case 'opcion 9':
                echo "modifique los datos del responsable:\n"."Numero de empleado:\n";
                $numEmpleado=trim(fgets(STDIN))."\n";
                echo"Ingrese numero de licencia:\n";
                $numLicencia=trim(fgets(STDIN))."\n";
                echo"Nombre responsable:\n";
                $nombre=trim(fgets(STDIN))."\n";
               echo"Apellido responsable:\n";
              $apellido=trim(fgets(STDIN))."\n";
                break;

        default:
            $ejecucion=false;
            break;
    }
} while ($ejecucion == true);


?>
