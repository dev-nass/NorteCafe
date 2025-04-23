# Abstraction
All of the changes I've made to transition the Controller classes to use the base Controller class will be here.

## April 17, 2025
### Cart Controller
- Modified the `CartController` use the respective model classes to make this file more cleaner,
- Since this Controller class highly relies on joining multiple table, I hid those queries to the each model classes, and enclose them to a method.

### Router and routes
- Removed the method `patch`, `put` and `delete` and only stick to `get` and `put`.

### TransactionController
- Removed the queries that joins tables and fetch orders under a single `tranaction id` to methos within `Transaction` model class.
- This simplified the process and make the `TransactionController` more cleaner.

### Tranascton Model
- `getCurrentTransactions` & `getPreviousTransactions` are added used for easily fetching the users transactions on `profile` and `view all` and make it more seamless.

### Controller Folder
- Seperate the `Customer` & `Admin`, this will be the convention if future customer is to be added such as `Rider`.
- While some controllers that are general to all users remains in the same positions.

### Mailer class
- Implementation of OOP and encapsulation on PHP mailer.
- The class will be populated with method that are responsible for sending different kinds of emails

## April 18, 2025
### Contact Us
- Send inquiries through contact us is now possible.
- `**Issue:**` Sending email is not dynamic. For instance, if you check the send a inquiry message on Norte Cafe the email will be like this:
```
SenderName <nortecafe7@gmail.com>
```
- but this is wrong it should be:
```
SendderName <senderEmail@gmail.com>
```
- This issue might be due to: If the email is still showing the wrong "From" address, such as Jonas <nortecafe7@gmail.com> instead of Jonas <jonasemperro@gmail.com>, the issue may be due to SMTP restrictions imposed by the email provider or service you are using to send the email. Many email providers (e.g., Gmail, Yahoo, etc.) do not allow arbitrary "From" addresses for outgoing emails, especially when using their SMTP servers.

### Find Store
- The view that will be use to find the store and measure the distance between the customer's house and the store's position is added.

### Sheree's Bug Find, Fixed
- Required and disabled the input of city, province, postal code (select can be exploit using inspect or dev tools)
- Default bday date on new users (fixed w/ Copilot)
- GMAIL reply is send back to the norte cafe 

### Previous Transactions (Archiving)
- Users can't delete their previous tranasaction anymore, only admin account can.

### UI Changes within the Customer Side
- (Profile/Previous and Current Transactions) Buttons are now changed and UI are changed to make it more cleaner and not misleading.
- (Menu/index) Description on each card is limited, but not on modal. This will be helpful specially for `add item` functionality on admin side, and its `menu show` because their's a lot of dead spaces.

### Change Password
- We are using email instead of user_id because I think its more safer. Attackers can identify the available ID on the db if they saw the hidden input value to have 50, it means there are (1-49) other users on the database.
- However using email its more obscure.
- **Issue:** There are no alert as of the momment notifying them that the password has been changed, only redirecting them.


# April 19, 2025
### Change Password
- Used a session based notification for showing the user that changing their password is succesful.

### Session
- Fixed the use the `$_SESSION['__currentUser']['credentials']` as the default customer session record. And removed the `$_SESSION['user']['email']`

# April 21, 2025
### Admin Controllers
- Fixed the admin controllers and added appropriate alert for each action, specially for transaction actions and changing the status.

### Middleware
- Added a general middleware for general webpage, this prevents `admin` and `rider` account from accessing the general webpages.

# April 22, 2025
### Session flash and old method
- I implementedd the `old($input = "", $key = "credentials")` method within the functions.php file,
- The expected value of the session will be like this:
```php
$data = [
    "key/variablename" => "value"
];
// we are putting the data to the session
Session::set('__flash', 'credentials', $data);

// expected value
$_SESSION['__flash'] = [
    'credentials' => [
        'key/variableFromData' => 'valueFromData'
    ],
];

// we are putting the data to the input
<input value="<?= old('key/variablename') ?>" >
```

# April 23, 2025
### The Laravel Way of Error
- So the issue I encountered was that after I validate the inputs I'm showing the view to the same `show.view.php` page, however the URL is not changing, so If you try to refresh the page there will be errors indicating that the page can't be found because the id attached to the URL before was gone, because the `view()` method can alter the URL only `redirect()`,
- As a solution, laravel displays their error to session and use `redirect()` method to show the errors to the user, but intact the same URL that contains the ID, hence I did the following.
### New error method
- The function now contains the creation of the HTML itself so I just have to call it, and pass the variable name that contains the input errors and the list of errors will automatically be renedered
### New old method
- Changed the `?? ''` to `?? null`, so that I can use the code below properly
```php
value="<?= old() ?? $data['name'] ?>"
```
### To achive both of these I created
- With this approach the `__flash` within the session is own an array consists of old data and error data.
- Each method of `old()` and `error()` are also adjusted accordingly to easily fetch the nested arrays.
```php
if ($errors) {
    $flash_data = [
        "errors" => $errors, 
        "old" => $data
    ];
    Session::set('__flash', 'data', $flash_data);
    return $this->redirect("add-ons-update-admin?id={$data['add_on_id']}");
}
```