<?php
//Header
include('layout/header.view.php');
?>

<section class="form">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <?php
                if (isset($success)) {
                    printf('<div class="alert alert-success">%s</div>', $success);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Update Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="fnameId" class="form-label">First Name</label>
                                <input type="text" name="fname" id="fnameId" class="form-control"
                                    value="<?= $data['fname'] ?>">
                                <?php
                                if (isset($error['fnameError'])) {
                                    printf('<div class="text-info">%s</div>', $error['fnameError']);
                                }
                                ?>
                            </div>
                            <div class="mt-2">
                                <label for="lnameId" class="form-label">Last Name</label>
                                <input type="text" name="lname" id="lnameId" class="form-control"
                                    value="<?= $data['lname'] ?>">
                                <?php
                                if (isset($error['lnameError'])) {
                                    printf('<div class="text-info">%s</div>', $error['lnameError']);
                                }
                                ?>
                            </div>
                            <div class="mt-2">
                                <label for="emailId" class="form-label">Email</label>
                                <input type="email" name="email" id="emailId" class="form-control"
                                    value="<?= $data['email'] ?>">
                                <?php
                                if (isset($error['emailError'])) {
                                    printf('<div class="text-info">%s</div>', $error['emailError']);
                                }
                                ?>
                            </div>
                            <div class="mt-2">
                                <input type="file" name="image" id="imageId" class="form-control">
                                <div class="mt-2 mb-2">
                                    <img src="upload/profile/<?= $data['photo'] ?>" width="50" alt="">
                                </div>

                                <?php
                                if (isset($error['imageError'])) {
                                    printf('<div class="text-info">%s</div>', $error['imageError']);
                                }
                                ?>
                            </div>
                            <div class="mt-2">
                                <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Update">
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