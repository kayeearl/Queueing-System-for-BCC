        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link"> </a>
                </li>
            </ul>
            <!-- =========================================================== -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" role="button">
                        Logout <i class="fas fa-user"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- =========================================================== -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-color sidebar-dark-blue elevation-4">

            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="dist/img/logo.png" alt="CSPC" class="brand-image img-circle elevation-10" style="opacity: .8">
                <span class="brand-text font-weight-light">C S P C </span>
            </a>
            <!-- Sidebar UserName -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo "$profile_pic"; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="profile.php" class="d-block"><?php echo "$fullname"; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <!-- <li class="nav-item menu-open"> -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Queueing Transaction
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Check Queue Position</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item menu-open"> -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-money-bill-alt" aria-hidden="true"></i>
                                <p>
                                    Cashier Transaction
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="OnlinePayment.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pay Online</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Transaction.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transaction History</p>
                                    </a>
                                </li>
                            </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
       