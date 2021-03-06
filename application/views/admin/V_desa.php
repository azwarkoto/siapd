<?= $this->session->flashdata('message'); ?>
<div class="row">
    <!-- tambah data kecamatan -->
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Tambah Data Desa</h5>
            </div>
            <div class="card-body">
                

                <form class="form-horizontal" method="post" action="<?= base_url('C_Admin/tambah_desa') ?>" role="from">

                	<div class="form-group">
                        <label>Nama Kabupaten</label>
                        <select name="id_kab" class="form-control" id="kabupaten" required>
                        	<option value="">---pilih Kabupaten---</option>
                        	option
								<?php foreach($kabupaten as $k): ?>
									<option <?= $kab_selected == $k->id_kab ? 'selected="selected"' :'' ?> value="<?= $k->id_kab; ?>"><?= $k->nama_kab; ?> </option>
								<?php endforeach;  ?>
							</select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Nama Kecamatan</label>
                        <select name="id_kec" class="form-control" id="kecamatan">
                        	<option value="">---pilih Kecamatan---</option>
                        	
								<?php foreach($kecamatan as $k): ?>
									<option <?= $kec_selected == $k->id_kab ? 'selected="selected"' :'' ?> class="<?= $k->id_kab ?>" value="<?= $k->id_kec; ?>"><?= $k->nama_kec; ?> </option>
								<?php endforeach;  ?>
							</select>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="form-group">
                        
                        <label>Kode Desa</label>
                        <input class="form-control" placeholder="Enter Kode..." type="text" name="kode_desa" id="desa" required>
                        <?= form_error('kode_kec','<small class="text-danger pl-3">','</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label>Nama Desa</label>
                        <input class="form-control" placeholder="Enter Nama..." type="text" name="nama" required>
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    

                    <div class="modal-footer">
                        <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- end tambah data kabupaten -->

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold">Data Desa</h5>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                

                <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0" style="font-size: 16px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Desa</th>
                      <th>Nama Desa</th>
                      <th>Nama kecamatan</th>
                      <th>nama Kabupaten</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  
                    <tbody>
                    <?php $no=1; foreach($desa as $d): ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $d->kode_desa; ?></td>
                          <td><?= $d->nama_desa; ?></td>
                          <td><?= $d->nama_kec;  ?></td>
                          <td><?= $d->nama_kab; ?></td>
                          <td align="center" >
                            <a href="#" style="margin-top: 5px;" data-toggle="modal" data-target="#modal_edit<?= $d->id_desa;?>" class="btn btn-info btn-sm"><i class="fa fa-edit fa-xs"></i></a>
                            <a href="#" style="margin-top: 5px;"  data-toggle="modal" data-target="#modal_hapus<?php echo $d->id_desa;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-xs"></i></a>
                          </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>

    <!-- edit modal -->
<?php foreach($desa as $d):  ?>
<div class="modal fade" id="modal_edit<?= $d->id_desa;?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Edit Desa / Kelurahan</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url('C_Admin/edit_desa'); ?>">
                	<input type="hidden" name="id_desa" value="<?= $d->id_desa; ?>">
     
                    <div class="form-group">
                        
                        <label>Kode kel/desa</label>
                        <input class="form-control" value="<?= $d->kode_desa; ?>" placeholder="Enter Kode..." type="text" name="kode_desa">
                        <?= form_error('kode_desa','<small class="text-danger pl-3">','</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label>Nama Kel/desa</label>
                        <input class="form-control" value="<?= $d->nama_desa; ?>" placeholder="Enter Nama..." type="text" name="nama_desa">
                        <?= form_error('nama_desa','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                     <div class="modal-footer">
                        <a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- end edit modal -->

<!-- modal hapus -->

<?php   foreach($desa as $d): ?>
<div class="modal fade" id="modal_hapus<?php echo $d->id_desa;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="myModalLabel">Hapus Desa</h5>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_Admin/hapus_desa');?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b>Desa <?php echo $d->nama_desa;?> ?</b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_desa" value="<?php echo $d->id_desa;?>">
                    <a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php   endforeach; ?>

                                    <!--END MODAL HAPUS-->
