<body>
    <div id="wrapper">

        <?php include 'nav.php'; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>


    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                </button>
                <a class="navbar-brand" href="index.php">Administration du site Marseille Solutions</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="http://localhost/MarseilleSolution"><i class="fa fa-eye"></i> Voir le site</a>
                </li>
                <li>
                    <a><i class="fa fa-user"></i> <?php echo $_SESSION["name"] ; ?></a>
                </li>
                <li>
                    <a href="http://localhost/MarseilleSolution/connection/inscription.php"><i class="fa fa-fw fa-edit"></i> Ajouter un compte</a>
                </li>
                <li>
                    <a href="http://localhost/MarseilleSolution/deconnexion.php"><i class="fa fa-power-off"></i> Déconnexion</a>
                </li>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Slider</a>
                    </li>
                    <li>
                        <a href="page0.php"><i class="fa fa-fw fa-file"></i> 1 - Comment ça marche?</a>
                    </li>
                    <li>
                        <a href="ajoutsolu.php"><i class="fa fa-fw fa-file"></i> 2 - Solutions</a>
                    </li>
                    <li>
                        <a href="create.php"><i class="fa fa-fw fa-file"></i> 3 - Evénements</a>
                    </li>
                    <li>
                        <a href="media.php"><i class="fa fa-fw fa-file"></i> 4 - Medias</a>
                    </li>
                    <li>
                        <a href="ajoutcommu.php"><i class="fa fa-fw fa-file"></i> 5 - Communauté</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
