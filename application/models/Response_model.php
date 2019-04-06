<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Response_model extends CI_Model
{

    /**
     * Set Api Response Addition Items
     * 
     * @param array _array
     * @param boolean status
     * @return array
    */
    public function response($_array, $status = NULL)
    {
        // response placeholder
        $response = NULL;

        switch($status)
        {
            case true:
                $response = $this->passed_response($_array);
                break;
            case is_bool($status): // PHP takes NULL and false to be equal 
                $response = $_array;
                break;
            default:
                $response = $this->failed_response($_array);
                break;
        }

        if($response != false)
        {

            // convert response array to JSON string
            $response = $this->api_model->api_response($response);

            // print out response
            die($response);

        }

        // return (status,response) value for testing purpose
        return ['response' => $response, 'status' => $status]; 
    }

    /**
     * Set Response Array To Response Success Status
     * 
     * @param array array
     * @return array
    */
    public function passed_response($_array = [])
    {
        // check if _array is an array
        if(!is_array($_array))
        {
            return false;
        }

        // create new array with success status
        $new_array = [
            'success' => true,
            'data'    => $_array
        ];

        return $new_array;
    }

    /**
     * Set Response Array To Response Fail Status
     * 
     * @param array array
     * @return array
    */
    public function failed_response($_array = [])
    {
        // check if _array is an array
        if(!is_array($_array))
        {
            return false;
        }

        // create new array with fail status
        $new_array = [
            'success' => false,
            'data'    => $_array
        ];

        return $new_array;
    }



}