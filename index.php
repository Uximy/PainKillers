<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Without Pain to Victory!">
    <?php require_once 'handler.php' ?>
    <title>PainKillers Esports<?= Content()[1] ?></title>
    <link rel="shortcut icon" sizes="72x72" href="../img/logo.png" type="image/png">
    <link rel="apple-touch-icon" href="../img/logo.png" />
    <link rel="stylesheet" href="../css/new_style.css?vs=0.008">
    <?php
    echo Content('0.008')[2];
    echo $_SESSION['style'] ?? '' ? $_SESSION['style'] : "<link rel='stylesheet' href='../css/media.css?vs=0.007'>";
    ?>
    <?php
    if (is_Uximy()) {
        $clear = $_POST['clear_cache'] ?? '';
        if ($clear == 'true') {
            $_SESSION['style'] = "<link rel='stylesheet' href='../css/media.css?vs=" . rand(1, 100) . "'>";
            // $_SESSION['style'] = false; // чтобы сбросить конект стиля с рандомом
        }
    }
    Count_Uximy();
    if (is_Uximy()) {
        echo "
            <div class='count_uximy'>
                <p>Online: ".Count_Uximy()."<span id='count'></span></p>
            </div>
            ";
    }
    ?>
</head>

<body>
    <img class="background" src="../img/background.png" alt="background">
    <header>
        <div class="block_head">
            <div class="aside">
                <a href="/" class="logo">
                    <img src="../img/logo.png" draggable="false" alt="PainKillers">
                </a>
                <div class="social">
                    <a href="http://vk.com/pa1nkillers" target="_blank"><i class="fab fa-vk"></i></a>
                    <a href="http://twitter.com/esport_pain" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php
                    if (is_Uximy()) {
                        echo "
                                    <div class='action_uximy'>
                                        <form action='" . $_SERVER['REQUEST_URI'] . "' class='reset' method='POST'>
                                            <input type='hidden' name='clear_cache' value='true'/>
                                            <input type='submit' class='link_reset' value=''/>
                                            <i class='fas fa-recycle'></i>
                                        </form>
                                        <a href='/test'><i class='fas fa-dungeon'></i></a>
                                    </div>
                                ";
                    }
                    ?>
                </div>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/news">News</a></li>
                    <li><a href="/tournament">Tournaments</a></li>
                    <li><a href="/partners">Partners</a></li>
                    <?php if (is_Admin()) {
                        echo '<li><a href="/admin">Admin Panel</a></li>';
                    } ?>
                </ul>
            </nav>
        </div>
    </header>
    <section class="body">
        <?php
        require Content()[0];
        ?>
    </section>
    <footer>
        <div class="footer_logo">
            <a href="/" class="copy_logo">
                <img src="../img/logo.png" draggable="false" alt="PainKillers">
            </a>
            <div class="copy">
                <a href="/">PainKillers</a>
                <span><?= date('Y'); ?>. All rights reserved.</span>
            </div>
        </div>
        <div class="links">
            <a href="/privacy-policy">Privacy Policy</a>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/2d3fdcc76b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="./js/socket.io.js"></script> -->
    <!-- <script src="../js/script.js"></script> -->
</body>

</html>