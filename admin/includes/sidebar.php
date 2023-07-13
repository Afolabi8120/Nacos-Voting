<!-- Sidebar -->
<?php if($getAdmin->usertype == 'Super Admin'): ?>
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>

                <li class="nav-item">
                    <a href="add-candidate">
                        <i class="fas fa-users"></i>
                        <p>Add Candidate</p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="user_management">
                        <i class="fas fa-user"></i>
                        <p>User Management</p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="vote-statistic">
                        <i class="fas fa-folder-open"></i>
                        <p>Vote Statistics</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="change_password">
                        <i class="fas fa-cog"></i>
                        <p>Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="logout">
                        <i class="fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<?php elseif($getAdmin->usertype == 'Admin'): ?>
<div class="sidebar sidebar-style-2">           
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>

                <li class="nav-item">
                    <a href="vote-statistic">
                        <i class="fas fa-folder-open"></i>
                        <p>Vote Statistics</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="logout">
                        <i class="fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

<?php elseif($getAdmin->usertype == 'User'): ?>
<div class="sidebar sidebar-style-2">           
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>

                <li class="nav-item">
                    <a href="vote-statistic">
                        <i class="fas fa-folder-open"></i>
                        <p>Vote Statistics</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="logout">
                        <i class="fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<?php endif; ?>