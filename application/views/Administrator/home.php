<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/vendors/feather/feather.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vertical-layout-light/style.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png'); ?>" />
    <script src="<?= base_url('assets/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/sweetalert/sweetalert.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="<?= base_url('assets/images/logo.svg'); ?>" class="mr-2" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('assets/images/logo-mini.svg'); ?>" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
              <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item nav-profile dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                          <img src="<?= base_url('assets/images/faces/face23.jpg'); ?>" alt="profile"/>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                          <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#modalgantipassword">
                              <i class="ti-settings text-primary"></i>Password
                          </a>
                          <a href="#" class="dropdown-item" onclick="logout()">
                              <i class="ti-power-off text-primary"></i>Logout
                          </a>
                      </div>
                  </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                  <span class="icon-menu"></span>
              </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div class="theme-setting-wrapper">
                <div id="settings-trigger">
                    <i class="ti-settings"></i>
                </div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                        <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url(); ?>Administrator/index">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>Administrator/akun">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Akun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>Administrator/barang">
                        <i class="icon-contract menu-icon"></i>
                        <span class="menu-title">Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>Administrator/pembelian_tampil">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Barang Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Administrator/detailbrg'); ?>">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Detail Barang Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Administrator/transaksi'); ?>">
                        <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Administrator/detailtrans'); ?>">
                        <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Detail Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Administrator/keranjang'); ?>">
                        <i class="icon-ban menu-icon"></i>
                            <span class="menu-title">Keranjang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('Administrator/pelanggan'); ?>">
                        <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Tentang</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">a</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">b</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">c</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                <?php
                    include $konten.".php"; 
                ?>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Premium 
                        <a href="https://rindhidwif04.000webhostapp.com/profil%20rindhi%202021/index.html" target="_blank">Rindhi Dwi Fibrianti</a> from Rindhidf. All rights reserved.
                    </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made in Jbg 
                        <i class="ti-heart text-danger ml-1"></i>
                    </span>
                </div>
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by 
                        <a href="http://unwaha.ac.id/" target="_blank">Unwaha Jbg</a>
                    </span> 
                </div>
            </footer> 
        </div>
        <div class="modal fade" role="dialog" id="modalgantipassword">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 20px;">Ganti Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Password Lama</label>
                                    <input type="password" class="form-control fpass" id="txtplama">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Password Baru</label>
                                    <input type="password" class="form-control fpass" id="txtpbaru">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control fpass" id="txtkonfirmasi">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="gantipassword()">Ganti</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/chart.js/Chart.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/datatables.net/jquery.dataTables.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js'); ?>"></script>
        <script src="<?= base_url('assets/js/dataTables.select.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/off-canvas.js'); ?>"></script>
        <script src="<?= base_url('assets/js/hoverable-collapse.js'); ?>"></script>
        <script src="<?= base_url('assets/js/template.js'); ?>"></script>
        <script src="<?= base_url('assets/js/settings.js'); ?>"></script>
        <script src="<?= base_url('assets/js/todolist.js'); ?>"></script>
        <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
        <script src="<?= base_url('assets/js/Chart.roundedBarCharts.js'); ?>"></script>
        <script>
            function gantipassword(){
                let plama = $("#txtplama").val();
                let pbaru = $("#txtpbaru").val();
                let pkonfir = $("#txtkonfirmasi").val();
                if(plama == "" || pbaru == "" || pkonfir == ""){
                    swal({title: "Gagal", text: "Isian Masih Kosong", icon: "error"});
                    return;
                }
                if(pbaru != pkonfir){
                    swal({title: "Gagal", text: "Konfirmasi Password Salah", icon: "error"});
                    return;
                }
                swal({
                    title: 'Konfirmasi',
                    text: "Anda Yakin Ingin Mengganti Password?",
                    icon: 'warning',
                    buttons: {
                        confirm: {text: 'Yakin', className: 'btn btn-primary'},
                        cancel: {visible: true, text: 'Tidak', className: 'btn btn-danger'}
                    }
                }).then((xx) => {
                    if(xx){
                        $.ajax({
                            url: "<?= base_url(); ?>" + "Logout/ganti_password",
                            method: "POST",
                            data: {plama: plama, pbaru: pbaru},
                            cache: "false", 
                            success: function(x){
                                console.log(x);
                                var hasil = atob(x);
                                var param = hasil.split("|");
                                if(param[0] == "1"){
                                    swal({title: "Berhasil", text: param[1], icon: "success"}).then((yy) => {
                                        if(yy){
                                            window.location = "<?= base_url(); ?>" + "Login/";
                                        }
                                    });
                                }else{
                                    swal({title: "Gagal", text: param[1], icon : "error"});
                                }
                                
                            },
                            error: function(){
                                swal({title: "Gagal", text: "Koneksi API Gagal", icon: "error"});
                            }
                        })
                    }
                })
            }
            function logout(){
                swal({
                    title: 'Konfirmasi',
                    text: "Anda Yakin Ingin Logout?",
                    icon: 'warning',
                    buttons: {
                        confirm: {text: 'Yakin', className: 'btn btn-primary'},
                        cancel: {visible: true, text: 'Tidak', className: 'btn btn-danger'}
                    }
                }).then((xx) => {
                    if(xx){
                        $.ajax({
                            url: "<?= base_url(); ?>" + "Logout",
                            method: "POST",
                            cache: "false", 
                            success: function(y){
                            window.location = "<?= base_url(); ?>" + "Login/";
                            },
                            error: function(){
                                swal({title: "Gagal", text: "Koneksi API Gagal", icon: "error"});
                            }
                        })
                    }
                })
            }
    </script>
</body>
</html>

