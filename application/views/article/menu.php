<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Read<i>it</i>.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <?php
                //                $i = 0;
                //
                //                foreach ($menu as $value)    {
                //                    $i++;
                //                    $class = 'nav-item ';
                //
                //                    if (1 == $i) {
                //                        $class .= ' active';
                //                    }
                //
                //                    echo '<li class="' . $class .  '">';
                ////                        echo '<a href="' . $value['href'] . '" class="nav-link">' . $value['name'] . '</a>';
                //                    echo sprintf('<a href="?id=%s" class="nav-link">%s</a>', $value['id'], $value['name']);
                //                    echo '</li>';
                //                }
                ?>
                <li class="nav-item "><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="/article/blog" class="nav-link">Articles</a></li>
                <li class="nav-item"><a href="/team" class="nav-link">Team</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="/admin" class="nav-link">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>