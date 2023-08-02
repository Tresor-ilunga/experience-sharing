<?php

declare(strict_types=1);

namespace Application\Link\Service;

use Domain\Link\ValueObject\LinkMeta;

/**
 * interface MetaScrapperService.
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
interface MetaScrapperServiceInterface
{
   public function getMeta(string $url): ?LinkMeta;
}
