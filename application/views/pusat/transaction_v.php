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
              <h3 class="card-title">DataTable <?php echo $title?> <b> Store <?php echo $sign_store['name']?></b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive-lg">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="1%">#</th>
                  <th width="15%">Buyer</th>
                  <th width="10%">Store</th>
                  <th width="5%">Cashier</th>
                  <th width="5%">Total Price</th>
                  <th width="5%">Tax</th>
                  <th width="5%">Service</th>
                  <th width="5%">Discount</th>
                  <th width="20%">Created</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                     foreach ($table as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id'];?></td>
                            <td><?php echo $value['buyer'];?></td>
                            <td><?php echo $value['store'];?></td>
                            <td><?php echo $value['employee'];?></td>
                            <td><?php echo $value['total_price'];?></td>
                            <td><?php echo $value['tax'];?></td>
                            <td><?php echo $value['service'];?></td>
                            <td><?php echo $value['discount'];?></td>
                            <td><?php echo $value['date_created'];?></td>
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