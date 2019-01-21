<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dompdf_gen
{
    public function __construct()
    {
        require_once APPPATH. 'third_party/dompdf/lib/html5lib/Parser.php';
        require_once APPPATH. 'third_party/dompdf/src/Autoloader.php';
        Dompdf\Autoloader::register();
    }
}