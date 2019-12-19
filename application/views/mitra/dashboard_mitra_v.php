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
            <?php if(!empty($info)){ ?>
            <div class="col-md-12">
                <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">List Transaction</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <?php print_arr($investor); ?>
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($info['countdata'])){
                                    foreach ($info['countdata'] as $key => $value) { 
                                ?>
                                <tr>
                                    <td><?php echo $value['date'][0] ?></td>
                                    <td><?php echo $value['sum'][0] ?></td>
                                </tr>
                                <?php 
                                    } 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                   
                </div>
                <!-- /.card-footer -->
                </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->