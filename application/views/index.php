<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>health Peoximity Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css');?>">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('asset/css/mdb.css');?>" rel="stylesheet">

</head>

<body class="hidden-sn mdb-skin">

    <!--Double navigation-->
    <header>

        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav custom-scrollbar">

            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="#"><img src="<?php echo base_url('asset/img/cristal.png')?>" class="img-fluid flex-center"></a>
                </div>
            </li><br><br>
            <!--/. Logo -->

            <!--Social-->
            <!-- <li>
                <ul class="social">
                    <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                    <li><a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                    <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                    <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                </ul>
            </li> -->
            <!--/Social-->

            <!--Search Form-->
            <!-- <li>
                <form class="search-form" role="search">
                    <div class="form-group waves-light">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
            </li> -->
            <!--/.Search Form-->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a href="index.html" class=""><i class="fa fa-envelope"></i>Messages<i class="fa fa-angle-down rotate-icon"></i></a>
                       
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i>Admin<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <a href="<?php echo site_url('Accueil/vue_ajouter_admin');?>" class="waves-effect">Ajouter un admin</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">Supprimer un admin</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect">Changer le mot de passe</a>
                                </li>
                                <li>
                                    <a href="listeAdmin.html" class="waves-effect">Lister les Admin</a>
                                </li>
                                
                                 
                            </ul>
                        </div>
                    </li>
                     
                     
                </ul>
            </li>
            <!--/. Side navigation links -->

        </ul>
        <!--/. Sidebar navigation -->

        <!--Navbar-->
        <nav class="navbar navbar-fixed-top scrolling-navbar double-nav blue-gradient">

            <!-- SideNav slide-out button -->
            <div class="float-xs-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn">
                <p>Health Proximity Dashboard/Messages</p>
            </div>

            <ul class="nav navbar-nav float-xs-right">

                <!-- <li class="nav-item ">
                    <a class="nav-link"><i class="fa fa-envelope"></i> <span class="hidden-sm-down">Messages</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link"><i class="fa fa-comments-o"></i> <span class="hidden-sm-down">Support</span></a>
                </li> -->
                <!-- <li class="nav-item ">
                    <a class="nav-link"><i class="fa fa-user"></i> <span class="hidden-sm-down">Profile</span></a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile</a>
                    <div class="dropdown-menu dropdown-primary dd-right" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item" href="#">Se deconnecter</a>
                        <a class="dropdown-item" href="#">Changer photo</a>
                         
                    </div>
                </li>
            </ul>

        </nav>
        <!--/.Navbar-->

    </header>
    <!--/Double navigation-->

    <main>
        <div class="container ">
               
                <div style="height: 300px"></div>
              
            <form action="" method="post">
                    <div class="md-form">
                            <i class="fa fa-pencil prefix"></i>
                            <textarea type="text" id="form8" class="md-textarea"></textarea>
                            <label for="form8">Votre message ici</label>
                    </div>

                    <button type="button" class="btn btn-orange btn-rounded waves-effect waves-light">Envoyer</button>

            </form>
           
           

            <footer class="page-footer blue center-on-small-only  blue-gradient">

                    

                    <!--Copyright-->
                        <div class="footer-copyright">
                            <div class="container-fluid">
                                © 2019 Copyright: <a href=" ">Health Proximity </a>

                            </div>
                        </div>
                    <!--/.Copyright-->

                </footer>
            <!--/.Footer-->

        </div>
    </main>


    <!-- /Start your project here-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery-3.1.1.min.js');?>"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/tether.min.js');?>"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/mdb.js');?>"></script>

    <script>
        // SideNav init
        $(".button-collapse").sideNav();

        // Custom scrollbar init
        var el = document.querySelector('.custom-scrollbar');
        Ps.initialize(el);
    </script>

</body>

</html>