<?php

namespace Core;

use PDO;
use PDOException;

/**
 * Database configurations
*/
$dsn = "mysql:host=localhost;dbname=norte_cafe";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch(PDOException $e) {
    echo "CLI Database error " . $e->getMessage();
}


/**
 * Used for prompting to input admin inputs
*/
function prompter($message)
{
    echo $message . ": ";

    /**
     * fgets() read line of input from a file or input stream
     * STDIN means standard input, in the context of CLI refers to the input the user types in terminal,
     * however it also reads the \n character at the end of the input because the enter button is pressed.
     * trim() removes the white but also removes the \n that comes with the input
     */
    return trim(fgets(STDIN));
}

$admin_username = prompter("Enter admin user name");
$admin_email = prompter("Enter admin email");

// Password input
echo "Enter admin password: ";
$admin_password = trim(fgets(STDIN));
echo "Re-enter password: ";
$admin_repassword = trim(fgets(STDIN));

// check if the inputs contains special characters
// if (preg_match('/[^a-zA-Z\s.]/', $admin_fname) and !preg_match('/[^a-zA-Z\s.]/', $admin_lname) and !preg_match('/[^a-zA-Z0-9\s.]/', $admin_username)) {
//     echo "Special letters are not allowed";
//     exit();
// }

// check if username/email already exists
$chck_record_sql = "SELECT * FROM users WHERE username = :username OR email = :email";
$chck_record_stmt = $pdo->prepare($chck_record_sql);
$chck_record_stmt->execute([
    "username" => $admin_username,
    "email" => $admin_email,
]);

if($chck_record_stmt->rowCount() > 0) {
    echo "Username or email already exists";
    exit();
}

// check password min length

// check if password matches

// insert new employee
$insert_recrod_sql = "INSERT INTO employees (username, email, password) VALUES (:username, :email, :password)";
$insert_record_stmt = $pdo->prepare($insert_recrod_sql);
$insert_record_stmt->execute([
    "username" => $admin_username,
    "email" => $admin_email,
    "password" => password_hash($admin_password, PASSWORD_BCRYPT),
]);

if($insert_record_stmt) {
    echo "New employee has been added";
    $pdo = null;
    exit();
}