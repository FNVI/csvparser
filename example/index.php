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
            
            $fileUploaded = $_FILES["filename"] ? true : false;
            
            $headings = filter_input(INPUT_POST, "headings", FILTER_VALIDATE_BOOLEAN);
            
            if($fileUploaded){
                $csv = new FNVi\CSVParser\CSVParser($_FILES["filename"]["tmp_name"],$headings);
                $csv->swapHeadings(["Equip Type"=>"Equipment type","Hard Soft"=>"Type"]);
            }
        ?>
        <main class="container">
            <div class="row">
                <fieldset class="col-xs-12">
                    <legend>
                        Upload File
                    </legend>
                    <form enctype="multipart/form-data" method="post" class="form-inline">
                        <div class="form-group">
                            <label class="control-label">
                                File:
                            </label>
                            <label class="btn btn-success">
                                Choose File
                                <input type="file" accept=".csv" name="filename" style="display:none; width: 0px; height:0px;">
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="headings" checked> Use headings
                            </label>
                        </div>
                        <button class="btn btn-success">Upload</button>
                    </form>
                </fieldset>
            </div>
            <br>
            <?php if($fileUploaded) { ?>
                <div class="row">
                    <fieldset class="col-xs-12">
                        <legend>Results</legend>
                           <?php foreach($csv as $row){
                                echo "<pre>".json_encode($row, 128)."</pre>";
                            } ?>
                    </fieldset>
                </div>
            <?php } ?>
        </main>
    </body>
</html>
