<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title ?></h1>
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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form Registrasi</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="overlay dark" style="display: none;">
                <i class="fas fa-2x fa-sync fa-spin"></i>
              </div>
              <!-- form start -->
              <form id="form-action" enctype="multipart/form-data" method="post" data-method="post" data-token="" data-url='register'>
                <div class="card-body">
                  <div id="show-alert"></div>
                  <div class="form-group">
                    <label>Identity Number</label>
                    <input type="number" name="identity_number" class="form-control"  placeholder="Enter Identity Number">
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control"  placeholder="Enter Address">
                  </div>

                  <div class="form-group">
                  <label>Phone Number</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="phone_number"
                           data-inputmask="'mask': ['999-999-999999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer ">
                  <button type="submit"  class="btn btn-outline-primary btn-flat"> <i class="fa fa-check"></i> Register</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>