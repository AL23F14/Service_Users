<?php
/*header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');*/
header('content-type: application/json; charset=utf-8');
  

require APPPATH . 'libraries/REST_Controller.php';
     
class Log extends REST_Controller {
    
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
            $data = $this->db->get_where("users", ['id_u' => $id])->row_array();
        }else{
            $data = $this->db->get("users")->result();
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
        $this->db->insert('users',$input);
     
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
        $this->db->update('users', $input, array('id_u'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('users', array('id_u'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }

    function insert()
    {
        $this->form_validation->set_rules("nombre_u", "Nombre usuario", "required");
        $this->form_validation->set_rules("emai_u", "Email", "required");
        $array = array();
        if($this->form_validation->run())
        {
            $data = array(
                'nombre_u' => trim($this->input->post('nombre_u')),
                'email_u'  => trim($this->input->post('email_u'))
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
                'nombre_u_error' => form_error('nombre_u'),
                'email_u_error' => form_error('email_u')
            );
        }
        echo json_encode($array, true);
    }
}