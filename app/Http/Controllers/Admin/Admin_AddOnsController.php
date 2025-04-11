<?php

namespace App\Http\Controllers\Admin;

use App\Models\AddOns;

class Admin_AddOnsController 
{

    public function upload()
    {

        view('Admin/AddOns/upload.view.php', [
            "error" => [],
        ]);
    }


    /**
     * Used for storing a new record; Method is calledd
     * everytime the form is submitted
    */
    public function store()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = [];
            $addOn_name = trim($_POST['add_on_name']);
            $addOn_category = trim($_POST['add_on_category']);
            $addOn_price = trim($_POST['add_on_price']);

            $addOns_obj = new AddOns;

            $isNameExist = $addOns_obj->findAllWhere([
                'name' => $addOn_name,
                'category' => $addOn_category
            ]);

            if($isNameExist) {
                $error['addOn_name'] = "Add on already exist";
            }

            if($error) {
                view('Admin/AddOns/upload.view.php', [
                    "error" => $error,
                ]);
            }

            $newAddOns = $addOns_obj->insert([
                "name" => $addOn_name,
                "category" => $addOn_category,
                "price" => $addOn_price,
            ]);

            // redirect them to its show
            redirect('add-ons-upload-admin');
        }

    }
}