    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><?php echo $title; ?></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('member');?>"><small>Officer</small></a></li>
              <li class="breadcrumb-item"><small><?php echo $title; ?></small></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"><?php echo $title; ?>&ensp;</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <!-- <form class="form-horizontal" action="<php echo base_url('member/peminjamanAdd')?>" method="post"> -->
          <?php echo form_open_multipart('member/mutasiAdd');?> 
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>
              <div class="form-group row ml-2">
                <label for="addPasswordSett" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-4">
                  <select name="b" id="addLokasiPer" class="form-control">
                    <option for="addLokasiPer" value="">Select Barang</option>
                    <?php foreach($barang as $lodat) : ?>
                      <option for="addLokasiPer"  value="<?php echo $lodat['id_barang']?>"><?php echo $lodat['nm_barang'];?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('b', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group row ml-2">
                <label for="addPasswordSett" class="col-sm-2 col-form-label">Lokasi Pindah</label>
                <div class="col-sm-4">
                  <select name="d" id="addLokasiPer" class="form-control">
                    <option for="addLokasiPer" value="">Select Lab</option>
                    <?php foreach($lokasidata as $lodat) : ?>
                      <option for="addLokasiPer"  value="<?php echo $lodat['id_lokasi']?>"><?php echo $lodat['nm_lokasi'];?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('d', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group row ml-2">
                <label class="col-sm-2 col-form-label" for="kegiatanAdd">Tanggal Pindah</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="z" class="form-control float-right" id="kegiatanAdd" >
                  </div>
                  <?php echo form_error('z', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group row ml-2">
                <label for="addEmailSetting" class="col-sm-2 col-form-label">Alasan Pindah</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="e" id="detailUserSettAddress" rows="3" placeholder="Alasan pindah.." value="<?php echo set_value('f');?>"></textarea>
                  <?php echo form_error('e', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer justify-content-between">
                <a class="btn btn-info btn-sm" href="<?php echo base_url('member/pengajuan');?>">
                  <i class="fas fa-arrow-left"></i>&ensp;Back To Pengajuan List
                </a>
                <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i>&ensp;Pindah Barang</button>
              </div>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
