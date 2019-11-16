<?php


namespace App\Models;

/**
 * Class PostModel
 * @package App\Models
 *
 * Модель поста. Содержит в себе массив с данными и метод для их получения.
 *
 */
class PostModel {
    private $data;

    function __construct(array $data) {
        $this->data = $data;
    }

    public function getDataElement(string $name) {
        return $this->data[$name];
    }

}