<?php
$result = $_GET['edit'];

$info = $db->query("SELECT * FROM `tournament` WHERE id=$result")->fetchObject();

if ($info === false) {
    echo "you've gone beyond!";
    echo '<style>
                .container{
                    display: none;
                }
              </style>';
}

$input = $_POST['input'];

if ($input) {
    $img = $_FILES['img']['name'] ? $_FILES['img']['name'] : 'painkillers_text.png';
    $arr = [htmlspecialchars($_POST['Title']), htmlspecialchars($_POST['Link']), $img, htmlspecialchars($_POST['Date']), htmlspecialchars($_POST['Prize'])];
    $db->query("UPDATE `tournament` SET `Title`='$arr[0]',`link`='$arr[1]', `img`='$arr[2]', `date`='$arr[3]', `prize`='$arr[4]' WHERE id=$result");
    move_uploaded_file($_FILES['img']['tmp_name'], 'img/tournament/' . $_FILES['img']['name']);
    header("Refresh:0 url=/tournament", 200);
}
?>


<div class="container container_ActionTournament">
    <a href="/tournament"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
    <form class="form" method="POST" enctype="multipart/form-data">
        <p><label>Tournament name: </label><input class="form-control" name="Title" value="<?= $info->Title ?>" placeholder="Title" required></p>
        <p><label>Tournament start date:</label><input type="date" value="<?= $info->date ?>" name="Date" min="2018-01-01" required></p>
        <p><label>Prize fund:</label><input type="number" min="0" max="2147483647" value="<?= $info->prize ?>" name="Prize" placeholder="Prize fund" required></p>
        <p><label>Link tournament table:</label><input type="url" placeholder="https://example.com" value="<?= $info->link ?>" pattern="https://.*" size="30" name="Link"></p>
        <div class="input_wrapper">
            <input name="fileImages" type="file" id="input_file-2" class="input input_file" type="file" accept=".jpg, .jpeg, .png" id="formFile">
            <label for="input_file-2" class="input_file-button">
                <span class="input_file-icon-wrapper"><img class="input__file-icon" src="../img/add.svg" alt="Select a file" width="25"></span>
                <span class="input_file-button-text">Select Image</span>
            </label>
        </div>
        <p><input type="submit" id="input" name="input" class="btn_Send" value="Edit Tournament"></p>
    </form>
</div>