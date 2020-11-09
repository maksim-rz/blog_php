        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date Posted</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($articles as $article):?>
                            <tr>
                                <td scope="row"><?=$article->getId()?></td>
                                <td><?=$article->getTitle()?></td>
                                <td>Web Development</td>
                                <td>July 12, 2017</td>
                                <td><a href="/admin/artedit/id/<?=$article->getId()?>" class="btn btn-secondary">
                                        <i class="fa fa-angle-double-right"></i> Details
                                    </a></td>
                            </tr>
                        <?endforeach;?>
<!--                        <tr>-->
<!--                            <td scope="row">1</td>-->
<!--                            <td>Post One</td>-->
<!--                            <td>Web Development</td>-->
<!--                            <td>July 12, 2017</td>-->
<!--                            <td><a href="details.html" class="btn btn-secondary">-->
<!--                                    <i class="fa fa-angle-double-right"></i> Details-->
<!--                                </a></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td scope="row">2</td>-->
<!--                            <td>Post Two</td>-->
<!--                            <td>Tech Gadgets</td>-->
<!--                            <td>July 13, 2017</td>-->
<!--                            <td><a href="details.html" class="btn btn-secondary">-->
<!--                                    <i class="fa fa-angle-double-right"></i> Details-->
<!--                                </a></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td scope="row">3</td>-->
<!--                            <td>Post Three</td>-->
<!--                            <td>Web Development</td>-->
<!--                            <td>July 14, 2017</td>-->
<!--                            <td><a href="details.html" class="btn btn-secondary">-->
<!--                                    <i class="fa fa-angle-double-right"></i> Details-->
<!--                                </a></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td scope="row">4</td>-->
<!--                            <td>Post Four</td>-->
<!--                            <td>Business</td>-->
<!--                            <td>July 14, 2017</td>-->
<!--                            <td><a href="details.html" class="btn btn-secondary">-->
<!--                                    <i class="fa fa-angle-double-right"></i> Details-->
<!--                                </a></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td scope="row">5</td>-->
<!--                            <td>Post Five</td>-->
<!--                            <td>Web Development</td>-->
<!--                            <td>July 15 2017</td>-->
<!--                            <td><a href="details.html" class="btn btn-secondary">-->
<!--                                    <i class="fa fa-angle-double-right"></i> Details-->
<!--                                </a></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td scope="row">6</td>-->
<!--                            <td>Post Six</td>-->
<!--                            <td>Health & Wellness</td>-->
<!--                            <td>July 16, 2017</td>-->
<!--                            <td><a href="details.html" class="btn btn-secondary">-->
<!--                                    <i class="fa fa-angle-double-right"></i> Details-->
<!--                                </a></td>-->
<!--                        </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-primary text-white mb-3">
                    <div class="card-body">
                        <h3>Posts</h3>
                        <h1 class="display-4">
                            <i class="fa fa-pencil"></i> 6
                        </h1>
                        <a href="posts.html" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                </div>

                <div class="card text-center bg-success text-white mb-3">
                    <div class="card-body">
                        <h3>Categories</h3>
                        <h1 class="display-4">
                            <i class="fa fa-folder-open-o"></i> 4
                        </h1>
                        <a href="categories.html" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                </div>

                <div class="card text-center bg-warning text-white mb-3">
                    <div class="card-body">
                        <h3>Users</h3>
                        <h1 class="display-4">
                            <i class="fa fa-users"></i> 2
                        </h1>
                        <a href="users.html" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>