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

### Logic behind everything (Middleware)
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
# Inheritance & Encapsulation
```
Model.php > User.php
```
# Discount
# Sample

# Polymorphism
```
PaymentMethod.php > CODPayment.php > GCASHPayment.php > Order.php > OrderController.php
```