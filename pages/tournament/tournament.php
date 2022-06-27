<?php

$result = $db->query("SELECT * FROM `tournament`")->fetchAll();

$delete = $_POST['delete'] ?? null;

if ($delete) {
    $db->query("DELETE FROM `tournament` WHERE `id` = $delete");
    $db->query("UPDATE `tournament` SET id='" . $delete . "' WHERE id='" . $delete + 1. . "'");
    // var_dump($delete);
    // $db -> query("ALTER TABLE news AUTO_INCREMENT = $delete");
    header("Refresh:0 url=/tournament", 200);
}

// INSERT INTO `tournament`(`Title`, `img`, `date`, `prize`) VALUES ('Test', 'test.png', '2022-05-23', '10000')

function Reader($result)
{
    if ($result) {
        asort($result);
        foreach ($result as $value) {
            $fmt = numfmt_create('en_CA', NumberFormatter::DECIMAL);
            $prize = numfmt_format_currency($fmt, $value[5], 'en_CA');
            // var_dump($result);
            echo '
                <div class="card_Tournament">';
                if (is_Admin()) {
                    echo"
                        <div class='action'>
                            <form class='' action='/edit-tournament' method='GET'>
                                <input type='hidden' name='edit' value='".$value[0]."'/>
                                <input type='submit' class='btn btn-action edit' value=''/>
                            </form>
                            <form class='delete' method='POST'>
                                <input type='hidden' name='delete' value='".$value[0]."'/>
                                <input type='submit' class='btn btn-action trash' value=''/>
                            </form>
                        </div>
                    ";
                }
            echo '
                    <div class="title_img"><img src="../img/tournament/' . $value[3] . '" draggable="false" alt="Tournament"></div>
                    <div class="body_Tournament">
                        <div class="head">';
            echo $value[2] !== '' && isset($value[2]) ? '<span class="title"><a href="' . $value[2] . '" target="_blank">' . $value[1] . '</a></span>' : '<span class="title">' . $value[1] . '</span>';
            echo '           <small class="date">' . $value[4] . '</small>
                        </div>
                        <div class="footer_Tournament">
                            <span class="prize">Prize:</span>
                            <small class="money">$' . $prize . '</small>
                        </div>
                    </div>
                </div>
            ';
        }
    } else {
        return '<span class="no_result">There are currently no tournaments!</span>';
    }
}
?>


<section class="home_container">
    <div class="title_container">
        <h2>Tournaments</h2>
        <?php
        if (is_Admin()) {
            echo '<a class="create_card" href="/add-tournament">Add Tournament</a>';
        }
        ?>
    </div>
    <div class="container container_Tournament">

        <?php
            Reader($result);
        ?>

    </div>
</section>