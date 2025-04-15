<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
    <style>
        .error { color: red; }
        .error-list { margin: 0; padding: 0; list-style: none; }
    </style>
</head>
<body>
    <h1>Create Customer</h1>
    <form method="POST" action="test-store">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($formData['name'] ?? '') ?>">
            <?php if (isset($errors['name'])): ?>
                <ul class="error-list">
                    <?php foreach ($errors['name'] as $error): ?>
                        <li class="error"><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($formData['email'] ?? '') ?>">
            <?php if (isset($errors['email'])): ?>
                <ul class="error-list">
                    <?php foreach ($errors['email'] as $error): ?>
                        <li class="error"><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>