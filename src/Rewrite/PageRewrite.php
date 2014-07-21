<?php

namespace Deniaz\WordPress\Dms\Rewrite;

class PageRewrite extends PostRewrite
{
    protected function getQueryArgs()
    {
        if (!isset($this->queryArgs)) {
            $this->queryArgs = array(
                'page_id' => $this->domainPostPair->getPostID()
            );
        }

        return $this->queryArgs;
    }
}