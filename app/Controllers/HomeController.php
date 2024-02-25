<?php

namespace App\Controllers;

use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {

        $contactModel = new Contact();

        // return $contactModel->all();

        // return $contactModel->find(1);

        // return $contactModel->create([
        //     'name' => 'Yepa',
        //     'email' => 'yepa@gmail.com',
        //     'phone' => '6934567890',            
        // ]);

        // return $contactModel->update(8, [
        //     'name' => 'Juan updated 2',
        //     'email' => 'juan2@gmail.com',
        //     'phone' => '1234567890'
        // ]);

        // $contactModel->delete(8);
        // return "Eliminado correctamente";

        // return $this->view('home', [
        //     'title' => 'Página de inicio',
        //     'content' => 'Bienvenido a la página de inicio'
        // ]);
    }
}
