<div class="d-flex flex-column align-items-center align-items-sm-start text-white min-vh-100 px-3 pt-3 pb-3" id="sb">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none">
        <span class="fs-5 d-none d-sm-inline">Menu</span>
    </a>
    <ul class="nav flex-column align-items-center align-items-sm-start mb-sm-auto mb-0" id="menu">
        <li class="nav-item">
            <a href="admin_profile.php" class="nav-link text-warning align-middle px-0">
                <i class="fas fa-home"></i>
                <span class="ms-1 d-none d-sm-inline">Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="foodtype.php" class="nav-link text-warning align-middle px-0">
                <i class="fas fa-store"></i>
                <span class="ms-1 d-none d-sm-inline">ประเภทร้านอาหาร</span>
            </a>
        </li>

        <li>
            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link text-warning align-middle px-0">
                <i class="fas fa-hamburger"></i>
                <span class="ms-1 d-none d-sm-inline">ร้านอาหาร</span>
            </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="mfood.php"  class="nav-link text-warning align-middle px-0"><span class="ms-1 d-none d-sm-inline">อนุญาตผู้ใช้งาน</span></a>
                </li>
                <li>
                    <a href="mfood_cancel.php"  class="nav-link text-warning align-middle px-0"><span class="ms-1 d-none d-sm-inline">ยกเลิกผู้ใช้งาน</span></a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link text-warning align-middle px-0">
                <i class="fas fa-user-secret"></i>
                <span class="ms-1 d-none d-sm-inline">ผู้ส่งอาหาร</span>
            </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="rider.php"  class="nav-link text-warning align-middle px-0"><span class="ms-1 d-none d-sm-inline">อนุญาตผู้ใช้งาน</span></a>
                </li>
                <li>
                    <a href="rider_cancel.php"  class="nav-link text-warning align-middle px-0"><span class="ms-1 d-none d-sm-inline">ยกเลิกผู้ใช้งาน</span></a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link text-warning align-middle px-0">
                <i class="fas fa-users"></i>
                <span class="ms-1 d-none d-sm-inline">สมาชิก</span>
            </a>
            <ul class="collapse show nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="member.php"  class="nav-link text-warning align-middle px-0"><span class="ms-1 d-none d-sm-inline">อนุญาตผู้ใช้งาน</span></a>
                </li>
                <li>
                    <a href="member_stop.php"  class="nav-link text-warning align-middle px-0"><span class="ms-1 d-none d-sm-inline">ระงับผู้ใช้งาน</span></a>
                </li>
                <li>
                    <a href="member_un_stop.php"  class="nav-link text-warning align-middle px-0"><span class="ms-1 d-none d-sm-inline">ยกเลิกระงับผู้ใช้งาน</span></a>
                </li>
            </ul>
        </li>
    </ul>

    <hr>
    <a href="../logout.php" class="d-flex align-items-center text-white text-decoration-none">
        <i class="fas fa-sign-out-alt"></i>
        <span class="fs-5 d-none d-sm-inline">Logout</span>
    </a>
</div>