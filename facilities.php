<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php')?>
    <title><?php echo $settings_r['site_title']?> - Facilities</title>
    
    <style>
        .pop:hover
        {
            border-top-color: var(--lightBrown_hover) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
    

</head>
<body class="bg-light">
   
    <?php require('include/header.php') ?>

    <!-- Heading -->
    <div class="my-5 px-4">
        <h2 class="fw-bold font2 text-center">Facilities</h2>
        <div class="line1 bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing 
            elit. Ad veniam <br> tempora commodi ab fugit 
            molestiae amet quis nostrum totam exercitationem.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <?php
                $res = selectAll('facilities');
                $path = Facilities_IMG_PATH;

                while($row = mysqli_fetch_assoc($res))
                {
                    echo<<<data
                        <div class="col-lg-4 col-md-6 mb-5 px-4">
                            <div class="pop bg-white rounded shadow p-4 border-top border-4 border-dark">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="$path$row[icon]" alt="" width="40px">
                                    <h5 class="m-0 ms-3">$row[name]</h5>  
                                </div>
                                
                                <p>$row[description]</p>
                            </div>
                        </div>
                    data;
                }
            ?>
        </div>
    </div>



    <?php require('include/footer.php') ?>

</body>
</html>