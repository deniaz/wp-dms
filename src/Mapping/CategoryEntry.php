<?php

namespace Deniaz\WordPress\Dms\Mapping;

/**
 * Class CategoryEntry
 * @package Deniaz\WordPress\Dms\Mapping
 */
class CategoryEntry extends AbstractEntry
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
                    'cat' => $this->id
                ]
            )
        );
    }
}
