<?php

class Articulo{
    
    public function setParams($parametros){
        if (isset($parametros['id'])){
            $this->id = $parametros['id'];
        }
        $this->nombre = $parametros['nombre'];
        $this->descripcion = $parametros['descripcion'];
        $this->precio = $parametros['precio'];
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
                        'field'=>'descripcion',
                        'label'=>'Descripción',
                        'rules'=>'required'
                    ),
                    array(
                        'field'=>'precio',
                        'label'=>'Precio',
                        'rules'=>'required|numeric'
                    )
                 );
        return $config;        
    }
}

?>