<?php

function dump($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

/**
 * Used for the adminside bar
 */
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === "/PHP%202025/Norte%20Cafe/public/index.php/{$value}";
}

function base_path($path)
{
    return str_replace('\\', '/', BASE_PATH . $path);
}

/**
 * Changed from before because this can be also use for admin views
 * not just user
 */
function view($path, $attribute = [])
{

    extract($attribute);

    require base_path("resources/views/{$path}");
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

/**
 * Used for showing the previous input
 * after an error occurred
 */
function old($input)
{
    return Core\Session::get('__flash', 'data')['old'][$input] ?? null;
}

/**
 * Simplify the display of errors
*/
function error($input)
{

    $errors = Core\Session::get('__flash', 'data')['errors'][$input] ?? '';

    if (isset($_SESSION['__flash']['data']['errors'][$input])) {
        echo "<ul class='m-0 p-0' style='list-style: none;'>";
        foreach ($errors as $error) {
            echo "<li class='text-danger'>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("resources/views/{$code}.view.php");

    die();
}

/**
 * Added so 404, and 403 home link is
 * updated depending on the $_SESSION role
*/
function dynamic_http_response($role)
{

    if ($_SESSION['__currentUser']['credentials'] === NULL) {
        return false;
    }

    $route =  match($role) {
        'Customer' => 'index',
        'Employee' => 'dashboard',
        'Admin' => 'dashboard',
        'Rider' => 'assigned-transaction-queue-rider'
    };

    return $route;
}

/**
 * Used for checking if the shop is open or closed
 */
function isOrderingTime()
{
    $now = new DateTime('now', new DateTimeZone('Asia/Manila')); // Adjust timezone as needed
    $start = new DateTime('today 03:00:00', new DateTimeZone('Asia/Manila'));
    $end = new DateTime('today 23:45:00', new DateTimeZone('Asia/Manila')); // 9 PM = 21:00

    if ($now >= $start && $now < $end) {
        return true;
    }

    return false;
}
