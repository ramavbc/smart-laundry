<?php 
include('header.php');


if(!defined('BASEPATH')) exit ('No direct script access allowed');
if($content){$this->load->view($content);};



include('footer.php');
?>

<style>
    .bg-login-image {
        background-image: url("<?= base_url('assets/img/finance_0bdk.svg'); ?>");
        background-repeat: no-repeat;
        background-size: 90%;
    }
</style>