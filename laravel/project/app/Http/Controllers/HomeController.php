<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use	Illuminate\Database\Eloquent\Model;
use App\Repositories\UserRepositoryInterface;


class HomeController extends Controller
{

     protected $user_repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->middleware('auth');
        $this->user_repository = $user_repository;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_name = $this->user_repository->getUsernameByID();

        return view('home',['user' => $user_name]);
    }

    public function editar()
    {
        return view('editar');
    }

    public function editar_datos(Request $request)
    {
        $nuevo_nombre = $request->input('nombre');
        $nuevo_pass = $request->input('password');

      if ($request->isMethod('post'))
      {

          if ($nuevo_nombre == "" && $nuevo_pass == "")
          {
              return redirect()->action('HomeController@editar');
          }else
          {
              $this->user_repository->editUserByID($nuevo_nombre,$nuevo_pass);
          }

      }

      return view('succes',['msg' => 'Hecho']);

    }
}
