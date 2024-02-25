<?php

namespace App\Controllers;

class Controller {
    public function view($route, $data = [])
    {

        // Destructurar el array para que las claves se conviertan en variables
        extract($data);

        $route = str_replace('.', '/', $route);
        
        if (file_exists("../resources/views/$route.php")) {
            
            ob_start();           
            include "../resources/views/$route.php";
            $content = ob_get_clean();

            return $content;
        } else {
            return 'Error 404. No se encontró la vista';
        }
    }

    public function redirect($route)
    {
        header('Location: ' . $route);
    }
}