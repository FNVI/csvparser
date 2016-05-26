<?php
include '../vendor/autoload.php';

use FNVi\CSVTools\CSVMaker;

$getArgs = [
    "filename"=>FILTER_SANITIZE_STRING,
    "columns"=>FILTER_VALIDATE_INT,
    "rows"=>FILTER_VALIDATE_INT
];

$fileData = filter_input_array(INPUT_GET, $getArgs, false);

$file = new CSVMaker($fileData["filename"]);

$headings = [];
for($h = 1; $h <= $fileData["columns"]; $h++){
    $headings[] = "Heading $h";
}
$file->writeLine($headings);

for($r = 1; $r <= $fileData["rows"]; $r++){
    $row = [];
    for($c = 1; $c <= $fileData["columns"]; $c++){
        $row[] = "$c:$r";
    }
    $file->writeLine($row);
}
