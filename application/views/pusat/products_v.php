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
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form <?php echo $title?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <form id="form-kloter" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $form; ?>" method="post">
                <div class="card-body">
                <?php if(isset($alert)){ ?>
                    <div class="alert <?php echo $alert?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fas <?php echo $title_c == "Success" ? "fa-check" : "fa-ban"?>"></i> <?php echo $title_c ?> </h4>
                        <?php echo $caption ?>
                    </div>
                    <br>
                    <br>
                <?php } ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['name'] : ""; ?>"  placeholder="Enter Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">SKU</label>
                        <div class="col-sm-10">
                            <input type="text" name="sku" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['sku'] : ""; ?>"  placeholder="Enter SKU">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">UOM</label>
                        <div class="col-sm-10">
                            <input type="text" name="uom" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['uom'] : ""; ?>"  placeholder="Enter UOM">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="desc" required class="form-control" cols="10" rows="5" placeholder="Enter Address"><?php echo isset($edit_data) ? $edit_data['desc'] : ""; ?></textarea> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['status'] : ""; ?>"  placeholder="Enter Status">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['price'] : ""; ?>"  placeholder="Enter Price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Buy Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="buy_price" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['buy_price'] : ""; ?>"  placeholder="Enter Buy Price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image <span class="badge badge-info right">(jpg/png)</span></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="upload" class="custom-file-input" id="InputFile">
                                    <label class="custom-file-label" for="exampleInputFile" accept="image/*">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                            <br>
                            
                            <?php if(isset($edit_data)){?>
                                <div id="upload">
                                    <img class="img-fluid pad" src="<?php echo base_url().'assets/img/products/'. $edit_data['image'] ?>" alt="Photo">
                                </div>
                                <input type="text" name="old_img" value="<?php echo $edit_data['image'] ?>"  >
                            <?php }else{ ?>
                                <div id="upload" style="display:none;">
                                    <img class="img-fluid pad" src="" alt="Photo">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-flat" style="float:right;"> <i class="fa fa-check"></i> Save</button>
                </div>
              </form>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
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
                  <th width="5%">Img</th> 
                  <th width="20%">Name</th> 
                  <th width="5%">Price</th>
                  <th width="5%">Buy Price</th>
                  <th width="5%">Created</th>
                  <th width="5%">Modified</th>
                  <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach ($table as $key => $value) { ?>
                        <tr>
                            <td><?php echo $key+1 ;?></td>
                            <td>
                                <img src="<?php echo $value['image']?>" height="10%">
                            </td>
                            <td><?php echo $value['name'];?></td> 
                            <td><?php echo $value['price'];?></td>
                            <td><?php echo $value['buy_price'];?></td>
                            <td><?php echo $value['date_created'];?></td>
                            <td><?php echo $value['date_modified'];?></td>
                            <td>
                                <button type="button" 
                                    class="btn btn-sm btn-outline-info btn-flat" 
                                    class="product-modal"
                                    data-json='<?php echo json_encode($table[$key])?>'
                                >
                                <i class="fas fa-info-circle"></i> Detail
                                </button>
                                <a href="<?php echo base_url().'pusat/Products/edit/'.$value['id'] ?>" class="btn btn-sm btn-outline-warning btn-flat"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url().'pusat/Products/delete/'.$value['id'] ?>" class="btn btn-sm btn-outline-danger btn-flat" onclick="javascript:confirm('Are you sure ? ')"><i class="fas fa-trash-alt"></i> Delete</a>
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

  <div class="modal fade" >
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <img src="" class="img-responsive" style="max-height:250px;">
                <dl class="dl-horizontal"> 
                  <dt>Price</dt>
                  <dd id="p_price"></dd>
                  <dt>Buy Price</dt>
                  <dd id="p_buy"></dd> 
                  <dt>SKU</dt>
                  <dd id="p_sku"></dd> 
                  <dt>Status</dt>
                  <dd id="p_status"></dd> 
                  <dt>Description</dt>
                  <dd id="p_desc"></dd>
                </dl>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
             
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->