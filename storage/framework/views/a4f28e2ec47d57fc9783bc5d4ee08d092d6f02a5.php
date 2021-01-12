<aside class="main-sidebar <?php echo e(config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4')); ?>">

    
    <?php if(config('adminlte.logo_img_xl')): ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xl', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('adminlte::partials.common.brand-logo-xs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"><img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a></div>
          </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent <?php echo e(config('adminlte.classes_sidebar_nav', '')); ?>"
                data-widget="treeview" role="menu"
                <?php if(config('adminlte.sidebar_nav_animation_speed') != 300): ?>
                    data-animation-speed="<?php echo e(config('adminlte.sidebar_nav_animation_speed')); ?>"
                <?php endif; ?>
                <?php if(!config('adminlte.sidebar_nav_accordion')): ?>
                    data-accordion="false"
                <?php endif; ?>>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-home "></i>
                        <p>Имоти</p>
                        <span class="badge badge-success right">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-users "></i>
                        <p>Агенти</p>
                        <span class="badge badge-success right">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-user "></i>
                        <p>Профил</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/alfaagenti/public/admin/settings">
                        <i class="fas fa-fw fa-tools "></i>
                        <p>Настройки</p>
                    </a>
                </li>
                
                <?php echo $__env->renderEach('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item'); ?>
            </ul>
        </nav>
    </div>

</aside>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/alfaagenti/resources/views/vendor/adminlte/partials/sidebar/left-sidebar.blade.php ENDPATH**/ ?>