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
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="address" required class="form-control" cols="10" rows="5" placeholder="Enter Address"><?php echo isset($edit_data) ? $edit_data['address'] : ""; ?></textarea> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Store Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="store_type" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['store_type'] : ""; ?>"  placeholder="Enter Store Type">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['status'] : ""; ?>"  placeholder="Enter Status">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Open</label>
                        <div class="col-sm-3">
                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                            <input type="text" name="open" value="<?php echo isset($edit_data) ? $edit_data['open'] : ""; ?>" class="form-control datetimepicker-input" data-target="#timepicker1"/>
                            <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Close</label>
                        <div class="col-sm-3">
                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                            <input type="text" name="close" class="form-control datetimepicker-input" value="<?php echo isset($edit_data) ? $edit_data['close'] : ""; ?>" data-target="#timepicker2"/>
                            <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
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
                  <th width="20%">Name</th>
                  <th width="10%">Address</th>
                  <th width="2%">Type</th>
                  <th width="2%">Status</th>
                  <th width="3%">Open</th>
                  <th width="3%">Close</th>
                  <th width="5%">Created</th>
                  <th width="5%">Modified</th>
                  <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach ($table as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id'];?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['address'];?></td>
                            <td><?php echo $value['store_type'];?></td>
                            <td><?php echo $value['status'];?></td>
                            <td><?php echo $value['open'];?></td>
                            <td><?php echo $value['close'];?></td>
                            <td><?php echo $value['date_created'];?></td>
                            <td><?php echo $value['date_modified'];?></td>
                            <td>
                                <a href="<?php echo base_url().'pusat/Store/edit/'.$value['id'] ?>" class="btn btn-sm btn-outline-warning btn-flat"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url().'pusat/Store/delete/'.$value['id'] ?>" class="btn btn-sm btn-outline-danger btn-flat" onclick="javascript:confirm('Are you sure ? ')"><i class="fas fa-trash-alt"></i> Delete</a>
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