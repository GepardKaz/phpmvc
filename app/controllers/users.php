<?php 
use Models\User;
session_start();
class Users extends Controller
{
	
	public function index()
	{
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $user = User::find(1);
        if ($username == $user->username && $password == $user->password) {
            $_SESSION['user_id'] = 1;
           return $this->view('user/profile',['success' => 'Авторизация прошла успешно!']);
        } else {
            // echo json_encode(array('success' => 0));
          $this->view('user/login',['error' => 'Ошибка! Неверный логин или пароль!']);
        }
        
    }
    public function login()
	{
       $this->view('user/login');
    }
    public function logout(){
        session_destroy();
        header("Location: http://".$_SERVER['SERVER_NAME']."/public/tasks/index");
        die();
    }

    public function profile()
	{
       $this->view('user/profile');
    }
    

    public static function create_user($username, $email, $password){
        $user = User::create(['username'=>$username,'email'=>$email,'password'=>$password]);
        return $user;
    }
	


}