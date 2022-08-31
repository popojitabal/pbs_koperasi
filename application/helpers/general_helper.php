<?php

function render($pageContent = "", $data = [])
{
    $CI = &get_instance();
    $data['page_content'] = $pageContent;
    $data['tag'] = isset($CI->session->tag) ? $CI->session->tag : 'homepage'; 
    $CI->load->view('layouts/v_base_layout', $data);
}