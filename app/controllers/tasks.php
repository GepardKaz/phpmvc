<?php 
use Models\Task;
class Tasks extends Controller
{
	
	public function index()
	{
		// $tasks = Task::all();
		
		$this->view('/task/index');
		
	}

	public function create()
	{
		$this->view('/task/create');
	}

	public function store()
	{
		// $username = $_REQUEST['username'];
		 $email = $_REQUEST['email'];
		// $text = $_REQUEST['text'];

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$mail_validate = 'ok';
			$saveTask = Task::create([
				'username' => $_REQUEST['username'],
				'email' => $email,
				'status_id' => '0',
				'text' => $_REQUEST['text']
			]);
			if($saveTask){
				  $this->view('task/index', ['success' => 'Задача успешно добавлено!']);
			}
		  } else {
			$mail_validate =("$email не является действительным адресом электронной почты *");
			$this->view('task/index', ['error' => 'Ошибка! ','mail_validate'=>$mail_validate]);
		  }
		
	}

	public function update()
	{
		$task = Task::find($_REQUEST['task_id']);
		$task->status_id = $_REQUEST['status_id'];
		$updateTask = $task->save();

		if($updateTask){
			$this->view('/task/index',['updated_successfuly' => 'Задача успешно обновлено!']);
		}
	}
	
}