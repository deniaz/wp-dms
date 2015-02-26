<?php

namespace Deniaz\WordPress\Dms\Mapping;

/**
 * Class AbstractEntry
 * @package Deniaz\WordPress\Dms\Mapping
 */
abstract class AbstractEntry implements EntryInterface
{
    /**
     * @var
     */
    protected $domain;
    /**
     * @var
     */
    protected $id;

    /**
     * @var array
     */
    protected $defaultArgs = ['update_post_meta_cache' => true];

    /**
     * @param $domain
     * @param $id
     */
    public function __construct($domain, $id)
    {
        $this->domain = $domain;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
