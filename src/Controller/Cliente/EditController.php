<?php

namespace App\Controller\Cliente;

use App\Form\ClienteType;
use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Representa actualización de datos en el servidor
 * HTTP Method: PUT
 * HTTP Status Code: 200, 400, 404
 */
class EditController extends AbstractController
{
    /** @required */
    public ClienteRepository $clienteRepository;

    public function __invoke(Request $request, string $id): Response
    {
        $cliente = $this->clienteRepository->find($id);

        if (!$cliente) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(ClienteType::class, $cliente);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->clienteRepository->add($cliente, true);

            return $this->redirectToRoute('app_cliente_edit', [
                'id' => $cliente->getId(),
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cliente/edit.html.twig', [
            'cliente' => $cliente,
            'form' => $form,
        ]);
    }
}
