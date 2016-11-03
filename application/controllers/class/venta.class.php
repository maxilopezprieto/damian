<?php

class Venta{
    
    public function setParams($parametros){
        if (isset($parametros['id'])){
            $this->id = $parametros['id'];
        }
        $this->idCliente = $parametros['idCliente'];
        $this->idArticulo = $parametros['idArticulo'];
        $this->fecha = $parametros['fecha'];
        $this->cantidad = $parametros['cantidad'];
    }
    
    public function getRules(){
            $config = array(
                    array(
                        'field'=>'idCliente',
                        'label'=>'# Cliente',
                        'rules'=>'required|numeric'
                    ),
                    array(
                        'field'=>'idArticulo',
                        'label'=>'# Articulo',
                        'rules'=>'required|numeric'
                    ),
                    array(
                        'field'=>'fecha',
                        'label'=>'Fecha',
                        'rules'=>'required'
                    ),
                    array(
                        'field'=>'cantidad',
                        'label'=>'Cantidad',
                        'rules'=>'required|numeric'
                    )
                 );
        return $config;        
    }
}

?>