<?php

declare(strict_types=1);

namespace Infrastructure\Authentication\Symfony\Controller;

use Application\Authentication\Command\LoginCommand;
use Infrastructure\Authentication\Symfony\Form\LoginForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class LoginFormController
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final class LoginFormController extends AbstractController
{

    /**
     * This method is used to display the login form
     *
     * @param AuthenticationUtils $utils
     * @return Response
     */
    #[Route('/login', name: 'authentication_login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $utils): Response
    {
        $error = $utils->getLastAuthenticationError();
        $command = new LoginCommand();

        if ($error !== null) {
            $command->identifier = $utils->getLastUsername();
            $this->addFlash('error', $error->getMessage());
        }

        $form = $this->createForm(LoginForm::class, $command);
        return $this->render(
            view: 'domain/authentication/login.html.twig',
            parameters: [
                'form' => $form
            ]
        );
    }


    /**
     * This method is used to logout
     *
     * @return void
     */
    #[Route('/logout', name: 'authentication_logout', methods: ['GET'])]
    public function logout()
    {
    }
}