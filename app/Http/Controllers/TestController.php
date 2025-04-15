<?php

namespace App\Http\Controllers;

use Core\Controller;

class TestController extends Controller
{

    public function index()
    {
        view('test.view.php', [
            "errros" => [],
        ]);
    }

    public function store()
    {

        $data = [
            "name" => $this->getInput("name"),
            "email" => $this->getInput("email"),
        ];

        $errors = $this->validate($data, [
            "name" => "required|min:5",
            "email" => "required|email",
        ]);

        if (!empty($errors)) {
            view('test.view.php', [
                "errors" => $errors,
            ]);
        }
    }
}
