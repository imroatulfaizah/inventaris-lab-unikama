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
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title " text-align="center"><strong><?php echo $title; ?></strong></h4><br>
            
          </div>
          <div class="card-body">
            <?php echo form_error('a','<div class="alert alert-danger" role="alert">','</div>'); ?>
            <?php echo $this->session->flashdata('message'); ?>
            <div>
              <a class="btn btn-sm btn-outline-info float-right" href="<?php echo base_url('member/peminjamanAdd')?>">
                <i class="fas fa-plus"></i> Add Data
              </a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Surat Peminjaman</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach($allpeminjaman as $allper) :  $i++;?>
                  <tr>
                    <th scope="row"><?php echo $i ;?></th>
                    <td><?php echo $allper['nama_peminjam']; ?></td>
                    <td><?php echo $allper['nm_barang']; ?></td>
                    <td><?php echo date('d F Y', strtotime($allper['tanggal_peminjaman'])); ?></td>
                    <td>
                    <a href="../assets/img/profile/<?php echo $allper['file_peminjaman']; ?>" download><img src="../assets/img/profile/<?php echo $allper['file_peminjaman']; ?>" alt="<?php echo $allper['file_peminjaman']; ?>" height="100" width="100"></a>
                    </td>
                    <!-- <td><php echo $allper['file_peminjaman']; ?></td> -->
                    <td>
                      <a style="margin-right:10px" href="<?php echo base_url('member/peminjamandetail/'). $allper['id_peminjaman'];?>"  title="Detail"><i class="fas fa-book-open text-info"></i></a>
                      <a style="margin-right:10px" href="<?php echo base_url('member/peminjamanedit/'). $allper['id_peminjaman'];?>" title="Edit"><i class="fas fa-edit text-secondary"></i></a>
                      <a href="#" data-toggle="modal" data-target="#peminjamanDeleteModal<?php echo $allper['id_peminjaman'];?>" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                    </td>    
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->

    <!-- Barang Hapus Modal-->
    <?php $i=0; foreach($allpeminjaman as $allper) : $i++; ?>
    <div class="modal fade" id="peminjamanDeleteModal<?php echo $allper['id_peminjaman'];?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header btn-danger">
            <h5 class="modal-title">Hapus <?php echo $allper['nm_peminjaman'];?> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Pilih "Hapus" dibawah untuk menghapus peminjaman <?php echo $allper['nm_peminjaman'];?>.</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <a class="btn btn-danger" href="<?php echo base_url('member/peminjamanDelete/')?><?php echo $allper['id_peminjaman'];?>">Hapus</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php endforeach; ?>


</section>
    <!-- /.content -->