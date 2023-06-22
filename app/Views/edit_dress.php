<!DOCTYPE html>
<?php 
$session=session();
if(!empty($session->get('user_name')))
    $url = base_url('/afterlogin');
else
    $url = base_url('/login');
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('/assets/favicon.ico');?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('css/styles.css'); ?>" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                
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
                <div class="masthead-subheading">Welcome admin!</div>
                <div class="masthead-heading text-uppercase">Edit Page</div>
            </div>
        </header>
        
        <!-- Portfolio Grid-->
        <section class="page-section" id="services">
                <div class="container">
                    <div class="text-center">
                    <h2 class="section-heading text-uppercase">Edit the product</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    <div>
                        <!-- Portfolio item 1-->
                        <!-- Your HTML markup and other content -->
                        <?php
                            helper('form');
                            echo form_open_multipart('/update');
                            $data1 = ['name'      => 'nume',
                                'id'           =>'nume',
                                'value' => $image['nume'],
                                'maxlength'   =>'100',
                                'size'        =>'30',

                            ];
                            $data2 = ['name'      => 'imagine',
                                'id'           =>'imagine',
                                'value' => $image['nume'],
                                'maxlength'   =>'100',
                                'size'        =>'30',

                            ];
                            $data3 = ['name'      => 'id',
                                'id'           =>'id',
                                'type'=>'hidden',
                                'value' => $image['id'],
                                'maxlength'   =>'100',
                                'size'        =>'30',

                            ];
                            $data4 = ['name'      => 'pret',
                                'id'           =>'pret',
                                'value' => $image['pret'],
                                'maxlength'   =>'100',
                                'size'        =>'30',

                            ];
                            $data5 = ['name'      => 'culoare',
                                'id'           =>'culoare',
                                'value' => $image['culoare'],
                                'maxlength'   =>'100',
                                'size'        =>'30',

                            ];
                            ?>
                        <div align ='center'>
                            <?php echo form_input($data3); ?>
                            <table>
                                <tr>
                                <td style="padding-top: 10px;"><?php echo form_label('Name', 'nume');?></td>
                                <td style="padding-top: 10px;"><?php echo form_input($data1);?></td>
                                </tr>
                                <tr>
                                <td style="padding-top: 10px;"><?php echo form_label('Price', 'pret');?></td>
                                <td style="padding-top: 10px;"><?php echo form_input($data4);?></td>
                                </tr>
                                <tr>
                                <td style="padding-top: 10px;"><?php echo form_label('Color', 'culoare');?></td>
                                <td style="padding-top: 10px;"><?php echo form_input($data5);?></td>
                                </tr>
                                <tr>
                                <td style="padding-top: 10px;"><?php echo form_label('Image', 'imagine');?></td>
                                <td style="padding-top: 10px;"><?php echo form_upload($data2);?></td>
                                </tr> 

                            </table>
                            <h2><img  style="padding-top: 10px;" src="<?php echo base_url($image['imagine']); ?>" width="200" height="100"></h2>
                            <?php echo form_submit('submit','Update'); ?></div>

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
