<?php

class Cliente{
    
    public function setParams($parametros){
        if (isset($parametros['id'])){
            $this->id = $parametros['id'];
        }
        $this->nombre = $parametros['nombre'];
        $this->direccion = $parametros['direccion'];
        $this->telefono = $parametros['telefono'];
        $this->celular = $parametros['celular'];
        $this->activo = $parametros['activo'];
    }
    
    public function getRules(){
            $config = array(
                    array(
                        'field'=>'nombre',
                        'label'=>'Nombre',
                        'rules'=>'required'
                    ),
                    array(
                        'field'=>'direccion',
                        'label'=>'Dirección',
                        'rules'=>'required'
                    ),
                    array(
                        'field'=>'telefono',
                        'label'=>'Teléfono',
                        'rules'=>'required|numeric'
                    ),
                    array(
                        'field'=>'celular',
                        'label'=>'Celular',
                        'rules'=>'required|numeric'
                    )
                 );
        return $config;        
    }
}

?>