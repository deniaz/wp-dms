<?php

use Deniaz\WordPress\Dms\Rewrite\PostRewrite;

class RewriteTest extends WP_UnitTestCase {

    function testPostRewrite()
    {
        $rules = new stdClass();
        $rules->domain = 'example.org';
        $rules->id = 3;
        $rules->type = 'Post';

        $rewrite = new PostRewrite($rules);

        $this->assertEquals(
            array(
                'update_post_meta_cache' => true,
                'post_type' => 'post',
                'p' => 9
            ),
            $GLOBALS['wp_query']->query
        );
    }
}