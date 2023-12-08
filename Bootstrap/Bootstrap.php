<?php


namespace artifox\ViewPosts\Bootstrap;


use artifox\ViewPosts\Interfaces\ModuleInterface;
use artifox\ViewPosts\Modules\Assets;
use artifox\ViewPosts\Modules\Footer;
use artifox\ViewPosts\Modules\Shortcode;


class Bootstrap
{
    private static ?Bootstrap $instance = null;

    /**
     * @var array|ModuleInterface
     */
    private array $modules = [];

    public static function instance(): Bootstrap {
        if ( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function init(): void {
        $this->initModule(Assets::class);
        $this->initModule(Shortcode::class);
        $this->initModule(Footer::class);
    }

    /**
     * @param ModuleInterface $module
     */
    private function initModule( $module ) : void
    {
        $instance = new $module();
        $instance->init();

        $this->modules[$module] = $instance;
    }
}