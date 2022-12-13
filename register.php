<?php

if (isset($_POST['btnsave'])) {

    $where = array('Member_Email' => $_POST['email']);
    $userdata = $db->selectwhere('member', $where);
    if (count($userdata) == 0) {
        $status = $_POST['status'];

        if ($status == "member") {
            $table = 'member';
            $where = array(
                "Member_Name" => $_POST['firstname'],
                "Member_Surname" => $_POST['lastname'],
                "Member_Email" => $_POST['email'],
                "Member_Password" => $_POST['password'],
                "Member_address" => $_POST['address'],
                "Member_Tell" => $_POST['tell'],
                "member_level" => 1,
                "Member_Status" => 'member'
                
            );

          
        }
        if ($status == "rider") {
            $table = 'rider';
            $where = array(
                "rider_name" => $_POST['firstname'],
                "rider_surname" => $_POST['lastname'],
                "rider_email" => $_POST['email'],
                "rider_password" => $_POST['password'],
                "rider_address" => $_POST['address'],
                "rider_tell" => $_POST['tell'],
                "rider_level" => 1,
                "rider_Status" => 'rider'
            );

          
        }
        if ($status == "mfood") {
            $table = 'mfood';
            $where = array(
                "name" => $_POST['firstname'],
                "surname" => $_POST['lastname'],
                "MFEmail" => $_POST['email'],
                "MFPassword" => $_POST['password'],
                "MFaddress" => $_POST['address'],
                "MFTell" => $_POST['tell'],
                "MFLevel" => 1,
                "MFStatus" => 'mfood'
            );

          
        }

        $list =$db->save($table, $where);
        if($list){
            echo "<script>alert('ลงทะเบียนเสร็จสิ้น')</script>";
            echo "<script>window.location='index.php'</script>";

        }
    }
    else{
        echo "<script>alert('อีเมลถูกใช้งานเเล้ว')</script>";
        echo "<script>window.location='index.php'</script>";
    }
}







?>
<div class="container d-flex justify-content-center">
    <div class="card border-0 shadow-lg my-5 w-75">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/register.jpg" width="100%">
                </div>
                <div class="col-lg-6">
                    <form method="post">
                        <div class="row">
                            <h1 class="text-center">ลงทะเบียน</h1>
                            <div class="col-md-6 mt-5">
                                <p>ชื่อ</p>
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
                            <div class="col-md-6  mt-5">
                                <p>นามสกุล</p>
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p>อีเมล</p>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p>รหัสผ่าน</p>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p>ที่อยู่</p>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <p>เบอร์โทรศัพท์</p>
                                <input type="text" class="form-control" name="tell" required>
                            </div>
                            <br>
                            <div class="col-md-12 mt-5">
                                <select name="status" class="form-select">
                                    <option value="mfood">ผู้ดูเเลร้านอาหาร</option>
                                    <option value="rider">ผู้ส่งอาหาร</option>
                                    <option value="member">สมาชิก</option>
                                </select>

                            </div>

                            <div class="col-md-12 my-4 d-flex justify-content-center">
                                <button class="btn btn-outline-warning" type="submit" name="btnsave">
                                    ลงทะเบียน
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>