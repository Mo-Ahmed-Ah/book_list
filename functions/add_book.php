<?php
include '../class/Connection.php';
include '../class/Flteration.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'book_name' => $_POST['book_name'],
        'book_author' => $_POST['book_author'],
        'book_link' => $_POST['book_link'],
        'number_of_pages' => $_POST['number_of_pages'],
        'book_category' => $_POST['book_category'],
        'book_source' => $_POST['book_source'],
        'status' => $_POST['status'],
        'book_photo' => $_FILES["book_photo"]["name"]
    ];

    // التحقق من البيانات
    $flteration = new Flteration();
    $errors = $flteration->validateData($data);

    if (empty($errors)) {
        // إعداد مجلد التحميل
        $target_dir = "../uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); // إنشاء المجلد إذا لم يكن موجودًا
        }
        $target_file = $target_dir . basename($_FILES["book_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // التحقق من أن الملف هو صورة فعلًا
        $check = getimagesize($_FILES["book_photo"]["tmp_name"]);
        if ($check !== false) {
            // تغيير حجم الصورة
            $uploadedFile = $_FILES["book_photo"]["tmp_name"];
            $newWidth = 150;
            $newHeight = 150;

            switch ($imageFileType) {
                case 'jpg':
                case 'jpeg':
                    $src_image = imagecreatefromjpeg($uploadedFile);
                    break;
                case 'png':
                    $src_image = imagecreatefrompng($uploadedFile);
                    break;
                case 'gif':
                    $src_image = imagecreatefromgif($uploadedFile);
                    break;
                default:
                    echo "Unsupported image type.";
                    exit;
            }

            $src_width = imagesx($src_image);
            $src_height = imagesy($src_image);

            $dst_image = imagecreatetruecolor($newWidth, $newHeight);

            // تغيير حجم الصورة
            imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $newWidth, $newHeight, $src_width, $src_height);

            // حفظ الصورة المعدلة إلى المجلد الهدف
            switch ($imageFileType) {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($dst_image, $target_file);
                    break;
                case 'png':
                    imagepng($dst_image, $target_file);
                    break;
                case 'gif':
                    imagegif($dst_image, $target_file);
                    break;
            }

            // تنظيف الموارد
            imagedestroy($src_image);
            imagedestroy($dst_image);

            // تعيين مسار الصورة المعدلة في البيانات
            $data['book_photo'] = $target_file;

            // تخزين البيانات في قاعدة البيانات
            $db = new Connection();
            $result = $db->saveData($data);

            if ($result) {
                echo "Book added successfully.";
            } else {
                echo "Error adding book.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
