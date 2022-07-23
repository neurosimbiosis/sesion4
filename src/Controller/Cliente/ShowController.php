<?php

namespace App\Controller\Cliente;

use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Representa obtención de datos desde el servidor al igual que IndexController
 * HTTP Method: GET
 * HTTP Status Code: 200, 404
 */
class ShowController extends AbstractController
{
    /** @required */
    public ClienteRepository $clienteRepository;

    public function __invoke(Request $request, string $id): Response
    {
        $cliente = $this->clienteRepository->find($id);

        if (!$cliente) {
            throw new NotFoundHttpException();
        }

        return $this->render('cliente/show.html.twig', [
            'cliente' => $cliente,
        ]);
    }
}
