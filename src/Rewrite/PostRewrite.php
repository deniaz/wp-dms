<?php

namespace Deniaz\WordPress\Dms\Rewrite;

class PostRewrite
{
    protected $domainPostPair;

    protected  $queryArgs;

    protected $defaultArgs = array(
        'update_post_meta_cache' => true
    );

    public function __construct(\stdClass $pair)
    {
        $this->domainPostPair = $pair;
    }

    public function rewrite()
    {
        $this->changeQuery();
    }

    // @TODO: Change some other global stuff? See WPMUDEV Domain Map Plugin
    // @TODO: Set posts_per_page (https://github.com/danielbachhuber/wp-dev-docs/blob/master/performance/wp-query-tips.md)
    private function changeQuery()
    {
        query_posts(
            array_merge_recursive($this->defaultArgs, $this->getQueryArgs())
        );
    }

    protected function getQueryArgs()
    {
        if (!isset($this->queryArgs)) {
            $this->queryArgs = array(
                'post_type' => strtolower($this->domainPostPair->type),
                'p'         => $this->domainPostPair->id
            );
        }

        return $this->queryArgs;
    }
}