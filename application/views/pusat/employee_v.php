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
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" required class="form-control" value="<?php echo isset($edit_data) ? $edit_data['email'] : ""; ?>"  placeholder="Enter Email yang sudah terdaftar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">PIC</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="1" id="customRadio1" name="isPic" <?php echo @$edit_data['isPIC'] ? 'checked' : ""; ?>>
                                <label for="customRadio1" class="custom-control-label">Yes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="0" <?php echo @$edit_data['isPIC'] ? '' : "checked"; ?> id="customRadio2" name="isPic">
                                <label for="customRadio2" class="custom-control-label">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Owner</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="1" id="customRadio3" name="isOwner" <?php echo @$edit_data['isOwner'] ? 'checked' : ""; ?>>
                                <label for="customRadio3" class="custom-control-label">Yes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="0" <?php echo @$edit_data['isOwner'] ? '' : "checked"; ?> id="customRadio4" name="isOwner">
                                <label for="customRadio4" class="custom-control-label">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Employee</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="1" id="customRadio5" name="isEmployee" <?php echo @$edit_data['isEmployee'] ? 'checked' : ""; ?>>
                                <label for="customRadio5" class="custom-control-label">Yes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="0" <?php echo @$edit_data['isEmployee'] ? '' : "checked"; ?> id="customRadio6" name="isEmployee">
                                <label for="customRadio6" class="custom-control-label">No</label>
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
                  <th width="2%">#</th>
                  <th width="20%">Name</th>
                  <th width="5%">PIC</th>
                  <th width="5%">Owner</th>
                  <th width="5%">Employee</th>
                  <th width="15%">Created</th>
                  <th width="15%">Modified</th>
                  <th width="">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach ($table as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id'];?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><span class="badge badge-<?php echo $value['isPic'] ? 'success' : 'danger' ?>"><?php echo $value['isPic'] ? 'Yes' : 'No' ?></span></td>
                            <td><span class="badge badge-<?php echo $value['isOwner'] ? 'success' : 'danger' ?>"><?php echo $value['isOwner'] ? 'Yes' : 'No' ?></span></td>
                            <td><span class="badge badge-<?php echo $value['isEmployee'] ? 'success' : 'danger' ?>"><?php echo $value['isEmployee'] ? 'Yes' : 'No' ?></span></td>
                            <td><?php echo $value['date_created'];?></td>
                            <td><?php echo $value['date_modified'];?></td>
                            <td>
                                <a href="<?php echo base_url().'pusat/Employee/edit/'.$value['id'] ?>" class="btn btn-sm btn-outline-warning btn-flat"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url().'pusat/Employee/delete/'.$value['email'] ?>" class="btn btn-sm btn-outline-danger btn-flat" onclick="javascript:confirm('Are you sure ? ')"><i class="fas fa-trash-alt"></i> Delete</a>
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