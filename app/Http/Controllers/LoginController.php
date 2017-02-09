<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

//use Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request $request)
    {

        $messsages = array(
            'username.required' => 'You need to type Mail Addres to Log In',
            'username.exists' => 'The Mail Address was not there in our Database',
            'password.required' => 'Password cannot be left blank',
            'usertype' => 'Please select the proper User Type',
        );

        $rules = array(

            'username' => 'required|email|exists:users,username',
            'password' => 'required|exists:users,password',
            'usertype' => 'required|exists:users,usertype',

        );

        $validator = Validator::make(Input::all(), $rules, $messsages);
        $request->flash();
        if ($validator->fails()) {
            return redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $result = DB::table('users')
                ->where('username', request('username'))
                ->where('password', request('password'))
                ->where('usertype', request('usertype'))
                ->count();

            if ($result == 1) {
                if (request('usertype') == "teacher")
                    return redirect('/dashboard/teacher');
                else if (request('usertype') == "student")
                    return redirect('/dashboard/student');
                else if (request('usertype') == "principal")
                    return redirect('/dashboard/principal');
            }
        }
        /*
          //$mailCount = DB::table('users')->where('username','aa')->count();
          $mailCount = DB::table('users')->where('username',request('username'))->count();
          if($mailCount)
          {
            $passwordCount=DB::table('users')->where('password',request('password'))->count();
            //if($passwordCount)
          }
          else {
            //print_r($mailCount);
            //echo '<script>alert("I am here")</script>';
            //return redirect('/custom_code')->withErrors(['username','We dont have the username in our records']);
            return Redirect::to('custom_code')
              ->withInput()
              ->withErrors('username','Login');
          }
          //print_r($mailCount);
          //dd(request()->all());
          //print_r($mailCount);
          */

    }
}
