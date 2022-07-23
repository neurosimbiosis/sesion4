<?php

namespace App\Controller\Cliente;

use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Representa eliminación de datos en el servidor
 * HTTP Method: DELETE
 * HTTP Status Code: 204, 404
 */
class DeleteController extends AbstractController
{
    /** @required */
    public ClienteRepository $clienteRepository;

    public function __invoke(Request $request, string $id): Response
    {
        $cliente = $this->clienteRepository->find($id);

        if (!$cliente) {
            throw new NotFoundHttpException();
        }

        if ($this->isCsrfTokenValid('delete'.$cliente->getId(), $request->request->get('_token'))) {
            $this->clienteRepository->remove($cliente, true);
        }

        return $this->redirectToRoute('app_cliente_index', [], Response::HTTP_SEE_OTHER);
    }
}
