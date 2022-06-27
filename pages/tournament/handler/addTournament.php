<?php
    $input = $_POST['input'] ?? 0;

    if ($input) {
        move_uploaded_file($_FILES['fileImages']['tmp_name'], 'img/tournament/'.$_FILES['fileImages']['name']);
        $img = $_FILES['fileImages']['name'] ? $_FILES['fileImages']['name'] : 'painkillers_text.png';
        $arr = [htmlspecialchars($_POST['Title']), htmlspecialchars($_POST['Link']), $img, htmlspecialchars($_POST['Date']), htmlspecialchars($_POST['Prize'])];
        if (!$_POST['Title'] == null && !$_POST['Date'] == null && !$_POST['Prize'] == null) {
            try {
                $db -> query("INSERT INTO `tournament`(`Title`,`link`,`img`,`date`,`prize`) VALUES ('$arr[0]','$arr[1]','$arr[2]','$arr[3]','$arr[4]')");
                header("Refresh:0 url=/tournament");
                // header("Refresh:0");
                exit();
            } catch (PDOException $e) {
                echo "Query error: " . $e->getMessage();
            }
        }
    }
?>

<section class="container container_ActionTournament">
    <a href="/tournament"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
    <form class="form" method="POST" enctype="multipart/form-data">
        <p><label>Tournament name: </label><input class="form-control" name="Title" placeholder="Title" required></p>
        <p><label>Tournament start date:</label><input type="date" name="Date" min="2018-01-01" required></p>
        <p><label>Prize fund:</label><input type="number" min="0" max="2147483647" name="Prize" placeholder="Prize fund" required></p>
        <p><label>Link tournament table:</label><input type="url" placeholder="https://example.com" pattern="https://.*" name="Link"></p>
        <div class="input_wrapper">
            <input name="fileImages" type="file" id="input_file-2" class="input input_file" type="file" accept=".jpg, .jpeg, .png" id="formFile">
            <label for="input_file-2" class="input_file-button">
                <span class="input_file-icon-wrapper"><img class="input__file-icon" src="../img/add.svg" alt="Select a file" width="25"></span>
                <span class="input_file-button-text">Select Image</span>
            </label>
        </div>
        <p><input type="submit" id="input" name="input" class="btn_Send" value="Add Tournament"></p>
    </form>
</section>