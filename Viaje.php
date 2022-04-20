<?php
class Viaje{
  //atributos
  private $objPasajero=[];
  private $destino;
  private $codigo;
  private $cantidadPAsajeros=0;
  private $cantidadMaxPasajeros;
  private $personaResp;
  //constructor
  //modificacion  que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono
  public function __construct($objPasajero,$destino,$codigo,$cantidadPAsajeros,$cantidadMaxPasajeros,$personaResp){

    $this -> objPasajero=$objPasajero;
     //=['nombre'=>'araceli',                  
    //'apellido'=>'mondaca',                      
   //'numDocumento'=>392509
  //'telefono'=>234567];
    $this->destino=$destino;    
    $this->codigo=$codigo;
    $this->cantidadPAsajeros=$cantidadPAsajeros;
    $this->cantidadMaxPasajeros=$cantidadMaxPasajeros;
    $this->personaResp=$personaResp;
   
  }
  //metodo


    public function getobjPasajero() {
       return $this->objPasajero;
    }
    public function nombre() {
        return $this->nombre;
     }
    public function getapellido() {
        return $this->apellido;
     }
     public function getnumeroDocumento() {
        return $this->numeroDocumento;
     }
     public function getTelefono() {
        return $this->getTelefono;
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
     public function getPersonaResp() {
        return $this->getPersonaResp;
     }
     
     public function setobjPasajeros($objPasajeros){
        $this->objPasajeros = $objPasajeros;
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
    public function setTelefono($telefono) {
        $this->telefono=$telefono;
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
    public function setPersonaResp($personaResp) {
        $this->personaResp=$personaResp;
    }
   

/**
 *muestra los  pasajeros
 * @return string
 */
public function MostrarPasajero(){
    $MostrarPasajero = "";
    foreach ($this->getobjPasajero() as $key=> $value) {
        $nombre = $value['nombre'];
        $apellido = $value['apellido'];
        $dni = $value['DNI'];
        $telefono = $value['telefono'];
        $MostrarPasajero = "Nombre:". $nombre.
                        "\n Apellido:". $apellido. 
                        "\n DNI:". $dni.
                        "\n Telefono:".$telefono;
    }
    return $MostrarPasajero;
}

/**
 * modifica los datos del pasajero
 * @param array $pasajero1
 * @param obejct $pasajero
 * return boolean
 */
public function modificarDatos($pasajero,$pasajero1){
    //boolean $cambio 
       $cambio=true;
    $listPasajero=$this->getobjPasajero();
      /* if (in_array($pasajero, $listPasajero)) {
        $cod = array_search($pasajero, $listPasajero );
            $listPasajero[$cod] = $pasajero1;
            $this->setobjPasajeros($listPasajero); 
        $cambio = true;
    }*/
    $i=0;
     while ($pasajero <= count($listPasajero) && $cambio) {
        if ($pasajero==$listPasajero[$i]->getobjPasajero()){
            $cambio=false;
           $this->setobjPasajeros($listPasajero);  
           $listPasajero[$i]=$pasajero1; 
    }
    $i=$i++;
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
    if($this->getCantidadMaxPasajeros() <= (count($this->getobjPasajero()))){
        $pasaje = false;
    }
    return $pasaje;
}

/**
 * incrementa los pasaje
 * @param obejct $pasajero
 *@return boolean
 */
public function incremetar($pasajero){
    //bolean $incremento
    $incremento = false;   
        $pasaje = $this->getobjPasajero();
        if(in_array($pasajero, $this->getobjPasajero())){
            $incremento = false;
        }else{
            array_push($pasaje, $pasajero);
            $this->setobjPasajeros($pasaje);
            $incremento = true;
        }
        return $incremento;  
}

/**
 * incrementa los pasaje
 * @param obejct $pasajero
 *@return boolean
 */
public function reducir($pasajero){
    $reducir = false;
    $pasaje = $this->getobjPasajero();
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
        $Pasajeros = $this->getobjPasajero();
        $cantidad = count($Pasajeros);
       
        $str = "
        Viaje: {$this->getCodigo()}.\n
        Destino: {$this->getDestinoStr()}.\n
        cantidad maxima de pasajes: {$this->getCantidadMaxPasajeros()}.\n
        pasajes vendidos: $cantidad.\n
        Datos de los Pasajeros: \n $pasajero1
        persona responsable: {$this->getPersonaResp()}";
        
        return $str;
    }
   
}

 ?>
