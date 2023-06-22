<!DOCTYPE html>
<?php 
$session=session();
if(!empty($session->get('user_name')))
{   
    $url = base_url('/afterlogin');
    $username = $session->get('user_name');
    $db1 = \Config\Database::connect();
    $query1 = $db1->query("SELECT admin FROM users WHERE username = '$username'");
    $result1 = $query1->getResult(); // Retrieve the query result

    if (!empty($result1)) 
        $admin = $result1[0]->admin;
    
}
else
    $url = base_url('/login');
    //$admin = 0;
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
                <div class="masthead-subheading">Welcome To Our Website!</div>
                <div class="masthead-heading text-uppercase">Let's go shopping!</div>
            </div>
        </header>
        
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Products</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    
                        <!-- Portfolio item 1-->
                        <!-- Your HTML markup and other content -->
                        <?php $db = \Config\Database::connect();
                        $query = $db->query('SELECT * FROM dresses');
                        $results = $query->getResultArray();
                        ?>
                        <?php $counter = 1; ?>
                        <?php if (!empty($results)): ?>
                            <?php foreach ($results as $row): ?>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <?php  
                                $modalId = 'portfolioModal' . $counter; // Generate the modal ID
                                $counter++; // Increment the counter 
                            ?>
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?= $modalId ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img class="img-fluid" src="<?php echo base_url($row['imagine']); ?>" alt="..." width="270" height="300" />
                                    </a>
                                        <div class="portfolio-caption-heading"><?= $row["nume"] ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?= $row["pret"] ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No dresses found.</p>
                        <?php endif; ?>

<!-- Continue with the rest of your HTML markup and content -->

                    </div>
                    
                </div>
            </div>
        </section>
        
        <!-- Footer-->
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
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <?php $db = \Config\Database::connect();
              $query = $db->query('SELECT * FROM dresses');
              $results = $query->getResultArray();
              $counter = 1;
        ?>
        <?php if (!empty($results)): ?>
        <?php foreach ($results as $row): ?>
                            <?php  
                                $modalId = 'portfolioModal' . $counter; // Generate the modal ID
                                $counter++; // Increment the counter 
                            ?>
            <div class="portfolio-modal modal fade" id="<?= $modalId ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase"><?= $row["nume"] ?></h2>
                                        <p class="item-intro text-muted"></p>
                                        <img class="img-fluid d-block mx-auto" src="<?php echo base_url($row['imagine']); ?>" alt="..." />
                                        <p>Color: <?= $row["culoare"] ?></p>
                                        <p>Price: <?= $row["pret"] ?> $</p>
                                        <?php if(!empty($session->get('user_name')) && $admin == 1){ ?>
                                        <a href="<?php echo base_url('/edit/'.$row['id']); ?>" class="button-51" role="button">Edit</a></td>
                                        <a href="<?php echo site_url('/delete/'.$row['id']); ?>" class="button-51" role="button" 
                                           onclick="return confirm('Do you want to delete this record?')">Delete</a>
                                        <?php } ?>
                                        <br/>
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Close Project
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>            
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
