<?php

class Mascota{
    
    public function setParams($parametros){
        if (isset($parametros['id'])){
            $this->id = $parametros['id'];
        }
        $this->idCliente = $parametros['idCliente'];
        $this->nombre = $parametros['nombre'];
        $this->idRaza = $parametros['idRaza'];
        $this->obs = $parametros['obs'];
    }
    
    public function getRules(){
            $config = array(
                    array(
                        'field'=>'nombre',
                        'label'=>'Nombre',
                        'rules'=>'required'
                    ),
                    array(
                        'field'=>'idCliente',
                        'label'=>'# Cliente',
                        'rules'=>'required|numeric'
                    ),
                    array(
                        'field'=>'idRaza',
                        'label'=>'Raza',
                        'rules'=>'required|numeric'
                    )
                 );
        return $config;        
    }
}

?>