 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kloter</h1>
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
                <h3 class="card-title">Form Kloter</h3>

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
                <?php } ?>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Investor</label>
                        <div class="col-sm-10">
                        <select class="form-control select2 select2-danger" name="list_investor[]" data-placeholder="Select Investor" multiple="multiple" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <?php foreach ($investor as $key => $value) {
                                echo '<option value="'.$value['id'].'">'.$value['email'].'</option>';
                            } ?>
                        </select>
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
              <h3 class="card-title">List Kloter <?php echo $this->uri->segment(4);?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive-lg">
                <div id="accordion"> 
                    <div class="card card-info">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <div class="card-header">
                                <h4 class="card-title">
                                    Investor
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse in collapse show">
                            
                            <div class="card-body">
                                <ul>
                                <?php foreach ($table['user'] as $key => $value) { ?>
                                    <li><?php echo $value['email'];?> </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div> 

                    <div class="card card-info">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <div class="card-header">
                            
                                <h4 class="card-title">
                                Store
                                </h4>
                            </div>
                        </a>
                        <div id="collapseTwo" class="panel-collapse in collapse show">
                            
                            <div class="card-body">
                                <ul>
                                <?php foreach ($table['store_u'] as $key => $value) { ?>
                                    <li><?php echo $value;?></li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
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