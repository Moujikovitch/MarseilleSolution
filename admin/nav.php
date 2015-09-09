<?php
    session_start();
    if (!isset($_SESSION['name'])) {
    if ($_SESSION['name']== ""){
        Header ("Location: http://localhost/MarseilleSolution/connection/connection.php");
    }
    }
    ?>

<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Panel Admin</a>
            </div>
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
                      <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Index et aide</a>
                  </li>
                    <li>
                        <a href="admin0slider.php"><i class="fa fa-fw fa-dashboard"></i>0 - Slider</a>
                    </li>
                    <li>
                        <a href="admin1comment.php"><i class="fa fa-fw fa-file"></i> 1 - Comment ça marche?</a>
                    </li>
                    <li>
                        <a href="admin2solu.php"><i class="fa fa-fw fa-file"></i> 2 - Solutions</a>
                    </li>
                    <li>
                        <a href="admin3event.php"><i class="fa fa-fw fa-file"></i> 3 - Evénements</a>
                    </li>
                    <li>
                        <a href="admin4media.php"><i class="fa fa-fw fa-file"></i> 4 - Medias</a>
                    </li>
                    <li>
                        <a href="admin5commu.php"><i class="fa fa-fw fa-file"></i> 5 - Communauté</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
