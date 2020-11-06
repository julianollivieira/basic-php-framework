<?php
namespace Framework;

class Template {
    public static function Main(string $view): void {
        include('templates/header.php');
        include("views/{$view}");
        include('templates/footer.php');
    }
}
