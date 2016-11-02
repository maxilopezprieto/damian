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
    
    public function alta($objeto){
        $this->db->insert('clientes', $objeto);
    }
    
    public function listarClientes(){
        $this->db->select('id, nombre, direccion, telefono, celular, activo');
        $this->db->from('clientes');
        $this->db->where('activo', 1);
        $consulta = $this->db->get();
        return $consulta->result(); 
    }
    
    public function listarMascotas(){
        $this->db->select('id, idCliente, nombre, raza');
        $this->db->from('mascota');
        $consulta = $this->db->get();
        return $consulta->result(); 
    }
    
    public function buscarMascotas($idCliente){
        $this->db->select('mascota.nombre as nMascota, raza.nombre as nRaza, obs');
        $this->db->from('mascota, raza');
        $this->db->where('idCliente', $idCliente);
        $this->db->where('mascota.idRaza = raza.id');
        $consulta = $this->db->get();
        return $consulta->result(); 
    }    
    
    public function buscarCliente($id){
        $this->db->select('id, nombre, direccion, telefono, celular, activo');
        $this->db->from('clientes');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;      
    }
    
    public function editar($tabla, $dato){
        $this->db->where('id', $dato->id);
        $this->db->update($tabla, $dato);
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