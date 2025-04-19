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
- Fixed the use the `$_SESSION['__currentUser']['credentials']` as the default customer session record.