<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Item extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("usuarios", ['id_usuario' => $id])->row_array();
        }else{
            $data = $this->db->get("usuarios")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('usuarios',$input);
     
        $this->response($input, REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('usuarios', $input, array('id_usuario'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('usuarios', array('id_usuario'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }

    function insert()
    {
        $this->form_validation->set_rules("nombre_usuario", "Nombre Usuario", "required");
        $this->form_validation->set_rules("emai", "Email", "required");
        $array = array();
        if($this->form_validation->run())
        {
            $data = array(
                'nombre_usuario' => trim($this->input->post('nombre_usuario')),
                'email'  => trim($this->input->post('email'))
            );
            $this->api_model->insert_api($data);
            $array = array(
                'success'  => true
            );
        }
        else
        {
            $array = array(
                'error'    => true,
                'nombre_usario_error' => form_error('nombre_usuario'),
                'email_error' => form_error('email')
            );
        }
        echo json_encode($array, true);
    }
}