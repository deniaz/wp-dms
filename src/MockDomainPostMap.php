<?php
/**
 * Domain Post Map
 *
 * Maps Domains to Posts.
 *
 * @since 1.4
 *
 * @package Deniaz\Dms
 */
namespace Deniaz\WordPress\Dms;

class MockDomainPostMap implements DomainPostMapInterface
{
    private $map = array();

    /**
     * DomainPostMap Constructor.
     *
     * Populates the map with information retrieved from the DB.
     *
     * @since 1.4
     * @return DomainPostMap
     */
    public function __construct()
    {
        $exampleCom = new DomainPostPair();
        $exampleCom->setDomain('example.com');
        $exampleCom->setPostID(4);
        $this->map['example.com'] = $exampleCom;

        $exampleOrg = new DomainPostPair();
        $exampleOrg->setDomain('example.org');
        $exampleOrg->setPostID(6);
        $this->map['example.org'] = $exampleOrg;

    }

    /**
     * Returns if the map contains the key.
     *
     * @since 1.4
     * @param mixed $key Object Key
     * @return bool
     */
    public function has($key) {
        return isset($this->map[$key]);
    }

    /**
     * Returns value to the key.
     *
     * @since 1.4
     * @param mixed $key Object Key
     * @return mixed
     */
    public function get($key) {
        return $this->map[$key];
    }
}