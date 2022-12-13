<?php
require_once '../connection/database.php';
$db = new Database();
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav me-sm-auto">
                <li class="nav-item">
                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">เพิ่มประเภทอาหาร</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-warning" type="button">ค้นหา</button>
            </form>
        </div>
    </div>
</nav>

<!-- Modal Add -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-warning p-3">
                <h4>เพิ่มประเภทอาหาร</h4>
                <button class="btn btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">ชื่อประเภทอาหาร</label>
                        <select class="form-select">
                            <option value="foodCat" selected>อาหารไทย</option>
                            <option value="foodCat">อาหารเกาหลี</option>
                            <option value="foodCat">อาหารญี่ปุ่น</option>
                            <option value="foodCat">ของหวาน</option>
                            <option value="foodCat">เมนูเส้น</option>
                            <option value="foodCat">เครื่องดื่ม</option>
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="picture" class="form-label">รูปภาพประเภทร้านอาหาร</label>
                        <input class="form-control" type="file" name="picture">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-dark" type="submit" name="btnAdd">เพิ่ม</button>
                </div>
            </form>
        </div>
    </div>
</div>

<br>
<h3>ข้อมูลประเภทร้านอาหาร</h3>
<hr>
<div class="shadow-lg p-4 mb-4 bg-white">
    <div class="row">
        <?php
        $list = $db->view('category_food');
        foreach ($list as $key => $value) {
        ?>

            <div class="col-md-4 md-3 pt-3">
                <div class="card">
                    <img src="<?php echo $value['picture']; ?>" class="card-img-top" width="100px" height="150px">
                    <div class="card-body">
                        <div class="card-title">
                            <h4><?php echo $value['name']; ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $value['cf_id']; ?>">แก้ไข</a>


                        <div class="modal fade" id="modalEdit<?php echo $value['cf_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header bg-warning p-3">
                                        <h4>แก้ไขประเภทร้านอาหาร</h4>
                                        <button class="btn btn-close" type="button" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3 mt-3">
                                                <label for="name" class="form-label">ชื่อประเภทร้านอาหาร</label>
                                                <select class="form-select">
                                                    <option value="foodCat" selected>อาหารไทย</option>
                                                    <option value="foodCat">อาหารเกาหลี</option>
                                                    <option value="foodCat">อาหารญี่ปุ่น</option>
                                                    <option value="foodCat">ของหวาน</option>
                                                    <option value="foodCat">เมนูเส้น</option>
                                                    <option value="foodCat">เครื่องดื่ม</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="picture" class="form-label">รูปภาพประเภทร้านอาหาร</label>
                                                <input class="form-control" type="file" name="picture" value="<?php echo $value['picture']; ?>" require>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-dark" type="submit" name="btnEdit">แก้ไข</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a onclick="return confirm('คุณต้องการจะลบใช่หรือไม่')" href="?type_id=<?= $value['cf_id']; ?>" class="btn btn-danger">ลบ</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>