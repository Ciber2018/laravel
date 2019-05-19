<?php
/**
 * Created by PhpStorm.
 * User: HOME
 * Date: 19/5/2019
 * Time: 11:05
 */

namespace App\Repositories;




use App\Card;
use Illuminate\Http\Request;

interface CardRepositoryInterface
{
    public function adicionar(Request $request);

}