<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tasks\PostTasksRequest;
use Auth;
use App\Tasks;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTasks()
    {
        return view('tasks', [
            'tasks' => Tasks::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->get()
        ]);
    }

    /**
     * PostTasks
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postTasks(PostTasksRequest $request)
    {
        $task = new Tasks();
        $task->name = $request->name;
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect('/');
    }

    /**
     * DELETE TASKS
     *
     * @param integer $taskId 任務序號
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteTasks(int $taskId)
    {
        $tasks = Tasks::findOrFail($taskId);
        if ($tasks['user_id'] != Auth::user()->id) {
            return redirect('/')->withErrors(collect(['錯誤的使用者，不可刪除']));
        }

        $tasks->delete();
        return redirect('/');
    }
}
