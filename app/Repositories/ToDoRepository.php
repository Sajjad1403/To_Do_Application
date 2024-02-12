<?php
namespace App\Repositories;

interface ToDoRepository
{

    public function create(array $attributes);

    public function getByUserId(int $userId, int $perPage = 10);

    public function find(int $id);

    public function update(int $id, array $attributes);

    public function delete(int $id);
}
