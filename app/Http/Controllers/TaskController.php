<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $task;

    public function __construct(Task $task)
    {
        // $this->middleware('auth:api');
        $this->task = $task;
    }
    public function index()
    {

        $data = $this->task::all();
        return view('templates.blank', [
            'data' => $data,
            'i' => 0,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),[
            'task' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails())
        {
            return [
                'status'        => 'warning',
                'status_code'   =>  400,
                'message'       => 'Validation Errors',
                'error'         => $validator->errors()
            ];
        }

        try {
            $result = $this->task->create($request->all());
            $data = [
                "response" => "success",
                "value"    => $result
            ];
        } catch (\Throwable $th) {
            $data = [
                "response" => "error",
                "value"    => $th->getMessage()
            ];
        }
        // return response()->json($data);
        return  redirect(route('task.index'));
        // return  $request->all();

    }


    public function show($id)
    {
        return $this->task::findorfail($id);
    }


    public function edit(task $task)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = [

            'task'        => $request->task,
            'status'     => $request->status,

        ];
        return $this->task::findOrFail($id)->update($data);
    }


    public function destroy($id)
    {
      $this->task::findOrFail($id)->delete();
      return  redirect(route('task.index'));
    }
}
