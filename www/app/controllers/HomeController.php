<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('default.layout.page');
	}
    public function getLogin(){
        $input = Input::all();
        if(isset($input['username']) && isset($input['_token']) && $input['_token'] == Session::get('_token')){
            if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password'])))
            {
                if(Auth::user()->pid != 0){
                    $person = Person::where('pid',Auth::user()->pid)->first();
                    if(!$person || !isset($person->pid)){
                        Auth::logout();
                        return Redirect::to('login')->with('message','Chưa có thông tin về người này.');
                    }
                    $employee = Employee::getEmployeeFullInfo($person->pid);
                    if($employee === null){
                        Auth::logout();
                        return Redirect::to('login')->with('message','Chưa có thông tin về nhân viên này hoặc <br><b>đã bị khóa</b>.');
                    }
                    $emprole = Employee::getEmployeeRole($person->pid);

                    $role = array();
                    foreach($emprole as $func){
                        $role[$func->function_code][$func->dept_code] = array(
                            'dept_code' => $func->dept_code,
                            'ward_code' => $func->ward_code,
                            'room_code' => $func->room_code,
                            'ward_type' => $func->ward_type,
                            'position_code' => $func->position_code,
                            'function_code' => $func->function_code,
                            'role' => $func->role
                        );
                    }
                    Session::put('user',array(
                        'username' => Auth::user()->username,
                        'id' => Auth::user()->id,
                        'name' => ($person->lastname.' '.$person->firstname),
                        'avatar' => $person->avatar,
                        'hospital_code' => $employee->hospital_code,
                        'hospital_name' => $employee->hospital_name,
                        'title_code' => $employee->title_code,
                        'title_name' => $employee->title_name,
                        'title_group' => $employee->title_group,
                        'empid' => $employee->id
                    ));
                    Session::put('role',$role);
//                    echo '<pre>';
//                    print_r($emprole);exit;
                }
                else{
                    Session::put('user',array(
                        'username' => 'admin',
                        'id' => 0,
                        'name' => 'Admin',
                        'avatar' => '',
                        'hospital_code' => 0,
                        'hospital_name' => 'Quản trị hệ thống',
                        'title_code' => 0,
                        'title_name' => 'Quản trị hệ thống',
                        'title_group' => 'admin',
                        'empid' => 0
                    ));
                }

                return Redirect::intended('/');
            }
            else return Redirect::to('login')->with('message','Tên tài khoản hoặc mật khẩu không đúng.');

        }
        return View::make(Config::get('main.theme').'.layout.login');

    }
    public function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::intended('/');
    }

}