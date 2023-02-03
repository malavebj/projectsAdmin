<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $response=["msg"=>"","status"=>0];
        $data=json_decode($request->getContent());
        $user=User::where('email',$data->email)->first();
        if($user){
            if(Hash::check($data->password,$user->password)){
                $token = $user->createToken('example');
                $response["status"]=1;
                $response["msg"]=$token->plainTextToken;
            }else{
                $response["msg"] = "Password Incorrect";
            }
        }else{
            $response["msg"] = "Email is not registered in BBDD";
        }
        return response()->Json($response);
    }

    public function projects(Request $request)
    {
        $projects=Project::all();
        return response()->Json($projects);

    }

    public function tasks(Request $request)
    {
        $tasks=Task::all();
        return response()->Json($tasks);

    }

    public function users(Request $request)
    {
        $users=User::all();
        return response()->Json($users);
    }

    public function user(Request $request)
    {
        return response()->Json($request->user());
    }    
}
