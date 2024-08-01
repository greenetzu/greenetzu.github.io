<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>

    <?php
    $file = 'guestbook.txt';
    $status = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $message = htmlspecialchars($_POST['message']);

        $entry = "<p><strong>$name:</strong> $message</p>\n";

        if (file_put_contents($file, $entry, FILE_APPEND)) {
            $status = "Thank you for your message!";
        } else {
            $status = "There was an error saving your message. Please try again.";
        }
    }
    ?>

    <!-- Display status message -->
    <?php if ($status): ?>
        <p><?php echo $status; ?></p>
    <?php endif; ?>

    <!-- Form for submitting comments -->
    <form action="guestbook.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Messages</h2>
    <div id="messages">
        <?php
        if (file_exists($file)) {
            $entries = file_get_contents($file);
            echo $entries;
        }
        ?>
    </div>
</body>
</html>
