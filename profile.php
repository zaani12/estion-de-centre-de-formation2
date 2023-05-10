
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EduSphere</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Hover-cards.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Rounded-Search-Input-field-untitled-2.css">
    <link rel="stylesheet" href="assets/css/Rounded-Search-Input-field.css">
    <link rel="stylesheet" href="assets/css/select.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Cool-SB-Admin-Inspirate.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-sidebar.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/profile.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3" style="background-color: #FFDFD3;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: #957DAD;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-intersect" style="font-size: 24px;">
                        <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm5 10v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1h-2v5a2 2 0 0 1-2 2H5zm6-8V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2V6a2 2 0 0 1 2-2h5z">
                        </path>
                    </svg></span><span><span style="color: rgb(149, 125, 173);">E</span>duSphere</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex">
                        <div class="gap-5">
                            <a href="<?php echo "log_out.php" ?>" class="btn " style="box-shadow: 3px 3px white; border:2px white solid; color:#957DAD ;">Log out</a>
                            <button type="button" class="btn" style="box-shadow: 3px 3px white; border:2px white solid ;color:#957DAD ;" data-bs-toggle="modal" data-bs-target="#update_password">Update password</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div id="sidenavAccordion" class="sb-sidenav accordion  " style="background-color: rgb(149, 125, 173);">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div>
                            <div class="sb-sidenav-menu-heading"></div><a data-bss-hover-animate="rubberBand" class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="collapseLayouts" data-bs-toggle="collapse" data-bs-target="#collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div><span>Formation</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div id="collapseLayouts" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="apphome.php">Formation</a></div>
                            </div>
                        </div>
                        <div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-bs-parent="#sidenavAccordion">
                                <div id="sidenavAccordionPages" class="sb-sidenav-menu-nested nav accordion"><a class="nav-link collapsed" href="#" aria-expanded="false" aria-controls="pagesCollapseAuth" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"><span>Menu Item</span>
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
                                    <div id="pagesCollapseAuth" class="collapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="<?php echo "profile.php?Id_apprenant=" . $Id_apprenant ?>"><i class="fa fa-user" style="padding-right: 0px;margin: 8px;margin-left: -1px;"></i>Profil</a></div>
                    <div class="sb-sidenav-menu-nested nav"><a class="nav-link" href="inscription.php"><i class="fa fa-pencil" style="padding-right: 0px;margin: 8px;margin-left: -1px;"></i>Inscriptions & History</a></div>

                </div>
                <div class="sb-sidenav-footer"></div>
            </div>
        </div>
        <?php
        if (isset($_POST['update_info'])) {
            $first_name = $_POST['prenom'];
            $last_name = $_POST['nom_'];
            $email = $_POST['email'];
            $user->Update_info($conn, $first_name, $last_name, $email, $Id_apprenant);
        }
        if (isset($_POST['update_pass'])) {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $c_new_pass = $_POST['c_new_pass'];
            $result = $user->update_pass($conn, $Id_apprenant, $old_pass, $new_pass, $c_new_pass);
        }
        ?>
        <div id="layoutSidenav_content">
            <?php
            if (isset($result)) {
            ?>
                <div class="alert alert-warning m-0 text-center" role="alert">
                    <?php echo $result ?>
                </div>
            <?php
            }
            ?>
            <main class="d-flex justify-content-center align-items-center">
                <div class=" mt-5 p-5" style="background-color: #B4DDE3;">
                    <h1 class="text-white">EDIT YOUR INFORMATIONS</h1>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="text-center">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control profile" id="floatingInput" name="prenom" value="<?php echo $info['prenom'] ?>" placeholder="name@example.com">
                            <label for="floatingInput">First name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control profile" id="floatingPassword" name="nom_" value="<?php echo $info['nom_'] ?>" placeholder="Password">
                            <label for="floatingPassword">Last name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control profile" id="floatingInput" name="email" value="<?php echo $info['email'] ?>" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <button type="submit" name="update_info" class="btn btn-outline-light fw-bold px-5 text-black rounded-pill  mt-5">Save</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="update_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control profile" id="floatingInput" name="old_pass">
                            <label for="floatingInput">Old password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control profile" id="floatingInput" name="new_pass">
                            <label for="floatingInput">New password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control profile" id="floatingInput" name="c_new_pass">
                            <label for="floatingInput">Confurm the new password</label>
                        </div>
                        <button type="submit" class="btn btn-danger" name="update_pass">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="wrapper"></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Sidebar-Menu-sidebar.js"></script>
</body>