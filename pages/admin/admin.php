<?php
    /*
    function exit_admin()
    {
        session_destroy();
        header("Refresh:0");
    }
        !будущая функция выхода из админ панель
    */
    // $arr['Session_admin'] = $_GET['Session_admin'];
    // echo json_encode($arr);

    try{
        $info = '';

        $_SESSION['session_admin'] = null;

        if (is_Admin()) {
            $info = '<p class="info_admin">You are already logged in to the admin panel!</p>';
            echo '<style>
                    .panel{
                        display: none !important;
                    }
                    .info_admin{
                        position: relative;
                        bottom: 0;
                    }
                 </style>';
        }else{
            $result = $db->query('SELECT * FROM panel')->fetchObject();

            $data = [htmlspecialchars($_POST['login'] ?? ''), htmlspecialchars($_POST['password'] ?? '')];

            if ($data[0] === $result->login && $data[1] === $result->password) {
                $_SESSION['session_admin'] = true;
                $info = '<p class="info_admin">You are logged in!</p>';
                header("Refresh:0 url=/");
            }
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>

<section class="container container_admin">
    <div class="panel">
        <form class="panel" method="POST" enctype="multipart/form-data">
            <input name="login" type="text" placeholder="Login">
            <input name="password" type="password" placeholder="Password">
            <input class="btn_login" type="submit" value="login">
        </form>
    </div>

    <?= $info; ?>
</section>