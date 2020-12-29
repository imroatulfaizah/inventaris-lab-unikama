    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><?php echo $title; ?></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('setting');?>"><small>Setting</small></a></li>
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
            <h4 class="card-title " text-align="center"><strong><?php echo $title; ?></strong></h4>
          </div>
          <div class="card-body">
            <?php echo form_error('a','<div class="alert alert-danger" role="alert">','</div>'); ?>
            <?php echo $this->session->flashdata('message'); ?>
            <div>
              <a class="btn btn-sm btn-outline-info float-right" data-toggle="modal" data-target="#menuNewModal">
                <i class="fas fa-plus"></i> Add Menu
              </a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach($menu as $m) :  $i++;?>
                  <tr>
                    <th scope="row"><?php echo $i ;?></th>
                    <td><?php echo $m['parents']; ?></td>
                    <td>
                      <a style="margin-right:10px" href="#" data-toggle="modal" data-target="#menuDetailModal<?php echo $m['id'];?>" title="Detail"><i class="fas fa-book-open text-info"></i></a>
                      <a style="margin-right:10px" href="#" data-toggle="modal" data-target="#menuEditModal<?php echo $m['id'];?>" title="Edit"><i class="fas fa-edit text-secondary"></i></a>
                      <a href="#" data-toggle="modal" data-target="#menuDeleteModal<?php echo $m['id'];?>" title="Hapus"><i class="fas fa-trash text-danger"></i></a>
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

    <!-- Menu Modal Add-->
    <div class="modal fade" id="menuNewModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title">Add New Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo base_url('setting'); ?>" method="post">
            <div class="modal-body">

              <input type="hidden" name="zz" readonly value="<?php echo $user['role_id'];?>"  class="form-control" >

              <div class="form-group">
                <input type="text" name="a" class="form-control" id="InputNewMenu" placeholder="Menu Name">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&ensp;Add</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Menu Modal Detail-->
    <?php $i=0; foreach($menu as $m) : $i++; ?>
    <div class="modal fade" id="menuDetailModal<?php echo $m['id'];?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title">Detail Menu "<?php echo $m['parents'];?>"</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <input type="text" name="a" disabled class="form-control" id="InputNewMenu" placeholder="Menu Name" value="<?php echo $m['parents'];?>">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary btn-sm"><span aria-hidden="true">Close</span></button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php endforeach; ?>

  <?php $i=0; foreach($menu as $m) : $i++; ?>
  <!-- Menu Modal Edit-->
  <div class="modal fade" id="menuEditModal<?php echo $m['id'];?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title">Edit Menu "<?php echo $m['parents'];?>"</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url('setting/editmenu'); ?>" method="post">
          <div class="modal-body">

            <input type="hidden" name="b" readonly value="<?php echo $m['id'];?>"  class="form-control" >

            <div class="form-group">
              <input type="text" name="a" class="form-control" id="InputNewMenu" value="<?php echo $m['parents'];?>">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary btn-sm"><span aria-hidden="true">Tutup</span></button>
            <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>&ensp;Update</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach; ?>
<!--End Modal -->

  <!-- Barang Hapus Modal-->
  <?php $i=0; foreach($menu as $m) : $i++; ?>
  <div class="modal fade" id="menuDeleteModal<?php echo $m['id'];?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title">Hapus <?php echo $m['parents'];?> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Pilih "Hapus" dibawah untuk menghapus <?php echo $title;?> <?php echo $m['parents'];?>.</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <a class="btn btn-danger" href="<?php echo base_url('setting/deletemenu/'); ?><?php echo $m['id'];?>"><i class="fas fa-trash"></i>&ensp;Hapus</a>
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