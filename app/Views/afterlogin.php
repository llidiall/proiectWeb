<!DOCTYPE html>
<?php
$session=session();
if(!empty($session->get('user_name')))
{  
    $url = base_url('/afterlogin');
    $username = $session->get('user_name');
    $db = \Config\Database::connect();
    $query = $db->query("SELECT admin FROM users WHERE username = '$username'");
    $result = $query->getResult(); // Retrieve the query result

    if (!empty($result)) 
        $admin = $result[0]->admin;
}
else
    $url = base_url('/login');
?>
<?php 
             
        ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/welcome_message');?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/products');?>">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/about');?>">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/contact');?>">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $url;?>">Login</a></li> 
                     
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">
                   <?php if(!empty($session->get('user_name'))){ 
                            echo 'Welcome ';
                            echo $session->get('user_name');
                            echo '!';
                            //echo $admin;
                   }
                    ?>
                </div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo base_url('/logout');?>">Logout</a></br>
                <br/><br/>
                <?php if($admin == 1){?>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo base_url('/upload');?>">Upload</a>
                <?php } ?>
            </div>
        </header>
         
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="300" height="100">
                <rect x="20" y="20" width="270" height="60" fill="none" stroke="gray" stroke-width="2" />
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"
                      fill="pink" font-family="Monotype Corsiva, italic" font-size="30">
                  Who doesn't love tulips?
                </text>
            </svg>

        </div>
        <section class="page-section" id="services">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">A little surprise...</h2>
                        <h3 class="section-subheading text-muted">...because we know you are passionate about fashion!</h3>
                    </div>
                    <div class="row text-center">
                    <style>
                            .video-container {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 100vh;
                            }
                    </style>
                        <div class="video-container">
                           <iframe width="760" height="460" src="https://www.youtube.com/embed/kpYv5fy22AA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    <div class="video-container">
                        <video width="760" height="460" controls>
                        <source src="assets/video/glamour.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="text-center">
                        <h3 class="section-subheading text-muted">At our store, we believe in curating the 
                            perfect soundtrack for your shopping journey. =D<br/>Historiette No. 5, Fabrizio Paterlini</h3>
                        
                        <audio controls>
                            <source src="assets/video/melodie.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    </br> <br/>
                    <div>
                    <div class="text-center">
                        <br/><br/>
                       <h3 class="section-heading text-uppercase">let's play a game together!</h3>
                       
                        <p>Do you need ideas? generate a random product from our website and then try to find it!</p>
                        
                        <canvas id="myCanvas" width="250" height="300" style="border:1px solid #d3d3d3;">
                        Your browser does not support the HTML canvas tag.</canvas>

                        <p><button onclick="myCanvas()">Try it</button></p>

                        <script>
                        function myCanvas() {
                          var c = document.getElementById("myCanvas");
                          var ctx = c.getContext("2d");
                          var img = new Image();

                          // Generate a random number within the range of available images
                          var randomIndex = Math.floor(Math.random() * 6) + 1; // Change the number 6 to match the number of images you have

                          // Set the image source to a random image from the folder
                          img.src = "assets/joc/image" + randomIndex + ".jpg"; // Update the image path and extension accordingly

                          img.onload = function() {
                            ctx.clearRect(0, 0, c.width, c.height); // Clear the canvas
                            ctx.drawImage(img, 10, 10, c.width - 20, c.height - 20); // Fit the image within the canvas
                          };
                        }
                        </script>

                    </div>
                    </div>
                </div>
                </div>
        </section>
        <!-- footer -->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
