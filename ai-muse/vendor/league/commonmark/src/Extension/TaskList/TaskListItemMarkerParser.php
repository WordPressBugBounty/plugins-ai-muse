<?php

declare(strict_types=1);

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AIMuseVendor\League\CommonMark\Extension\TaskList;

use AIMuseVendor\League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use AIMuseVendor\League\CommonMark\Node\Block\Paragraph;
use AIMuseVendor\League\CommonMark\Parser\Inline\InlineParserInterface;
use AIMuseVendor\League\CommonMark\Parser\Inline\InlineParserMatch;
use AIMuseVendor\League\CommonMark\Parser\InlineParserContext;

final class TaskListItemMarkerParser implements InlineParserInterface
{
    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::oneOf('[ ]', '[x]');
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        $container = $inlineContext->getContainer();

        // Checkbox must come at the beginning of the first paragraph of the list item
        if ($container->hasChildren() || ! ($container instanceof Paragraph && $container->parent() && $container->parent() instanceof ListItem)) {
            return false;
        }

        $cursor   = $inlineContext->getCursor();
        $oldState = $cursor->saveState();

        $cursor->advanceBy(3);

        if ($cursor->getNextNonSpaceCharacter() === null) {
            $cursor->restoreState($oldState);

            return false;
        }

        $isChecked = $inlineContext->getFullMatch() !== '[ ]';

        $container->appendChild(new TaskListItemMarker($isChecked));

        return true;
    }
}
