<?php


namespace artifox\ViewPosts\Modules;


class Assets implements \artifox\ViewPosts\Interfaces\ModuleInterface
{
    /**
     * @var array
     */
    private array $adminStyles = [];

    /**
     * @var array
     */
    private array $publicStyles = [];

    /**
     * @var array
     */
    private array $adminScripts = [];

    /**
     * @var array
     */
    private array $publicScripts = [];

    /**
     * Assets constructor.
     */
    public function __construct()
    {
        $this->publicStyles = [
            ['handle' => 'all', 'src' => '/assets/dist/css/all.css', 'deps' => [], 'ver' => ARTIFOX_VIEW_POSTS_VERSION],
        ];

        $this->publicScripts = [
            ['handle' => 'main_script', 'src' => '/assets/dist/js/script.js', 'deps' => [], 'ver' => ARTIFOX_VIEW_POSTS_VERSION]
        ];
    }

    /**
     * @inheritDoc
     */
    public function init() : void
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueuePublicStyles']);
        add_action('wp_enqueue_scripts', [$this, 'enqueuePublicScripts']);
        add_action('wp_enqueue_scripts', [$this, 'localizeScript']);
    }

    public function enqueuePublicStyles()
    {
        foreach ($this->publicStyles as $style) {
            wp_enqueue_style(
                ARTIFOX_VIEW_POSTS_PREFIX . $style['handle'] . '_public',
                ARTIFOX_VIEW_POSTS_URL . $style['src'],
                $style['deps'],
                $style['ver']
            );
        }
    }

    public function enqueuePublicScripts() {
        foreach ($this->publicScripts as $script) {
            wp_enqueue_script(
                ARTIFOX_VIEW_POSTS_PREFIX . $script['handle'] . '_public',
                (isset($script['external']) ? '' : ARTIFOX_VIEW_POSTS_URL) . $script['src'],
                $script['deps'],
                $script['ver'],
                isset($script['in_footer']) ? $script['in_footer'] : true
            );
        }
    }

    public function localizeScript()
    {
        wp_localize_script(ARTIFOX_VIEW_POSTS_PREFIX . 'main_script' . '_public', 'artifox_view_posts_global',
            [
                'ajax' => [
                    'url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce(ARTIFOX_VIEW_POSTS_NONCE)
                ]
            ]
        );
    }
}