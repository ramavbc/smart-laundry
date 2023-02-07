<?php

function cek_user() {
    $ci = get_instance();
	
    $level = $ci->session->userdata('level');
    if ($level != 1) {
        $ci->session->set_flashdata('flash', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Akses Denied!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/dashboard');
    }
}

?>