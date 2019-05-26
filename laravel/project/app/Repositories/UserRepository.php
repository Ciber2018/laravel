<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 13/5/2019
 * Time: 23:24
 */

namespace App\Repositories;


use App\User;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use	Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class UserRepository implements UserRepositoryInterface
{

    public function getUserNameByID()
    {
        // TODO: Implement getUsername() method.
        $id = auth()->user()->getAuthIdentifier();
        //$username = User::where('id', $id)->first();
        $username = User::find($id);
        return $username->username;
    }

    public function getUserByID($id)
    {
        // TODO: Implement getUserByID() method.
        $user = User::find($id);
        return $user;
    }

    public function editUserByID($name,$pass)
    {
        $id = \auth()->user()->getAuthIdentifier();
        $user = User::find($id);

        if ($name != "")
        {
            $user->username = $name;
            $user->save();
        }elseif ($pass != "")
        {
            $user->password = Hash::make($pass);
            $user->save();
        }else
        {
            $user->username = $name;
            $user->password = Hash::make($pass);
            $user->save();
        }

    }

    public function allUsers()
    {
        // TODO: Implement allUsers() method.
        $users = User::all();
        return $users;
    }

    public function getReporte()
    {
        // TODO: Implement getReporte() method.

    }
}