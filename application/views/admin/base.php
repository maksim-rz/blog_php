<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogen Admin Area</title>
    <link rel="stylesheet" href="/assets/css/admin/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/admin/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/admin/style.css">
</head>
<body>
<?=$menu?>

<?=$header?>

<?if ($addBlock):?>
<!-- ACTIONS -->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
                    <i class="fa fa-plus"></i> Add Post
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
                    <i class="fa fa-plus"></i> Add Category
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
                    <i class="fa fa-plus"></i> Add User
                </a>
            </div>
        </div>
    </div>
</section>

<?endif;?>

<!-- POSTS -->
<section id="posts">
    <div class="container">

        <!--CONTENT-->

        <?=$baseContent?>

        <!-- END CONTENT-->
    </div>
</section>

<footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="conatiner">
        <div class="row">
            <div class="col">
                <p class="lead text-center">Copyright &copy; 2017 Blogen</p>
            </div>
        </div>
    </div>
</footer>


<script src="/assets/js/admin/jquery.min.js"></script>
<script src="/assets/js/admin/popper.min.js"></script>
<script src="/assets/js/admin/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll( 'article-content' );
</script>
</body>
</html>
