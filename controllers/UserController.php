<?php
namespace Controllers;

class UserController {

    public static function Login(): void {
        echo json_encode([
            'status' => 'success',
            'message' => 'Sucessfully logged in'
        ]);
    }

    public static function Register(): void {
      echo json_encode([
          'status' => 'success',
          'message' => 'Sucessfully registered'
      ]);
    }

}
