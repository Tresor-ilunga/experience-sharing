<?php

declare(strict_types=1);

namespace Infrastructure\Authentication\Symfony\Authenticator;

use Domain\Authentication\Repository\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Class LoginFormAuthenticator
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    private ?UserInterface $user = null;

    /**
     * This method is called on every request, and its job is to read the token
     *
     * @param UrlGeneratorInterface $urlGenerator
     * @param UserRepositoryInterface $repository
     */
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly UserRepositoryInterface $repository
    ) {}


    /**
     * This method is called when authentication is needed, but it's not sent
     *
     * @param Request $request
     * @return string
     */
    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate('authentication_login');
    }

    /**
     * This method is called on every request, and your job is to read the token
     *
     * @param Request $request
     * @return Passport
     */
    public function authenticate(Request $request): Passport
    {
        $identifier = (string) $request->request->get('identifier', '');
        $password = (string) $request->request->get('password', '');
        $csrf = (string) $request->request->get('_token', '');

        $passport = new Passport(
            userBadge: new UserBadge(
                userIdentifier: $identifier,
                userLoader: fn (string $identifier) => $this->repository->findOneByEmail($identifier)
            ),
            credentials: new PasswordCredentials($password),
            badges: [
                new CsrfTokenBadge('authenticate', $csrf),
                new RememberMeBadge()
            ]
        );

        $this->user = $this->createToken($passport, 'main')->getUser();
        return $passport;
    }

    /**
     * This method is called when authentication executed and was successful!
     *
     * @param Request $request
     * @param TokenInterface $token
     * @param string $firewallName
     * @return Response|null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $targetPath = $this->getTargetPath($request->getSession(), $firewallName);
        if ($targetPath) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate('app_link_index'));
    }
}
