<header id="main-header" class="py-2 <?=$colorClass?> text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>
                    <?if($iconClass):?>
                        <i class="fa <?=$iconClass?>"></i>
                    <?endif;?>
                    <?=$caption?>
                </h1>
            </div>
        </div>
    </div>
</header>
<?if ($addBlock):?>
<!-- POST MODAL -->
<div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add Post</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="/admin/artcreate" id="create-article">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category">
                            <option value="0">No category</option>
                            <?foreach($categories as $category):?>
                                <option value="<?=$category->getId()?>">
                                    <?=$category->getTitle()?>
                                </option>
                            <?endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Image Upload</label>
                        <input type="file" class="form-control-file" name="file">
                        <small class="form-text text-muted">Max Size 3mb</small>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="content" class="form-control article-content"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" form="create-article">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<!-- CATEGORY MODAL -->
<div class="modal fade" id="addCategoryModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Add Category</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-success" data-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- USER MODAL -->
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Add User</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-warning" data-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<?endif;?>