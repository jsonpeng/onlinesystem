<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }

    /**
     * 用户列表
     */
    public function index(Request $request)
    {
        $input=$request->all();

        $tools=$this->varifyTools($input);

        //默认的数值
        $user = $this->defaultSearchState(app('user')->model(),true);

        $user=$this->descAndPaginateToShow($user);

        return  view('user.index')
                ->with('user', $user)
                ->with('tools',$tools)
                ->with('input',$input); 
    }

    public function edit(){

    }


    public function update(){

    }

    public function destroy(){

    }
}
