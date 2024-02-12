<?php

namespace App\Http\Controllers\Todo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ToDoRepository;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{

    protected $toDoRepository;

    public function __construct(ToDoRepository $toDoRepository)
    {

        $this->toDoRepository = $toDoRepository;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id;

            $todos = $this->toDoRepository->getByUserId($userId);
            return response()->json($todos);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function show($id)
    {
        $todo = $this->toDoRepository->find($id);
        if (!$todo) {
            return response()->json(['error' => 'ToDo Record not found'], 404);
        }
        return response()->json($todo);
    }
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $attributes['user_id'] = Auth::user()->id;
        $todo = $this->toDoRepository->create($attributes);
        return response()->json($todo, 201);
    }
    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $todo = $this->toDoRepository->update($id, $attributes);
        if (!$todo) {
            return response()->json(['error' => 'ToDo Record not found'], 404);
        }
        return response()->json($todo);
    }

    public function destroy($id)
    {
        $result = $this->toDoRepository->delete($id);
        if (!$result) {
            return response()->json(['error' => 'ToDo not found'], 404);
        }
        return response()->json(['message' => 'ToDo Record deleted successfully']);
    }
}
