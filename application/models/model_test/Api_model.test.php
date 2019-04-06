<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test_api_model extends CI_Model
{

    /**
     * Test Message_Model
     * 
     * @return void
    */
    public function test_message_model()
    {

        /**
         * MESSAGE DATA
        */
        $message_data = [
            'name'    => 'Themba',
            'email'   => 'thembangubeni04@gmail.com',
            'subject' => 'Need A Website For My Business.',
            'message' => 'Need you to build me a website for my business.'
        ];


        /**
         * Insert Message To DB 
        */
        $test_name = 'Insert Message To DB';
        $test = $this->message_model->store_message($message_data);
        $this->unit->run($test, 'is_true', $test_name);

        /*** get latest inserted message id ***/
        $message_id = $this->db->insert_id();

        /**
         * Get Message From DB
        */
        $test_name = 'Get Message From DB';
        $test = $this->message_model->get_message($message_id);
        $this->unit->run($test, 'is_array', $test_name);

        /**
         * Make Message Seen In DB
        */
        $test_name = 'Make Message Seen In DB';
        $test = $this->message_model->set_message_seen($message_id);
        $this->unit->run($test, 'is_true', $test_name);

        /**
         * Delete Message In DB
        */
        $test_name = 'Delete Message In DB';
        $test = $this->message_model->delete_message($message_id);
        $this->unit->run($test, 'is_true', $test_name);

    }

    /**
     * Test Api_Model
     * 
     * @return void
    */
    public function test_api_model()
    {

        /**
         * Test DATA
        */
        $data = [
            'json'  => '{"name": "Themba", "surname": "ngubeni"}',
            'array' => ['name' => 'Themba', 'surname' => 'ngubeni']
        ];

        /**
         * Convert PHP array to JSON string
        */
        $test_name = 'Convert PHP array to JSON string (array_to_json)';
        $test = $this->api_model->array_to_json($data['array']);
        $this->unit->run($test, 'is_string', $test_name);

        /**
         * Convert PHP array to JSON string
        */
        $test_name = 'Convert JSON string to PHP array (json_to_array)';
        $test = $this->api_model->json_to_array($data['json']);
        $this->unit->run($test, 'is_array', $test_name);

        /**
         * Convert PHP array to JSON string
        */
        $test_name = 'Convert Invalid JSON string to api response must fail';
        $test = $this->api_model->api_response($data['json'] . '}');
        $this->unit->run($test, 'is_false', $test_name);
        
    }

    /**
     * Test Mail_Model
     * 
     * @return void
    */
    public function test_error_model()
    {

    }

}