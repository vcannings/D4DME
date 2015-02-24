<!DOCTYPE HTML>
<html>
    <head>
        <title>Meet the Team!</title>
        <link rel="stylesheet" href="stylesheet.css" type="text/css"/>
    </head>
    <body>
    <!-- C: Creating the navigation bar with links-->
        <header>
              <!-- V: The nav is now on its own page and uses PHP to link in -->
                <?php include 'nav.html'; ?> 
        </header>
        
        <div class="container">
            <div class="bigbox">
                <h1>MEET THE TEAM</h1>
            </div>
            <a href="about.php#cabout">
            <div class="box">
                <h3>CHACE</h3><hr>
             <img class="photo" src="chace.jpg"><br>
            </div></a>

            
            <a href="about.php#vabout">
            <div class="box">
                <h3>VERITY</h3><hr>
             <img class="photo" src="verity.jpg"><br>
            </div></a>

            <a href="about.php#kabout">
            <div class="box">
                <h3>KYLE</h3><hr>
             <img class="photo" src="kyle.jpg"><br>
            </div></a>
            

            <div id="footer">
            </div>
        </div>

    </body>  
</html>
