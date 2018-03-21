<?php

$this->load->view("app/parse/header");
$this->load->view("app/parse/header-navbar");
$this->load->view("app/parse/sidebar");
$this->load->view("app/" . $root . "/" . $file);
$this->load->view("app/parse/footer");