<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #3a7bd5, #00d2ff);">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/index.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN SHOPDIENTU<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="../dashboard/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang Chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Products -->
    <li class="nav-item active">
        <?php if (($_SESSION['lever']) == 1) { ?>
            <a class="nav-link" href="../manufactures/index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Manufactures</span>
            </a>
        <?php } else { ?>
            <div onclick="return Dec()" class="nav-link" href="../manufactures/index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Manufactures</span>
            </div>
        <?php } ?>

    </li>

    <li class="nav-item active">
        <a class="nav-link" href="../products/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Products</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="../product_laptop/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Product(Laptop)</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="../orders/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Orders</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="../categoris/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Advertises</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Account</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Account:</h6>
                <a class="collapse-item" href="../accounts/index.php">Users</a>
                <a class="collapse-item" href="../users/index.php">Customers</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Cards -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-cog"></i>
            <span>Cards</span></a>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<style>
.sidebar-brand-text {
    font-weight: bold;
    letter-spacing: 1px;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
}

.nav-item .nav-link {
    font-weight: 500;
    padding: 12px 16px;
    transition: all 0.3s;
    color: rgba(255, 255, 255, 0.9) !important;
}

.nav-item .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.15);
    border-left: 4px solid #fff;
    color: #fff !important;
}

.sidebar .nav-item .nav-link i {
    font-size: 1rem;
    margin-right: 0.5rem;
}

.sidebar .nav-item.active .nav-link {
    background-color: rgba(255, 255, 255, 0.2);
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.sidebar hr.sidebar-divider {
    border-top: 1px solid rgba(255, 255, 255, 0.15);
}

#sidebarToggle {
    background-color: rgba(255, 255, 255, 0.2);
}

#sidebarToggle:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

.collapse-inner {
    border-radius: 10px !important;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}
</style>