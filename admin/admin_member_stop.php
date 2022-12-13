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
            <form class="d-flex justify-content-end">
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
            "member_level" => 2
        );
        $list = $db->selectwhere('member', $where);
        foreach ($list as $key => $value) {
        ?>

        <div class="col-md-4 md-3 pt-3">
            <div class="card">
                <img src="<?php echo $value['Member_Image']; ?>" class="card-img-top" width="100px" height="150px">
                <div class="card-body">
                    <div class="card-title">
                        <h4><?php echo $value['Member_Name'] ."  ". $value['Member_Surname'];  ?></h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a onclick="return confirm('คุณต้องการจะระงับข้อมูลใช่หรือไม่')" href="?id=<?= $value['Member_id']; ?>" class="btn btn-danger">ระงับ</a>
                </div>
            </div>
        </div>

        <?php
        }
        if (isset($_GET['id'])) {

            $table = "member";
            $_GET['id'];
            $where = array(
                "Member_id" => $_GET['id']
            );
            $fields = array(
                'member_level' => 0
            );
            $update = $db->update($table, $fields, $where);
            if ($update) {
                echo "<script>window.location='member_stop.php'</script>";
            }
        }

        ?>
    </div>
</div>