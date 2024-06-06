<?php

namespace App\Controllers;
use App\Models\Testimonios;


class Testimonio extends BaseController
{
    public function index()
    {
        $testimoniosObj = new Testimonios();
        $testimonios = $testimoniosObj->obtenerTodosTestimonios();
        $mensaje=session('mensaje');
        return view('testimonios', [ 'mensaje'=> $mensaje, 
        'testimonios'=>$testimonios]);
    }
   
}