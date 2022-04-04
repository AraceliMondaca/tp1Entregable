<?php
class Viaje{
  //atributos
  private $pasajero=[];
  private $destino;
  private $codigo;
  private $cantidadPAsajeros;
  private $cantidadMaxPasajeros;
  //constructor
  public function __construct($pasajero,$destino,$codigo,$cantidadPAsajeros,$cantidadMaxPasajeros){

    $this -> pasajero=$pasajero;
     //=['nombre'=>'araceli',                  
    //'apellido'=>'mondaca',                      
   //'numDocumento'=>392509];
    $this->destino=$destino;    
    $this->codigo=$codigo;
    $this->cantidadPAsajeros=$cantidadPAsajeros;
    $this->cantidadMaxPasajeros=$cantidadMaxPasajeros;
   
  }
  //metodo


    public function getpasajero() {
       return $this->pasajero;
    }
    public function nombre() {
        return $this->nombre;
     }
    public function getapellido() {
        return $this->apellido;
     }
     public function getanumeroDocumento() {
        return $this->numeroDocumento;
     }
     public function getdestino() {
        return $this->destino;
     }
     public function getcodigo() {
        return $this->codigo;
     }
     public function getcantidadPasajeros() {
        return $this->getcantidadPasajeros;
     }
     public function getcantidadMaxPasajeros() {
        return $this->getcantidadMaxPasajeros;
     }
   
     public function setpasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }
     public function setnombre($nombre) {
         $this->nombre=$nombre;
     }
     public function setapellido($apellido) {
        $this->apellido=$apellido;
    }
    public function setnumeroDocumento($numeroDocumento) {
        $this->numeroDocumento=$numeroDocumento;
    }
    public function setdestino($destino) {
        $this->destino=$destino;
    }
    public function setcodigo($codigo) {
        $this->codigo=$codigo;
    }
    public function setcantidadPasajero($cantidadPAsajeros) {
        $this->cantidadPAsajeros=$cantidadPAsajeros;
    }
    public function setcantidadMaxPasajeros($cantidadMaxPAsajeros) {
        $this->cantidadMaxPAsajeros=$cantidadMaxPAsajeros;
    }


/**
 *muestra los  pasajeros
 * @return string
 */
public function MostrarPasajero(){
    $MostrarPasajero = "";
    foreach ($this->getpasajero() as $cod=> $value) {
        $nombre = $value['nombre'];
        $apellido = $value['apellido'];
        $dni = $value['DNI'];
        $MostrarPasajero = "Nombre:". $nombre."\n Apellido:". $apellido."\nDNI:". $dni."\n";
    }
    return $MostrarPasajero;
}

/**
 * modifica los datos del pasajero
 * @param array $pasajero1
 * @param obejct $pasajero
 * @return boolean
 */
public function modificarDatos($pasajero,$pasajero1){
    //boolean $cambio 
       $cambio=false;
    $listPasajero=$this->getpasajero();
    if (in_array($pasajero, $listPasajero)) {
        $cod = array_search($pasajero, $listPasajero );
            $listPasajero[$cod] = $pasajero1;
            $this->setpasajeros($listPasajero); 
        $boolean = true;
    }
    return $cambio;  
}

/**
 * verifica si quedan pasajes
 * @param obejct $pasajero
 * @return boolean
 */
public function PasajesDisponibles(){
//boolean $pasaje
    $pasaje = true;
    if($this->getCantidadMaxPasajeros() <= (count($this->getPasajero()))){
        $pasaje = false;
    }
    return $pasaje;
}

/**
 * incrementa los pasaje
 * @param obejct $pasajero
 * @return boolean
 */
public function incremetar($pasajero){
    //bolean $incremento
    $incremento = false;   
        $pasaje = $this->getpasajero();
        if(in_array($pasajero, $this->getpasajero())){
            $incremento = false;
        }else{
            array_push($pasaje, $pasajero);
            $this->setpasajeros($pasaje);
            $incremento = true;
        }
        return $incremento;  
}

/**
 * incrementa los pasaje
 * @param obejct $pasajero
 * @return boolean
 */
public function reducir($pasajero){
  //boolean $reducir
    $reducir = false;
    $pasaje = $this->getpasajero();
    if(in_array($pasajero, $pasaje)){
        $cod = array_search($pasajero, $pasaje);
        array_splice($pasaje, $cod, 1);
        $this->setArrayPasajeros($pasaje);
        $reducir = true;
    }
    return $reducir;
}


    /**
     * 
     */
    public function ___stoString(){
        $pasajero1 = $this->MostrarPasajero();
        $Pasajeros = $this->getpasajero();
        $cantidad = count($Pasajeros);
        $str = "Viaje: {$this->getCodigo()}.\n
                Destino: {$this->getDestinoStr()}.\n
                cantidad maxima de pasajes: {$this->getCantidadMaxPasajeros()}.\n
                pasajes vendidos: $cantidad.\n
                Datos de los Pasajeros: \n $pasajero1";
        return $str;
    }
    }
 ?>
