<?php
namespace Framework;

class Render {

    public static function HTML(string $html): void {
        echo $html;
    }

    public static function withTemplate(string $view, callable $template): void {
        call_user_func($template, $view);
    }

}
