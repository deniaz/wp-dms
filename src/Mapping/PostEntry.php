<?php

namespace Deniaz\WordPress\Dms\Mapping;

/**
 * Class PostEntry
 * @package Deniaz\WordPress\Dms\Mapping
 */
class PostEntry extends AbstractEntry
{
    protected $postType;

    public function __construct($domain, $id, $postType = 'post')
    {
        parent::__construct($domain, $id);
        $this->postType = $postType;
    }

    /**
     * @return string
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * @param string $postType
     */
    public function setPostType($postType)
    {
        $this->postType = $postType;
    }

    /**
     * {@inheritdoc}
     */
    public function rewrite()
    {
        query_posts(
            array_merge_recursive(
                $this->defaultArgs,
                [
                    'post_type' => $this->postType,
                    'p'         => $this->id
                ]
            )
        );
    }
}
