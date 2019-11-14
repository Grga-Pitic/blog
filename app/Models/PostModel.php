<?php


namespace App\Models;


class PostModel {
    private $data;

    function __construct(array $data) {
        $this->data = $data;
    }

    public function getDataElement(string $name) {
        return $this->data[$name];
    }

}