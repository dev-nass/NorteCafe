<?php

namespace App\Http\Controllers;

use Core\Controller;

class TestController extends Controller
{

    public function index()
    {
        $this->view('test.view.php', [
            "errros" => [],
        ]);
    }

    public function show()
    {

    }

    public function store()
    {

        $data = [
            "name" => $this->getInput("name"),
            "email" => $this->getInput("email"),
        ];

        $errors = $this->validate($data, [
            "name" => "required|min:5|max:20",
            "email" => "required|email|unique:users,email",
        ]);

        if (!empty($errors)) {
            return $this->view('test.view.php', [
                "errors" => $errors,
            ]);
        }

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
