<?php
$result = $_GET['edit'];

$info = $db->query("SELECT * FROM `news` WHERE id=$result")->fetchObject();

$input = $_POST['input'];

if ($input) {
    $img = $_FILES['img']['name'] ? $_FILES['img']['name'] : 'standart.png';
    $arr = [htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']), $img, htmlspecialchars($_POST['categoty'])];
    $db->query("UPDATE `news` SET `Title`='$arr[0]',`content`='$arr[1]', `Img_Path`='$arr[2]', `category`='$arr[3]' WHERE id=$result");
    move_uploaded_file($_FILES['img']['tmp_name'], 'img/news/' . $_FILES['img']['name']);
    header("Refresh:0 url=/news", 200);
}
?>


<div class="container container_actiomNews">
    <a href="/news"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
    <form class="form form_edit" method="POST" enctype="multipart/form-data">
        <p><label>News headline:</label><input name="title" value="<?= $info->Title ?>" type="text"></p>
        <p><label>Сontent:</label><textarea name="content" cols="30" rows="10" data-lt-tmp-id="lt-388545" spellcheck="false"><?= $info->Content ?></textarea></p>
        <div class="select">
            <Select name="categoty">
                <option value="Arcticle">Arcticle</option>
                <option value="Game">Game</option>
            </Select>
        </div>
        <div class="input_wrapper">
            <input name="img" type="file" id="input_file-2" class="input input_file" type="file" accept=".jpg, .jpeg, .png" id="formFile">
            <label for="input_file-2" class="input_file-button">
                <span class="input_file-icon-wrapper"><img class="input__file-icon" src="../img/add.svg" alt="Select a file" width="25"></span>
                <span class="input_file-button-text"><?= $info->Img_Path ?></span>
            </label>
        </div>
        <input name="input" class="btn_Send" type="submit" value="Send">
    </form>
    <?php
        if ($info === false) {
            echo "<p class='error_text_News'>You gone beyond! Please click the «back» button to return to the news page.</p>";
            echo '<style>
                        .form_edit{
                            display: none;
                        }
                      </style>';
        }
    ?>
</div>