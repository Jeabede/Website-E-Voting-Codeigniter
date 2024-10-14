<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KandidatEventVote extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, helper, dan library yang dibutuhkan
        $this->load->model('KandidatEventVoteModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
}