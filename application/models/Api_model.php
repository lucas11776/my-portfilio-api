<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{

    /**
     * Convert PHP array to JSON string
     * 
     * @param array $_array
     * @return string
    */
    public function array_to_json($_array = NULL)
    {
        // check if _array is an array
        if(!is_array($_array))
        {
            return false;
        }

        return json_encode($_array) ?? false;
    }

    /**
     * Convert JSON string to PHP array
     * 
     * @param array $_json
     * @return array
    */
    public function json_to_array($_json = NULL)
    {
        // check if _json is an string
        if(!is_string($_json))
        {
            return false;
        }

        return json_decode($_json, true) ?? false;
    }

    /**
     * Return JSON string
     * 
     * @param array $_value
     * @return string
    */
    public function api_response($_value)
    {
        // check if _value is array
        if(is_array($_value))
        {
            $_value = $this->array_to_json($_value);
        }

        // check if _value is a string
        if(is_string($_value))
        {
            // decode json string
            $tmp_array = $this->json_to_array($_value);

            if($tmp_array == false)
            {
                return false;
            }

        }

        // check if _value not a string
        if(!is_string($_value))
        {
            return false;
        }

        return $_value;
    }

}