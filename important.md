# Validation
# Session based Alert
# Session based errors and old form data

# Change the Following for Production
- Loacation in User Model, and other Model that requires to upload a picture
```php
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}
```
- Database foreign key check (Not added but can be useful for future)
```sql
SET FOREIGN_KEY_CHECKS = 0;

-- Your INSERT statements here

SET FOREIGN_KEY_CHECKS = 1;
```