<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 13/5/2019
 * Time: 23:21
 */
namespace App\Repositories;


interface UserRepositoryInterface{
    public function getUserNameByID();
    public function editUserByID($name,$pass);
    public function allUsers();
}