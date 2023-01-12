<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">User Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="users.php">Users</a>
                    </li>
                    <li style="cursor:pointer;">
                        <div class="dropdown">
                            <img class="dropdown-toggle rounded-circle" src="
                                <?php
                                if (!empty($_SESSION['user']['photo'])) {
                                    printf("upload/profile/%s", $_SESSION['user']['photo']);
                                } else {
                                    echo "upload/profile/empty-profile.webp";
                                }
                                ?>
                                " width="30" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="ms-2"
                                style="line-height: 40px;"><?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] ?></span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php
                    } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="login.php">Login</a>
                    </li>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </nav>