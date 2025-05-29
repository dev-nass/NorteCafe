<?php

namespace App\Models;

use Core\Model;

class AddOns extends Model
{

    protected $table = "add_ons";

    public function archivedAddOns()
    {

        $this->iniDB();

        $addOns = $this->query("SELECT * FROM $this->table WHERE status = :status", [
            "status" => 0
        ])->get();

        return $addOns ?? false;
    }
}