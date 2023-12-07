<?php


namespace artifox\ViewPosts\Shortcodes;


class ViewPosts extends \artifox\ViewPosts\Core\Shortcode
{
    public function __construct()
    {
        $this->shortcodeName = 'view-posts';
    }

    public function setData( array $atts = [], string $content = '' ): array
    {
        return [
            'test' => 123
        ];
    }
}