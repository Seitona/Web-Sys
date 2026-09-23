<?php 
 
namespace App\Controllers; 
 
class Services extends BaseController 
{ 
    public function index(): string 
    { 
        $data = [ 
            'title' => 'Our Services - PowerFlow Electric', 
            'page' => 'services' 
        ]; 
         
        return view('services', $data); 
    } 
}

