<?php
/**
 * Domain Post Map
 *
 * Maps Domains to Posts.
 *
 * @since 1.4
 *
 * @package Deniaz\WordPress\Dms
 */
namespace Deniaz\WordPress\Dms;

class DomainPostMap implements DomainPostMapInterface
{

    const DMS_OPTION_KEY = 'dms_map';

    /**
     * Domain Post Info.
     *
     * Maps Domains to Posts.
     *
     * @since 1.4
     * @access private
     * @var Array $map Domain and Post Info.
     */
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
        if (($settings = get_option(self::DMS_OPTION_KEY)) !== false) {
            parse_str($settings, $map);

            foreach ($map as $key => $value) {
                // Domains are stored as example_com instead of example.com because of compatibility issues
                $domain = str_replace('_', '.', $key);

                $domainPostPair = new DomainPostPair();
                $domainPostPair->setDomain($domain);
                $domainPostPair->setPostID($value);

                $this->map[$domain] = $domainPostPair;
            }
        }

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