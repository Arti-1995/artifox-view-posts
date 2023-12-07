<?php


namespace artifox\ViewPosts\Modules;


use artifox\ViewPosts\Interfaces\ShortcodeInterface;
use artifox\ViewPosts\Shortcodes\ViewPosts;


class Shortcode implements \artifox\ViewPosts\Interfaces\ModuleInterface
{

    public function init(): void
    {
        $this->initShortcode(ViewPosts::class);
    }

    /**
     * @param ShortcodeInterface $shortcode
     */
    private function initShortcode($shortcode)
    {
        $instance = new $shortcode;

        add_shortcode($instance->getShortcodeName(), [$instance, 'render']);
    }
}