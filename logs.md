# Abstraction
All of the changes I've made to transition the Controller classes to use the base Controller class will be here.

### April 17, 2025
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