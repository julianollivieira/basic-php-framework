<?php
namespace Controllers;
use Framework\Request;

class UserController {

    public static function Login(Request $request): void {
        echo json_encode($request->getBody());
    }

    public static function Register(Request $request): void {
        echo json_encode($request->getBody());
    }

}
