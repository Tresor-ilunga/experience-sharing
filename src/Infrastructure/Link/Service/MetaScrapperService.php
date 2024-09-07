<?php

declare(strict_types=1);

namespace Infrastructure\Link\Service;

use Application\Link\Service\MetaScrapperServiceInterface;
use Domain\Link\ValueObject\LinkMeta;
use Embed\Embed;

/**
 * class MetaScrapperService.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
final class MetaScrapperService implements MetaScrapperServiceInterface
{
    /**
     * This is the function that handles the command.
     *
     * @param string $url
     * @return LinkMeta|null
     */
    public function getMeta(string $url): ?LinkMeta
    {
        try {
            $meta = (new Embed())->get($url);
            return LinkMeta::fromArray([
                'title' => $meta->title,
                'description' => $meta->description,
                'canonical_url' => $meta->url,
                'image' => $meta->image,
                'favicon' => $meta->favicon
            ]);
        } catch (\Throwable $e) {
            return null;
        }
    }
}
