<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-warning" style="margin-bottom: 20px;" data-toggle="modal" data-target="#modaltambah">Tambah Data</button>&nbsp
        <button type="button" class="btn btn-dark" style="margin-bottom: 20px;">Refresh Data</button>
    </div>
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tblbrgmsk" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 15%">ID Akun</th>
                                <th style="width: 15%">Tanggal</th>
                                <th style="width: 20%">Satuan</th>
                                <th style="width: 20%">Faktur</th>
                                <th style="width: 30%">Keterangan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modaltambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-light">
                <h5 class="modal-title">Form Data Barang Masuk</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>ID Akun</label>
                            <input type="text" class="form-control" id="txtidakun">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal</label>
                            <input type="text" class="form-control" id="txttanggal">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Satuan</label>
                            <input type="number" class="form-control" id="txtsatuan">
                    </div>
                     <div class="form-group col-md-6">
                        <label>Faktur</label>
                            <input type="text" class="form-control" id="txtfaktur">    
                    </div>
                    <div class="form-group col-md-12">
                        <label>Keterangan</label>
                            <input type="text" class="form-control" id="txtket">    
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="tambahdatabarang()">Simpan</button>
                <button type="button" class="btn btn-danger" onclick="kosongdatabarang()">Reset</button>
            </div>
        </div>
    </div>
</div>


<script>
    let tblbrgmsk = $("#tblbrgmsk").DataTable();
</script>
