<?php
//Header
include('layout/header.view.php');
?>

<section class="user_info mt-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card user_info_table">
                    <div class="card-header">
                        <h4><?= $data['fname'] . ' ' . $data['lname'] ?> Information</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Profile Photo</td>
                                <td>:</td>
                                <td>
                                    <img src="upload/profile/<?= $data['photo'] ?>" width="50" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>:</td>
                                <td><?= $data['fname'] ?></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>:</td>
                                <td><?= $data['lname'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $data['email'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="users.php" class="btn btn-sm btn-primary">Back</a>
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