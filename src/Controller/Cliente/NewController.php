<?php

namespace App\Controller\Cliente;

use App\Entity\Cliente;
use App\Form\ClienteType;
use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Representa creación de datos en el servidor
 * HTTP Method: POST
 * HTTP Status Code: 201, 400
 */
class NewController extends AbstractController
{
    /** @required */
    public ClienteRepository $clienteRepository;

    public function __invoke(Request $request): Response
    {
        $cliente = new Cliente();

        $form = $this->createForm(ClienteType::class, $cliente);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->clienteRepository->add($cliente, true);

            return $this->redirectToRoute('app_cliente_edit', [
                    'id' => $cliente->getId(),
                ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cliente/new.html.twig', [
            'cliente' => $cliente,
            'form' => $form,
        ]);
    }
}
