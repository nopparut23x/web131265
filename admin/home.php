<?php require_once 'header.php';
if (isset($_POST['btnedit'])) {
    $where = array(
        "AdminId" => $_POST['id']
    );
}
?>

<div class="container-fluid">
    <div class="row flex flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <?php require_once 'slidebar.php'; ?>
        </div>
        <div class="col py-3">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">

                        <?php

                        $table = 'admin';
                        $fields = array(

                            'Admin_username' => $_SESSION['email']

                        );
                        $userdata = $db->selectwhere($table, $fields);
                        foreach ($userdata as $value) {
                            if (!empty($_FILES['picture']['name'])) {
                                $file = $db->upload($_FILES['picture'], '/assets/img/profile');
                                $re = $db->update($table, ["admin_image" => $file], $where);
                                if($re){
                                    echo "<script>window.location='home.php'</script>";
                                }
                            }


                        ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <center>
                                        <img src="<?php echo $value['admin_image'] ?>" class="my-5 rounded-circle w-25">
                                        <input type="file" class="form-control" accept="image/*" name="picture">
                                    </center>

                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <h1 class="text-center">ข้อมูลส่วนตัว</h1>
                                        <div class="col-md-6 mt-5">
                                            <input type="hidden" name="id" value="<?php echo $value['AdminId'] ?>">
                                            <p>ชื่อ</p>
                                            <input type="text" class="form-control" name="firstname" required value="<?php echo $value['Admin_name'] ?>">
                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <p>นามสกุล</p>
                                            <input type="text" class="form-control" name="lastname" required value="<?php echo $value['Admin_surname'] ?>">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <p>อีเมล</p>
                                            <input type="email" class="form-control" name="email" required value="<?php echo $value['Admin_username'] ?>">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <p>รหัสผ่าน</p>
                                            <input type="password" class="form-control" name="password" required value="<?php echo $value['Admin_password'] ?>">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <p>ที่อยู่</p>
                                            <input type="text" class="form-control" name="address" required value="<?php echo $value['admin_address'] ?>">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <p>เบอร์โทรศัพท์</p>
                                            <input type="text" class="form-control" name="tell" required value="<?php echo $value['admin_tell'] ?>">
                                        </div>
                                        <br>


                                        <div class="col-md-12 my-4 d-flex justify-content-center">
                                            <button class="btn btn-outline-warning" type="submit" name="btnedit">
                                                เเก้ไขข้อมูลส่วนตัว
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        <?php }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>