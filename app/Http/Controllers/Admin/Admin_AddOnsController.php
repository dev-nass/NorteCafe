<?php

namespace App\Http\Controllers\Admin;

use Core\Controller;
use Core\Session;
use App\Models\AddOns;

class Admin_AddOnsController extends Controller
{

    /**
     * Used for loading the table view
     * of AddOns
     */
    public function index()
    {

        $addOnsObj = new AddOns;
        $addOns = $addOnsObj->findAll();

        return $this->view('Admin/AddOns/index.view.php', [
            'addOns' => $addOns,
        ]);
    }

    /**
     * Used for showing a specific
     * Add Ons record
     */
    public function show()
    {

        $add_on_id = $this->getInput('id');
        // find the add on
        $addOnsObj = new AddOns;
        $addOns = $addOnsObj->firstWhere([
            "add_on_id" => $add_on_id,
        ]);

        view('admin/addOns/show.view.php', [
            "addOns" => $addOns,
            "errors" => [],
        ]);
    }

    /**
     * Loads the form view for add ons
     */
    public function create()
    {

        return $this->view('Admin/AddOns/create.view.php', [
            "errors" => [],
        ]);
    }


    /**
     * Used for storing a new record; Method is calledd
     * everytime the form is submitted
     */
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "addOn_name" => $this->getInput('add_on_name'),
                "addOn_category" => $this->getInput('add_on_category'),
                "addOn_price" => $this->getInput('add_on_price'),
            ];

            // validation
            $errors = $this->validate($data, [
                "addOn_name" => "required|unique:add_ons,name,0"
            ]);

            if ($errors) {
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
            if ($newAddOns) {
                Session::set('__flash', 'add_ons_uploaded', 'Add ons uploadedd successfully');
                return $this->redirect('add-ons-upload-admin');
            }
        }
    }

    /**
     * Update a single Add Ons
     */
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'add_on_id' => $this->getInput('add_on_id'),
                'add_on_name' => $this->getInput('add_on_name'),
                'add_on_category' => $this->getInput('add_on_category'),
                'add_on_price' => $this->getInput('add_on_price'),
                'availability' => $this->getInput('available') == 1 ? 1 : 0,
            ];

            $errors = $this->validate($data, [
                'add_on_name' => "required|unique:add_ons,name,{$data['add_on_id']}",
            ]);

            // find the add on
            $addOnsObj = new AddOns;
            $addOns = $addOnsObj->firstWhere([
                "add_on_id" => $data['add_on_id'],
            ]);

            if ($errors) {
                $flash_data = [
                    "errors" => $errors, 
                    "old" => $data
                ];
                Session::set('__flash', 'data', $flash_data);
                return $this->redirect("add-ons-update-admin?id={$data['add_on_id']}");
            }
        }
    }

    public function delete() {}
}
