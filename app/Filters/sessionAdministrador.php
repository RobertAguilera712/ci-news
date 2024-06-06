<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class sessionAdministrador implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('usuario')) {
            return redirect()->to('/login'); // Redirect to the login page
        }
        
        $allowedRoles = ['administrador'];

        $userRole = session()->get('usuario');
        
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->to(base_url('/acceso-denegado'));
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}