<?php
include 'connect.php';

$sql = "SELECT title, content FROM blog";
$result = $conn->query($sql);

$posts = [];
if ($result->num_rows > 0) {
    // Fetch all posts
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blogs</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <div class="Logo">
                <span> <a class="LogoText" href="index.html" target="_self">S.M.</a></span>
            </div>
    
            <nav>
                <ul class="MenuLink">
                    <li><a href="index.html" target="_self">Home</a></li>
                    <li><a href="Gallery.html" target="_self">Gallery</a></li>
                    <li><a href="blog.php" target="_self">Blogs</a></li>
                    <li><a href="Contact.html" target="_self">Contact</a></li>
                        </ul>
            </nav>
        </header>

        <main class="blog-content">
        <article>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <h2 style="color: aqua;"><?php echo htmlspecialchars($post['title']); ?></h2>
                    <p style="font-weight: 600;"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <br>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No posts available.</p>
            <?php endif; ?>
        </article>
    </main>
</body>
</html>