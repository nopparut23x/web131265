<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $db->is_login($email, $password);
    $row = mysqli_fetch_assoc($login);
    if ($row) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['status'] = $row['status'];
        $status = $_SESSION['status'];
        switch ($status) {
            case "admin":
                $db->login($status);
            case "mfood":
                $db->login($status);
            case "rider":
                $db->login($status);
            case "member":
                $db->login($status);
        }
    } else {
        echo "<script>alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง')</script>";
        echo "<script>window.location='index.php'</script>";
    }
}

?>






<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a href="" class="navbar-brand">
            <h1 class="text-light d-inline"><strong>CTC</strong></h1>
            <h2 class="d-inline text-warning">food</h2>
        </a>
        <ui class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link"><button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#mymodal">Login</button></a>
                <div class="modal" id="mymodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="text-warning">เข้าสู่ระบบ</h1>
                                <button class="btn btn-close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <p>Email :</p>
                                    <input type="email" class="form-control" name="email" required>
                                    <p>Password :</p>
                                    <input type="password" class="form-control" name="password" required>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-warning" type="submit" name="login">
                                    เข้าสู่ระบบ
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ui>
    </div>
</nav>