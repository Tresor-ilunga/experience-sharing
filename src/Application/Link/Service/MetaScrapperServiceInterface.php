<?php

declare(strict_types=1);

namespace Application\Link\Service;

use Domain\Link\ValueObject\LinkMeta;

/**
 * interface MetaScrapperService.
 *
 * @author Trésor-ILUNGA <ilungat82@gmail.com>
 */
interface MetaScrapperServiceInterface
{
    /**
     * @param string $url
     * @return LinkMeta|null
     */
   public function getMeta(string $url): ?LinkMeta;
}
