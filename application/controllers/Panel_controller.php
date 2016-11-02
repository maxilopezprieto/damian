<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('class/cliente.class.php');

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
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("index");
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
            $this->panel_model->alta($cliente);
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
    

    

    
    /* DESHACER
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
    
//-MASCOTAS
    
    public function mascotas(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("mascotas");
        $this->load->view("footer");        
    }
    
    
    
//ARTICULOS
    
    public function articulos(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("articulos");
        $this->load->view("footer");        
    }   
    
    public function ventas(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("ventas");
        $this->load->view("footer");        
    }
    
    public function reservas(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("reservas");
        $this->load->view("footer");        
    }
}
?>