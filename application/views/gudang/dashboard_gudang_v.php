 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> <?php echo !$storetkn ? 'Signin Store' : 'Dashboard'; ?></h1>
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
            <?php if (!$storetkn) { ?>
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>  
                        <?php echo $msg ?>
                        
                    </div>
                </div> 
                <?php foreach ($list as $key => $value) { ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url().'mitra/DashboardMitra/'.$form.'/'.$value['id']?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-store-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo $value['name']?></span>
                                    <span class="info-box-number">
                                    
                                    <small></small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-store-alt"></i> Signin pada Store : <?php echo $sign_store['name'] ?></h5>
                        <?php echo $msg ?>
                    </div>
                </div> 
            <?php } ?>
            
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->