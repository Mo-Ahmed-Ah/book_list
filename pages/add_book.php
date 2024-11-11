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
        <form action="../functions/add_book.php" method="post" enctype="multipart/form-data">
            <!-- book name -->
            <div class="div">
                <label for="book_name">Book Name:</label>
                <input type="text" id="book_name" name="book_name" required>
            </div>

            <!-- book author -->
            <div class="div">
                <label for="book_author">Book Author:</label>
                <input type="text" id="book_author" name="book_author" required>
            </div>

            <!-- book photo -->
            <div class="div">
                <label class="custom-file-upload">
                    <input type="file" id="book_photo" name="book_photo" accept="image/*" required>
                    Book Photo
                </label>
                <div class="image-preview" id="image-preview">
                    <img id="book_photo_preview" src="" alt="Book Photo Preview">
                </div>
            </div>

            <!-- book link -->
            <div class="div">
                <label for="book_link">Book Link:</label>
                <input type="url" id="book_link" name="book_link" required>
            </div>

            <!-- number of pages -->
            <div class="div">
                <label for="number_of_pages">Number of Pages:</label>
                <input type="number" id="number_of_pages" name="number_of_pages" required>
            </div>

            <!-- book category -->
            <div class="div">
                <label for="book_category">Book Category:</label>
                <input type="text" id="book_category" name="book_category" required>
            </div>

            <!-- book source -->
            <div class="div">
                <label for="book_source">Book Source:</label>
                <input type="url" id="book_source" name="book_source" required>
            </div>

            <!-- status -->
            <div class="div">
                <label for="status">Status:</label>
                <div class="custom-select-wrapper">
                    <select id="status" name="status" required>
                        <option value="reading">Reading</option>
                        <option value="completed">Completed</option>
                        <option value="waiting">Waiting</option>
                    </select>
                </div>
            </div>

            <br>

            <button type="submit">Add Book</button>
        </form>
    </div>

    <script>
        document.getElementById('book_photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('image-preview');
            const previewImage = document.getElementById('book_photo_preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.src = '';
                previewContainer.style.display = 'none';
            }
        });
    </script>
</body>

</html>