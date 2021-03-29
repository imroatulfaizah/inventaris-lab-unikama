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
          <form class="form-horizontal" action="<?php echo base_url('member/barangPindah/'). $oneba['id_barang'];?>" method="post">
            <div class="card-body">
              <?php echo $this->session->flashdata('message'); ?>

              <input type="hidden" readonly value="<?php echo $oneba['id_barang'];?>" name="zz" class="form-control" >

              <div class="form-group row ml-2">
                <label for="addUserSetting" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                  <input type="text" name="a" class="form-control" id="addUserSetting" placeholder="Kode Barang" value="<?php echo $oneba['kd_barang'];?>">
                  <?php echo form_error('a', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group row ml-2">
                <label for="addEmailSetting" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                  <input type="text" name="b" class="form-control" id="addEmailSetting" placeholder="Nama Barang" value="<?php echo $oneba['nm_barang'];?>">
                  <?php echo form_error('b', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              
                      <div class="form-group row ml-2">
                      <label for="addPasswordSett" class="col-sm-2 col-form-label">Lokasi</label>
                      <div class="col-sm-10">
                        <select name="l" id="InputSubMenuMenu" class="form-control">
                          <option for="InputSubMenuMenu" value="">Select Lokasi</option>
                          <?php foreach($lokasidata as $lokdat) : ?>
                            <?php if($lokdat['id_lokasi'] == $oneba['id_lokasi']) : ?>
                              <option for="InputSubMenuMenu"  value="<?php echo $lokdat['id_lokasi']?>" selected><?php echo $lokdat['nm_lokasi'];?></option>
                              <?php else :?>
                                <option for="InputSubMenuMenu"  value="<?php echo $lokdat['id_lokasi']?>"><?php echo $lokdat['nm_lokasi'];?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                          <?php echo form_error('l', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                      </div>
                      <div class="form-group row ml-2">
                        <label for="addEmailSetting" class="col-sm-2 col-form-label">Alasan Pindah</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="i" id="detailUserSettAddress" rows="3" placeholder="Catatan.." value="<?php echo set_value('e');?>"><?php echo $oneba['catatan'];?></textarea>
                          <?php echo form_error('i', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                      </div>
                      
                      <!-- /.card-body -->
                      <div class="card-footer justify-content-between">
                        <a class="btn btn-info btn-sm" href="<?php echo base_url('member/master');?>">
                          <i class="fas fa-arrow-left"></i>&ensp;Back To Master List
                        </a>
                        <button type="submit" class="btn btn-warning btn-sm float-right"><i class="fas fa-edit"></i>&ensp;Pindah Barang</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
              </section>
              <!-- /.content -->
