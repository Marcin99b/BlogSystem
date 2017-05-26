<!DOCTYPE html>
<html>
<head>
    <base href='<?= $this -> path; ?>/' />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isSet($this -> pageTitle)) echo $this -> pageTitle; ?></title>
    <meta name="author" content="Marcin Bigos" />
    <link href="res/Style/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="res/Scripts/jQuery.js"></script>
    <script src="res/Scripts/bootstrap.min.js"></script>
    <link href="res/Style/Site.css" rel="stylesheet" type="text/css" />
</head>
<body>
