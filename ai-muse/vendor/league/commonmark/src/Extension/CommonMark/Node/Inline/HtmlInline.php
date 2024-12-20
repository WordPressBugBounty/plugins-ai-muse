<?php

declare(strict_types=1);

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AIMuseVendor\League\CommonMark\Extension\CommonMark\Node\Inline;

use AIMuseVendor\League\CommonMark\Node\Inline\AbstractStringContainer;
use AIMuseVendor\League\CommonMark\Node\RawMarkupContainerInterface;

final class HtmlInline extends AbstractStringContainer implements RawMarkupContainerInterface
{
}
