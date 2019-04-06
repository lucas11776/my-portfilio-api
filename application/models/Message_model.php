<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model
{

    /**
     * Check If Message Id Is An Integer
     * 
     * @param integer message_id
     * @return boolean 
    */
    public function message_id_not_integer($message_id = NULL)
    {
        return !is_numeric($message_id);
    }

    /**
     * Store Sent Message To DB
     * 
     * @param array message
     * @return boolean
    */
    public function store_message($message = NULL)
    {
        // check message is typeof array
        if(!is_array($message))
        {
            return false;
        }

        $data = [
            'seen'    => 0, // set message to not seen initially ( 0 => not seen, 1 => seen )
            'name'    => $message['name']    ?? '',
            'email'   => $message['email']   ?? '',
            'subject' => $message['subject'] ?? '',
            'message' => $message['message'] ?? ''
        ];

        return $this->db->insert('messages', $data);
    }

    /**
     * Get The Message 
     * 
     * @param integer message_id
     * @return array
    */
    public function get_message($message_id = NULL)
    {
        // check if message_id is integer
        if($this->message_id_not_integer($message_id)){
            return false;
        }

        $this->db->where('message_id', $message_id);

        return $this->db->get('messages')->result_array() ?? false;
    }

    /**
     * Set Message to Seen
     * 
     * @param integer message_id
     * @return boolean
    */
    public function set_message_seen($message_id = NULL)
    {
        // check if message_id is integer
        if($this->message_id_not_integer($message_id)){
            return false;
        }

        $this->db->where('message_id', $message_id);
        
        return $this->db->update('messages', ['seen' => 1]);
    }

    /**
     * Delete Message
     * 
     * @param integer message_id
     * @return boolean
    */
    public function delete_message($message_id = NULL)
    {
        // check if message_id is integer
        if($this->message_id_not_integer($message_id)){
            return false;
        }        

        return $this->db->delete('messages', ['message_id' => $message_id]);
    }
    
}
