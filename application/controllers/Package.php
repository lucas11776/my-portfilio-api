<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

    public function index()
    {
        redirect('home');
    }

    /**
     * Apply for package 
     * 
     * @return boolean 
    */
    public function apply()
    {
        // name rules
        $this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[30]', [
            'required' => 'your {field} is required.',
            'min_length' => 'invalid {field} please enter correct {field}',
            'max_length' => 'invalid {field} please enter correct {field}'
        ]);

        // email rules
        $this->form_validation->set_rules('email', 'email address', 'required|valid_email', [
            'required' => 'your {field} is required.',
            'valid_email' => 'invalid {field} please enter correct {field}'
        ]);

        // package rules
        $this->form_validation->set_rules('package', 'package', 'callback_check_package');

        // check form is valid
        if($this->form_validation->run() === false)
        {

            // invalid form response
            $this->response_model->response($this->form_validation->error_array(), false);
            
            return false;
        }
        else
        {
            // application post data
            $application = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'package' => $this->input->post('package'),
            ];

            // insert application to database
            if(!$this->package_model->apply_package($application))
            {
                $this->response_model->response(
                    [ 'message' => 'something went wrong when tring to connect to database please try again...' ],
                    false
                );

                return false;
            }


            // send message client
			$sent = $this->mail_model->send_mail_user('Client Email', 'Email Subject', 'Message To Client');

            // send message to me email
			$email_to = $this->mail_model->send_mail_user('Company Email Address', 'Subject Email', 'Message To Company');
            
            // success response to user
            $this->response_model->response([], true);

            return true;
        }

    }

    /**
     * validate package value
     * 
     * @param string package
     * 
     * @return boolean
    */
    public function check_package($package)
    {   
        $package = strtolower($package);

        if(empty($package))
        {
            $this->form_validation->set_message('check_package', 'your {field} plan is required.');
            
            return false;
        }

        if(!in_array($package, $this->package_model::PACKAGES))
        {
            $this->form_validation->set_message('check_package', 'invalid {field} please select correct package.');
            
            return false;
        }

        return true;
    }



}