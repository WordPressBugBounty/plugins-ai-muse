<?php

declare(strict_types=1);

/*
 * This is part of the league/commonmark package.
 *
 * (c) Martin Hasoň <martin.hason@gmail.com>
 * (c) Webuni s.r.o. <info@webuni.cz>
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AIMuseVendor\League\CommonMark\Extension\Table;

use AIMuseVendor\League\CommonMark\Node\Node;
use AIMuseVendor\League\CommonMark\Renderer\ChildNodeRendererInterface;
use AIMuseVendor\League\CommonMark\Renderer\NodeRendererInterface;
use AIMuseVendor\League\CommonMark\Util\HtmlElement;
use AIMuseVendor\League\CommonMark\Xml\XmlNodeRendererInterface;

final class TableRowRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param TableRow $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        TableRow::assertInstanceOf($node);

        $attrs = $node->data->get('attributes');

        $separator = $childRenderer->getInnerSeparator();

        return new HtmlElement('tr', $attrs, $separator . $childRenderer->renderNodes($node->children()) . $separator);
    }

    public function getXmlTagName(Node $node): string
    {
        return 'table_row';
    }

    /**
     * {@inheritDoc}
     */
    public function getXmlAttributes(Node $node): array
    {
        return [];
    }
}
