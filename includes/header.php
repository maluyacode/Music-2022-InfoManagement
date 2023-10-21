<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>


    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }

        /* 
Home page CSS
*/

        body {
            background-color: #dce3f0;
        }

        .height {

            height: 100vh;
        }

        .home {
            width: 350px;
            height: 370px;
            margin: 10px 10px 10px 10px;
            display: inline-block;

        }

        .main-heading {

            font-size: 40px;
            color: red !important;
        }

        .text-uppercase {
            text-align: center;
        }

        .mt-2 {

            margin: auto;
        }

        .mt-2 img {
            width: 210px;
            height: 220px;
            margin: auto;
        }

        .hov:hover {
            width: 220px;
            height: 230px;
        }
    </style>

</head>

<body>
    <div class="m-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Brand</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="/Music/front/home.php" class="nav-item nav-link active">Home</a>
                        <a href="/Music/user/profile.php" class="nav-item nav-link">Profile</a>
                        <a href="/music/artist/index.php" class="nav-item nav-link">Artists</a>
                        <?php
                        echo "<a href='/music/listener/albumList.php' class='nav-item nav-link'>Albums</a>";
                        ?>
                    </div>
                    <div class="navbar-nav ms-auto">

                        <?php
                        if (!isset($_SESSION['user_id'])) {
                            echo "<div class='navbar-nav ms-auto'>
                                    <a href='http://{$_SERVER['SERVER_NAME']}/music/user/login.php'  class='nav-item nav-link'>Login</a></div>";
                        } else {
                            echo "<div class='navbar-nav ms-auto'>
                                <a href='http://{$_SERVER['SERVER_NAME']}/music/user/logout.php'  class='nav-item nav-link'>Logout</a></div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>