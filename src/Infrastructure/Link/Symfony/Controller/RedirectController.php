<?php

declare(strict_types=1);

namespace Infrastructure\Link\Symfony\Controller;

use Domain\Link\Entity\Link;
use Domain\Link\Event\LinkVisitedEvent;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RedirectController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class RedirectController extends AbstractController
{
    /**
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(
        private readonly EventDispatcherInterface $dispatcher
    ) {
    }

    /**
     * This method is responsible for redirecting the user to the original URL
     *
     * @param Request $request
     * @param Link $link
     * @return Response
     */
    #[Route('/r/{slug}', name: 'app_redirect', methods: ['GET'])]
    public function index(Request $request, Link $link): Response
    {
        $this->dispatcher->dispatch(new LinkVisitedEvent(
            ip: $request->getClientIp(),
            user_agent: strval($request->server->get('HTTP_USER_AGENT')),
            server: $request->server->all(),
            link: $link
        ));
       return new RedirectResponse($link->getUrl());
    }
}