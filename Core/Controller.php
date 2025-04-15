<?php

namespace Core;

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
     */
    protected function validate($data = [], $rules = [])
    {

        $errors = [];

        // key - $field
        // value - $rule
        foreach ($rules as $field => $rule) {
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
                    $minLength = (int) substr($singleRule, 4);
                    if (strlen($data[$field]) < $minLength) {
                        $errors[$field][] = "$field must be at least $minLength characters.";
                    }
                }
            }
        }

        // if (!empty($errors)) {
        //     $this->response(['errros' => $errors], 422);
        // }

        return $errors;
    }

    protected function response($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function wantsJson()
    {
        $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
        return strpos($accept, 'application/json') !== false;
    }
}
