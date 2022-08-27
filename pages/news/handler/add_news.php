<?php
$input = $_POST['input'] ?? 0;

if ($input) {
    move_uploaded_file($_FILES['fileImages']['tmp_name'], 'img/news/' . $_FILES['fileImages']['name']);
    $img = $_FILES['fileImages']['name'] ? $_FILES['fileImages']['name'] : 'standart.png';
    $arr = [htmlspecialchars($_POST['Title']), htmlspecialchars($_POST['Content']), $img, htmlspecialchars($_POST['Сategory'])];
    if (!$_POST['Title'] == null && !$_POST['Content'] == null && !$_POST['Сategory'] == null) {
        try {
            $db->query("INSERT INTO `news`(`Title`,`Content`,`Img_Path`,`category`) VALUES ('$arr[0]','$arr[1]','$arr[2]','$arr[3]')");
            header("Refresh:0 url=/news");
            // header("Refresh:0");
            exit();
        } catch (PDOException $e) {
            echo "Query error: " . $e->getMessage();
        }
    }
}
?>

<section class="container container_actiomNews">
    <a href="/news"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
    <form class="form" method="POST" enctype="multipart/form-data">
        <p><label>News headline:</label><input class="form-control" name="Title" placeholder="Title"></p>
        <div class="content_news"><label>Сontent:</label><textarea class="form-control" name="Content" placeholder="Content" cols="28" rows="10" data-lt-tmp-id="lt-388545" spellcheck="false"></textarea></div>
        <div class="select">
            <Select name="Сategory">
                <option value="Arcticle">Arcticle</option>
                <option value="Game">Game</option>
            </Select>
        </div>
        <div class="input_wrapper">
            <input name="fileImages" type="file" id="input_file-2" class="input input_file" type="file" accept=".jpg, .jpeg, .png" id="formFile">
            <label for="input_file-2" class="input_file-button">
                <span class="input_file-icon-wrapper"><img class="input__file-icon" src="../img/add.svg" alt="Select a file" width="25"></span>
                <span class="input_file-button-text">Select Image</span>
            </label>
        </div>
        <!-- <p><input class="form-control input_file" name="fileImages" type="file" accept=".jpg, .jpeg, .png" placeholder="Select Image" id="formFile"></p> -->
        <p><input type="submit" id="input" name="input" class="btn_Send" value="Send"></p>
    </form>
</section>