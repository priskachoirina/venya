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
              <form id="form-kloter" class="form-horizontal" action="<?php echo $form; ?>" method="post">
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
                    <?php if(!isset($edit_data)){ ?>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Supplier</label>
                            <div class="col-sm-10">
                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">Choose Supplier</option>
                                <?php foreach ($supplier as $key => $value) {
                                    echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                } ?>
                            </select>
                            </div>
                        </div>
                    <?php } ?>

                    
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
                  <th width="30%">Name</th>
                  <th width="10%">UOM</th>
                  <th width="2%">Qty</th>
                  <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach ($table as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['material_id'];?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['uom'];?></td>
                            <td><?php echo $value['qty'];?></td>
                            <td>
                                <a href="<?php echo base_url().'pusat/Materials/edit/'.$value['material_id'] ?>" class="btn btn-sm btn-outline-warning btn-flat"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url().'pusat/Materials/delete/'.$value['material_id'] ?>" class="btn btn-sm btn-outline-danger btn-flat" onclick="javascript:confirm('Are you sure ? ')"><i class="fas fa-trash-alt"></i> Delete</a>
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