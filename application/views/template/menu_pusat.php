    <li class="nav-header">Manajemen Pusat</li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>pusat/DashboardPusat" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo base_url()?>pusat/Company" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Company</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url()?>pusat/Store" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Store</p>
                    </a>
                </li>
                <?php if ($storetkn) { ?>
                <li class="nav-item">
                    <a href="<?php echo base_url()?>pusat/Products" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?php echo base_url()?>pusat/Supplier" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url()?>pusat/Materials" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Material</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url()?>pusat/Investor" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Investor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url()?>pusat/Employee" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Employee</p>
                    </a>
                </li>
                <?php } ?>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>pusat/User" class="nav-link">
              <i class="fas fa-user-friends nav-icon"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <?php if ($storetkn) { ?>
          <li class="nav-item">
            <a href="<?php echo base_url()?>pusat/Kloter" class="nav-link">
              <i class="fas fa-file-contract nav-icon"></i>
              <p>
                Kloter
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url()?>pusat/Transaction/" class="nav-link">
              <i class="fas fa-dollar-sign nav-icon"></i>
              <p>
                Transaction
              </p>
            </a>
          </li>
          <?php } ?>