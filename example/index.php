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
                        <a href="reader.php">Reader</a>
                    </li>
                    <li>
                        <a href="writer.php">Writer</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
            include '../vendor/autoload.php';
            
        ?>
        <main class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron">
                        This example demonstrates the use of the CSVParser and CSVMaker classes
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
