<?php

namespace dmleach\wellformed\models;

class Posts
{
    protected function executeQuery($parameters)
    {
        $query = new \WP_Query($parameters);
        $results = $query->get_posts();

        return $this->mapQueryResults($results);
    }

    protected function mapQueryResults($results)
    {
        $posts = array ();
        $idxPost = -1;

        foreach ($results as $result) {
            $idxPost++;
            $thumbnailId = get_post_thumbnail_id($result->ID);
            $posts [$idxPost] = array (
                'image'   => wp_get_attachment_thumb_url($thumbnailId),
                'id'      => $result->ID,
                'title'   => $result->post_title,
                'excerpt' => $result->post_excerpt,
                'content' => apply_filters('the_content', $result->post_content),
                'url'     => get_permalink($result->ID),
            );
        }

        return $posts;
    }

    public function getPageBySlug($slug)
    {
        $parameters = array (
            'post_type' => 'page',
            'pagename' => $slug,
        );

        $posts = $this->executeQuery($parameters);
        return (array_key_exists(0, $posts) ? $posts [0] : null);
    }

    public function getPostsFromLoop($count = 0)
    {
        $posts = array ();
        $idxPost = 0;

        while (
            have_posts()
            && ($idxPost < $count || $count == 0)
        ) {
            the_post();
            $thumbnailId = get_post_thumbnail_id();

            $posts [$idxPost] = array (
                'banner' => array (
                    'filepath' => wp_get_attachment_url($thumbnailId)
                ),
                'content' => apply_filters('the_content', get_the_content()),
                'title' => get_the_title(),
            );

            $idxPost++;
        }

        return $posts;
    }

    public function getRecent($count, $categories = null)
    {
        $parameters = array (
            'order'          => 'DESC',
            'orderby'        => 'date',
            'post_status'    => 'publish',
            'post_type'      => 'post',
            'posts_per_page' => $count
        );

        if (is_null($categories) == false) {
            $parameters ['category'] = $categories;
        }

        return $this->executeQuery($parameters);
    }
}
