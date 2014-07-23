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
namespace Deniaz\WordPress\Dms\Model\Maps;

class MockDomainEntityMap implements DomainEntityMapInterface
{
    private $map = [];

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
        $page = new \stdClass();
        $page->domain = 'example.com';
        $page->id = 4;
        $page->type = 'Page';
        $this->map['example.com'] = $page;

        $post = new \stdClass();
        $post->domain = 'example.org';
        $post->id = 9;
        $post->type = 'Post';
        $this->map['example.org'] = $post;

        $category = new \stdClass();
        $category->domain = 'category.example.com';
        $category->id = 2;
        $category->type = 'Category';
        $this->map['category.example.com'] = $category;

        $movie = new \stdClass();
        $movie->domain = 'starwars.example.org';
        $movie->id = 11;
        $movie->type = 'Movie';
        $this->map['starwars.example.org'] = $movie;

        $disney = new \stdClass();
        $disney->domain = 'disney.example.org';
        $disney->id = 3;
        $disney->type = 'Term';
        $disney->taxonomy = 'producers';
        $this->map['disney.example.org'] = $disney;
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