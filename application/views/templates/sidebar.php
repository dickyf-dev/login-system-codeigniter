    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fab fa-pagelines"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Agrodifa</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!--query menu-->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
      FROM `user_menu` JOIN `user_access_menu`
        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
     WHERE `user_access_menu`.`role_id` = $role_id
  ORDER BY `user_access_menu`.`menu_id` ASC
  ";

        $menu = $this->db->query($queryMenu)->result_array();
        // var_dump($menu);
        //die; 
        ?>

        <!-- Looping menu -->
        <?php foreach ($menu as $m) : ?>
            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <!--siapkansub-menu sesuai menu -->

            <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
            FROM `user_sub_menu` JOIN `user_menu` 
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
           WHERE `user_sub_menu`.`menu_id` = $menuId 
             AND `user_sub_menu`.`is_active` = 1
           ";

                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

            <?php foreach ($subMenu as $sm) : ?>

                <?php if ($title == $sm['title']) :?>

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                 <?php else : ?>
                    <li class="nav-item">

                    <?php endif; ?>

                    <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title']; ?></span></a>
                    </li>

                <?php endforeach ?>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

            <?php endforeach; ?>





            <!-- Heading -->
            <!--        <div class="sidebar-heading">
            User
        </div>
-->
            <!-- Nav Item - Charts -->
            <!--        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="far fa-fw fa-user"></i>
                <span>My profile</span></a>
        </li>

-->
            <!-- Divider -->



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <!--<a class="nav-link" href="<?= base_url('auth/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a> -->


                <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>



            <!-- Nav Item - Pages Collapse Menu -->
            <!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
-->
            <!-- Nav Item - Utilities Collapse Menu -->
            <!--   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>
-->
            <!-- Divider -->
            <!-- <hr class="sidebar-divider">-->

            <!-- Heading -->
            <!--  <div class="sidebar-heading">
        Addons
      </div>
-->
            <!-- Nav Item - Pages Collapse Menu -->
            <!--   <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

-->
            <!-- Nav Item - Tables -->
            <!--   <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
-->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

    </ul>
    <!-- End of Sidebar -->