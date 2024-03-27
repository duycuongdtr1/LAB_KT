<?php
require_once("entities/NhanVien.class.php");

// Số nhân viên trên mỗi trang
$so_nv_moi_trang = 5;

// Xác định trang hiện tại
$trang_hien_tai = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính vị trí bắt đầu của dữ liệu trên mỗi trang
$bat_dau = ($trang_hien_tai - 1) * $so_nv_moi_trang;

// Lấy danh sách nhân viên từ CSDL cho từng trang
$ds_nv = NhanVien::danh_sach_nhan_vien_phan_trang($bat_dau, $so_nv_moi_trang);

// Hiển thị danh sách nhân viên
if (!empty($ds_nv)) {
    echo "<h2>Danh sách nhân viên</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Mã NV</th><th>Tên NV</th><th>Giới tính</th><th>Nơi sinh</th><th>Mã phòng</th><th>Lương</th></tr>";
    foreach ($ds_nv as $nv) {
        echo "<tr>";
        echo "<td>" . $nv["Ma_NV"] . "</td>";
        echo "<td>" . $nv["Ten_NV"] . "</td>";
        echo "<td>";
        if ($nv["Phai"] == "NU") {
            echo "<img src='woman.jpg' alt='Nữ' width='20px' height='20px'>";
        } else {
            echo "<img src='man.jpg' alt='Nam' width='20px' height='20px'>";
        }
        echo "</td>";
        echo "<td>" . $nv["Noi_Sinh"] . "</td>";
        echo "<td>" . $nv["Ma_Phong"] . "</td>";
        echo "<td>" . $nv["Luong"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Tính tổng số nhân viên
    $tong_so_nv = NhanVien::dem_so_nhan_vien();

    // Tính tổng số trang
    $tong_so_trang = ceil($tong_so_nv / $so_nv_moi_trang);

    // Hiển thị phân trang
    echo "<div>";
    for ($i = 1; $i <= $tong_so_trang; $i++) {
        echo "<a href='List_NhanVien.php?page=$i'>$i</a> ";
    }
    echo "</div>";
} else {
    echo "Không có nhân viên nào.";
}
?>
