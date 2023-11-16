<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vertical-layout-light/style.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png'); ?>" />
    <script src="<?= base_url('assets/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/sweetalert/sweetalert.min.js'); ?>"></script>
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/images/logo.svg'); ?>" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="txtid" placeholder="Isikan ID Anda">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="txtpassword" placeholder="Isikan Password Anda">
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary" onclick="login()">Login</button>&nbsp
                                    <button type="button" class="btn btn-danger" onclick="kosong()">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
    <script src="<?= base_url('assets/js/off-canvas.js'); ?>"></script>
    <script src="<?= base_url('assets/js/hoverable-collapse.js'); ?>"></script>
    <script src="<?= base_url('assets/js/template.js'); ?>"></script>
    <script src="<?= base_url('assets/js/settings.js'); ?>"></script>
    <script src="<?= base_url('assets/js/todolist.js'); ?>"></script>
    <script>
        function login(){
            let id = $("#txtid").val();
            let pass = $("#txtpassword").val();
            if(id == "" || pass == ""){
                swal({title:"Gagal", text:"Isian Anda Ada yang Masih Kosong", icon:"error"});
                return;
            }
            $.ajax({
                url: "<?= base_url(); ?>" + "Login/ceklogin",
                method: "POST",
                data: {idx: id, passx: pass},
                cache: "false", 
                success: function(x){
                    let h = atob(x);
                    let hasil = h.split("|");
                    if(hasil[0] == "1"){
                        window.location = "<?= base_url(); ?>" + hasil[2] + "/index";
                    }else{
                        swal({title:"Gagal", text:hasil[1], icon: "error"});
                    }
                },
                error: function(){
                    swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
                }
            })
        }
        function kosong(){
            $("#txtid").val("");
            $("#txtpassword").val("");
        }
    </script>
</body>
</html>
