<?php


namespace artifox\ViewPosts\Modules;


use artifox\ViewPosts\Helpers\View;

class Footer implements \artifox\ViewPosts\Interfaces\ModuleInterface
{

    public function init(): void
    {
        add_action('wp_footer', [$this, 'addPopupHtml']);
    }

    public function addPopupHtml()
    {
        echo View::render('popup');
    }
}