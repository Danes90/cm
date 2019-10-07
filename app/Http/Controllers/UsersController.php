<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequestRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Users
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $users = User::all();

        return response()->json([
            "users" => $users
        ], 200);
    }

    /**
     * User
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $user = User::whereId($id)->first();

        return response()->json([
            "user" => $user
        ], 200);
    }

    /**
     * New User
     * @param CreateUserRequestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function new(CreateUserRequestRequest $request)
    {
        $user = User::create($request->only(["name", "email","password"]));

        return response()->json([
            "user" => $user
        ], 200);
    }

    /**
     * Update User
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreUserRequest $request)
    {

        $user = User::whereId($request->id)->first();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;

        $user->save();

        return response()->json([
            "user" => $user
        ], 200);

    }

    /**
     * Delete User
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $user= User::whereId($id)->first();

        $user->delete();

        return response()->json([
            "user" => $user
        ], 200);

    }


}

