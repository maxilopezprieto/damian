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
        //$data['error'] = $this->session->flashdata('error');
        //$data['success'] = $this->session->flashdata('success');
        $data = array();
        $data['clientes'] = $this->panel_model->listarClientes();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("clientes", $data);
        $this->load->view("footer");        
    }
    
    public function verCliente($id){
        $this->control();
        
    }
    
    public function altaCliente(){
        $this->control();
        $cliente = new Cliente();
        $this->form_validation->set_rules($cliente->getRules());
        if ($this->form_validation->run()){
            $cliente->setParams($this->input->post());
            $this->panel_model->alta($cliente);
            //redirect('panel_controller/clientes');
            $response = array(
                "msg" => TRUE,
                "txt" => "El cliente se dio de alta correctamente"
                );
            echo json_encode($response);
        }else{
            $response = array(
                "msg" => FALSE,
                "txt" => validation_errors()
                );
            echo json_encode($response);
        }
    }
    
    public function editarCliente($id){
        
    }
    
    public function borrarCliente($id){
        
    }
    
//-MASCOTAS
    
    public function mascotas(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("mascotas");
        $this->load->view("footer");        
    }
    
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