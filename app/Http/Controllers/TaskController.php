<?php

namespace App\Http\Controllers;
use Laravel\Passport\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function addTask(Request $request) {
        $validator      =           Validator::make($request->all(),
            [
                "task"        =>      "required",
                "user_id"       =>      "required",
            ]
        );

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }
        $task_array         =       array(
            "task"        =>      $request->task,
            "user_id"     =>      $request->user_id
        );
        $task               =       Task::create($task_array);
        $taskObject = Task::where('id', $task->id)->get();
        if(!is_null($task)) {
            return response()->json(["status" => 1,"message"=>"successfully created a task", "taskObject" => $taskObject]);
        }

        else {
            return response()->json(["status" => "failed",  "message" => "Whoops! task not created."]);
        }

      }
      public function changeStatus(Request $request) {
          $validator      =           Validator::make($request->all(),
              [
                  "task_id"        =>      "required",
                  "status"       =>      "required",
              ]
          );

          if($validator->fails()) {
              return response()->json(["validation_errors" => $validator->errors()]);
          }
          $task_array         =       array(
              "status"        =>      $request->status
          );
          $task_id            =       $request->task_id;
          $task_status    =       Task::where("id", $task_id)->update($task_array);
          response()->json(["status" => $task_status]);
          if($task_status==1){
          $taskObject = Task::where('id', $task_id)->get();
          if($request->status=="done"){
            return response()->json(["status" => 1,"message"=>"Marked task as done", "taskObject" => $taskObject, 'ts'=>$task_status]);
          }
          else if($request->status=="pending"){
            return response()->json(["status" => 1,"message"=>"Marked task as pending", "taskObject" => $taskObject]);
          }
        }
        else{
          return response()->json(["message"=>"Task Doesnot Exist"]);
        }

        }


}
