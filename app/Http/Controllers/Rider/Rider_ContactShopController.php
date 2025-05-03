<?php

namespace App\Http\Controllers\Rider;

use Core\Controller;
use Core\Mailer;
use Core\Session;

class Rider_ContactShopController extends Controller
{

    /**
     * Used for showing view to the 
     * transaction/contact store.view.php
    */
    public function index() 
    {

        return $this->view('Rider/contactShop.view.php', [
            'title' => 'Contact Shop'
        ]);
    }

    /**
     * Used for listening to the contact store rider
     * submit form
    */
    public function sendMessageRider()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "name" => $this->getInput("name"),
                "email" => $this->getInput("email"),
                "subject" => $this->getInput("subject"),
                "message" => $this->getInput("message"),
            ];

            $mailerObj = new Mailer;
            $mailSent = $mailerObj->contactUs($data["name"], $data["email"], $data["subject"], $data["message"]);

            if($mailSent) {
                Session::set('__flash', 'contactShop_notif', 'Message Sent');
                return $this->redirect('contact-shop-rider');
            }
        }
    }

    public function show() {}

    public function create() {}

    public function store() {}

    public function update() {}

    public function delete() {}

}