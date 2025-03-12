<?php require $_SERVER['DOCUMENT_ROOT'] . "\project-apple\back-end\user_in.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Apple | Log in/Sign up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=EB+Garamond&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a class="logo" href="index.html" style="text-decoration: none;">PROJECT APPLE</a>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="topics.html">Topics</a></li>
                <li><a href="mission.html">Our Mission</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Log in / Sign up</h2>
        <div class="login-container">
            <form action="entry.php" method="POST" autocomplete="off">
                <input type="text" placeholder="Enter username" name="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>" required>
                <input type="password" placeholder="Enter password" name="pass" required>
                <button type="submit"><b>></b></button>
            </form>
        </div>
        <?php if ($is_invalid): ?>
            <em style="color: #c1121f;">Invalid login</em>
        <?php endif; ?>
    </main>
</body>
</html>