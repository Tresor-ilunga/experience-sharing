<?php

declare(strict_types=1);

namespace Infrastructure\Link\Symfony\Controller;

use Domain\Link\Entity\Link;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

/**
 * Class LinkController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[Route('/link', name: 'app_link_')] // app_link_
final class LinkController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('domain/link/index.html.twig');
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        return $this->render('domain/link/new.html.twig');
    }

    #[Route('/{id}', name: 'show', requirements: ['id' => Requirement::UUID], methods: ['GET'])]
    public function show(Link $link): Response
    {
        return $this->render('domain/link/show.html.twig');
    }

    #[Route('/edit/{id}', name: 'edit', requirements: ['id' => Requirement::UUID], methods: ['GET', 'POST'])]
    public function edit(Link $link, Request $request): Response
    {
        return $this->render('domain/link/edit.html.twig');
    }

    #[Route('/delete/{id}', name: 'delete', requirements: ['id' => Requirement::UUID], methods: ['DELETE'])]
    public function delete(Link $link, Request $request): Response
    {
        return $this->redirectToRoute('app_link_index');
    }
}