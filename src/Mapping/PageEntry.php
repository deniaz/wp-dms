<?php

namespace Deniaz\WordPress\Dms\Mapping;

/**
 * Class PageEntry
 * @package Deniaz\WordPress\Dms\Mapping
 */
class PageEntry extends AbstractEntry
{
    /**
     * {@inheritdoc}
     */
    public function rewrite()
    {
        query_posts(
            array_merge_recursive(
                $this->defaultArgs,
                [
                    'page_id' => $this->id
                ]
            )
        );
    }
}
