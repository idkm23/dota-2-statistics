<?php
//echo phpinfo();
/**
 * Simple example of extending the SQLite3 class and changing the __construct
 * parameters, then using the open method to initialize the DB.
 */
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('main.db');
    }
}

$db = new MyDB();

$result = $db->query('SELECT skypename FROM Accounts WHERE id=1');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.3.0/snap.svg-min.js"></script>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="http://coletownsend.com/web/content/fonts/Entypo/Entypo/entypo.css" media="all">
	
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500,400,300,200,100' rel='stylesheet' type='text/css'>
    <!-- Body Wrapper-->
    <div id="wrapper">
        <!-- Friend Session -->
        <div id="wrapper">
            <div id="friend-container">
                <div class="info">
                    <div class="name">
                        <a href="#"> Hung Nguyen </a>
                    </div>
                    <div class="location">
                        <a href="#"> Lowell </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Friend Session -->
        
        <!-- Activity Session -->
        <div id="wrapper">
            <div id="act-container">
                <div class="act-info">
                    <div class="name">
                        <a href="#"> Hung Nguyen </a>
                    </div>
                    <div class="location">
                        <a href="#"> Lowell </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Activity Session -->
        
        <!-- About Me -- Records-->
        <div id="wrapper">
            <div id="me-container">
                <div class="me-info">
                    <div class="name">
                        <a href="#"> Hung Nguyen </a>
                    </div>
                    <div class="location">
                        <a href="#"> Lowell </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Me session -->
        
        <!-- Graph Session -->
        <div id="wrapper">
            <div id="graph-container">
                <div class="graph-infor">
                    <div class="name">
                        <a href="#"> Hung Nguyen </a>
                    </div>
                    <div class="location">
                        <a href="#"> Lowell </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Activity Session -->
        
    </div>
    <!-- end wrapper session -->
    
    <div id="logo-wrapper">
        <div id="logo-container">
            <div class="logo-info">
                <div class="name">
                    <a href="#"> <?php echo $result->fetchArray()["skypename"]; ?> </a>
                </div>
                <div class="location">
                    <a href="#"> Lowell </a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>