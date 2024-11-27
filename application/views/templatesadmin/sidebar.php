<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/dashboard'); ?>">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/features');?>">
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span>Features</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/about');?>">
            <i class="bi bi-question-circle"></i>
            <span>About</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/packages');?>">
            <i class="bi bi-archive"></i>
            <span>Packages</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/gallery');?>">
            <i class="bi bi-images"></i>
            <span>Gallery</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/blogadmin');?>">
            <i class="bi bi-newspaper"></i>
            <span>Blog</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/testimonial');?>">
            <i class="bi bi-people"></i>
            <span>Testimonial</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="<?= base_url('page/contact');?>">
            <i class="bi bi-telephone"></i>
            <span>Contact</span>
        </a>
    </li>
    <!-- End Dashboard Nav -->

    <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#profile-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="profile-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href=" <?= base_url('login/logout'); ?>">
                            <i class="bi bi-caret-right"></i><span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- End Blank Page Nav -->

        </ul>

    </aside>
