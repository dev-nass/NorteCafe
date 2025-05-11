<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Core\Database;
use Core\Controller;
use Core\Session;
use Core\Mailer;
use App\Models\User;

class Admin_RiderController extends Controller
{

    /**
     * Used for loading the table view for
     * Rider table
     */
    public function index()
    {

        $db = new Database;
        $db->iniDB();

        $riders = $db->query("SELECT user_id, CONCAT(first_name, ' ', last_name) AS rider_name, username, email, contact_number, age, date_of_birth, CONCAT(users.house_number, ', ', users.street, ', ', users.barangay, ', ', users.city, ', ', users.province, ', ', users.region, ', ', users.postal_code) AS address, gender FROM users WHERE role = :role", [
            "role" => "Rider"
        ])->get();

        return $this->view('Admin/rider/index.view.php', [
            'title' => 'Riders Table',
            "riders" => $riders
        ]);
    }

    /**
     * Used for showing a specific Rider
     */
    public function show()
    {

        $rider_id = $_GET['rider_id'];

        // User details
        $userObj = new User;
        $user = $userObj->findUserOr([
            "user_id" =>  $rider_id,
        ]);

        // Handled transactions
        $transactionObj = new Transaction;
        $handledTransactions = $transactionObj->getHandledTransactions($rider_id);

        return $this->view('Admin/rider/show.view.php', [
            'title' => "Rider Show {$rider_id}",
            "user" => $user,
            "handledTransactions" => $handledTransactions,
        ]);
    }


    /**
     * Used for loading the form to
     * input the Rider email and
     * send email too
    */
    public function create() 
    {

        return $this->view('admin/rider/create.view.php', [
            'title' => 'Create Employee',
        ]);
    }
    

    /**
     * Used for sending an email to
     * the Rider
    */
    public function store() 
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "email" => $this->getInput('email')
            ];

            $errors = $this->validate($data, [
                'email' => "email|unique:users,email,0",
            ]);

            if($errors) {
                return $this->redirect('rider-create-admin');
            }

            $mailerObj = new Mailer;
            $emailSent = $mailerObj->emailStaff($data['email'], 'rider');
            
            if($emailSent) {
                Session::set('__flash', 'email_sent', 'Email sent successfully');
                return $this->redirect('rider-create-admin');
            }
        }
    }

    /**
     * Updates a specific rider
     */
    public function update()
    {

        $db = new Database;
        $db->iniDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $current_date = date("Y-m-d H:i:s"); // for updated_at
            $image_dir = $_FILES['user-profile-img'];
            $data = [
                "user_id" => $this->getInput('user_id'),
                "first_name" => $this->getInput('first_name'),
                "last_name" => $this->getInput('last_name'),
                "email" => $this->getInput('email'),
                "username" => $this->getInput('username'),
                "contact_number" => $this->getInput('contact_number'),
                "age" => $this->getInput('age'),
                "date_of_birth" => $this->getInput('date_of_birth'),
                "gender" => $this->getInput('gender'),
                "house_number" => $this->getInput("house_number"),
                "street" => $this->getInput("street"),
                "barangay" => $this->getInput("barangay"),
                "city" => $this->getInput("city"),
                "province" => $this->getInput("province"),
                "region" => $this->getInput("region"),
                "postal_code" => $this->getInput("postal_code"),
            ];

            $errors = $this->validate($data, [
                "username" => "required|min:3|unique:users,username,{$data["user_id"]}",
                "email" => "required|unique:users,email,{$data["user_id"]}",
                "contact_number" => "required|unique:users,contact_number,{$data["user_id"]}"
            ]);

            if ($errors) {
                return $this->redirect("rider-show-admin?rider_id={$data['user_id']}");
            }

            $user = new User;
            $user->update($data["user_id"], [
                "first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "email" => $data["email"],
                "username" => $data["username"],
                "contact_number" => $data["contact_number"],
                "age" => $data["age"],
                "date_of_birth" => $data["date_of_birth"],
                "gender" => $data["gender"],
                "updated_at" => $current_date,
                "house_number" => $data["house_number"],
                "street" => $data["street"],
                "barangay" => $data["barangay"],
                "city" => $data["city"],
                "province" => $data["province"],
                "region" => $data["region"],
                "postal_code" => $data["postal_code"],
                "verified" => true
            ]);

            // We are only updating the 'profile_dir' column if the $image_dir is not empty
            if ($image_dir['full_path'] !== "") {
                $user->update($data["user_id"], [
                    "profile_dir" => "../../storage/backend/img/profiling/" . $image_dir['name'],
                ]);

                $user->uploadFile($image_dir);
            }


            Session::set('__flash', 'profile_updated', 'Profile updated successfully');
            return $this->redirect("rider-show-admin?rider_id={$data['user_id']}");
        }
    }

    /**
     * Delete a specific rider
    */
    public function delete()
    {

        $data = [
            'user_id' => $this->getInput('user_id'),
        ];

        $userObj = new User;
        $deleted_user = $userObj->delete($data['user_id']);

        if ($deleted_user) {
            Session::set('__flash', 'account_deleted', 'Deleted successfully');
            return $this->redirect('rider-table-admin');
        }
    }
}
