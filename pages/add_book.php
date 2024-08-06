<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="../styles/add_book.css">
</head>

<body>
    <div class="container">
        <h1>Add Book</h1>


        <form action="" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="date">Publication Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="summary">Summary:</label>
            <textarea id="summary" name="summary" rows="4" required></textarea>

            <button type="submit">Add Book</button>
        </form>
    </div>
</body>

</html>