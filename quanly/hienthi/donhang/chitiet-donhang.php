<?php
require_once('../cauhinh/env.php');

// Lấy mã đơn hàng từ URL
$madonhang = $_GET['id'];
// Lấy thông tin đơn hàng
$sql = "SELECT ctdonhang.*, mathang.TENHANG 
        FROM ctdonhang 
        JOIN mathang ON ctdonhang.MAHANG = mathang.MAHANG 
        WHERE ctdonhang.MADONHANG = '$madonhang'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Chi tiết đơn hàng</h3>
            
            <button class="btn btn-primary btn-round ms-auto" onclick="window.history.back();"><i class="fa fa-arrow-left"></i> Quay lại</button>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th style="width: 10%">ĐƠN GIÁ</th>
                                        <th style="width: 10%">SỐ LƯỢNG</th>
                                        <th style="width: 10%">GIẢM</th>
                                        <th >THÀNH TIỀN</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th>ĐƠN GIÁ</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>GIẢM</th>
                                        <th>THÀNH TIỀN</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $tongtien = 0;
                                    if (mysqli_num_rows($result) != 0) {
                                        // Đặt lại con trỏ kết quả về đầu nếu đã fetch_assoc trước đó
                                        mysqli_data_seek($result, 0);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $thanhtien = $row['GIABAN'] * $row['SOLUONG'] - ($row['GIABAN'] * $row['SOLUONG'] * $row['MUCGIAMGIA'] / 100);
                                            $tongtien += $thanhtien;
                                            ?>
                                            <tr>
                                                <td><a href="../banhang/sanpham.php?masanpham=<?php echo $row['MAHANG'] ?>"><?php echo $row['TENHANG'] ?></a></td>
                                                <td><?php echo number_format($row['GIABAN'], 0, ',', '.') . ' VNĐ' ?></td>
                                                <td><?php echo $row['SOLUONG'] ?></td>
                                                <td><?php echo $row['MUCGIAMGIA'] . '%' ?></td>
                                                <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>Không có sản phẩm nào trong đơn hàng này.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <h4>Tổng tiền đơn hàng:<p4 style="color:green;"> <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ' ?></p4></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
} else {
    echo "Không tìm thấy đơn hàng.";
};
?>

<?php
// Đóng kết nối
mysqli_close($conn);
?>
