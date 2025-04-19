<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\User;
use Core\Controller;
use Core\Mailer;
use Core\Session;

class UserController extends Controller
{

    public function show() {}
    public function create() {}
    public function store() {}
    public function update() {}
    public function delete() {}

    /**
     * General Web Pages
     */
    public function index()
    {
        return $this->view('Customer/index.view.php', [
            "title" => "Norte Cafe"
        ]);
    }

    public function contactUs()
    {
        return $this->view('Customer/contactUs.view.php', [
            "title" => "Contact Us"
        ]);
    }

    /**
     * Used for sending GMAIL message on
     * Contact Us page
    */
    public function sendMessage() 
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
                Session::set('__flash', 'contactUs_notif', 'Message Sent');
                $this->redirect('contactUs');
            }
        }
    }

    public function aboutUsNorteCafe()
    {
        return $this->view('Customer/aboutUsNorteCafe.view.php', [
            "title" => "About Us Store"
        ]);
    }

    public function aboutUsDevelopers()
    {
        return $this->view('Customer/aboutUsDevelopers.view.php', [
            "title" => "About Us Developers"
        ]);
    }

    public function findStore()
    {
        return $this->view('Customer/findStore.view.php', [
            "title" => "Find Store"
        ]);
    }

    public function faqs()
    {
        return $this->view('Customer/faqs.view.php', [
            "title" => "FAQs - Norte Cafe"
        ]);
    }

    public function deliveryDetails()
    {
        return $this->view('Customer/delivery-details.view.php', [
            "title" => "Delivery Details"
        ]);
    }
}
