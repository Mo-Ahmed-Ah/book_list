<?php

class Flteration
{
    private $items = []; // مصفوفة لتخزين العناصر

    // إضافة عنصر إلى المصفوفة
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    // عرض جميع العناصر
    public function getItems()
    {
        return $this->items;
    }

    // تطبيق فلتر على العناصر
    public function filterItems($callback)
    {
        return array_filter($this->items, $callback);
    }

    // عرض العناصر بعد تطبيق الفلتر
    public function getFilteredItems($callback)
    {
        $filteredItems = $this->filterItems($callback);
        return $filteredItems;
    }

    // التحقق من البيانات المدخلة
    public function validateData($data)
    {
        $errors = [];

        if (empty($data['book_name'])) {
            $errors[] = 'Book Name is required.';
        }

        if (empty($data['book_author'])) {
            $errors[] = 'Book Author is required.';
        }

        if (empty($data['book_photo'])) {
            $errors[] = 'Book Photo is required.';
        }

        if (empty($data['book_link']) || !filter_var($data['book_link'], FILTER_VALIDATE_URL)) {
            $errors[] = 'Valid Book Link is required.';
        }

        if (empty($data['number_of_pages']) || !is_numeric($data['number_of_pages'])) {
            $errors[] = 'Number of Pages must be a number.';
        }

        if (empty($data['book_category'])) {
            $errors[] = 'Book Category is required.';
        }

        if (empty($data['book_source']) || !filter_var($data['book_source'], FILTER_VALIDATE_URL)) {
            $errors[] = 'Valid Book Source is required.';
        }

        if (empty($data['status'])) {
            $errors[] = 'Status is required.';
        }

        return $errors;
    }
}
