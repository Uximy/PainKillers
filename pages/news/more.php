<?php
    $data = $_POST['more'];



    
    $result = $db->query("SELECT * FROM `news` WHERE id=$data")->fetchObject();
?>

<section class="container container_more">
    <div class="action_more">
        <a href="/news" class="more_back">Back</a>
        <?php
            if (is_Admin()) {
                echo "
                <form action='/edit-news' method='GET'>
                    <input type='hidden' name='edit' value='$result->id'/>
                    <input type='submit' class='btn-action edit' value='Edit'/>
                </form>
                <form class='delete' method='POST'>
                    <input type='hidden' name='delete' value='$result->id'/>
                    <input type='submit' class='btn-action' value='Delete'/>
                </form>

                <style>
                    .action_more{
                        left: 1rem !important;
                    }
                </style>
                ";
            }
        ?>
    </div>
    <div class="more_title">
        <div class="more_img">
            <img src="../img/news/<?= $result->Img_Path ?>" alt="<?= $result->Img_Path ?>">
        </div>
        <h3><?= $result->Title ?></h3>
        <small><p class="more_category"><?= $result->category ?></p></small>
        </div>
        <div class="more_content">
            <p><?= $result->Content ?></p>
        </div>
</section>