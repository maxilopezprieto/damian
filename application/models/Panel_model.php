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
}

?>