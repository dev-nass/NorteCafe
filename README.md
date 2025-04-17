# Setting Everything Up
### Front-End
- First install the `ZIP` file of the codebase; Click `Code` button at the upper right corner of the screen and download zip.
![alt text](storage/readme/img/image-1.png)
- Locate the downloaded ZIP file and extract it. The extracted file contain a folder named. ![alt text](storage/readme/img/image-2.png)
- Rename it to ![alt text](storage/readme/img/image-3.png)
- Head to this directory `xampp/htdocs/`. Create a new folder there named `PHP 2025` and paste there the whole `Norte Cafe` folder you extracted and named earlier.
- Access the website using this URL 
```
http://localhost/PHP%202025/Norte%20Cafe/public/index.php/index
```

### Back-End
- Download the `.sql` file that contains the whole configuration of the database to discord.
- Create a new database named `norte_cafe` within phpMyAdmin.
- Try importing the downloaded `.sql` file; (1) it shows success then your good to go, (2) but if it fails, copy the error code, and ![alt text](storage/readme/img/image-4.png)
- open the `.sql` file with vscode/notepad or any of your desired text editor, find every instance/copy of the error code within the file and replace every single one of them with `utf8mb4_general_ci`.
- After all that is done, reset the database (drop every `table`, if there's any, and drop all the stored `procedures`);
- Then do it again, try importing the edited `.sql` file.

# Class Autoload Functionality
- We are using this
```php
spl_autoload_register(function ($class) {
    // used due to namespace class, at controllers
    // DIRECTORY_SEPERATOR can be substituted with '/', 
    // but using this is more dynamic & will automatically design what's appropriate to your OS
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});
```
- Instead of manually adding each of these
```php
require base_path("Core/Router.php");
require base_path("App/Http/Controllers/UserController.php");
```

# Understanding Routes Logic
### Full OOP Approach
- With this approach the controllers are now enclosed within their own classes.
```
navbar.php > public/index.php > routes.php >  Router.php > TestController.php
```
- Everytime we click an anchor tag, the code within the `public/index.php` is triggered.
The `Router.php` class then iterates to the registered routes given by `routes.php`, but this time it adds an additional functionality;
- Instead of getting the php file based on what's passed within the routes.php.
```php
// previous approach

// routes.php
$router->get('login', 'login/create.php');

// Router.php
public function route($uri, $method) {
    foreach($this->routes as $route) {
        if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
            return require base_path("app/Http/Controllers/" . $route['controller']);
        }
    }
}
```
- We are now receiving the controller class, and iterates to each of its method (index, create, store etc.,) and see what matches based on the controllerMethod passed on routes.php
```php
// current approach

// routes.php
$router->get('test', 'TestController', 'create');

// Router.php
public function route($uri, $method) {
    foreach($this->routes as $route) {
        if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
            // return require base_path("app/Http/Controllers/" . $route['controller']);
                
            /**
            * Will be getting the controller class from routes.php
            */
            $controllerClassName = 'app\Http\Controllers\\' . $route['controller_class'];
            $controllerInstance = new $controllerClassName();
            $controllerMethods = get_class_methods($controllerInstance);

            foreach($controllerMethods as $controller_method) {
                if($route['controller_method'] === $controller_method) {
                call_user_func([$controllerInstance, $controller_method]);
                }
            }
        }
    }
}
```

# Registration
- Validator

# Login
- Session
- Authenticator

# Pagination

# Filtering Logic
- Search Filter
- Category Filter
- How did Session got involve in this two process

# Middleware *(Updated ✨)*
Open these files on tabs in order:
```
routes.php > Router.php > Middleware.php
```
- As we all know, we register routes that can be access on our system on `routes.php` file, and this file contains three kinds of registered route;
```php
// the normal one
$router->get('index', 'UserController', 'index');
// w middleare
$router->get('registration', 'RegistrationController', 'create')->only('guest');
// w middleware + role
$router->get('menu', 'MenuController', 'index')->only('auth', 'Customer');

```
- The **normal one** simply indicates that it can be access whenever there's logged in or out user etc.,
- The **w middleware** indicates that the route can only be access when there's no session stored.
- The **w middleare + role** similar to what's above, however only *authenticated* user that has the role of *Customer* can access.

### How does **only()** actually works?
- To properly undertand this logic we have to take a closer look within `Router.php` file first:
```php
/**
* Used for adding middleware to each route
*/
public function only($key, $role = null)
{
    // we are accessing the $this->routes array like this because its a multidiemnsional array
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    $this->routes[array_key_last($this->routes)]['middleware_role'] = $role;
}
```
- Similar to the `add()` method within `Router.php`, its `only()` method also does the same but it passes the value it received from `routes.php`,
- Before proceding look at the 3  different kind of registered routes again, focus specifically how we are using `->only()` method there.
- Notice that the `only()` method within `Router.php` is expecting 2 arguments, because it have two paramters, but why on `routes.php` we can choose whether to pass one or two arguments on `->only()` method? 
- This is because of this line
```php
public function only($key, $role = null)
```
- This means that `$key` is always expecting an argument, but `$role` on the otherhand, if it receives value it will use it, but if it didn't it will have a default value of `NULL`, in short passing a value is not required for `$role`.

### Logic behind everything (Middleware::resolve)
- **Notice:** To further understand this, you have to ensure that you understand the logic behinnd `routes()` method within `Router.php` first, how it iterates through every registered routes and stuff.
- See this line on `routes()` method of `Router.php`:
```php
Middleware::resolve($route['middleware'], $route['middleware_role']);
```
- Basicaly, what this does is it calls a method named `resolve()` within `Core\Middleware\Middleware.php` another class that we will introduce.

### Middleware Class
- The class has a property:
```php
public const MAP = [
    'guest' => Guest::class,
    'auth' => Authenticated::class
];
```
- This is an associative array that will call the respective class within `Core\Middleware\...`
- But most importantly understand the code within `public static function resolve($key, $role="")`. Basically what this does is it recives the argument passed earlier within `routes()` on `Router.php`:
```php
// route() method within Router.php
Middleware::resolve($route['middleware'], $route['middleware_role']);
```
- Now inside the method, if the key passed is not one of those who are indiciated withhin the `MAP` property above, it will just return without doing anything:
```php
if (! $key) {
    return;
}
```
- However, if it is, it means this code can access the propety `MAP` using the key passed and it will return the value, the respective class class
```php
// Will contain the Middleware Class
$middleware = static::MAP[$key] ?? false;
```
- Now we can just create an instance of the class, depending whether the key passed within `only` on `routes.php` is either `auth` or `guest`:
```php
$instance = new $middleware;
$instance->handle($role);
``` 
- Now its up to you guys to understand `Core\Middleware\Guest.php` and `Core\Middleware\Middleware.php`
# Inheritance *(Updated✨)*
Open these files on tabs in order:
```
Model.php > User.php
```
- The concept behind inheritance is stated within the name itself, inherit. Similar to how a child can inherit a trait from their parents.
- In its programming coounterpart, this is how the process goes,
- We create a parent class that has pre-defined methods inside it and create a sub or child class that use `extends` to explicitely define that they are that class child.

### Model.php
- This class is located within `Core\Model.php`, this class serves as the parent class of all the model class that we will create within `App\Models\...` directory.
- This class contains `function procedure`, means that all basic operation such as `CRUD` are defined here as methods to simplify the process (reduced MySQL writing on each Controller).
- But the most important part of this class is the 
```php
// Model.php
protected $table;
```
- This `$table` var / property is always being called on each method in the form of `$this->table`, such as this one:
```php
public function findAll($order = "")
{
    $this->iniDB();

    $table = substr($this->table, 0, -1);

    $records = $this->query("SELECT * FROM $this->table ORDER BY {$table}_id $order")->get();

        return $records;
    }
```
- This is where the main logic happens, if you visit the `App\Models\...` each of the model classes there have `extends Model` means that they are defining themselves as a child of `Model.php` this way they also have access to the methods defined on `Model.php`;
- But the methods within `Model.php` contains ambiguity since the `$this->table` property there doesn't contain any value yet.
- All of this are solved due to this property defined on each child model class:
```php
// User.php
protected $table = "users";
```
- This overwrites the `$table` property within the parent `Model.php` class.

### How to use this:
- So imagine this scenario, say we want to find a user whose email is `pogiako@gmail.com`, knowing all the process above we can do this:
```php
// SomewhereController.php
$userObj = new User;
$user->firstWhere([
    "email" => "pogiako@gmail.com",
]);
```
- Remember that the `firstWhere()` is a method defined within `Model.php`, but since we `extends` that class on `User` class we now have access to its methods and properties.

# Encapsulation (Updated✨)
Open these files on tabs in order:
```
Order.php > OrderController.php
```
- So far the only very visible encapsulation that we have can be seen on `App\Models\Order.php` where each property are defined as `protected` and have setter method (`setAttribute`) that set value to those property;
- On `OrderController.php` the usage of this `setAttribute` method can be seen.

# Polymorphism / Interface (Updated✨)
Open these files on tabs in order:
```
PaymentMethod.php > CODPayment.php > GCASHPayment.php > Order.php > OrderController.php
```
(All of this are within `App\Models\...`)
- The concept behind this is we create a `base class` that will have a pre-defined method that is/are empty, and the `sub classes` `implements` this `base class`, inheriting those empty method that they are require to overwrite with their own implementation.
- **Note:** To avoid confusion, `parent` and `child` class are names associated when we talk about `inheritance`, but `base` and `sub` class is more fitting for polymorphism, idk this is just my preference.

### How to does this work:
- As discussed above, we have a `base class` named:
```php
// PaymentMethod.php
interface PaymentMethod {
    public function processPayment($amountDue); // Process the payment and return the result
    public function getPaymentDetails(); // Return details passed
}
```
- And now we have the sub classes `CODPayment.php` & `GCASHPayment.php`.
- Now if you visit both of this `sub classes` they have access to the same methods from the `base class` that they `implements`, again overwriting these empty methods are required.

### How to use this?
- Inside our `OrderController` we have this code that listening to the what `$_POST['payment_method']` have and create an instance of either of the two `sub class`:
```php
// OrderController.php
 if($_POST['payment_method'] === "COD") {
    $paymentMethodObj = new CODPayment($_POST['amount_due']);
} else if ($_POST['payment_method'] === "GCASH") {
    $paymentMethodObj = new GCASHPayment($_POST['amount_due'], $_FILES['proof_of_payment']);
} else {
    dd("Invalid Payment Method selected");
}
```
- Then the `$paymentMethodObj` variable is then passed to the `Order.php`
```php
// OrderController.php
$order->setAttributes(
    $_SESSION['__currentUser']['credentials']['user_id'],
    $_POST['discount_id'],
    $_POST['amount_due'],
    $_POST['total_price'],
    $_POST['cart_item'],
    $_POST['location'],
    $paymentMethodObj,
    $_FILES['proof_of_payment']
);
```
- And then the placing order takes place after calling this method.
```php
// OrderController.php
$order->placeOrder();
```
- After this you can just read the code of `Order.php` model, and its to you to understand the whole process.
- **Tip:** just open the two OrderController and Order files side by side and understand what values are being passed and received.

# Abstraction
```
Controller.php > TestController.php > test.view.php
```
# Forgot Password
- The `token selector` is used for fetcing the record of the user from the `password_reset_request` table.
- After getting the user record, we will use its fetched `token validate` column, and compare it to the `token validate` from the form that has been embedded into it by default (done through the construction of a specific URL variable that redirect to a page and puts token at the URL, that are then used later on)
# Cart Count Logic
# Discount
# Sample