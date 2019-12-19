 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $title?></h1>
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
            <?php foreach ($table as $key => $value) { ?>
                <a href="<?php echo base_url().'Pusat/DashboardPusat/signincompany/'.$value['id']?>">
                    <div class="info-box mb-6 bg-info">
                        <span class="info-box-icon"><i class="fa fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><?php echo $value['name'] ?></span>
                            <span class="info-box-number">163,921</span>
                        </div>
                </div>
              </a>
            <?php } ?>
            
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->