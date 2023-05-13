<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="assets/css/style.css">  
</head>

<body>
    <div class="header">
        <div class="title" style="position: absolute; bottom: 0; padding-left: 2%;">
            <h1> <?= $title ?> </h1>
        </div>

        <div class="btns">
            <input class="inputButtons" <?= $btn1 ?> />
            <input class="inputButtons" <?= $btn2 ?> />
        </div>
                
        <hr style="width:96%; position: absolute; bottom: 0; margin-left: 1rem; border: 1px solid black;">
    </div>