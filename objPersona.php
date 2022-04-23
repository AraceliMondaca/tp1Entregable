<?php 
class objPersona{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    public function __construct( $nombre,$apellido,$documento,$telefono){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->documento=$documento;
        $this->telefono=$telefono;
        $persona=["nombre"=>$nombre,"apellido"=>$apellido,"documento"=>$documento,"telefono"=>$telefono];

    }

    public function getobjPasajero() {
        return $this->objPasajero;
     }
     public function getNombre() {
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


   public function __stoString() {
       $persona="Nombre: ".$this->getNombre().
                "\n Apeliido: ".$this->getapellido(). 
                "\n DNI: ".$this->getnumeroDocumento().
                "\n Telefono: ".$this->getTelefono(); 
       }
}
?>
