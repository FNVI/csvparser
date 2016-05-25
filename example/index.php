<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CSVParser</title>
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Other link</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
            include '../vendor/autoload.php';
            
            $fileUploaded = boolval($_FILES["filename"]);
            echo $fileUploaded;
        ?>
        <main class="container">
            <div class="row">
                <fieldset class="col-xs-12">
                    <legend>
                        Upload File
                    </legend>
                    <form enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2">
                                File:
                            </label>
                            <div class="col-sm-4">
                                <label class="btn btn-success">
                                    Choose File
                                    <input type="file" accept=".csv" name="filename" style="display:none; width: 0px; height:0px;">
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-success">Upload</button>
                    </form>
                </fieldset>
            </div>
                    <?php if($fileUploaded) { ?>
                    
                    <?php } ?>

        </main>
    </body>
</html>
