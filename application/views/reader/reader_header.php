<!DOCTYPE html>
<html lang="en">

<head>
    <title>Grabpustak</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Style /static/site/css -->
    <link rel="stylesheet" type="text/css" href="/static/site/css/style.css">
    <script type="text/javascript" src="/static/site/js/jquery.min.js"></script>

    <?php if(isset($reader) && !empty($reader)): ?>
    <!-- CSS : implied media="all" -->
    <link rel="stylesheet" href="/static/reader/css/reader_style.css">
    <link rel="stylesheet" type="text/css" href="/static/reader/css/preview.css">
    <link rel="stylesheet" media="handheld" href="/static/reader/css/handheld.css?v=2">

    <?php endif; ?>
</head>

<body class="<?php if(isset($page_type) && !empty($page_type)) echo $page_type; ?>">
    <div class="wrapper">