<?php

namespace App\Http\Controllers\Admin;

use Core\Controller;
use Core\Session;
use App\Models\Discount;

class Admin_DiscountController extends Controller
{

    /**
     * Loads the table view for all of the 
     * records within Discount Table
    */
    public function index()
    {

        $discountObj = new Discount;
        $dicounts = $discountObj->findAll();

        return $this->view('admin/discount/index.view.php', [
            'discounts' => $dicounts,
        ]);
    }

    /**
     * Used for a specific discount
    */
    public function show() 
    {

        $discount_id = $this->getInput('id');

        $discountObj = new Discount;
        $dicount = $discountObj->firstWhere([
            "discount_id" => $discount_id
        ]);

        return $this->view('admin/discount/show.view.php', [
            'discount' => $dicount
        ]);
    }


    /**
     * Loads the view for creating a new discount
    */
    public function create() 
    {

        return $this->view('admin/discount/create.view.php');
    }

    /**
     * Handle the form submit of create discount form
    */
    public function store() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'discount_name' => $this->getInput('discount_name'),
                'discount_type' => $this->getInput('discount_type'),
                'discount_value' => $this->getInput('discount_value'),
                'discount_min_amount' => $this->getInput('discount_min_amount')
            ];

            $errors = $this->validate($data, [
                'discount_name' => 'required|unique:discounts,name,0'
            ]);

            if($errors) {
                return $this->redirect('discount-create-admin');
            }

            $discountObj = new Discount;
            $new_discount = $discountObj->insert([
                'name' => $data['discount_name'],
                'type' => $data['discount_type'],
                'value' => $data['discount_value'],
                'min_amount' => $data['discount_min_amount'],
            ]);

            if($new_discount) {
                Session::set('__flash', 'discount_created', 'Created successfully');
                return $this->redirect('discount-table-admin');
            }
        }
    }

    /**
     * Update a specific discount record
    */
    public function update() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'discount_id' => $this->getInput('discount_id'),
                'discount_name' => $this->getInput('discount_name'),
                'discount_type' => $this->getInput('discount_type'),
                'discount_value' => $this->getInput('discount_value'),
                'discount_min_amount' => $this->getInput('discount_min_amount')
            ];

            $errors = $this->validate($data, [
                "discount_name" => "required|unique:discounts,name,{$data['discount_id']}"
            ]);

            if($errors) {
                return $this->redirect("discount-show-admin?id={$data['discount_id']}");
            }

            $discountObj = new Discount;
            $updated_discount = $discountObj->update($data['discount_id'], [
                'name' => $data['discount_name'],
                'type' => $data['discount_type'],
                'value' => $data['discount_value'],
                'min_amount' => $data['discount_min_amount'],
            ]);

            if($updated_discount) {
                Session::set('__flash', 'discount_updated', 'Discount Updated Successfully');
                return $this->redirect('discount-table-admin');
            }
        }

    }

    /**
     * Delete a specific discount
    */
    public function delete() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $discount_id = $this->getInput('discount_id');

            $discountObj = new Discount;
            $deleted_discount = $discountObj->delete($discount_id);

            if($deleted_discount) {
                Session::set('__flash', 'discount_deleted', 'deleted successfully');
                return $this->redirect('discount-table-admin');
            }
        }
    }
}