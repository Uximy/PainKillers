<?php
session_start();
require_once './db.php';
$db = connect('localhost', 'user', 'password', 'db_name');

function is_Admin()
{   
    if (isset($_SESSION['session_admin'])) {
        return true;
    } else {
        return false;
    }
}

function is_Uximy()
{
    if ($_SERVER['REMOTE_ADDR'] == '2.135.145.69') {
        return true;
    } else {
        return false;
    }
}

function Content($version = '0.001')
{
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $segments = explode('/', trim($url, '/'));

    $title = null;
    $style = null;
    $file = null;

    if ($segments[0] === '') {
        $file = '/Home/home.php';
    } elseif ($segments[0] === 'news') {
        $title = "News";
        $file = 'news/news.php';
        $style = 'news/news.css';
    } elseif ($segments[0] === 'news-more') {
        $title = "News More";
        $file = 'news/more.php';
        $style = 'news/news.css';
    } elseif ($segments[0] === 'tournament') {
        $title = "Tournament";
        $file = 'tournament/tournament.php';
        $style = 'tournament/tournament.css';
    } elseif ($segments[0] === 'partners') {
        $title = "Partners";
        $file = 'partner/partner.php';
        $style = 'partner/partner.css';
    } elseif ($segments[0] === 'privacy-policy') {
        $title = "Privacy Policy";
        $file = 'Privacy Policy/privacy_policy.php';
        $style = 'Privacy Policy/privacy_policy.css';
    } elseif ($segments[0] === 'admin') {
        $title = "Admin Panel";
        $file = 'admin/admin.php';
        $style = 'admin/admin.css';
    } 
    elseif ($segments[0] === 'test')
    if (is_Uximy()) {
        $title = "Test Room";
        $file = 'test/test.php';
        $style = 'test/test.css';
    } else
        $file = '/404.php';
    elseif (is_Admin())
        if ($segments[0] === 'add-news'){
            $file = 'news/handler/add_news.php';
            $style = 'news/news.css';
        }
        elseif ($segments[0] === 'edit-news'){
            $file = 'news/handler/editNews.php';
            $style = 'news/news.css';
        }
        elseif ($segments[0] === 'add-tournament'){
            $file = 'tournament/handler/addTournament.php';
            $style = 'tournament/tournament.css';
        }
        elseif ($segments[0] === 'edit-tournament'){
            $file = 'tournament/handler/editTournament.php';
            $style = 'tournament/tournament.css';
        }
        else
            $file = '/404.php';
    else
        $file = '/404.php';

    return ['pages/'.$file, $title ? ' | '.$title : $title, $style ? "<link rel='stylesheet' href='../pages/".$style."?vs=".$version."'>" : ''];
}

function Count_Uximy()
{
    $today = getdate();
    $myday = $today["mday"]; // получаем сегодняшний день
    $ip = $_SERVER['REMOTE_ADDR']; // получаем IP посетителя
    $myfile = fopen("mycount.txt", "a"); // создаём пустой файл mycount.txt если его нет
    fclose($myfile);
    $mydaten = file("mycount.txt");
    $myday1 = trim($mydaten[0], "\r\n"); // получаем день последнего посещения
    if ($myday != $myday1) { // если он не совпадает с сегодняшним днём
        $myfile = fopen("ip_list.txt", "w"); // создаём по-новой файл ip_list.txt
        fwrite($myfile, "\r\n" . $ip); // записываем IP посетителя
        fclose($myfile);
        $myfile = fopen("mycount.txt", "w");
        fwrite($myfile, $myday);
        fclose($myfile);
    }
    $ip_array = file("ip_list.txt"); // получаем массив из IP посетителей
    $used_ip = array_search($ip, $ip_array); // ищем в нём текущий IP
    if ($used_ip == false) { // если он не находится
        $myfile = fopen("ip_list.txt", "a");
        fwrite($myfile, "\r\n" . $ip); // то добавляем
        fclose($myfile);
        $ip_array = file("ip_list.txt"); // получаем массив из IP посетителей
    }


    $myusers = sizeof($ip_array) - 1; // получаем количество посетителей
    return $myusers;
}
