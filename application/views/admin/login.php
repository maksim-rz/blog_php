<!-- ACTIONS -->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>

<!-- LOGIN -->
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Account Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" class="<?=$isSubmitted ? 'was-validated' : 'needs-validation' ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="<?=$user->getEmail()?>">
                                <div class="invalid-feedback"><?=$emailError?></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                                <div class="invalid-feedback"><?=$passwordError?></div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>