<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Home.css">
    <title>Book Library</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include("./pages/nvegation.php")
    ?>

    <main>
        <section class="hero">
            <h1>Welcome to my Book Library</h1>
            <p>Explore a world of knowledge with our extensive collection of books.</p>
        </section>

        <section class="books">
            <h2>Featured Books</h2>
            <div class="book-list">
                <?php include("./pages/book.php") ?>
            </div>
        </section>
    </main>
    
    <?php include("./pages/contact.php") ?>



</body>

</html>