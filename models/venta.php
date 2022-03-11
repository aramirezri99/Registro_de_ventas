<?php 



class Venta
{
  
  private $IdVents;
  private $IdTipoDocumento;
  private $Serie;
  private $Numero;
  private $IdCliente;
  private $Total;
  private $IdUsuario;

  private $db;

  public function __construct() {

    $this->db = Database::connect();

  }

     function getIdVents(){
    return $this->IdVents;
  }

  function setIdVents($id){
    $this->IdVents = $id;
  }

  function getIdTipoDocumento(){
    return $this->IdTipoDocumento;
  }

  function setIdTipoDocumento($id){
    $this->IdTipoDocumento = $id;
  }

 public function getSerie(){
    return $this->Serie;
  }

  public function setSerie($serie){
    $this->Serie=$serie;
  }

  public function getNumero(){
    return $this->Numero;
  }

  public function setNumero($numero){
    $this->Numero=$numero;
  }
  
  public function getIdCliente(){
    return $this->IdCliente;
  }

  public function setIdCliente($id){
    $this->IdCliente=$id;
  }

  public function getTotal(){
    return $this->Total;
  }

  public function setTotal($total){
    $this->Total=$total;
  }

  public function getIdUsuario(){
    return $this->IdUsuario;
  }

  public function setIdUsuario($id){
    $this->IdUsuario=$id;
  }

  //obtener todos las ventas
  public function obtener_ventas(){
    
    $all = $this->db->query("SELECT IdVenta,IdTipoDocumento,Serie,Numero,(SELECT RazonSocial FROM cliente WHERE IdCliente=venta.IdCliente) as Empresa,
      Total,(SELECT ApellidoPaterno FROM usuario WHERE IdUsuario=venta.IdUsuario) AS Vendedor
      FROM venta;");
		return $all;
  }

  //obtener venta por id

public function obtener_ventas_porid(){
    $all = $this->db->query("SELECT IdVenta,IdTipoDocumento,Serie,(SELECT RazonSocial FROM cliente WHERE IdCliente=venta.IdCliente) as Empresa,
      Total,(SELECT ApellidoPaterno FROM usuario WHERE IdUsuario=venta.IdUsuario) AS Vendedor
      FROM venta WHERE IdVenta={$this->getIdVents()}");
		return $all;
  }

  //insertar
public function insertar_venta(){
    $all = $this->db->query("INSERT INTO venta (IdTipoDocumento,Serie,Numero,IdCliente,Total,IdUsuario)
	VALUES ({$this->getIdTipoDocumento()},'{$this->getSerie()}','{$this->getNumero()}',{$this->getIdCliente()},{$this->getTotal()},{$this->getIdUsuario()})");

		return $all;
}
  

  //delete for id
public function eliminarVenta(){
    $all = $this->db->query("DELETE FROM  venta WHERE IdVenta = {$this->getIdVents()};");
		return $all;
  }

  //edit por id

  public function editarVenta(){
    $all = $this->db->query("UPDATE venta SET IdTipoDocumento={$this->getIdTipoDocumento()}, Serie={$this->getSerie()},Numero={$this->getNumero()}, IdCliente={$this->getIdCliente()}  WHERE IdVenta={$this->getIdVents()};");
		if ($all) {
      return true;
    } 
  }

  //obtener id de ultima venta registrada

   public function UltimaVenta(){
    $all = $this->db->query("SELECT IdVenta FROM venta ORDER BY IdVenta DESC LIMIT 1;");
		if ($all) {
      return true;
    } 
  }







}
