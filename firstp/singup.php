<?php
    require "db.php";


    $data = $_POST;
    if (isset($data['do_signup']))
    {
        //здесь регистрируем
        $errors = array();
        if (trim($data['Login'] == ''))
        {
            $errors[] ='Введите логин!';
        }

        if (trim($data['Email'] == ''))
        {
            $errors[] ='Введите Email!';
        }

        if ($data['Password'] == ''){
            $errors[] ='Введите пароль!';
        }
        if ($data['Password_2'] != $data['Password'])
        {
            $errors[] ='Повторный пароль не верный!';
        }

        if (R::count('users', "Login = ?", array($data['Login'])) > 0)
        {
            $errors[] ='Пользователь с таким логином уже существует!';
        }

        if (R::count('users', "Email = ?", array($data['Email'])) > 0)
        {
            $errors[] ='Пользователь с таким Email уже существует!';
        }

        if (empty($errors))
        {
            //все хорошо, можно регистрировать
            $user = R::dispense('users'); //создаем таблицу в БД "users"
            $user->login = $data['Login'];
            $user->email = $data['Email'];
            $user->password = password_hash($data['Password'], PASSWORD_DEFAULT);

            R::store($user);
            echo '<div style="color: green;">Вы успешно зарегистрировались!<br>Можете перейти на <a href="/firstp/index.php">главную</a>страницу!</div><hr>';

        } else
            {
            echo '<div style="color: red;">'. array_shift($errors).'</div><hr>';
        }
    }
?>

<form action="singup.php" method="POST">

    <p>
        <p><strong>Ваш логин</strong>:</p>
        <input type="text" name="Login" value="<?php echo @$data['Login']; ?>">
    </p>

    <p>
        <p> <strong>Ваш Email</strong>:</p>
        <input type="email" name="Email" value="<?php echo @$data['Email']; ?>">
    </p>

    <p>
        <p> <strong>Ваш пароль</strong>:</p>
        <input type="password" name="Password" value="<?php echo @$data['Password']; ?>">
    </p>

    <p>
        <p> <strong>Введите Ваш пароль еще раз!</strong>:</p>
        <input type="password" name="Password_2" value="<?php echo @$data['Password_2']; ?>">
    </p>

    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>

</form>

