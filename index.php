<html>
<?php include 'Router.php';  ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Optional theme -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
      <nav>
        <h1>Welcome to Formation Manager version 1</h1>
        <ul>
            <li><a href="?">Home</a></li>
            <li><a href="?action=getstagiaires">Stagiaire</a></li>
            <li><a href="?action=getsessions">Sessions</a></li>
            <li><a href="?action=addnewstagiaire">Add stagiaire</a></li>
            <li><a href="?action=addmodule">Add module</a></li>
            <li><a href="?action=addnewsession">Add session</a></li>



        </ul>
      </nav>

    </header>

    <?php
      //start the core class
      $router = new Router;

    ?>
