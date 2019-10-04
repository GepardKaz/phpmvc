<!DOCTYPE html>
<html>
<head>
	<title>Tasks</title>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	 <header>
		<?php
		use Models\User;
		$user = User::find(1);

		if(!$user){
			$user = User::create(['id'=>'1','username'=>'admin','email'=>'admin@mail.com','password'=>'123']);
		}
	
		include '../app/views/layouts/header.php';?>
	</header> 

<div class="container">
	<h3>Добавить задачу</h3>
	<hr>
	<form action="/public/tasks/store"  method="POST" >
		<div class="row">
			<div class="col-3">
			<input type="text" name="username" id="username" class="form-control" placeholder="Имя пользователя">
			</div>
			<div class="col-3">
				<input type="text" name="email" id="email" class="form-control" placeholder="E-mail" aria-describedby="fileHelp">
				<small id="fileHelp" class="form-text text-muted"><em style="color:red;"><?=$data['mail_validate'];?></em></small>
			</div>
			<div class="col-4">
				<textarea class="form-control" name="text" id="text" rows="3" placeholder="Текст задачи"></textarea>
			</div>
			<div class="col-2">
				<button type="submit" name="submit" id="submit" class="btn btn-success">Добавить</button>
			</div>
		</div>
	</form>
	<hr>
	
	<span class="badge badge-success"><?=$data['success']?></span> 
	<span class="badge badge-warning"><?=$data['updated_successfuly']?></span> 
	<span class="badge badge-danger"><?=$data['error']?></span>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<th>id</th>
				<th>Пользователь</th>
				<th>Почта</th>
				<th>Статус</th>
				<th>Текст задачи</th>
				<th>Дата создания</th>
				<?php if ( isset( $_SESSION['user_id'] ) ){
						echo '<th>Операция</th>';
				}?>
			</thead>
			<tbody>
				<?php 
					use Models\Task;
					$tasks = Task::take('limit','3')->orderBy('username','ASC')->get();
					// $task->paginate(5);
					
					foreach($tasks as $task){
						
						echo '<tr><td>'.$task->id.'</td><td>'.$task->username.'</td><td>'.$task->email.'</td><td>';
						if($task->status_id == 0){echo '<span class="badge badge-success">Выполнено</span>';
						 }else{echo '<span class="badge badge-secondary">отредактировано администратором</span>';}
						 echo '</td><td>'.$task->text.'</td><td>'.$task->created_at.'</td>';
						 if ( isset( $_SESSION['user_id'] ) ){
							echo '<form action="/public/tasks/update" method="POST"><input type="hidden" name="task_id" value="'.$task->id.'" />';
							echo '<td>Нет<input type="radio" name="status_id" onclick="this.form.submit();" value="0" ';
								if($task->status_id == 0) echo "checked";
							echo '>Да<input type="radio" onclick="this.form.submit();" name="status_id" value="1"'; 
								if($task->status_id == 1) echo "checked";
							echo '></td></form></tr>';
						 }else{
							 echo "</tr>";
						 }
					}
					
					//  dd($data);
				?>
				
			</tbody>
		</table>
	
	</div>
</div>
</body>
<footer class="footer">
	<?php include '../app/views/layouts/footer.php';?>
</footer>
</html>
<!-- <script type="text/javascript">
  
</script> -->