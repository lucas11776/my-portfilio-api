<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller 
{

	public function index()
	{
		redirect('home');
	}

	/**
	 * validate message post data and save data to database and send
	 * notification message to @user and @company
	 * 
	 * @return boolean
	*/
	public function reveived_message()
	{

		// name @rules
		$this->form_validation->set_rules('name', 'name', 'required', [
			'required'    => 'Your {field} is required please enter your {field}.'
		]);

		// email @rules
		$this->form_validation->set_rules('email', 'email address', 'required|valid_email', [
			'required'    => 'Your {field} is required please enter {field}.',
			'valid_email' => 'You have enter an invalid {field} please enter a correct {field}.'
		]);

		// subject @rules
		$this->form_validation->set_rules('subject', 'subject', 'required|min_length[4]|max_length[30]', [
			'required'    => '{field} is required please enter the {field}.',
			'min_length'  => '{field} must a minimum characters of 5.',
			'max_length'  => '{field} must a maximum characters of 30.' 
		]);

		// message @rules
		$this->form_validation->set_rules('message', 'message', 'required|min_length[20]|max_length[200]', [
			'required'    => '{field} is required please enter your {field} to ME.',
			'min_length'  => '{field} must a minimum characters of 20.',
			'max_length'  => '{field} must a maximum characters of 200.' 
		]);

		// run @rules
		if($this->form_validation->run() === FALSE)
		{

			// invalid form response
			$this->response_model->response($this->form_validation->error_array(), false);

			return false;
		}
		else
		{

			// message data
			$form_data = [
				'name'    => $this->input->post('name'),
				'email'   => $this->input->post('email'),
				'subject' => $this->input->post('subject'),
				'message' => $this->input->post('message')
			];

			// success response message
			$data = [
				'message' => 'message succefully sent you will receive confirmation mail shortly...'
			];

			// store message in database
			if(!$this->message_model->store_message($form_data))
			{
				
				$data = [
					'message' => 'Something went wrong when tring to save your message please try again later.'
				];
				
				$this->response_model->response($data, false);

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

}
