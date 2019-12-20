 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data <?php echo $title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Navbar Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable <?php echo $title?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive-lg">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="1%">#</th>
                  <th width="30%">Name</th> 
                  <th width="10%">Qty</th>
                  <th width="2%">UOM</th>
                  <th width="30%">Buy Material</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach ($table as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['material_id'];?></td> 
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['qty'];?></td>
                            <td><?php echo $value['uom'];?></td> 
                            <td>
                                <button type="button" 
                                    class="btn btn-sm btn-outline-warning btn-flat" 
                                    data-toggle="modal" 
                                    data-id="<?php echo $value['material_id']?>" 
                                    data-target=".open-modal"
                                    data-title="<?php echo $value['name']?>"
                                >
                                    from Supplier
                                </button>
                                <button type="button" 
                                    class="btn btn-sm btn-outline-info btn-flat" 
                                    data-toggle="modal" 
                                    data-id="<?php echo $value['material_id']?>" 
                                    data-target=".open-modal"
                                    data-title="<?php echo $value['name']?>"
                                >
                                    from Store
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade open-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div id="supplier-form">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga Beli</label>
                            <div class="col-sm-10">
                                <input type="number" name="buy_price" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['name'] : ""; ?>"  placeholder="Enter Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->