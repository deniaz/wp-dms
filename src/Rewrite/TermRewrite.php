<?php

namespace Deniaz\WordPress\Dms\Rewrite;

class TermRewrite extends PostRewrite
{
    protected function getQueryArgs()
    {
        if (!isset($this->queryArgs)) {

            $this->queryArgs = array(
                'post_type' => 'movie',
                'tax_query' => array(
                    array(
                        'taxonomy' => strtolower($this->domainPostPair->taxonomy),
                        'field' => 'term_id',
                        'terms' => $this->domainPostPair->id
                    )
                )
            );
        }

        return $this->queryArgs;
    }
}