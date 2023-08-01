<?php

declare(strict_types=1);

namespace Infrastructure\Link\Symfony\Controller;

use Application\Link\Command\CreateLinkCommand;
use Domain\Link\Entity\Link;
use Domain\Link\Repository\LinkRepositoryInterface;
use Infrastructure\Link\Symfony\Form\CreateLinkForm;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
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
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    #[Route('', name: 'index', methods: ['GET'])]
    public function index(LinkRepositoryInterface $repository, PaginatorInterface $paginator, Request $request): Response
    {
        return $this->render('domain/link/index.html.twig');
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $command = new CreateLinkCommand();
        $form = $this->createForm(CreateLinkForm::class, $command)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->commandBus->dispatch($command);
            return $this->redirectToRoute('app_link_index');
        }

        return $this->render(
            view: 'domain/link/new.html.twig',
            parameters: [
                'form' => $form
            ]
        );
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