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
                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">เพิ่มอาหาร</a>
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
                <h4>เพิ่มอาหาร</h4>
                <button class="btn btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">ชื่ออาหาร</label>
                        <input class="form-control" type="text" name="name" placeholder="ชื่อ" require>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="price" class="form-label">ราคา</label>
                        <input class="form-control" type="text" name="name" placeholder="ราคา" require>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="promotion%" class="form-label">ลด%</label>
                        <input class="form-control" type="text" name="promotion%" placeholder="%">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="priceAfterSale" class="form-label">ราคาหลังลด</label>
                        <input class="form-control" type="text" name="priceAfterSale" placeholder="ราคา">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="picture" class="form-label">รูปภาพประเภทร้านอาหาร</label>
                        <input class="form-control" type="file" name="picture" require>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="category" class="form-label">หมวดหมู่อาหาร</label>
                        <select class="form-select" name="cf_id">
                            <?php
                            $list = $db->view('category_food');
                            foreach ($list as $key => $value) {
                            ?>
                                <option value="<?php echo $value['cf_id']; ?>"><?php echo $value['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
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
        $list = $db->view('food');
        foreach ($list as $key => $value) {
        ?>

            <div class="col-md-4 md-3 pt-3">
                <div class="card">
                    <img src="<?php echo $value['food_picture']; ?>" class="card-img-top" width="100px" height="250px">
                    <div class="card-body">
                        <div class="card-title">
                            <div><?php echo "ชื่อ:  " . $value['food_name']; ?></div>
                            <div><?php echo "คำอธิบาย:  " . $value['food_description']; ?></div>
                            <div><?php echo "ราคา:  " . $value['Price_Normal'] . " บาท"; ?></div>
                            <div><?php echo "ลด:  " . $value['Promotion']; ?></div>
                            <div><?php echo "ราคาหลังลด:  " . $value['Price_pro'] . " บาท"; ?></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $value['food_id']; ?>">แก้ไข</a>


                        <div class="modal fade" id="modalEdit<?php echo $value['food_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header bg-warning p-3">
                                        <h4>แก้ไขประเภทร้านอาหาร</h4>
                                        <button class="btn btn-close" type="button" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3 mt-3">
                                                <label for="name" class="form-label">ชื่ออาหาร</label>
                                                <input class="form-control" type="text" name="name" placeholder="ชื่อ" value="<?php echo $value['food_name']; ?>" require>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="price" class="form-label">ราคา</label>
                                                <input class="form-control" type="text" name="name" placeholder="ราคา" value="<?php echo $value['Price_Normal']; ?>" require>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="promotion%" class="form-label">ลด%</label>
                                                <input class="form-control" type="text" name="promotion%" placeholder="%" value="<?php echo $value['Promotion']; ?>">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="priceAfterSale" class="form-label">ราคาหลังลด</label>
                                                <input class="form-control" type="text" name="priceAfterSale" placeholder="ราคา" value="<?php echo $value['Price_pro']; ?>">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="picture" class="form-label">รูปภาพประเภทร้านอาหาร</label>
                                                <input class="form-control" type="file" name="picture" require>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="category" class="form-label">หมวดหมู่อาหาร</label>
                                                <select class="form-select" name="cf_id">
                                                    <?php
                                                    $list2 = $db->view('category_food');
                                                    foreach ($list2 as $key => $value2) {
                                                    ?>
                                                        <option value="<?php echo $value2['cf_id']; ?>"><?php echo $value2['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-dark" type="submit" name="btnEdit">แก้ไข</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a onclick="return confirm('คุณต้องการจะลบใช่หรือไม่')" href="?type_id=<?= $value['food_id']; ?>" class="btn btn-danger">ลบ</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>