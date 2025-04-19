<?php

namespace App\Http\Controllers;

class ResponseController 
{
    public function http_403() {

        view('403.view.php', [
            "title" => 403
        ]);
    }
}