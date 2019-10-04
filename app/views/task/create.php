<!DOCTYPE html>
<html>
<head>
	<title>Tasks</title>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<!-- <header>
		<?php include '../app/views/layouts/header.php';?>
	</header> -->
    <div class="container">
        <h3>Добавить задачу</h3>
            <hr>
            <form action="/public/tasks/store/" method="POST" >
                <div class="row">
                    <div class="col-2">
                    <input type="text" name="username" class="form-control" placeholder="Имя пользователя">
                    </div>
                    <div class="col-3">
                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="col-4">
                        <textarea class="form-control" name="text" rows="3" placeholder="Текст задачи"></textarea>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" type="submit" >Добавить новую задачу</button>
                    </div>
                </div>
            </form>
        </div>
        </body>
    <footer class="footer">
        <?php include '../app/views/layouts/footer.php';?>
    </footer>
</html>