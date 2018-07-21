<?php
    require "db.php";


    $data = $_POST;
    if (isset($data['do_login']))
    {
        $errors =array();
        $user = R::findOne('users', 'Login = ?', array($data['Login']));
        if ($user )
        {
            //логин существует
            if (password_verify($data['Password'], $user->password))
            {
                //все хорошо, логиним пользователя
                $_SESSION['logged_user'] = $user;
                echo '<div style="color: green;">Вы успешно вошли!<br>Можете перейти на <a href="/firstp/index.php">главную</a>страницу!</div><hr>';
            }else
                {
                    $errors[] = 'Пароль не верный!';
                }
        }else
            {
                $errors[] = 'Пользователь с таким логином не найден!';
            }

        if (! empty($errors))
        {
            echo '<div style="color: red;">'. array_shift($errors).'</div><hr>';

        }
    }

    ?>

<form action="hello.php" method="POST">

    <p>
    <p><strong>Логин</strong>:</p>
    <input type="text" name="Login">
    </p>

    <p>
    <p><strong>Пароль</strong>:</p>
    <input type="password" name="Password">
    </p>

    <p>
        <button type="submit" name="do_login">Войти</button>
    </p>
