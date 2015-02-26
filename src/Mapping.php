<?php

namespace Deniaz\WordPress\Dms;

use Deniaz\WordPress\Dms\Mapping\CategoryEntry;
use Deniaz\WordPress\Dms\Mapping\PageEntry;
use Deniaz\WordPress\Dms\Mapping\PostEntry;
use Deniaz\WordPress\Dms\Mapping\TermEntry;

/**
 * Class Mapping
 * @package Deniaz\WordPress\Dms
 */
class Mapping implements Mapping\MappingInterface, \IteratorAggregate
{
    /**
     * @var array
     */
    private $data = [];

    private $entryClass = [
        'post' => 'Deniaz\\WordPress\\Dms\\Mapping\\PostEntry',
        'page' => 'Deniaz\\WordPress\\Dms\\Mapping\\PageEntry'
    ];

    /**
     *
     */
    public function __construct()
    {
        $query = new \WP_Query([
            'numberposts' => -1,
            'post_type' => 'any',
            'meta_key' => 'dms_mapped_domain',
            'meta_value' => '',
            'meta_compare' => '!='
        ]);

        if ($query->have_posts()) {
            foreach ($query->posts as $post) {
                $class = 'Deniaz\\WordPress\\Dms\\Mapping\\PostEntry';
                $domain = strtolower(get_post_meta($post->ID, 'dms_mapped_domain', true));

                if (isset($this->entryClass[$post->post_type])) {
                    $class = $this->entryClass[$post->post_type];
                }

                $this->add(
                    $domain,
                    new $class(
                        $domain,
                        $post->ID,
                        $post->post_type
                    )
                );
            }
        }


        /*$this->add('local-category.io', new CategoryEntry('local-category
        .io', 3));
        $this->add(
            'local-term.io',
            new TermEntry('local-term.io', 5, 'movie', 'genre', 'term_id')
        );*/

        // @TODO: prefill
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function contains($key)
    {
        return (isset($this->data[$key]));
    }

    /**
     * @param $key
     * @param $item
     */
    public function add($key, $item)
    {
        $this->data[$key] = $item;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->data[$key];
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function remove($key)
    {
        $item = $this->data[$key];
        unset($this->data[$key]);

        return $item;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }
}
