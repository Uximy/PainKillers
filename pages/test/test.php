<section class="container container_test">
    <?php
    // echo '<pre>';
    $width = "<script>document.write(window.innerWidth);</script>";
    $Height = "<script>document.write(window.innerHeight);</script>";
    // var_dump($_SERVER);
    // echo "<br>";
    // echo "<br>";


    // echo $width." ".$Height;
    ?>

    <p>Host: <b id="host"></b></p>
    <p>Connection: <b id="connection">Connecting...</b></p>

    <div>
        <h1>Logs</h1>
        <div id="logs"></div>
    </div>
    <script src="../js/socket.io.min.js"></script>
    <script src="../js/script.js"></script>

</section>