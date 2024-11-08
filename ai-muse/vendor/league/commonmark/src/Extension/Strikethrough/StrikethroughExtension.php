<?php

declare(strict_types=1);

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com> and uAfrica.com (http://uafrica.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AIMuseVendor\League\CommonMark\Extension\Strikethrough;

use AIMuseVendor\League\CommonMark\Environment\EnvironmentBuilderInterface;
use AIMuseVendor\League\CommonMark\Extension\ExtensionInterface;

final class StrikethroughExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addDelimiterProcessor(new StrikethroughDelimiterProcessor());
        $environment->addRenderer(Strikethrough::class, new StrikethroughRenderer());
    }
}
