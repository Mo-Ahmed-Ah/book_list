<?php
define('DB_NAME', 'Book');
define('USER_NAME', 'root');
define('PASS', '');
define('HOST', 'localhost');

class Connection
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DB_NAME;
        try {
            $this->pdo = new PDO($dsn, USER_NAME, PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function saveData($data)
    {
        $sql = "INSERT INTO Book_list (book_name, book_author, book_photo, book_link, number_of_pages, book_category, book_source, status) 
                VALUES (:book_name, :book_author, :book_photo, :book_link, :number_of_pages, :book_category, :book_source, :status)";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':book_name' => $data['book_name'],
                ':book_author' => $data['book_author'],
                ':book_photo' => $data['book_photo'],
                ':book_link' => $data['book_link'],
                ':number_of_pages' => $data['number_of_pages'],
                ':book_category' => $data['book_category'],
                ':book_source' => $data['book_source'],
                ':status' => $data['status']
            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Save failed: ' . $e->getMessage();
            return false;
        }
    }

    public function updateData($id, $data)
    {
        $sql = "UPDATE Book_list SET book_name = :book_name, book_author = :book_author, book_photo = :book_photo, 
                book_link = :book_link, number_of_pages = :number_of_pages, book_category = :book_category, 
                book_source = :book_source, status = :status WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':book_name' => $data['book_name'],
                ':book_author' => $data['book_author'],
                ':book_photo' => $data['book_photo'],
                ':book_link' => $data['book_link'],
                ':number_of_pages' => $data['number_of_pages'],
                ':book_category' => $data['book_category'],
                ':book_source' => $data['book_source'],
                ':status' => $data['status'],
                ':id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Update failed: ' . $e->getMessage();
            return false;
        }
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM Book_list WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo 'Delete failed: ' . $e->getMessage();
            return false;
        }
    }
}
