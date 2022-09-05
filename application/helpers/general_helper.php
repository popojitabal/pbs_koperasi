<?php

function render($pageContent = "", $data = [])
{
    $CI = &get_instance();
    $data['page_content'] = $pageContent;
    $data['tag'] = isset($CI->session->tag) ? $CI->session->tag : 'homepage'; 
    $CI->load->view('layouts/v_base_layout', $data);
}

function navItems() {
    
    return $navItem = [
        [
            "url" => base_url(''),
            "tag" => "homepage",
            "name" => "Beranda",
            "icon" => null,
            "nav" => true
        ],
        [
            "url" => base_url('pembelian/c_pembelian'),
            "tag" => "pembelian",
            "name" => "Pembelian",
            "icon" => base_url('/assets/img/pembelian.jpg'),
            "nav" => true
        ],
        [
            "url" => base_url('pembayaran/c_pembayaran'),
            "tag" => "pembayaran",
            "name" => "Pembayaran",
            "icon" => base_url('/assets/img/pembayaran.jpg'),
            "nav" => true
        ],
        [
            "url" => base_url('pinjaman/c_pinjaman'),
            "tag" => "pinjaman",
            "name" => "Pinjaman",
            "icon" => base_url('/assets/img/pinjaman.jpg'),
            "nav" => true
        ],
        [
            "url" => base_url('laporan/c_laporan'),
            "tag" => "laporan",
            "name" => "Laporan",
            "icon" => base_url('/assets/img/laporan.jpg'),
            "nav" => true
        ],
        [
            "url" => base_url('master/c_master'),
            "tag" => "master",
            "name" => "Master",
            "icon" => base_url('/assets/img/master.jpg'),
            "nav" => false
        ],
    ];
}
