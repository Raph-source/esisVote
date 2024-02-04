<?php header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($title)) echo $title; else echo "Document"; ?></title>
    <link rel="stylesheet" href="<?php if(isset($style))echo $style;?>">
    <link rel="stylesheet" href="<?php if(isset($style1))echo $style1;?>">
    <link rel="stylesheet" href="<?php if(isset($style2))echo $style2;?>">
    <link rel="stylesheet" href="<?php if(isset($style3))echo $style3;?>">
    <link rel="stylesheet" href="<?php if(isset($bootstrap))echo $bootstrap;?>">
</head>
<body>
    