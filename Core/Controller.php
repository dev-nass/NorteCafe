<?php

namespace Core;

use Core\Database;

abstract class Controller
{

    protected $request;

    /**
     * All data send via $_GET or $_POST will be
     * the value of $this->request
     */
    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
    }

    abstract public function index();
    abstract public function show();
    abstract public function store();
    abstract public function update();
    abstract public function delete();

    /**
     * Used for testing only
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Used for getting a specific value within
     * $this->request; Equilvalent to $var = $_GET['name']
     */
    protected function getInput($key, $default = "")
    {
        $value = $this->request[$key] ?? $default;
        return is_string($value) ? htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8') : $value;
    }

    /**
     * Flexible validation method
     * can be use to any controller
     * 
     * both paramters are assoc array
     */
    protected function validate($data = [], $rules = [])
    {

        $errors = [];

        // key - $field (string)
        // value - $rule (string)
        foreach ($rules as $field => $rule) {

            // $ruleSet is now an array after seperating the $rule (string)
            $ruleSet = explode('|', $rule);
            foreach ($ruleSet as $singleRule) {
                
                // for required fields
                if ($singleRule === "required" && empty($data[$field])) {
                    $errors[$field][] = "$field is required";
                }

                // for email fields
                if ($singleRule === "email" && ! filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = "$field must be a valid email";
                }

                // for min length (not fully understood)
                if (strpos($singleRule, 'min:') === 0) {
                    // returns the exact number min:5, the 5 for instance bcz its position 4
                    $minLength = (int) substr($singleRule, 4);
                    if (strlen($data[$field]) < $minLength) {
                        $errors[$field][] = "$field must be at least $minLength characters";
                    }
                }

                if(strpos($singleRule, 'max:') === 0) {
                    // returns the exact number max:5, the 5 for instance bcz its position 4
                    $maxLength = (int) substr($singleRule, 4);
                    if(strlen($data[$field]) > $maxLength) {
                        $errors[$field][] = "$field must not exceed $maxLength characters";
                    }
                }

                // for unique
                if(strpos($singleRule, 'unique:') === 0) {
                    // dd($singleRule);
                    [$table, $column] = explode(',', $singleRule);
                    // checks whether the value exists
                    if($this->valueExists(substr($table, 7), $column, $data[$field])) {
                        $errors[$field][] = "$field already exists";
                    }
                }
            }
        }

        // if (!empty($errors)) {
        //     $this->response(['errros' => $errors], 422);
        // }

        return $errors;
    }

    protected function valueExists($table, $column, $value) {
        $db = new Database;
        $db->iniDB();
        $doestExist = $db->query("SELECT * FROM $table WHERE $column = :value", [
            "value" => $value,
        ])->find();

        return $doestExist ? true : false;
    }

    /**
     * For loading the view
    */
    protected function view($path, $attribute = [])
    {

        extract($attribute);

        // checks if the view file exists
        $viewPath = base_path("resources/views/{$path}");

        if (!file_exists($viewPath)) {
            $this->respond(['error' => 'View not found'], 500);
        }

        require base_path("resources/views/{$path}");
    }

    /**
     * Send the user to specific URL
    */
    protected function redirect($path)
    {
        header("location: {$path}");
        exit();
    }

    /**
     * Shows a responsive message in the form of JSON
     * on the screen. Mostly, erros msgs
    */
    protected function respond($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

}
