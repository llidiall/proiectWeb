<!DOCTYPE html>
<?php
$session=session();
//session_start();
if((empty($_SESSION['numeLogin']))&&(empty($_SESSION['passLogin'])))
    {$_SESSION['numeLogin']="";
    $_SESSION['passLogin']="";}
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
                <a class="navbar-brand" href="#page-top"><img src="<?php echo base_url('/assets/img/navbar-logo.svg'); ?>" alt="..." /></a>
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
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            </div>
        </header>
        
        <br/><br/>
         <div class="container mt-5">
        <div class="row justify-content-md-center">
        <!-- Login Form -->
         <div class="col-5">
                          
         <?php
            helper('form');
            echo isset($error)?$error:'';
            echo form_open('/check');
            $data1=[
                'name'=>'username',
                'id'=>'text1',
                'maxlength'=>'100',
                'size'=>'30',
            ];
            $data2=[
                'name'=>'password',
                'id'=>'text2',
                'maxlength'=>'100',
                'size'=>'30',
            ];
            $data3=array('name'=>'rememberme','id'=>'check1');
            $data4=array(
                'name'=>'button',
                'id'=>'button',
                'value'=>'true',
                'type'=>'reset',
                'content'=>'Reset'
            );
            ?>

            <?php echo form_fieldset('Login'); ?>

            <table  >
                <tr>
                    <td > <?php echo form_label('Username','text1');?></td><!-- comment -->
                    <td><?php echo form_input($data1);?> </td>
                    <br/>
                </tr >
                <br/>
                 <tr>
                    <td> <?php echo form_label('Password','text2');?></td><!-- comment -->
                    <td><?php echo form_input($data2);?>  </td>

                </tr>
                 <tr>
                    <td> <?php echo form_label('Remember me','check1');?></td><!-- comment -->
                    <td><?php echo form_checkbox($data3);?> </td>

                </tr>
                 <tr>
                    <td> <?php echo form_submit('submit','Login');?></td><!-- comment -->
                    <td><?php echo form_button($data4);?> </td>

                </tr>
            </table>

            <?php echo form_fieldset_close();?>
            <?php echo form_close();?>
        <p>Don't have an account?<a href="<?php echo base_url('/signup');?>"> Sign up here</a></p>
        
        </div></div></div>

        </div>
        
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
