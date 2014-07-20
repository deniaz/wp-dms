<?php

namespace Deniaz\WordPress\Dms;

class DomainPostPair
{
    private $domain; // http://www.example.com
    private $postID; // 123
    private $postType;

    /**
     * @param mixed $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $postID
     */
    public function setPostID($postID)
    {
        $this->postID = $postID;
        $this->postType = ucfirst(get_post_type($postID));
    }

    /**
     * @return mixed
     */
    public function getPostID()
    {
        return $this->postID;
    }

    public function getPostType()
    {
        return $this->postType;
    }
}