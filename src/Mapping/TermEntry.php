<?php

namespace Deniaz\WordPress\Dms\Mapping;

/**
 * Class TermEntry
 * @package Deniaz\WordPress\Dms\Mapping
 */
class TermEntry extends AbstractEntry
{
    /**
     * @var
     */
    private $postType;

    /**
     * @var
     */
    private $taxonomy;

    /**
     * @var
     */
    private $field;

    /**
     * @param $domain
     * @param $id
     * @param $postType
     * @param $taxonomy
     * @param $field
     */
    public function __construct($domain, $id, $postType, $taxonomy, $field)
    {
        parent::__construct(
            $domain,
            $id
        );

        $this->postType = $postType;

        $this->taxonomy = $taxonomy;

        $this->field = $field;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param mixed $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * @return mixed
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * @param mixed $taxonomy
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    }

    /**
     * @return mixed
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * @param mixed $postType
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
                    'tax_query' => [
                        [
                            'taxonomy' => $this->taxonomy,
                            'field'    => $this->field,
                            'terms'    => $this->id
                        ]
                    ]
                ]
            )
        );
    }
}
