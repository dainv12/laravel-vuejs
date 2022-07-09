<?php

use Dcore\Blog\Repositories\Interfaces\PostInterface;

{
    if (!function_exists('get_featured_posts')) {
        /**
         * @param int $limit
         * @param array $with
         * @return \Illuminate\Support\Collection
         */
        function get_featured_posts($limit, array $with = [], $offset = 0)
        {
            return app(PostInterface::class)->getFeatured($limit, $with, $offset);
        }
    }
}

