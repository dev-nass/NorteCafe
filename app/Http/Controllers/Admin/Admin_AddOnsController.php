<?php

namespace App\Http\Controllers\Admin;

use Core\Controller;
use Core\Session;
use App\Models\AddOns;

class Admin_AddOnsController extends Controller
{

    public function index() {}

    public function show() {}

    /**
     * Loads the form view for add ons
    */
    public function create()
    {

        view('Admin/AddOns/create.view.php', [
            "errors" => [],
        ]);
    }


    /**
     * Used for storing a new record; Method is calledd
     * everytime the form is submitted
    */
    public function store()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "addOn_name" => $this->getInput('add_on_name'),
                "addOn_category" => $this->getInput('add_on_category'),
                "addOn_price" => $this->getInput('add_on_price'),
            ];

            // validation
            $errors = $this->validate($data, [
                "addOn_name" => "required|unique:add_ons,name,0"
            ]);

            if($errors) {
                return $this->view('Admin/AddOns/create.view.php', [
                    "errors" => $errors,
                ]);
            }

            // insert new add ons
            $addOns_obj = new AddOns;
            $newAddOns = $addOns_obj->insert([
                "name" => $data['addOn_name'],
                "category" => strtoupper($data['addOn_category']),
                "price" => number_format($data['addOn_price'], '2', '.', ''),
            ]);

            // redirect them to its show
            if($newAddOns) {
                Session::set('__flash', 'add_ons_uploaded', 'Add ons uploadedd successfully');
                redirect('add-ons-upload-admin');
            }
        }

    }

    public function update() {}

    public function delete() {}
}