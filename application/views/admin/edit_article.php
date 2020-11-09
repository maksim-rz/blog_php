<!-- ACTIONS -->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mr-auto">
                <a href="/admin" class="btn btn-light btn-block">
                    <i class="fa fa-arrow-left"></i> Back To Dashboard
                </a>
            </div>
            <div class="col-md-3">
                <button href="#" class="btn btn-success btn-block" form="edit-article">
                    <i class="fa fa-check"></i> Save Changes
                </button>
            </div>
            <div class="col-md-3">
                <a href="/admin/artdelete/id/<?=$article->getId()?>" class="btn btn-danger btn-block">
                    <i class="fa fa-remove"></i> Delete Post
                </a>
            </div>
        </div>
    </div>
</section>

<!-- POSTS -->
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Post</h4>
                    </div>
                    <div class="card-body">
                        <form  method="post", enctype="multipart/form-data" action="" id="edit-article">
                            <input type="hidden" name="id" value="<?=$article->getId()?>">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="<?=$article->getTitle()?>" name="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Category</label>
                                <select class="form-control" name="category">
                                    <option value="0">No category</option>
                                    <?foreach($categories as $category):?>
                                        <?$selected = $category->getId() == $article->getCategory() ? 'selected' : '';?>
                                        <option value="<?=$category->getId()?>" <?=$selected?>>
                                            <?=$category->getTitle()?>
                                        </option>
                                    <?endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <?if ($article->getImage()):?>
                                    <div>
                                        <label>Image</label>
                                        <a href="<?=$article->getImagePath()?>"><?=$article->getImage()?></a>
                                    </div>
                                <?endif;?>
                                <label for="file">Image Upload</label>
                                <input type="file" class="form-control-file" name="file">
                                <small class="form-text text-muted">Max Size 3mb</small>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="content" class="form-control article-content"><?=$article->getContent()?></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>