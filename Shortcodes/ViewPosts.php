<?php


namespace artifox\ViewPosts\Shortcodes;


class ViewPosts extends \artifox\ViewPosts\Core\Shortcode
{
    public function __construct()
    {
        $this->shortcodeName = 'view-posts';
    }

    protected function getPosts(array $args): array
    {
        $defaults = [
            'posts_per_page'    => -1,
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'date_query'        => [
                [
                    'after'     => '',
                    'before'    => ''
                ]
            ]
        ];
        $args = wp_parse_args($args, $defaults);
        $posts = [];

        $query = new \WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                array_push($posts, [
                    'title'         => get_the_title(),
                    'date'          => get_the_date('d.m.Y'),
                    'image'         => get_the_post_thumbnail_url(get_the_ID()),
                    'permalink'     => get_the_permalink(),
                    'description'   => get_the_excerpt()
                ]);
            }
        }

        wp_reset_postdata();

        return $posts;
    }

    public function setData( array $atts = [], string $content = '' ): array
    {
        $dateQuery = [
            [
                'after' => '',
                'before' => ''
            ]
        ];

        if (isset($atts['start_date'])) $dateQuery[0]['after'] = date('Y-m-d', strtotime($atts['start_date']));
        if (isset($atts['end_date'])) $dateQuery[0]['before'] = date('Y-m-d', strtotime($atts['end_date']));

        return $this->getPosts([ 'date_query' => $dateQuery ]);
    }
}