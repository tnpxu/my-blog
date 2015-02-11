<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
    }
	 
	public function index()
	{
		
		$this->load->model('post_model');
        $data['blog'] = $this->post_model->show_data();
        $this->load->view('home',$data);

	}
	public function update()
	{
		$this->load->view('update');
	}
	public function form_submit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_message('subject','required');
        $this->form_validation->set_message('message','required');
        if($this->form_validation->run() == FALSE)
        {
            $this->update();
        }
        else
        {
            // Load post_model.php
            $this->load->model('post_model');

            $submit_data = $this->input->post(NULL, TRUE);

            if ($this->post_model->insert_data($submit_data))
            {
                $data['notify_message'] = 'Add data successfully.';
                $this->load->view('update_notify',$data);
            }
            else
            {
                $data['notify_message'] = 'Oh! There is a problem.';
                
                $this->load->view('update_notify',$data);
            }
        }

	}

	public function show_blog($id)
	{
		$this->load->model('post_model');
		$data['blogging'] = $this->post_model->find_blog($id);
		$this->load->view('blog',$data);
        
	}

	public function edit($id)
	{
		// Load post_model.php
        $this->load->model('post_model');

        // Load form validation library and set rules
        $this->load->library('form_validation');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_message('required', 'please writing massage and subject');

        if ($this->form_validation->run() == FALSE) {

            $data = $this->post_model->get_data($id);

            
            $this->load->view('edit_view', $data);
            
        }
        else
        {
            $submit_data = $this->input->post(NULL, TRUE);

            if ($this->post_model->edit_data($id,$submit_data))
            {
                $data['notify_message'] = 'update data successfully.';
                $this->load->view('update_notify',$data);
            }
            else
            {
                $data['notify_message'] = 'Oh! There is a problem.';
                $this->load->view('update_notify',$data);
            }
        }
	}

	public function delete($id)
	{
		$this->load->model('post_model');

        if ($this->post_model->delete_data($id))
        {
            $data['notify_message'] = 'Delete data successfully.';
            $this->load->view('update_notify',$data);
        }
        else
        {
            $data['notify_message'] = 'Oh! There is a problem.';
            $this->load->view('update_notify',$data);
        }
	}
	public function search()
	{
		$this->load->model('post_model');
        $submit_search = $this->input->post(NULL, TRUE);
        $result['search_done'] = $this->post_model->search_data($submit_search);
        if($result['search_done'])
        {
        	$this->load->view('search_view',$result);
        }
        else
        {
        	$data['notify_message'] = 'Your search did not match any document';
            $this->load->view('update_notify',$data);
        }

	}
    public function login()
    {
        $this->load->view('login');
    }
    public function about()
    {
        $this->load->view('about');
    }
	
}