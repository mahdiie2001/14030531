<?php
class Blog {
    private $title;
    private $body;
    private $author;
    private $csvFile = 'blogs.csv';

    public function __construct($title, $body, $author) {
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
    }

    public function save() {
        $file = fopen($this->csvFile, 'a');
        fputcsv($file, [$this->title, $this->body, $this->author]);
        fclose($file);
    }

    public static function getAll() {
        if (!file_exists('blogs.csv') || filesize('blogs.csv') == 0) {
            return [];
        }

        $blogs = [];
        $file = fopen('blogs.csv', 'r');
        while (($data = fgetcsv($file)) !== FALSE) {
            $blogs[] = $data;
        }
        fclose($file);
        return $blogs;
    }
}
