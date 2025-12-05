
<?php
include_once "includes/header.php"
?>
    <script src="webcam.min.js"></script>

   
  

<div class="container">

    <h1 class="text-center">Click And Store img For: <?=@strtoupper($_GET['name'])?></h1>

   

    <form method="POST" action="">

        <div class="row">

            <div class="col-md-6">

                <div id="my_camera"></div>

                <br/>

                <input type=button value="Take Snapshot" onClick="take_snapshot()">

                <input type="hidden" name="image" class="image-tag">

            </div>

            <div class="col-md-6">

                <div id="results">Your captured image will appear here...</div>

            </div>

            <div class="col-md-12 text-center">

                <br/>

                <button class="btn btn-success">Submit</button>

            </div>

        </div>

    </form>

</div>

  

<!-- Configure a few settings and attach camera -->

<script language="JavaScript">

    Webcam.set({

        width: 490,

        height: 390,

        image_format: 'jpeg',

        jpeg_quality: 90

    });

  

    Webcam.attach( '#my_camera' );

  

    function take_snapshot() {

        Webcam.snap( function(data_uri) {

            $(".image-tag").val(data_uri);

            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

        } );

    }

</script>

 

</body>

</html>

<?php

    if (isset($_POST['image'])) {
        # code...
  

    $img = $_POST['image'];

    $folderPath = "img/uploads/";

  

    $image_parts = explode(";base64,", $img);

    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

  

    $image_base64 = base64_decode($image_parts[1]);

    $fileName = uniqid() . '.png';

  

    $file = $folderPath . $fileName;

    file_put_contents($file, $image_base64);

  

    print_r($fileName);

    $id = $_GET['id'];
    $q = mysqli_query($dbc,"UPDATE customers SET customer_img = '$fileName' WHERE customer_id = '$id' ");
    if($q) {
    ?>

<script type="text/javascript">
window.location.assign('customers.php');
</script>
    <?php

        }

  }

?>

<?php
include_once "includes/footer.php"
?>