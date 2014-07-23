<?php

namespace Deniaz\WordPress\Dms\Rewrite;

class CategoryRewrite extends PostRewrite
{

    protected function getQueryArgs()
    {
        if (!isset($this->queryArgs)) {
            $this->queryArgs = array(
                'cat' => $this->domainPostPair->id
            );
        }

        return $this->queryArgs;
    }
}