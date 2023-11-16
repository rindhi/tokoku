<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-success" style="margin-bottom: 20px;" data-toggle="modal" data-target="#modaltambah">Tambah Data</button>&nbsp
        <button type="button" class="btn btn-primary" style="margin-bottom: 20px;" onclick="tblbrg.ajax.reload()">Refresh Data</button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tblbrg" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Kelola</th>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 30%;">Nama</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 10%;">Stok</th>
                                <th style="width: 10%;">Satuan</th>
                                <th style="width: 10%;">Barcode</th>
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
                <h5 class="modal-title" style="font-size: 20px;">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>ID Barang</label>
                        <input type="text" class="form-control ftambah" id="txtid">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nama</label>
                        <input type="text" class="form-control ftambah" id="txtnama">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Harga</label>
                        <input type="number" class="form-control ftambah" id="txtharga">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Satuan</label>
                        <select class="form-control ftambah" id="cbosatuan">
                            <option value="pcs">Pcs</option>
                            <option value="dus">Dus</option>
                            <option value="pack">Pack</option>
                            <option value="botol">Botol</option>
                            <option value="sachet">Sachet</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Barcode</label>
                        <input type="text" class="form-control ftambah" id="txtbarcode">
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
                <h5 class="modal-title" style="font-size: 20px;">Kelola Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>ID Barang</label>
                        <input type="text" class="form-control fupdate" id="txtide" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Nama</label>
                        <input type="text" class="form-control fupdate" id="txtnamae">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Harga</label>
                        <input type="number" class="form-control fupdate" id="txthargae">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Satuan</label>
                        <select class="form-control fupdate" id="cbosatuane">
                            <option value="pcs">Pcs</option>
                            <option value="dus">Dus</option>
                            <option value="pack">Pack</option>
                            <option value="botol">Botol</option>
                            <option value="sachet">Sachet</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Barcode</label>
                        <input type="text" class="form-control fupdate" id="txtbarcodee">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update()">Update</button>
                <button type="button" class="btn btn-danger" onclick="hapus()">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    let tblbrg = $('#tblbrg').DataTable(
        {
            "ajax": "<?= base_url('Administrator/barang_tampil'); ?>"
        }
    );

    function simpan(){
        let id = $("#txtid").val();
        let nama = $("#txtnama").val();
        let harga = $("#txtharga").val();
        let satuan = $("#cbosatuan").val();
        let barcode = $("#txtbarcode").val();
        if(id == "" || nama == "" || harga == "" || satuan == ""){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Administrator/barang_tambah",
            method: "POST",
            data: {id: id, nama: nama, harga: harga, satuan: satuan, barcode: barcode},
            cache: "false", 
            success: function(x){
                let hasil = atob(x);
                let param = hasil.split("|");
                if(param[0] == "1"){
                    swal({title:"Berhasil", text: param[1], icon: "success"});
                    $(".ftambah").val("");
                    $("#cbosatuan").val("pcs");
                    tblbrg.ajax.reload();
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
            swal({title:"Gagal", text:"ID Barang Tidak Terdeteksi", icon: "error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Administrator/barang_filter",
            method: "POST",
            data: {id: id},
            cache: "false", 
            success: function(x){
                let hasil = atob(x); 
                let param = hasil.split("|"); //1|$nama|$harga|$sat|$bar
                if(param[0] == "1"){
                    $("#txtide").val(id);
                    $("#txtnamae").val(param[1]);
                    $("#txthargae").val(param[2]);
                    $("#cbosatuane").val(param[3]);
                    $("#txtbarcodee").val(param[4]);
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
        let harga = $("#txthargae").val();
        let satuan = $("#cbosatuane").val();
        let barcode = $("#txtbarcodee").val();
        if(id == "" || nama == "" || harga == "" || satuan == ""){
            swal({title:"Gagal", text:"Ada Isian Yang Kosong", icon: "error"});
            return;
        }
        $.ajax({
            url: "<?= base_url(); ?>" + "Administrator/barang_update",
            method: "POST",
            data: {id: id, nama: nama, harga: harga, satuan: satuan, barcode: barcode},
            cache: "false", 
            success: function(x){
                let hasil = atob(x);
                let param = hasil.split("|");
                if(param[0] == "1"){
                    swal({title:"Berhasil", text: param[1], icon: "success"});
                    $(".fupdate").val("");
                    $("#cbosatuane").val("pcs");
                    $("#modalupdate").modal("hide");
                    tblbrg.ajax.reload();
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
            swal({title:"Gagal", text:"Barang Tidak Terdeteksi", icon: "error"});
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
                    url: "<?= base_url(); ?>" + "Administrator/barang_hapus",
                    method: "POST",
                    data: {id: id},
                    cache: "false", 
                    success: function(x){
                        var hasil = atob(x);
                        var param = hasil.split("|");
                        if(param[0] == "1"){
                            swal({title: "Berhasil", text: param[1], icon: "success"});
                            $("#modalupdate").modal("hide");
                            tblbrg.ajax.reload();
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