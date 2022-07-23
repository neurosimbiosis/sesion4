<?php

namespace App\Controller\Cliente;

use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /** @required */
    public ClienteRepository $clienteRepository;

    public function __invoke(Request $request): Response
    {
        $clientes = $this->clienteRepository->findAll();

        return $this->render('cliente/index.html.twig', [
            'clientes' => $clientes,
        ]);
    }
}
