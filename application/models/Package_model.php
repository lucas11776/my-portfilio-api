<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_model extends CI_Model {

    /**
     * Monthly plan packages
    */
    public const PACKAGES = [
        'basic', 'standard', 'premium'
    ];

    /**
     * Store Package Application To Database
     * 
     * @param array application
     * @return boolean
    */
    public function apply_package($application = [])
    {
        $application = [
            'seen'    => 0, // set application to unseen
            'name'    => $application['name']    ?? '',
            'email'   => $application['email']   ?? '',
            'package' => $application['package'] ?? ''
        ];

        return $this->db->insert('package_applications', $application);
    }


}