<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('class/cliente.class.php');
include ('class/mascota.class.php');
include ('class/articulo.class.php');
include ('class/venta.class.php');

class Panel_controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('panel_model');
    }

//-CONTROL DE ACCESOS

    public function index(){
        if($this->session->userdata('logueado')){
            redirect('panel_controller/admin');
        } else {
            $data = array();
            $data['error'] = $this->session->flashdata('error');
            $this->load->view('header');
            $this->load->view('login', $data);
            $this->load->view('footer');
        }
    }
    
    public function doLogin(){
            if ($this->input->post()) {
                $nombre = $this->input->post('nombre');
                $clave = $this->input->post('clave');
                $this->load->model('panel_model');
                $usuario = $this->panel_model->login($nombre, $clave);
                if ($usuario) {
                    $usuario_data = array(
                        'usuario' => $usuario->usuario,
                        'rol' => $usuario->rol,
                        'logueado' => TRUE
                    );
                    $this->session->set_userdata($usuario_data);
                    //$this->log('Login');
                    redirect('panel_controller/admin');
                } else {
                    $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos');
                    redirect('panel_controller/index');
                }
            } else {
               redirect('panel_controller/index');
            }
    }

    public function logout(){
        $usuario_data = array(
               'logueado' => FALSE
        );
        $this->session->set_userdata($usuario_data);
        //$this->log('Logout');
        redirect('panel_controller/index');       
    }
    
    public function control(){
        if(!$this->session->userdata('logueado')){
            redirect('panel_controller/index');   
        }
    }

//-PAGINA PRINCIPAL
    
    public function admin(){
        $this->control();
        $hoy = date('Y-m-d');
        $data['reservas'] = $this->panel_model->listarReservas($hoy);
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("index", $data);
        $this->load->view("footer");
    }

//-CLIENTES        
    public function clientes(){
        $this->control();
        $data = array();
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['undo'] = $this->session->flashdata('undo');
        $data['clientes'] = $this->panel_model->listarClientes();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("clientes/clientes", $data);
        $this->load->view("footer");        
    }
    
//-ALTA
    public function altaCliente(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("clientes/alta");
        $this->load->view("footer");            
    }
    
    public function doAltaCliente(){
        $this->control();
        $cliente = new Cliente();
        $this->form_validation->set_rules($cliente->getRules());
        if ($this->form_validation->run()){
            $cliente->setParams($this->input->post());
            $this->panel_model->alta($cliente, 'clientes');
            $this->session->set_flashdata('success', 'El cliente fue dado de alta con éxito');
            redirect('panel_controller/clientes');
        }else{
            $this->altaCliente();
        }
    }

//-VER        
    public function verCliente(){
        $this->control();
        if ($this->input->get('id')){
            $id = $this->input->get('id');
        } else {
            $id = set_value('id');
        }
        $cliente = $this->controlId($id);
        if (empty($cliente)){
            $this->session->set_flashdata('error', 'Error: El cliente no existe');
            redirect('panel_controller/clientes');
        }
        $data = array();
        $data['cliente'] = $this->controlId($id);
        $data['mascotas'] = $this->panel_model->buscarMascotas($id);
        $data['ventas'] = $this->panel_model->buscarVentas($id);
        $data['reservas'] = $this->panel_model->buscarReservas($id, FALSE);
        $data['historialReservas'] = $this->panel_model->buscarReservas($id, TRUE);
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("clientes/ver", $data);
        $this->load->view("footer");        
    }
 
//-EDITAR       
    public function doeditarCliente(){
        $this->control();
        $id = $this->input->post('id');
        $cliente = $this->controlId($id);
        if (empty($cliente)){
            $this->session->set_flashdata('error', 'doEditarCliente: El cliente no existe');
            redirect('panel_controller/clientes');
        }
        $cliente = new Cliente();
        $this->form_validation->set_rules($cliente->getRules());
        if ($this->form_validation->run()){
            $cliente->setParams($this->input->post());
            $this->panel_model->editar('clientes', $cliente);
            $this->session->set_flashdata('success', 'El cliente '.$id.' fue editado con éxito');
            redirect('panel_controller/clientes');
            }else{
                $this->verCliente();
            }
    }

//-BAJA    
    public function bajaLogica(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $cliente = $this->controlId($id);
            $this->session->set_flashdata('undo', 'Seguro desea eliminar el cliente '.$id.'? <a href="doBajaLogica?id='.$id.'">Si </a> <a href="clientes">No</a>');
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/clientes');
    }
    
    public function doBajaLogica(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $cliente = $this->controlId($id);
            $cliente->activo = 0;
            $this->panel_model->editar('clientes', $cliente);
            $this->session->set_flashdata('success', 'El cliente fue eliminado');        
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/clientes');           
    }    
  
//-AUXILIARES  
    public function controlId($id){
        $cliente = $this->panel_model->buscarCliente($id);
        return $cliente;
    }
    

    

    
    /* DESHACER A IMPLEMENTAR
    public function deshacer(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $cliente = $this->controlId($id);
            $cliente->activo = 1;
            $this->panel_model->editar('clientes', $cliente);
            $this->session->set_flashdata('success', 'El cliente fue recuperado');        
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/clientes');               
    }*/
    
    /* BAJA FISICA A IMPLEMENTAR
    public function doEliminarCliente(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $this->panel_model->eliminarCliente($id);
            $this->session->set_flashdata('success', 'El cliente fue eliminado con éxito');
        }catch (Exception $e){
            $this->session->set_flashdata('error', $e->getMessage());
        }
        redirect('panel_controller/clientes');
    }
     */
    
//-MASCOTAS---------------
    
    public function mascotas(){
        $this->control();
        $data = array();
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['undo'] = $this->session->flashdata('undo');
        $data['mascotas'] = $this->panel_model->listarMascotas();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("mascotas/mascotas", $data);
        $this->load->view("footer");       
    }
    
//-ALTA
    public function altaMascota(){
        $this->control();
        $data['razas'] = $this->panel_model->listarRazas();
        $data['clientes'] = $this->panel_model->listarClientes();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("mascotas/alta", $data);
        $this->load->view("footer");            
    }
    
    public function doAltaMascota(){
        $this->control();
        $mascota = new Mascota();
        $this->form_validation->set_rules($mascota->getRules());
        if ($this->form_validation->run()){
            $mascota->setParams($this->input->post());
            $this->panel_model->alta($mascota, 'mascota');
            $this->session->set_flashdata('success', 'La mascota fue dado de alta con éxito');
            redirect('panel_controller/mascotas');
        }else{
            $this->altaMascota();
        }
    }
    
//-VER        
    public function verMascota(){
        $this->control();
        if ($this->input->get('id')){
            $id = $this->input->get('id');
        } else {
            $id = set_value('id');
        }
        $mascota = $this->controlMascota($id);
        if (empty($mascota)){
            $this->session->set_flashdata('error', 'Error: La mascota no existe');
            redirect('panel_controller/mascotas');
        }
        $data = array();
        $data['mascota'] = $this->controlMascota($id);
        $data['clientes'] = $this->panel_model->listarClientes();
        $data['razas'] = $this->panel_model->listarRazas();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("mascotas/ver", $data);
        $this->load->view("footer");        
    }

//-EDITAR       
    public function doeditarMascota(){
        $this->control();
        $id = $this->input->post('id');
        $mascota = $this->controlMascota($id);
        if (empty($mascota)){
            $this->session->set_flashdata('error', 'doEditarMascota: La mascota no existe');
            redirect('panel_controller/mascota');
        }
        $mascota = new Mascota();
        $this->form_validation->set_rules($mascota->getRules());
        if ($this->form_validation->run()){
            $mascota->setParams($this->input->post());
            $this->panel_model->editar('mascota', $mascota);
            $this->session->set_flashdata('success', 'La mascota '.$id.' fue editado con éxito');
            redirect('panel_controller/mascotas');
            }else{
                $this->verMascota();
            }
    }
    
//-BAJA    
    public function eliminarMascota(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $mascota = $this->controlMascota($id);
            $this->session->set_flashdata('undo', 'Seguro desea eliminar el mascota '.$id.'? <a href="doEliminarMascota?id='.$id.'">Si </a> <a href="mascotas">No</a>');
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/mascotas');
    }
    
    public function doEliminarMascota(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $this->controlMascota($id);
            $this->panel_model->eliminar('mascota', $id);
            $this->session->set_flashdata('success', 'La mascota fue eliminada');        
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/mascotas');           
    }        

//-AUXILIARES
    public function controlMascota($id){
        $mascota = $this->panel_model->buscarMascota($id);
        return $mascota;
    }    
    
//ARTICULOS-------------

    public function articulos(){
        $this->control();
        $data = array();
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['undo'] = $this->session->flashdata('undo');
        $data['articulos'] = $this->panel_model->listarArticulos();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("articulos/articulos", $data);
        $this->load->view("footer");        
    }
    
//-ALTA
    
     public function altaArticulo(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("articulos/alta");
        $this->load->view("footer");            
    }
    
    public function doAltaArticulo(){
        $this->control();
        $articulo = new Articulo();
        $this->form_validation->set_rules($articulo->getRules());
        if ($this->form_validation->run()){
            $articulo->setParams($this->input->post());
            $this->panel_model->alta($articulo, 'articulos');
            $this->session->set_flashdata('success', 'El artículo fue dado de alta con éxito');
            redirect('panel_controller/articulos');
        }else{
            $this->altaArticulo();
        }
    }

//-VER        
    public function verArticulo(){
        $this->control();
        if ($this->input->get('id')){
            $id = $this->input->get('id');
        } else {
            $id = set_value('id');
        }
        $articulo = $this->controlArticulo($id);
        if (empty($articulo)){
            $this->session->set_flashdata('error', 'Error: El artículo no existe');
            redirect('panel_controller/articulos');
        }
        $data = array();
        $data['articulo'] = $articulo;
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("articulos/ver", $data);
        $this->load->view("footer");
    }
    
//-EDITAR       
    public function doeditarArticulo(){
        $this->control();
        $id = $this->input->post('id');
        $articulo = $this->controlArticulo($id);
        if (empty($articulo)){
            $this->session->set_flashdata('error', 'doEditarArticulo: El artículo no existe');
            redirect('panel_controller/articulos');
        }
        $articulo = new Articulo();
        $this->form_validation->set_rules($articulo->getRules());
        if ($this->form_validation->run()){
            $articulo->setParams($this->input->post());
            $this->panel_model->editar('articulos', $articulo);
            $this->session->set_flashdata('success', 'El artículo '.$id.' fue editado con éxito');
            redirect('panel_controller/articulos');
            }else{
                $this->verArticulo();
            }
    }    
    
//-BAJA    
    public function bajaLogicaArticulo(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $articulo = $this->controlArticulo($id);
            $this->session->set_flashdata('undo', 'Seguro desea eliminar el artículo '.$id.'? <a href="doBajaLogicaArticulo?id='.$id.'">Si </a> <a href="articulos">No</a>');
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/articulos');
    }
    
    public function doBajaLogicaArticulo(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $articulo = $this->controlArticulo($id);
            $articulo->activo = 0;
            $this->panel_model->editar('articulos', $articulo);
            $this->session->set_flashdata('success', 'El artículo fue eliminado');        
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/articulos');           
    }    
    
//-AUXILIARES
    public function controlArticulo($id){
        $mascota = $this->panel_model->buscarArticulo($id);
        return $mascota;
    } 

//-VENTAS---------------    
    
    public function ventas(){
        $this->control();
        $data = array();
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['undo'] = $this->session->flashdata('undo');
        $data['ventas'] = $this->panel_model->listarVentas();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("ventas/ventas", $data);
        $this->load->view("footer");       
    }
    
//-ALTA
    public function altaVenta(){
        $this->control();
        $data['articulos'] = $this->panel_model->listarArticulos();
        $data['clientes'] = $this->panel_model->listarClientes();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("ventas/alta", $data);
        $this->load->view("footer");            
    }
    
    public function doAltaVenta(){
        $this->control();
        $venta = new Venta();
        $this->form_validation->set_rules($venta->getRules());
        if ($this->form_validation->run()){
            $venta->setParams($this->input->post());
            $this->panel_model->alta($venta, 'ventas');
            $this->session->set_flashdata('success', 'La venta fue dado de alta con éxito');
            redirect('panel_controller/ventas');
        }else{
            $this->altaVenta();
        }
    }
    
//-VER        
    public function verVenta(){
        $this->control();
        if ($this->input->get('id')){
            $id = $this->input->get('id');
        } else {
            $id = set_value('id');
        }
        $venta = $this->controlVenta($id);
        if (empty($venta)){
            $this->session->set_flashdata('error', 'Error: La venta no existe');
            redirect('panel_controller/ventas');
        }
        $data = array();
        $data['venta'] = $this->controlVenta($id);
        $data['clientes'] = $this->panel_model->listarClientes();
        $data['articulos'] = $this->panel_model->listarArticulos();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("ventas/ver", $data);
        $this->load->view("footer");        
    }

//-EDITAR       
    public function doeditarVenta(){
        $this->control();
        $id = $this->input->post('id');
        $venta = $this->controlVenta($id);
        if (empty($venta)){
            $this->session->set_flashdata('error', 'doEditarVenta: La venta no existe');
            redirect('panel_controller/ventas');
        }
        $venta = new Venta();
        $this->form_validation->set_rules($venta->getRules());
        if ($this->form_validation->run()){
            $venta->setParams($this->input->post());
            $this->panel_model->editar('ventas', $venta);
            $this->session->set_flashdata('success', 'La venta '.$id.' fue editado con éxito');
            redirect('panel_controller/ventas');
            }else{
                $this->verVenta();
            }
    }
    
//-BAJA    
    public function eliminarVenta(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $venta = $this->controlVenta($id);
            $this->session->set_flashdata('undo', 'Seguro desea eliminar la venta '.$id.'? <a href="doEliminarVenta?id='.$id.'">Si </a> <a href="ventas">No</a>');
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/ventas');
    }
    
    public function doEliminarVenta(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $this->controlVenta($id);
            $this->panel_model->eliminar('ventas', $id);
            $this->session->set_flashdata('success', 'La venta fue eliminada');        
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/ventas');           
    }

//-AUXILIARES
    public function controlVenta($id){
        $venta = $this->panel_model->buscarVenta($id);
        return $venta;
    }
    

//-RESERVAS----------------        
    
    public function getClientesJSON(){
        $data['clientesJSON'] = $this->panel_model->listarClientes();
        $this->load->view('reservas/getClientes', $data);
    }    
    
    public function buscarMascotaJSON(){
        $idMascota = $this->input->get('idMascota');
        $data['mascotasJSON'] = $this->panel_model->buscarMascota($idMascota);
        $this->load->view('reservas/buscarMascota', $data);        
    }
    
    public function getMascotasJSON(){
        $data['mascotasJSON'] = $this->panel_model->listarMascotas();
        $this->load->view('reservas/getMascotas', $data);
    }
	
    public function getMascotasClienteJSON(){
    	$idCliente = $this->input->get('idCliente');
        $data['mascotasJSON'] = $this->panel_model->buscarMascotas($idCliente);
        $this->load->view('reservas/getMascotas', $data);
    }	
    
    /*public function getMascotasJSON(){
        $data['mascotasJSON'] = $this->panel_model->listarMascotas();
        $this->load->view('reservas/getMascotas', $data);
    }*/
    
    public function getReservasJSON($fecha){
        $salida = str_replace('-', '/', $fecha);
        $data['reservasJSON'] = $this->panel_model->listarReservas($salida);
        $this->load->view('reservas/getReservas', $data);
        //echo json_encode($this->panel_model->listarReservas($salida));
    }
    
    //Devuelve true o false y eso decide si se muestra el resto del form
    /*public function getDNI(){
        sleep(1);
        if ($_REQUEST){
            $dni = $_REQUEST['dni'];
            $resultado = $this->formulario_model->buscarGenerico('dni', 'docentes',$dni);
            if (!empty($resultado)){
                echo json_encode(array("re"=>TRUE));
            }else{
                echo json_encode(array("re"=>FALSE));
            }
        }
    }*/
    
    public function reservas(){
        $this->control();
        $data = array();
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        $data['undo'] = $this->session->flashdata('undo');
        $data['reservas'] = $this->panel_model->listarReservas(date('Y-m-a'));
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("reservas/reservas", $data);
        $this->load->view("footer");       
    }
    
    
    
    public function altaReserva(){
        $data = array();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("reservas/alta", $data);
        $this->load->view("footer");
                
        //Paso 1: Seleccionar Fecha (post fecha)
        
        if ($this->input->post('datetime')){
            $fecha = explode(" ", $this->input->post('datetime'));
            $hora = $fecha[1];
            $fecha = $fecha[0];
            $data['reservas'] = $this->panel_model->listarReservas($fecha);
        }
        //Paso 2: Mostrar reservas de la fecha. Botón siguiente o elegir otra fecha
        //Paso 3: Seleccionar cliente y trabajo (post cliente, post trabajo)
        //Paso 4: Seleccionar mascota. Guardar (post mascota)
             
    }
    
//-ALTA
    /*public function altaMascota(){
        $this->control();
        $data['razas'] = $this->panel_model->listarRazas();
        $data['clientes'] = $this->panel_model->listarClientes();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("mascotas/alta", $data);
        $this->load->view("footer");            
    }
    */
   /* public function doAltaMascota(){
        $this->control();
        $mascota = new Mascota();
        $this->form_validation->set_rules($mascota->getRules());
        if ($this->form_validation->run()){
            $mascota->setParams($this->input->post());
            $this->panel_model->alta($mascota, 'mascota');
            $this->session->set_flashdata('success', 'La mascota fue dado de alta con éxito');
            redirect('panel_controller/mascotas');
        }else{
            $this->altaMascota();
        }
    }*/
    
//-VER        
    public function verReserva(){
        $this->control();
        if ($this->input->get('id')){
            $id = $this->input->get('id');
        } else {
            $id = set_value('id');
        }
        $reserva = $this->controlReserva($id);
        if (empty($reserva)){
            $this->session->set_flashdata('error', 'Error: La reserva no existe');
            redirect('panel_controller/reservas');
        }
        $data = array();
        //Debe tener las mismas características que el AltaReserva
        $data['reserva'] = $this->controlReserva($id);
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("reservas/ver", $data);
        $this->load->view("footer");        
    }

//-EDITAR       
    /*public function doeditarMascota(){
        $this->control();
        $id = $this->input->post('id');
        $mascota = $this->controlMascota($id);
        if (empty($mascota)){
            $this->session->set_flashdata('error', 'doEditarMascota: La mascota no existe');
            redirect('panel_controller/mascota');
        }
        $mascota = new Mascota();
        $this->form_validation->set_rules($mascota->getRules());
        if ($this->form_validation->run()){
            $mascota->setParams($this->input->post());
            $this->panel_model->editar('mascota', $mascota);
            $this->session->set_flashdata('success', 'La mascota '.$id.' fue editado con éxito');
            redirect('panel_controller/mascotas');
            }else{
                $this->verMascota();
            }
    }*/
    
//-BAJA    
    public function eliminarReserva(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $reserva = $this->controlReserva($id);
            $this->session->set_flashdata('undo', 'Seguro desea eliminar la reserva '.$id.'? <a href="doEliminarReserva?id='.$id.'">Si </a> <a href="reservas">No</a>');
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/reservas');
    }
    
    public function doEliminarReserva(){
        $this->control();
        $id = $this->input->get('id');
        try{
            $this->controlReserva($id);
            $this->panel_model->eliminar('reserva', $id);
            $this->session->set_flashdata('success', 'La reserva fue eliminada');        
        }catch (Exception $e){
            echo $e->getMessage();
        }
        redirect('panel_controller/reservas');           
    }

//-AUXILIARES
    public function controlReserva($id){
        $reserva = $this->panel_model->buscarReserva($id);
        return $reserva;
    }
}
?>