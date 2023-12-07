<?php


namespace artifox\ViewPosts\Helpers;


class View
{
    /**
     * @param string $view
     * @param array $data
     *
     * @return false|string
     */
    public static function render($view, $data = [])
    {
        $fileName = $view . '.php';

        ob_start();
        extract( $data );
        include $fileName;
        $output = ob_get_clean();

        return $output;
    }
}