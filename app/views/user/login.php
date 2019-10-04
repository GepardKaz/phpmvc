<!DOCTYPE html>
<html>
<head>
	<title>Tasks</title>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    
<div class="container">
    <h2>Авторизация</h2>
    <hr>
        <div class="center">
			<div class="col-4">
            <span class="badge badge-danger"><?=$data['error']?></span>
                <form action="/public/users/index"  method="post">
                    <div>
                        Логин:
                        <input type="text" name="username" class="form-control" id="username" />
                        Пароль:
                        <input type="password" class="form-control" name="password" id="password" />  <br>  
                        <input type="submit" name="loginBtn" id="loginBtn" class="form-control btn btn-success" value="Войти" />
                    </div>
                </div>
            </div>
    </form>
</div>
</body>
</html>