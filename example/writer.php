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
                <fieldset class="col-xs-12">
                    <legend>
                        Generate File
                    </legend>
                    <form class="row" action="maker.php">
                        <div class="col-sm-6 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    Columns:
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" name="columns" class="form-control" min="2" max="10" value="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    Rows:
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" name="rows" class="form-control" min="10" max="100" value="20">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    Filename:
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="filename" class="form-control" value="CSVExample">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    Something:
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" disabled>
                                </div>
                            </div>
                            <button class="btn btn-success">Generate</button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </main>
    </body>
</html>
