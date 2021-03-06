<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="index.html" class="navbar-brand">Blogen</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="index.html" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item px-2">
                    <a href="posts.html" class="nav-link">Posts</a>
                </li>
                <li class="nav-item px-2">
                    <a href="categories.html" class="nav-link">Categories</a>
                </li>
                <li class="nav-item px-2">
                    <a href="users.html" class="nav-link">Users</a>
                </li>
                <li class="nav-item px-2">
                    <a href="/article/blog" class="nav-link">Articles</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <?if ($authorizedUser):?>
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> Welcome <?=$authorizedUser->getUsername()?>
                        </a>
                        <div class="dropdown-menu">
                            <a href="profile.html" class="dropdown-item">
                                <i class="fa fa-user-circle"></i> Profile
                            </a>
                            <a href="settings.html" class="dropdown-item">
                                <i class="fa fa-gear"></i> Settings
                            </a>
                        </div>
                        <li class="nav-item">
                            <a href="/admin/logout" class="nav-link">
                                <i class="fa fa-user-times"></i> Logout
                            </a>
                        </li>
                    <?else:?>
                        <li class="nav-item">
                            <a href="/admin/login" class="nav-link">
                                <i class="fa fa-user-times"></i> Login
                            </a>
                        </li>
                    <?endif;?>
                </li>

            </ul>
        </div>
    </div>
</nav>