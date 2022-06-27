<?php
$page = $_GET['page'] ?? 1;

$kol = 3;

$art = ($page * $kol) - $kol;

$result = $db->query("SELECT * FROM `news` LIMIT $art, $kol")->fetchAll();

$res = $db->query("SELECT COUNT(*) FROM `news`");

$row = $res->fetch();

$total = $row[0];

$str_pag = (int)ceil($total / $kol);

$delete = $_POST['delete'] ?? null;

if ($delete) {
    $db->query("DELETE FROM `news` WHERE `id` = $delete");
    $db -> query("UPDATE `news` SET id='".$delete."' WHERE id='".$delete + 1.."'");
    // var_dump($delete);
    // $db -> query("ALTER TABLE news AUTO_INCREMENT = $delete");
    header("Refresh:0 url=/news", 200);
}

function Reader($result, $str_pag)
{
    if ($result) {
        foreach ($result as $k => $value) {
    
            echo "
            <div class='card'>
                ";
            if (is_Admin()) {
                echo"
                    <div class='action'>
                        <form action='/edit-news' method='GET'>
                            <input type='hidden' name='edit' value='".$value[0]."'/>
                            <input type='submit' class='btn btn-action edit' value='Edit'/>
                        </form>
                        <form class='delete' method='POST'>
                            <input type='hidden' name='delete' value='".$value[0]."'/>
                            <input type='submit' class='btn btn-action' value='Delete'/>
                        </form>
                    </div>
                ";
            }
            echo"
                <div class='img_block'>
                    <img src='../img/news/".$value[3]."' draggable='false' alt=".$value[1].">
                </div>
                <div class='card_body'>
                ";
                echo"
                    <div class='card_top'>
                        <p class='card_category'>".$value[4]."</p>
                        <h5 class='card_title'>".$value[1]."</h5>
                        <p class='card_content'>".$value[2]."</p>
                    </div>
                </div>
                <form action='/news-more' method='POST'>
                    <input type='hidden' name='more' value='".$value[0]."'/>
                    <input type='submit' class='btn_more' value='more...' />
                </form>
            </div>
            ";
        }
        echo "
        <nav>
        ";
        if ($str_pag !== 1) {
            echo"
            <ul class='pagination'>
            ";
                for ($i = 1; $i <= $str_pag; $i++){
                    echo '<li><a class="number_page" href=?page='.$i.'>'.$i.'</a></li>';
                }
        echo "
            </ul>
            ";
        }
       
        echo"
        </nav>";
    }
    else{
        return '<span class="no_result">No News!</span>';
    }
}
?>




<section class="home_container">
    <div class="title_container">
        <h2>News</h2>
        <?php
            if (is_Admin()) {
                echo '<a class="create_card" href="/add-news">Create News</a>';
            }
        ?>
        
    </div>

    <div class="container">
        <?= Reader($result, $str_pag) ?>
    </div>
</section>