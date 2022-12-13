<?php
require_once '../connection/database.php';
$db = new Database();

if (isset($_GET['type_id'])) {
    $where = array(
        "cr_id" => $_GET['type_id'],
    );
    $delete = $db->delect('category_ret', $where);
    if ($delete) {
        echo "<script>alert('ลบอาหารสำเร็จ')</script>";
        echo "<script>window.location='foodtype.php'</script>";
    }
}

?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav me-sm-auto">
                <li class="nav-item">
                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">เพิ่มประเภทร้านอาหาร</a>
                </li>
            </ul>
            <form class="d-flex" method="post">
                <input class="form-control me-2" type="text" name="search" placeholder="Search">
                <button class="btn btn-warning" name="">ค้นหา</button>
            </form>
        </div>
    </div>
</nav>

<!-- Modal Add -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-warning p-3">
                <h4>เพิ่มประเภทร้านอาหาร</h4>
                <button class="btn btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">ชื่อประเภทร้านอาหาร</label>
                        <select class="form-select" name="ret">
                            <?php
                            $search = $_POST['search'] ?? null;
                            $where = array(
                                "name" =>  $search
                            );
                            $list = $db->search("category_ret", $where);
                            foreach ($list as $value) {



                            ?>
                                <option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                            <?php
                            }
                            ?>
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

                <?php
                if (isset($_POST['btnAdd'])) {
                    $table = 'category_ret';
                    if (!empty($_FILES['picture']['name'])) {
                        $file = $db->upload($_FILES['picture'], '/assets/img/profile');
                    }
                    $fields = array(
                        'name' => $_POST['ret'],
                        "picture" => $file
                    );
                    $query = $db->save($table, $fields);
                    if ($query) {
                        echo "<script>alert('เพิ่มประเภทร้านอาหาร')</script>";
                        echo "<script>window.location='foodtype.php'</script>";
                    }
                }

                ?>


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
        $search = $_POST['search'] ?? null;
        $where = array(
            "name" =>  $search
        );
        $list = $db->search("category_ret", $where);
        foreach ($list as $value) {
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
                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $value['cr_id']; ?>">แก้ไข</a>


                        <div class="modal fade" id="modalEdit<?php echo $value['cr_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header bg-warning p-3">
                                        <h4>แก้ไขประเภทร้านอาหาร</h4>
                                        <button class="btn btn-close" type="button" data-bs-dismiss="modal"></button>
                                    </div>

                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3 mt-3">
                                                <input type="hidden" name="id" value="<?php echo $value['cr_id']; ?>">
                                                <label for="name" class="form-label">ชื่อประเภทร้านอาหาร</label>
                                                <select class="form-select" name="ret">
                                                    <?php
                                                    $re = $db->view('category_ret');
                                                    foreach ($re as $value) {
                                                    ?>
                                                        <option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
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

                                        <?php
                                        if (isset($_POST['btnEdit'])) {
                                            $table = 'category_ret';
                                            $where = array(
                                                "cr_id" => $_POST['id']
                                            );
                                            $fields = array(
                                                'name' => $_POST['ret']
                                            );
                                            $edit = $db->update($table, $fields, $where);
                                            if ($edit) {
                                                echo "<script>window.location='foodtype.php'</script>";
                                            }
                                        }
                                        ?>



                                    </form>
                                </div>
                            </div>
                        </div>

                        <a onclick="return confirm('คุณต้องการจะลบใช่หรือไม่')" href="?type_id=<?= $value['cr_id']; ?>" class="btn btn-danger">ลบ</a>
                    </div>
                </div>
            </div>

        <?php
        }
        if (isset($_POST['btnEdit'])) {
            if (!empty($_FILES['picture']['name'])) {
                $file = $db->upload($_FILES['picture'], '/assets/img/profile');
                $re = $db->update($table, ["picture" => $file], $where);
            }
        }
        ?>
    </div>
</div>