<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
    
    public function alta(){
        $this->control();
        /*
        $clave = $this->input->post('clave');
        $config = $this->creaObjeto($clave);
        $this->form_validation->set_rules($config->getRules());
        if ($this->form_validation->run()){
            $this->load->model('mail_model');
            $config->setParams($this->input->post());
            $dato = $config->hasheo();
            $this->mail_model->agregar($dato);
            $this->session->set_flashdata('success', 'La configuración de mail fue agregada con éxito');
            $this->log("Se ha dado de alta: ".$clave);
            redirect('admin_controller/panelMail');
        } else {
            $this->panelMail();
        }*/
    }
    
    public function clientes(){
        $this->control();
        $this->load->view("header");
        $this->load->view("nav");
        $this->load->view("clientes");
        $this->load->view("footer");        
    }
    
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