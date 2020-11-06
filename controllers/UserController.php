<?php
namespace Controllers;
use Framework\Request;

class UserController {

    public function Login(Request $request): void {
        echo json_encode($request->getBody());
    }

    public function Register(Request $request): void {
        echo json_encode($request->getBody());
    }

}
