<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '\vendor\autoload.php';
    
    $galery_url = "images";
    $img_err = [];

    if($handle = opendir($galery_url)){

        while(false !== ($file = readdir($handle))) {
            if($file != "." && $file != ".."){
                $name = preg_replace('(\.[a-z]*)', '', $file);
                $img_err += [$name => $file];
            }
        }
    }

    $template = $_GET['id'] ? 'detail.twig.html' : 'home.twig.html';
    $data = $_GET['id'] ? ['img' => $_GET] : ['img_err' => $img_err];

    try {
        $loader = new FilesystemLoader('../templates'); 
        $twig = new Environment($loader); 
        echo $twig->render($template, $data);	 
    } catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
    }

?>