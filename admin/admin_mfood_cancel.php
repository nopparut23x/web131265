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
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-warning" type="button">ค้นหา</button>
            </form>
        </div>
    </div>
</nav>

<br>
<h3>ข้อมูลประเภทร้านอาหาร</h3>
<hr>
<div class="shadow-lg p-4 mb-4 bg-white">
    <div class="row">
        <?php
        $where = array(
            "MFLevel" => 2
        );
        $list = $db->selectwhere('mfood', $where);
        foreach ($list as $key => $value) {
        ?>
            <div class="col-md-4 md-3 pt-3">
                <div class="card">
                    <img src="<?php echo $value['MFImage']; ?>" class="card-img-top" width="100px" height="150px">
                    <div class="card-body">
                        <div class="card-title">
                            <h4><?php echo $value['name'] . "  " . $value['surname'];  ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a onclick="return confirm('คุณต้องการจะยกเลิกใช่หรือไม่')" href="?type_id=<?= $value['MFid']; ?>" class="btn btn-danger">ยกเลิก</a>
                    </div>
                </div>
            </div>

        <?php
        }
        if (isset($_GET['type_id'])) {
            $where = array(
                "MFid" => $_GET['type_id'],
            );
            $delete = $db->delect('mfood', $where);
            if ($delete) {
                echo "<script>alert('ยกเลิกใช้งานเสร็จสิ้น')</script>";
                echo "<script>window.location='mfood_cancel.php'</script>";
            }
        }
        ?>
    </div>
</div>