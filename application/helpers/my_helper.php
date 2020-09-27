<?php

function is_logged_in()
{

    $obj = get_instance();
    if (!$obj->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $obj->session->userdata('role_id');
        $menu = $obj->uri->segment(1);

        $qmenu = $obj->db->get_where('menu', ['menu' => $menu])->row_array();
        $menu_id = $qmenu['menu_id'];

        $access = $obj->db->get_where('access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($access->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
