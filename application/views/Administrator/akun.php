<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-success" style="margin-bottom: 20px;" data-toggle="modal" data-target="#modaltambah">Tambah Data</button>&nbsp
        <button type="button" class="btn btn-primary" style="margin-bottom: 20px;">Refresh Data</button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tblakn" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Kelola</th>
                                <th style="width: 20%;">ID</th>
                                <th style="width: 30%;">Nama</th>
                                <th style="width: 20%;">Jenis</th>
                                <th style="width: 20%;">Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" role="dialog" id="modaltambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 20px;">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>ID Akun</label>
                        <input type="text" class="form-control ftambah" id="txtid" readonly placeholder="Otomatis By Sistem">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nama</label>
                        <input type="text" class="form-control ftambah" id="txtnama">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jenis</label>
                        <select class="form-control ftambah" id="cbojenis">
                            <option value="Administrator">Administrator</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select class="form-control ftambah" id="cbostatus">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
                <button type="button" class="btn btn-danger" onclick="">Reset</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" role="dialog" id="modalupdate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 20px;">Kelola Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>ID Akun</label>
                        <input type="text" class="form-control fupdate" id="txtide" readonly placeholder="Otomatis By Sistem">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nama</label>
                        <input type="text" class="form-control fupdate" id="txtnamae">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jenis</label>
                        <select class="form-control fupdate" id="cbojenise">
                            <option value="Administrator">Administrator</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select class="form-control fupdate" id="cbostatuse">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update()">Update</button>
                <button type="button" class="btn btn-danger" onclick="hapus()">Hapus</button>
                <button type="button" class="btn btn-info" onclick="">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    let tblakn = $('#tblakn').DataTable(
        {
            "ajax": "<?= base_url('Administrator/akun_tampil'); ?>"
        }
    );

    function simpan(){
        let nama = $("#txtnama").val();
        let jenis = $("#cbojenis").val();
        let status = $("#cbostatus").val();
        if(nama == "" || jenis == "" || status == ""){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Administrator/akun_tambah",
            method: "POST",
            data: {nama: nama, jenis: jenis, status: status},
            cache: "false", 
            success: function(x){
                let hasil = atob(x);
                let param = hasil.split("|");
                if(param[0] == "1"){
                    swal({title:"Berhasil", text: param[1], icon: "success"});
                    $(".ftambah").val("");
                    $("#cbojenis").val("Administrator");
                    $("#cbostatus").val("1");
                    tblakn.ajax.reload();
                }else{
                    swal({title:"Gagal", text: param[1], icon: "error"});
                }
            },
            error: function(){
                swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
            }
        })
    }

    function filter(el){
        let id = $(el).data("idx");
        if(id == ""){
            swal({title:"Gagal", text:"Akun Tidak Terdeteksi", icon: "error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Administrator/akun_filter",
            method: "POST",
            data: {id: id},
            cache: "false", 
            success: function(x){
                let hasil = atob(x); 
                let param = hasil.split("|");
                if(param[0] == "1"){
                    $("#txtide").val(id);
                    $("#txtnamae").val(param[1]);
                    $("#cbojenise").val(param[2]);
                    $("#cbostatuse").val(param[3]);
                    $("#modalupdate").modal("show");
                }else{
                    swal({title:"Gagal", text: param[1], icon: "error"});
                }
            },
            error: function(){
                swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
            }
        })
    }

    function update(){
        let id = $("#txtide").val();
        let nama = $("#txtnamae").val();
        let jenis = $("#cbojenise").val();
        let status = $("#cbostatuse").val();
        if(id == "" || nama == "" || jenis == "" || status == ""){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Administrator/akun_update",
            method: "POST",
            data: {id: id, nama: nama, jenis: jenis, status: status},
            cache: "false", 
            success: function(x){
                let hasil = atob(x);
                let param = hasil.split("|");
                if(param[0] == "1"){
                    swal({title:"Berhasil", text: param[1], icon: "success"});
                    $(".fupdate").val("");
                    $("#cbojenise").val("Administrator");
                    $("#cbostatuse").val("1");
                    $("#modalupdate").modal("hide");
                    tblakn.ajax.reload();
                }else{
                    swal({title:"Gagal", text: param[1], icon: "error"});
                }
            },
            error: function(){
                swal({title:"Gagal", text:"Tidak Terhubung dengan Server", icon: "error"});
            }
        })
    }

    function hapus(){
        let id = $("#txtide").val();
        if(id == ""){
            swal({title:"Gagal", text:"Akun Tidak Terdeteksi", icon: "error"});
            return;
        }
        swal({
			title: 'Konfirmasi',
			text: "Anda Yakin Ingin Menghapus?",
			icon: 'warning',
			buttons: {
                confirm: {text: 'Yakin', className: 'btn btn-primary'},
				cancel: {visible: true, text: 'Tidak', className: 'btn btn-danger'}
			}
		}).then((hapus) => {
			if(hapus){
                $.ajax({
                    url: "<?= base_url(); ?>" + "Administrator/akun_hapus",
                    method: "POST",
                    data: {id: id},
                    cache: "false", 
                    success: function(x){
                        var hasil = atob(x);
                        var param = hasil.split("|");
                        if(param[0] == "1"){
                            swal({title: "Berhasil", text: param[1], icon: "success"});
                            $("#modalupdate").modal("hide");
                            tblakn.ajax.reload();
                        }else{
                            swal({title: "Gagal", text: param[1], icon : "error"});
                        }
                    },
                    error: function(){
                        swal({title: "Gagal", text: "Koneksi API Gagal", icon : "error"});
                    }
                })
            }
        })
    }

    function reset(el){
        let id = $(el).data("idx");
        if(id == ""){
            swal({title:"Gagal", text:"Akun Tidak Terdeteksi", icon: "error"});
            return;
        }
        swal({
			title: 'Konfirmasi',
			text: "Anda Yakin Ingin Reset Password Akun Ini?",
			icon: 'warning',
			buttons: {
                confirm: {text: 'Yakin', className: 'btn btn-primary'},
				cancel: {visible: true, text: 'Tidak', className: 'btn btn-danger'}
			}
		}).then((reset) => {
			if(reset){
                $.ajax({
                    url: "<?= base_url(); ?>" + "Administrator/akun_reset",
                    method: "POST",
                    data: {id: id},
                    cache: "false", 
                    success: function(x){
                        var hasil = atob(x);
                        var param = hasil.split("|");
                        if(param[0] == "1"){
                            swal({title: "Berhasil", text: param[1], icon: "success"});
                        }else{
                            swal({title: "Gagal", text: param[1], icon : "error"});
                        }
                    },
                    error: function(){
                        swal({title: "Gagal", text: "Koneksi API Gagal", icon : "error"});
                    }
                })
            }
        })
    }
</script>