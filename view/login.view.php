<?php
//Header
include('layout/header.view.php');
?>

<section class="form">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <?php
                if (isset($alert)) {
                    printf("<div class='alert alert-danger'>%s</div>", $alert);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mt-2">
                                <label for="emailId" class="form-label">Email</label>
                                <input type="email" name="email" id="emailId" class="form-control" placeholder="Enter your email.." value="">
                                <?php
                                if (isset($error['emailError'])) {
                                    printf('<div class="text-info">%s</div>', $error['emailError']);
                                }
                                ?>
                            </div>
                            <div class="mt-2">
                                <label for="passId" class="form-label">Password</label>
                                <input type="password" name="password" id="passId" class="form-control" placeholder="Enter your password.." value="">
                                <?php
                                if (isset($error['passwordError'])) {
                                    printf('<div class="text-info">%s</div>', $error['passwordError']);
                                }
                                ?>
                            </div>
                            <div class="mt-2">
                                <input type="submit" name="login" class="btn btn-sm btn-primary" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
//Footer
include('layout/footer.view.php');
?>