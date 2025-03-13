# To-DO 
[ ] Registration is only checking if a certain email is existing on users table this should also check the employee in the future. <br>
[ ] Require users to finish setting their account first before allowing them to place an order. This is for `NULL` default columns in user table. <br>
[ ] Terms and Conditions should be checkbox <br>
[ ] Terms and conditions should contains delivery details such as no pick up from delivery orders. <br>
[ ] Contact Us should contain their social logo <br>
[ ] FAQs should contain image on side <br>
[x] Create the Model first, and then change some codes within your LoginController.php. This will set the stage for the development of the ordering. <br>
[x] Fix the modal content; Include image of selected item and search online for others <br>
[x] Start creating the menu_item_sizes and start incorporating it to the menu <br>
[x] Submission of the selected item should be added to the cart <br>
[ ] Inlcude quantity for both adding cart offcanvas and the actual cart <br>
[ ] Integrate the logic for add-ons similar to sizes <br>
[ ] Only show these sizes on beverages not on foods <br>

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
