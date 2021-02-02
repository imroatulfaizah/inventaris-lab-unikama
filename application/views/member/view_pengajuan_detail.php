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
              <li class="breadcrumb-item"><small>Detail Data Pengajuan</small></li>
            </ol>
          </div>
        </div>
        <?php if(validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
          </div>
        <?php endif?>
        <?php echo $this->session->flashdata('message'); ?>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active ml-4" id="custom-tabs-one-pengajuan-tab" data-toggle="pill" href="#custom-tabs-one-pengajuan" role="tab" aria-controls="custom-tabs-one-pengajuan" aria-selected="true"><b>Data pengajuan</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><b>Data Perbaikan</b></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-pengajuan" role="tabpanel" aria-labelledby="custom-tabs-one-pengajuan-tab">
                   <div class="card card-info">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                      <form class="form-horizontal" action="<?php echo base_url('member/pengajuanEdit/').$onepengajuan['id_pengajuan'];?>" method="post">
                        <div class="form-group row ml-2">
                          <label for="addNamaPer" class="col-sm-2 col-form-label">Nama Pengajuan </label>
                          <div class="col-sm-4">
                            <input type="text" name="a" class="form-control" id="addNamaPer" placeholder="Nama pengajuan" value="<?php echo $onepengajuan['nm_pengajuan'];?>" disabled>
                            <?php echo form_error('a', '<small class="text-danger pl-3">', '</small>');?>
                          </div>
                        </div>
                        <div class="form-group row ml-2">
                          <label for="addPasswordSett" class="col-sm-2 col-form-label">Lokasi</label>
                          <div class="col-sm-4">
                            <input type="text" name="c" class="form-control" id="detKategoriPer" placeholder="Nama pengajuan" value="<?php echo $onepengajuan['nm_lokasi'];?>" disabled>
                            <?php echo form_error('c', '<small class="text-danger pl-3">', '</small>');?>
                          </div>
                        </div>
                        <div class="form-group row ml-2">
                          <label for="addNamaPer" class="col-sm-2 col-form-label">Lokasi Rinci </label>
                          <div class="col-sm-4">
                            <input type="text" name="d" class="form-control" id="addNamaPer" placeholder="Meja Ke /dll" value="<?php echo $onepengajuan['lokasi_rinci'];?>" disabled>
                            <?php echo form_error('d', '<small class="text-danger pl-3">', '</small>');?>
                          </div>
                        </div>
                        <div class="form-group row ml-2">
                          <label class="col-sm-2 col-form-label" for="kegiatanAdd">Tanggal</label>
                          <div class="col-sm-4">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="far fa-calendar-alt"></i>
                                </span>
                              </div>
                              <input type="text" name="e" class="form-control float-right" id="kegiatanAdd" value="<?php echo date('d F Y', strtotime($onepengajuan['tgl_pengajuan'])) ;?>" disabled>

                            </div>
                            <?php echo form_error('e', '<small class="text-danger pl-3">', '</small>');?>
                          </div>
                        </div>
                        <div class="form-group row ml-2">
                          <label for="addEmailSetting" class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="f" id="detailUserSettAddress" rows="3" placeholder="Keterangan.." value="<?php echo $onepengajuan['keterangan'];?>" disabled><?php echo $onepengajuan['keterangan'];?></textarea>
                            <?php echo form_error('f', '<small class="text-danger pl-3">', '</small>');?>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer justify-content-between">
                          <a class="btn btn-info btn-sm" href="<?php echo base_url('member/pengajuan');?>">
                            <i class="fas fa-arrow-left"></i>&ensp;Back To Pengajuan List
                          </a>
                          <a class="btn btn-warning float-right btn-sm" href="<?php echo base_url('member/pengajuanEdit/'). $onepengajuan['id_pengajuan'];?>">
                            <i class="fas fa-edit"></i>&ensp;Edit Data
                          </a>
                        </div>
                        <!-- /.card-footer -->
                      </form>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                  <div class="card">
                    <div class="card-header bg-info">
                      <h4 class="card-title  mt-1 " text-align="center"><strong><?php echo $title; ?></strong></h4>
                    </div>
                    <div class="card-body">
                      <div>
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th scope="col" style="text-align: center; width: 15px;">#</th>
                              <th scope="col" style="text-align: center;">Tanggal Pengajuan</th>
                              <th scope="col" style="text-align: center;">Kebutuhan</th>
                              <th scope="col" style="text-align: center; width: 50px;">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=0; foreach($allpengajuan as $allper) :  $i++;?>
                            <tr>
                              <th scope="row"><?php echo $i ;?></th>
                              <td><?php echo $allper['tgl_pengajuan']; ?></td>
                              <td><?php echo $allper['kebutuhan']; ?></td>
                              <td>
                                <a style="margin-right: 10px" href="#" data-toggle="modal" data-target="#perbaikanDetailModal<?php echo $allper['id_perbaikan'];?>" title="Detail"><i class="fas fa-book-open text-info"></i></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.row -->
                  </div>
                  <div class="card-footer justify-content-between">
                    <a class="btn btn-info btn-sm" href="<?php echo base_url('member/pengajuan');?>">
                      <i class="fas fa-arrow-left"></i>&ensp;Back To Pengajuan List
                    </a>
                    <a class="btn btn-warning float-right btn-sm" href="<?php echo base_url('member/pengajuanedit/'). $onepengajuan['id_pengajuan'];?>">
                      <i class="fas fa-edit"></i>&ensp;Edit Data
                    </a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->



  <!-- Kategori Modal Detail-->
  



</section>
    <!-- /.content -->