<?php

class Panel_model extends CI_Model {

    public function __construct() {
      parent::__construct();
    }
    
    public function login($nombre, $clave){
      $this->db->select('usuario, rol');
      $this->db->from('usuarios');
      $this->db->where('usuario', $nombre);
      $this->db->where('clave', $clave);
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
   }
    
    public function alta($objeto, $tabla){
        $this->db->insert($tabla, $objeto);
    }
    
    
    public function listarClientes(){
        $this->db->select('id, nombre, direccion, telefono, celular, activo');
        $this->db->from('clientes');
        $this->db->where('activo', 1);
        $consulta = $this->db->get();
        return $consulta->result(); 
    }
    
    public function listarMascotas(){
        $this->db->select('mascota.id, idCliente, mascota.nombre as mNombre, raza.nombre as nRaza, obs');
        $this->db->from('mascota, raza');
        $this->db->where('mascota.idRaza = raza.id');
        $consulta = $this->db->get();
        return $consulta->result(); 
    }
    
    public function listarRazas(){
        $this->db->select('id, nombre, medida');
        $this->db->from('raza');
        $consulta = $this->db->get();
        return $consulta->result();
    }
    
    public function listarArticulos(){
        $this->db->select('id, nombre, descripcion, precio');
        $this->db->from('articulos');
        $this->db->where('activo', 1);
        $consulta = $this->db->get();
        return $consulta->result();        
    }

    public function listarVentas(){
        $this->db->select('ventas.id as idVenta, idCliente, articulos.nombre as nArticulo, fecha, cantidad, articulos.precio as precio');
        $this->db->from('ventas, articulos');
        $this->db->where('ventas.idArticulo = articulos.id');
        $consulta = $this->db->get();
        return $consulta->result();        
    }
    
    public function listarReservas($fecha){
        $desde = $fecha." 00:00:00";
        $hasta = $fecha." 23:59:59";
        $this->db->select('reserva.id, reserva.idCliente, clientes.nombre as nCliente, mascota.nombre as nMascota, fecha, hora, clientes.telefono, clientes.celular, articulos.nombre as nArticulo, articulos.precio as pArticulo');
        $this->db->from('reserva, mascota, clientes, articulos');
        $this->db->where('reserva.idMascota = mascota.id');
        $this->db->where('reserva.idCliente = clientes.id');
        $this->db->where('reserva.idArticulo = articulos.id');
        $this->db->where('fecha >=', $desde);
        $this->db->where('fecha <=', $hasta);
        $consulta = $this->db->get();
        return $consulta->result();        
    }
    
    public function buscarMascotas($idCliente){
        $this->db->select('mascota.id, mascota.idCliente, mascota.nombre as nMascota, raza.nombre as nRaza, obs');
        $this->db->from('mascota, raza');
        $this->db->where('idCliente', $idCliente);
        $this->db->where('mascota.idRaza = raza.id');
        $consulta = $this->db->get();
        return $consulta->result(); 
    }
    
    public function buscarVentas($idCliente){
        $this->db->select('ventas.id, ventas.idCliente, articulos.nombre as nArticulo, ventas.fecha, ventas.cantidad, articulos.precio as precio');
        $this->db->from('ventas, articulos');
        $this->db->where('idCliente', $idCliente);
        $this->db->where('ventas.idArticulo = articulos.id');
        $consulta = $this->db->get();
        return $consulta->result(); 
    }

    public function buscarReservas($idCliente, $historial){
        $this->db->select('reserva.fecha, reserva.hora, articulos.nombre as nArticulo, mascota.nombre as nMascota, estado');
        $this->db->from('reserva, articulos, mascota');
        $this->db->where('reserva.idCliente', $idCliente);
        $this->db->where('reserva.idArticulo = articulos.id');
        $this->db->where('reserva.idMascota = mascota.id');
        $desde = date("Y-m-d")." 00:00:00";
        if ($historial){
            $this->db->where('fecha <=', $desde);
        }else{
            $this->db->where('fecha >=', $desde);    
            }
        $consulta = $this->db->get();
        return $consulta->result(); 
    }
    
    public function buscarMascota($id){
        $this->db->select('mascota.id, mascota.idCliente, mascota.nombre as nMascota, raza.nombre as nRaza, mascota.idRaza idRaza, obs');
        $this->db->from('mascota, raza');
        $this->db->where('mascota.id', $id);
        $this->db->where('mascota.idRaza = raza.id');
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }
    
    public function buscarCliente($id){
        $this->db->select('id, nombre, direccion, telefono, celular, activo');
        $this->db->from('clientes');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;      
    }
    
    public function buscarArticulo($id){
        $this->db->select('id, nombre, descripcion, precio, activo');
        $this->db->from('articulos');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;      
    }

    public function buscarVenta($id){
        $this->db->select('ventas.id as idVentas, clientes.id as idCliente, articulos.id as idArticulo, fecha, cantidad, articulos.precio as precio');
        $this->db->from('ventas, clientes, articulos');
        $this->db->where('ventas.idCliente = clientes.id');
        $this->db->where('ventas.idArticulo = articulos.id');
        $this->db->where('ventas.id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;      
    }
    
    public function buscarReserva($id){
        $desde = date("Y-m-d")." 00:00:00";
        $this->db->select('reserva.id, reserva.idCliente, mascota.nombre as nMascota, fecha, hora');
        $this->db->from('reserva, mascota');
        $this->db->where('reserva.idMascota = mascota.id');
        $this->db->where('fecha >=', $desde);
        $this->db->where('reserva.id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;       
    }
    
    public function editar($tabla, $dato){
        $this->db->where('id', $dato->id);
        $this->db->update($tabla, $dato);
    }

    public function eliminar($tabla, $id){
        $this->db->where('id', $id);
        $this->db->delete($tabla);        
    }
    
    /*public function eliminarCliente($id){
        //Chequear si el ID existe
        $existe = $this->existe($id, 'clientes');
        if (empty($existe)){
            throw new Exception("El cliente que está tratando de eliminar no existe");
        }
        $this->db->where('id', $id);
        $this->db->delete('clientes');
    }*/
    
    public function existe($id, $tabla){
        $this->db->select('id');
        $this->db->from($tabla);
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();        
    }
    
}

?>