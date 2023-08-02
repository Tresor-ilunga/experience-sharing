<?php

declare(strict_types=1);

namespace Infrastructure\Shared\Symfony\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class IconExtension.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
final class IconExtension extends AbstractExtension
{
    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('icon', [$this, 'icon'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('icon', [$this, 'icon'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param string $name
     * @return string
     */
    public function icon(string $name): string
    {
        return <<< HTML
            <em class="icon ni ni-{$name}" aria-label="icon {$name}" role="img"></em>
        HTML;
    }
}