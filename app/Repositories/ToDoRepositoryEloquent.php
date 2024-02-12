<?php
namespace App\Repositories;

use App\Models\ToDo;

class ToDoRepositoryEloquent implements ToDoRepository
{
    public function create(array $attributes)
    {
        return ToDo::create($attributes);
    }

    public function getByUserId(int $userId, int $perPage = 10)
    {
        return ToDo::where('user_id', $userId)->paginate($perPage);
    }

    public function find(int $id)
    {
        return ToDo::find($id);
    }

    public function update(int $id, array $attributes)
    {
        $todo = $this->find($id);
        if ($todo) {
            $todo->update($attributes);
            return $todo;
        }
        return null;
    }

    public function delete(int $id)
    {
        $todo = $this->find($id);
        if ($todo) {
            $todo->delete();
            return true;
        }
        return false;
    }
}
