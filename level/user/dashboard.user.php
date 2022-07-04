<?php
    require_once "../../config/koneksi.php";
    session_start();
    if(!isset($_SESSION['user_login']['id_user'])){
        header('location: ../../auth/login.php');
      }
    
    $id_user = $_SESSION['user_login']['id_user'];
    $query_select = mysqli_query($connection,"SELECT * FROM tb_users WHERE id_user = $id_user AND level_user = 'user'");
    $data = mysqli_fetch_assoc($query_select);

    if($data['status_daftar'] == 'belum'){
        ?>
            <!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartu Prakerja - Peserta</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="shortcut icon" href="../../assets/icon/icon.png">
    <!-- waves.css -->
    <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="dashboard.admin.php">
                          <h5 style="color:#000; font-weight:800;">KARTU<span style="color:#93C5FD;">PRAKERJA</span></h5>
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="../assets/images/avatar-user.png" class="img-radius" alt="User-Profile-Image">
                                  <span><?=$_SESSION['user_login']['email']?></span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  
                                  <li class="waves-effect waves-light">
                                        <a href="../../auth/logout.php">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="../assets/images/avatar-user.png" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">Peserta<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="../../auth/logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                  </div>
                              </form>
                          </div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="./dashboard.user.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>          
                  </nav>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Selamat datang di dashboard kartu prakerja</p>
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="card">
                                                    <div class="card-header">
                                                        <h5>Silahkan Lengkapi Data Dibawah !</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./proses/daftar_ulang.proses.php" enctype="multipart/form-data">
                                                            <input type="hidden" value="<?=$id_user?>" name="id_user">
                                                            <div class="form-group form-default">
                                                                
                                                                <label>Pilih Bidang Pendidikan Anda</label>
                                                                <select name="input_kategori" id="" class="form-control" required>
                                                                <option value="">Pilih Bidang</option>
                                                                <?php 
                                                                    $query = mysqli_query($connection, "SELECT * FROM tb_kategori WHERE deleted = 0 ORDER BY id_kategori DESC");
                                                                    if(mysqli_num_rows($query) > 0){
                                                                        while($data = mysqli_fetch_assoc($query)) {
                                                                            ?>
                                                                            <option value="<?= $data['id_kategori'] ?>"><?= ucwords($data['nama_kategori']) ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    else{
                                                                    ?>
                                                                        <option value="">Kategori tidak ada</option>
                                                                    <?php
                                                                    }

                                                                ?>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group form-default col-md-6">
                                                                <label>Nama Lengkap</label>
                                                                    <input type="text" name="input_nama_lengkap" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div>
                                                                <div class="form-group form-default col-md-6">
                                                                <label>No KTP</label>
                                                                    <input type="number" name="input_no_ktp" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group form-default">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" required="" name="input_alamat"></textarea>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group form-default col-md-6">
                                                                    <label>Upload Foto Profil</label>
                                                                    <input type="file" name="input_foto_profil" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                                <div class="form-group form-default col-md-6">
                                                                    <label>Upload Foto KTP</label>
                                                                    <input type="file" name="input_foto_ktp" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                
                                                                <label>Status Pekerjaan</label>
                                                                <select name="input_status_pekerjaan" id="" class="form-control" required>
                                                                    <option value="">Pilih Pekerjaan</option>
                                                                    <option value="bekerja">Bekerja</option>
                                                                    <option value="tidak bekerja">Tidak Bekerja</option>
                                                                    <option value="menempuh pendidikan">Menempuh Pendidikan</option>
                                                                </select>
                                                                <span class="form-bar"></span>
                                                            </div>
                                                        

                                                            <input type="submit" name="submit" class="btn btn-primary waves-effect waves-light col-md-12">
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Required Jquery -->
    <script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="../assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="../assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="../assets/js/SmoothScroll.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- menu js -->
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="../assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="../assets/js/script.js "></script>
</body>

</html>
        <?php
    }
    else{
        ?>
            <!DOCTYPE html>
<html lang="en">

<head>
    <title>Kartu Prakerja - Peserta</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="shortcut icon" href="../../assets/icon/icon.png">
    <!-- waves.css -->
    <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="dashboard.admin.php">
                          <h5 style="color:#000; font-weight:800;">KARTU<span style="color:#93C5FD;">PRAKERJA</span></h5>
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                <?php
                    $query_select = mysqli_query($connection,"SELECT tb_datadiri.*,tb_kategori.* FROM tb_datadiri INNER JOIN tb_kategori USING(id_kategori) WHERE tb_datadiri.id_user = $id_user");
                    $data_user = mysqli_fetch_assoc($query_select);
                ?>
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="../assets/images/upload/profil/<?=$data_user['foto_diri']?>" class="img-radius" alt="User-Profile-Image">
                                  <span><?=$_SESSION['user_login']['email']?></span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  
                                  <li class="waves-effect waves-light">
                                        <a href="../../auth/logout.php">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="../assets/images/upload/profil/<?=$data_user['foto_diri']?>" alt="User-Profile-Image">
                                  <div class="user-details">
                                        <span style="margin-bottom:5px;"><?= ucwords($data_user['nama_kategori']) ?></span>
                                      <span id="more-details"><?= ucwords($data_user['nama_lengkap']) ?><i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="../../auth/logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                  </div>
                              </form>
                          </div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="./dashboard.user.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="./riwayat.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Riwayat</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>          
                  </nav>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Selamat datang di dashboard kartu prakerja</p>
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            
                                                        <?php
                                                            $query_data_diri = mysqli_query($connection,"SELECT * FROM tb_datadiri WHERE id_user = $id_user");
                                                            $data_diri = mysqli_fetch_assoc($query_data_diri);
                                                            $status_user = $data_diri['status_user'];
                                                            $id_kategori = $data_diri['id_kategori'];
                                                            
                                                            if($status_user == 'proses' && $data_diri['id_gelombang'] == '' || $status_user == 'sudah jawab' && $data_diri['id_gelombang'] == '' || $status_user == 'tidak lulus' && $data_diri['id_gelombang'] == ''){
                                                                ?>
                                                                    <div class="card-header">
                                                                        <h5>Gelombang Yang Dibuka</h5>
                                                                    </div>
                                                                    <div class="card-block table-border-style">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-hover">
                                                                <?php
                                                                $query2 = mysqli_query($connection, "SELECT * FROM tb_gelombang WHERE deleted = 0 AND status_gelombang = 'aktif' ORDER BY id_gelombang DESC");
                                                                if(mysqli_num_rows($query2) > 0){
                                                                    ?>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Nama Gelombang</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                                $query = mysqli_query($connection, "SELECT * FROM tb_gelombang WHERE deleted = 0 AND status_gelombang = 'aktif' ORDER BY id_gelombang DESC");
                                                                                $nomor = 1;
                                                                                while($data = mysqli_fetch_assoc($query)){
                                                                                    ?>
                                                                                        <tr>
                                                                                            <th scope="row"><?=$nomor++?></th>
                                                                                            <td>Gelombang <?=ucwords($data['nama_gelombang'])?></td>
                                                                                            
                                                                                            <td>
                                                                                            <a class="text-primary" href="./daftar_gelombang.php?iduser=<?php echo $id_user ?>&idgelombang=<?php echo $data['nama_gelombang'] ?>" onclick = "return confirm('Yakin ingin daftar Kartu Prakerja Gelombang <?= $data['nama_gelombang'] ?>?')"><button class="btn btn-success waves-effect waves-light" style="margin-bottom:15px;">Gabung</button></a>
                                                                                
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php
                                                                                }
                                                                                
                                                                            
                                                                        ?>
                                                                        </tbody>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <h3 class="text-center">Maaf, saat ini belum ada gelombang yang buka !</h3>
                                                                    <?php
                                                                }
                                                                ?>
                                                                    </table>
                                                    
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            else if($status_user == 'proses' && $data_diri['id_gelombang'] != ''){
                                                                $query_select = mysqli_query($connection,"SELECT * FROM tb_kategori WHERE id_kategori = $id_kategori");
                                                                $data_kategori = mysqli_fetch_assoc($query_select);
                                                                ?>
                                                                    <div class="card-header">
                                                                        <h5>Silahkan jawab soal dibawah ini !</h5>
                                                                    </div>
                                                                    <div class="card-block table-border-style">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-hover">
                                                                            <div style="margin-bottom: 50px;" class="text-success">
                                                                                <h5>Bidang : <?= ucwords($data_kategori['nama_kategori']) ?></h5>
                                                                            </div>
                                                                            <div id="bungkusSoal">

                                                                            </div>
                                                                            <form action="./proses/nilai.proses.php" method="POST">
                                                                            <input type="hidden" id="dataTampil">
                                                                            <input type="hidden" name="input_id_user" value="<?= $id_user ?>">
                                                                            <input type="hidden" name="input_id_kategori" value="<?= $id_kategori ?>">
                                                                            <input type="hidden" name="input_id_gelombang" value="<?= $data_diri['id_gelombang'] ?>">
                                                                            <input type="hidden" name="input_nilai" id="nilai" value="0">
                                                                            <button class="btn btn-primary waves-effect waves-light col-md-12" style="margin:20px auto;" type="button" id="btnNext">Soal selanjutnya</button>
                                                                            <h3 id="done" style="display:none;">Semua soal telah terjawab!</h3>
                                                                            <button class="btn btn-primary waves-effect waves-light" name="submit" type="submit" id="btnFinish" style="display:none; margin:20px auto;">Finish</button>
                                                                            </form>

    
                                                                            </table>
                                                                        </div>        
                                                                    </div>
                                                                <?php
                                                            }
                                                            elseif($status_user == 'sudah jawab' && $data_diri['id_gelombang'] != ''){
                                                                $query_gelombang = mysqli_query($connection,"SELECT tb_datadiri.*, tb_gelombang.* FROM tb_datadiri INNER JOIN tb_gelombang USING(id_gelombang) WHERE tb_datadiri.id_user = $id_user");
                                                                $data_gelombang = mysqli_fetch_assoc($query_gelombang);
                                                                $nama_gelombang = $data_gelombang['nama_gelombang'];
                                                                ?>
                                                                    <div class="card-block bg-primary text-center">
                                                                        <h5 style="color:#fff; font-size: 20px; line-height:35px;">Anda berhasil bergabung pada Gelombang <?= $nama_gelombang ?>. Silahkan menunggu hasil seleksi.</h5>
                                                                    </div>
                                                                <?php
                                                            }
                                                            elseif($status_user == 'lulus'){
                                                                ?>
                                                                    <div class="card-block bg-success text-center">
                                                                        <h5 style="color:#fff; font-size: 20px; line-height:35px;">Anda berhasil lulus seleksi !</h5>
                                                                    </div>
                                                                <?php
                                                            }
                                                            elseif($status_user == 'tidak lulus' && $data_diri['id_gelombang'] != ''){
                                                                $query_gelombang = mysqli_query($connection,"SELECT tb_datadiri.*, tb_gelombang.* FROM tb_datadiri INNER JOIN tb_gelombang USING(id_gelombang) WHERE tb_datadiri.id_user = $id_user");
                                                                $data_gelombang = mysqli_fetch_assoc($query_gelombang);
                                                                $nama_gelombang = $data_gelombang['nama_gelombang'];
                                                                ?>
                                                                    <div class="card-block bg-danger text-center">
                                                                        <h5 style="color:#fff; font-size: 20px; line-height:35px;">Maaf anda gagal lulus seleksi pada Gelombang <?= $nama_gelombang ?>. Silahkan coba lagi di gelombang selanjutnya!</h5>
                                                                    </div>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                <div class="card-header">
                                                                        <h5>Gelombang Yang Dibuka</h5>
                                                                    </div>
                                                                <div class="card-block">
                                                                <h3 class="text-center">Maaf, saat ini belum ada gelombang yang buka !</h3>
                                                                </div>
                                                                    
                                                                <?php
                                                            }
                                                            
                                                            
                                                        ?>
                                                        
                                                    
                                        </div>
                                        <!-- Hover table card end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/TimeCircles.js"></script>


    <script>
        $(document).ready(function() {
           $.ajax({
                url:'./proses/tampilSoal.php?id=<?= $id_kategori ?>',
                dataType: 'json',
                success:function(data) {
                    var jumlahSoal = data[0].length;
                    var text = '<input type="hidden" id="jumlahSoal" value="'+jumlahSoal+'">';
                    console.log(data);
                    var nomor=1;
                    $.each(data[0],function(key,val){
                        text += `
                            <div id="soal`+key+`" class="divSoal">
                                <h5 style='margin-bottom: 5px;'>Soal : `+nomor+`</h5>
                                <h4 style="font-weight:600; margin-bottom:30px; line-height: 40px;">`+val.soal.charAt(0).toUpperCase()+``+val.soal.substr(1).toLowerCase()+`</h4>
                                <h5 style="margin:10px auto;">Pilihan : </h5>
                                <ul>`;
                                $.each(data[1][key],function(no,v) {
                                   text += `<a style="font-size: 16px; line-height:30px; cursor:pointer;" class="option" data-key="`+key+`" data-status="`+v.status_option+`">`+v.abjad+'. '+v.text_abjad+`</a><br>` 
                                });
                    text += `   </ul>
                            </div>
                            
                        <input type="hidden" id="jawab`+key+`" value="0">
                        `;
                        nomor++;
                    });
                    $("#bungkusSoal").html(text);
                        $("#dataTampil").val('0');
                        $(".divSoal").hide();
                        $("#soal0").show();
                    

                    $("#btnNext").on('click',function() {
                        var soalTampil = parseInt($("#dataTampil").val());
                        $("#soal"+soalTampil).hide();
                        var soalNext = soalTampil + 1;
                        $("#soal"+soalNext).show();
                        $("#dataTampil").val(soalNext);

                        var jumlahSoal = parseInt($("#jumlahSoal").val());
                        if (soalNext == jumlahSoal) {
                            $("#btnNext").hide();
                            $("#btnFinish").show();
                            $("#done").show();
                        }
                        var isi = $("#jawab"+soalTampil).val(); 
                        var nilai = parseInt($("#nilai").val());
                        var angka = 0;
                        if (isi == 0) {
                            if (nilai != 0) {
                                    angka = angka + 0; 
                            }
                        }else{
                            angka = angka + 20;
                        }
                        var jumlah = nilai + angka;
                        $("#nilai").val(jumlah)
                    });

                    $(".option").on('click',function() {
                        $(".option").prop('style','cursor:pointer;font-size: 16px; line-height:30px;');
                        $(this).prop('style','color:#3498db; cursor:pointer;font-size: 16px; line-height:30px;');

                        var isi   = parseInt($(this).data('status')); 
                        $("#jawab"+$(this).data('key')).val(isi);

                    });
                },
                error:function(e) {
                  console.log(e);  
                }
           });
        });
    </script>
    <!-- Required Jquery -->
    <script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="../assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="../assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="../assets/js/SmoothScroll.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- menu js -->
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="../assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="../assets/js/script.js "></script>
</body>

</html>
        <?php
    }
?>

