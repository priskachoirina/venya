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
                  <th width="5%">SKU</th>
                  <th width="5%">Store</th>
                  <th width="5%">Price</th>
                  <th width="5%">Created</th>
                  <th width="5%">Modified</th>
                   
                </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach ($table as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id'];?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['sku'];?></td>
                            <td><?php echo $value['store_id'];?></td>
                            <td><?php echo $value['price'];?></td>
                            <td><?php echo $value['date_created'];?></td>
                            <td><?php echo $value['date_modified'];?></td>
                             
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