<?php

require_once("config/db.class.php");

class NhanVien {
    public $Ma_NV;
    public $Ten_NV;
    public $Phai;
    public $Noi_Sinh;
    public $Ma_Phong;
    public $Luong;

    public function __construct($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong) {
        $this->Ma_NV = $ma_nv;
        $this->Ten_NV = $ten_nv;
        $this->Phai = $phai;
        $this->Noi_Sinh = $noi_sinh;
        $this->Ma_Phong = $ma_phong;
        $this->Luong = $luong;
    }

    public function save() {
        $db = new Db();
        $sql = "INSERT INTO Nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) 
        VALUES ('$this->Ma_NV', '$this->Ten_NV', '$this->Phai', '$this->Noi_Sinh', '$this->Ma_Phong', '$this->Luong')";
        $result = $db->query_execute($sql);
        return $result;
    }
    
    public static function List_NhanVien() {
        $db = new Db();
        $sql = "SELECT * FROM nhanvien";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function DELETE($ma_nv) {
        $db = new Db();
        $sql = "DELETE FROM Nhanvien WHERE Ma_NV = '$ma_nv'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function danh_sach_nhan_vien_phan_trang($bat_dau, $so_nv_moi_trang) {
        $db = new Db();
        $sql = "SELECT * FROM nhanvien LIMIT $bat_dau, $so_nv_moi_trang";
        return $db->select_to_array($sql);
    }

    public static function dem_so_nhan_vien() {
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total FROM nhanvien";
        $result = $db->select_to_array($sql);
        return $result[0]['total'];
    }
}

?>
