<?php


namespace App\Repositories\blog\base;

/**
 * Interface IBlogRepository
 * @package App\Repositories\blog\base
 *
 * Интерфейс предоставляет доступ к хранилищу постов блога.
 *
 */
interface IBlogRepository {
    /**
     * Возвращает модель поста, найденную по id.
     *
     * @param int $id
     * @return PostModel
     */
    function getPostById(int $id);

    /**
     * Возвращает массив с несколькими последними постами.
     *
     * @return array of PostModel
     */
    function getLatestPosts();

    /**
     * Возвращает массив с выборкой постов, сделанной на основе параметров.
     *
     * @param array $parameters
     * @return array of PostModel
     */
    function getPostList(array $parameters);

    /**
     * Общее количество постов в хранилище.
     *
     * @return int
     */
    function getCount();
}