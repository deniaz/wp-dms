<?php

namespace Deniaz\WordPress\Dms\Rewrite;

use Deniaz\WordPress\Dms\DomainPostPair;

class PostRewrite
{
    protected $domainPostPair;

    protected  $queryArgs;

    public function __construct(DomainPostPair $domainPostPair)
    {
        $this->domainPostPair = $domainPostPair;
    }

    public function rewrite()
    {
        $this->changeQuery();
    }

    // @TODO: Change some other global stuff? See WPMUDEV Domain Map Plugin
    private function changeQuery()
    {
        query_posts(
            $this->getQueryArgs()
        );
    }

    protected function getQueryArgs()
    {
        if (!isset($this->queryArgs)) {
            $this->queryArgs = array(
                'post_type' => strtolower($this->domainPostPair->getPostType()),
                'p'         => $this->domainPostPair->getPostID()
            );
        }

        return $this->queryArgs;
    }
}