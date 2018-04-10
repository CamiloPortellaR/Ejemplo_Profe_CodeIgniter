<?php
if(!defined('BASEPATH')) exit('No esta permitido acceder directamente');
class Mensajes extends CI_Controller{
	#===============
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('mensaje');
	}
	#===============
	public function index(){
		$data=array();
		
		if($this->session->userdata('success_msg')){
			$data['success_msg']=$this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg']=$this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		
		$data['mensajes']=$this->mensaje->getRows();
		$data['titulo']='Mensajes archivados';
		
		$this->load->view('templates/header',$data);
		$this->load->view('mensajes/index',$data);
		$this->load->view('templates/footer');
	}
	#===============
	public function ver($id){
		$data=array();
		if(!empty($id)){
			$data['mensaje']=$this->mensaje->getRows($id);
			$data['titulo']=$data['mensaje']['titulo'];
			
			$this->load->view('templates/header',$data);
			$this->load->view('mensajes/ver',$data);
			$this->load->view('templates/footer');
		}
	}
	#===============
	public function agregar(){
		$data=array();
		$mensajeData=array();
		if($this->input->post('mensajeSubmit')){
			$this->form_validation->set_rules('titulo','mensaje titulo','required');
			$this->form_validation->set_rules('contenido','mensaje contenido','required');
			
			$mensajeData=array(
				'titulo'=>$this->input->post('titulo'),
				'contenido'=>$this->input->post('contenido')
				);
			if($this->form_validation->run()==true){
				$insert=$this->mensaje->insert($mensajeData);
				if($insert){
					$this->session->set_userdata('success_msg','Mensaje agregado');
					redirect('/mensajes');
				}else{
					$data['error_msg']='Mensaje NO agregado';
				}
			}
		}
		$data['mensaje']=$mensajeData;
		$data['titulo']='Crear Mensaje';
		$data['accion']='Agregar';
		
		$this->load->view('templates/header',$data);
		$this->load->view('mensajes/agregar-editar',$data);
		$this->load->view('templates/footer');
	}
	#===============
	public function editar($id){
		$data=array();
		$mensajeData=$this->mensaje->getRows($id);
		if($this->input->post('mensajeSubmit')){
			$this->form_validation->set_rules('titulo','memsaje titulo','required');
			$this->form_validation->set_rules('contenido','memsaje contenido','required');
			$mensajeData=array(
				'titulo'=>$this->input->post('titulo'),
				'contenido'=>$this->input->post('contenido')
			);
			if($this->form_validation->run()==true){
				$update=$this->mensaje->update($mensajeData,$id);
				if($update){
					$this->session->set_userdata('success_msg','Mensaje actualizado');
					redirect('/mensajes');
				}else{
					$data['error_msg']='Mensaje No actualizado';
				}
			}
		}
		$data['mensaje']=$mensajeData;
		$data['titulo']='Actualizar Mensaje';
		$data['accion']='Editar';
		
		$this->load->view('templates/header',$data);
		$this->load->view('mensajes/agregar-editar',$data);
		$this->load->view('templates/footer');		
	}
	#===============
	public function borrar($id){
		if($id){
			$delete=$this->mensaje->delete($id);
			if($delete){
				$this->session->set_userdata('success_msg','Mensaje Borrado');
			}else{
				$this->session->set_userdata('error_msg','No se pudo borrar');
			}
		}
		redirect('/mensajes');
	}
}
?>