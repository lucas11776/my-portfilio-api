<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Api Details
     * 
     * @return boolean 
    */
    public function index()
    {
        $ApiDetails = [
            'api' => [
                'version'           => '1.0',
                'framework'         => 'CodeIgniter',
                'created'           => '06-March-2019',
                'finished'          => '07-March-2019',
                'developer'         => 'Themba Lucas Ngubeni'
            ],
            'contact_details' => [
                'email_address'     => 'thembangubeni04@gamil.com',
                'cell_phone_number' => '',
                'facebook'          => 'themba.ngubeni.129'
            ]
        ];

        // Api Response
        $this->response_model->response($ApiDetails);

        return isset($_POST);
    }

}