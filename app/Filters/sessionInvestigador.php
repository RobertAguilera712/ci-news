<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class sessionInvestigador implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('usuario')) {
            return redirect()->to('/login'); // Redirect to the login page
        }
        
        $allowedRoles = ['administrador', 'investigador'];

        $userRole = session()->get('usuario');
        
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->to(base_url('/estudios'));
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
