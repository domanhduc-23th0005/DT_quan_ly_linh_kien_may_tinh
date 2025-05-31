<?php
require_once('../cauhinh/env.php');

// Lấy danh sách đơn hàng
$sql = "SELECT donhang.*, khachhang.HOKHACHHANG, khachhang.TENKHACHHANG 
FROM donhang 
JOIN khachhang ON donhang.MAKHACHHANG = khachhang.MAKHACHHANG";
$result = mysqli_query($conn, $sql);
?>

<div class="container">

    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh Sách Đơn Hàng</h3>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 11%">Mã đơn hàng</th>
                                    <th>TÊN KHÁCH HÀNG</th>
                                    <th style="width: 20%">Ngày bán hàng</th>
                                    <th style="width: 10%">TRẠNG THÁI</th>
                                    <th style="width: 7%">CHI TIẾT</th>
                                    <th style="width: 14%">DUYỆT</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>MÃ ĐƠN HÀNG</th>
                                    <th>TÊN KHÁCH HÀNG</th>
                                    <th>Ngày bán hàng</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>CHI TIẾT</th>
                                    <th>DUYỆT</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) != 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['MADONHANG'] ?></td>
                                            <td><?php echo $row['HOKHACHHANG'] . ' ' . $row['TENKHACHHANG']; ?></td>
                                            <td><?php echo $row['NGAYBANHANG'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['TRANGTHAI'] == 0) {
                                                    echo "Chưa xác nhận";
                                                } elseif ($row['TRANGTHAI'] == 1) {
                                                    echo "Đã xác nhận";
                                                } elseif ($row['TRANGTHAI'] == 2) {
                                                    echo "Đang giao hàng";
                                                } elseif ($row['TRANGTHAI'] == 4) {
                                                    echo "Đã hủy";
                                                } else {
                                                    echo "Hoàn thành";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="index.php?quanly=donhang&hienthi=chitiet&id=<?php echo $row['MADONHANG'] ?>" type="button" title="Chỉ tiết đơn hàng" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <td>
                                                    <div class="form-button-action">

                                                        <form method="POST" action="xuly/donhang/duyet-donhang.php" class="d-inline form-no-border">
                                                            <input type="hidden" name="MADONHANG" value="<?php echo $row['MADONHANG'] ?>">
                                                            <input type="hidden" name="TRANGTHAI" value="<?php echo $row['TRANGTHAI'] ?>">
                                                            <?php
                                                            if ($row['TRANGTHAI'] == 0) { ?>
                                                                <input type="hidden" name="TRANGTHAI" value='1' title="xác nhận">
                                                                <button style="border:none" type="submit" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này thành Đã xác nhận?');">Xác nhận</button>
                                                            <?php }
                                                            elseif ($row['TRANGTHAI'] == 1) { ?>
                                                                <input type="hidden" name="TRANGTHAI" value='2' title="giao hàng">
                                                                <button style="border:none" type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này thành Đang giao hàng?');">Giao hàng</button>
                                                            <?php }
                                                            elseif ($row['TRANGTHAI'] == 2) { ?>
                                                                <input type="hidden" name="TRANGTHAI" value='3' title="hoàn thành">
                                                                <button style="border:none" type="submit" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này thành Hoàn thành?');">Hoàn thành</button>
                                                            <?php } else { ?>


                                                            <?php } ?>
                                                        </form>

                                                        <form method="POST" action="xuly/donhang/duyet-donhang.php" class="d-inline form-no-border">
                                                            <input type="hidden" name="MADONHANG" value="<?php echo $row['MADONHANG'] ?>">
                                                            <input type="hidden" name="TRANGTHAI" value="<?php echo $row['TRANGTHAI'] ?>">
                                                            <?php
                                                            if ($row['TRANGTHAI'] == 4) { ?>
                                                                <input type="hidden" name="TRANGTHAI" value='0' title="khôi phục">
                                                                <button style="border:none" type="submit" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này thành Chưa xác nhận?');">Khôi phục</button>
                                                            <?php }
                                                            else { ?>
                                                                <input type="hidden" name="TRANGTHAI" value='4' title="hủy bỏ">
                                                                <button style="border:none" type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này thành Đã hủy?');">Hủy bỏ</button>
                                                            <?php } ?>
                                                        </form>

                                                    </div>
                                                </td>

                                            </tr>
                                        <?php }
                                    } else {
                                        echo "<tr><td colspan='3'>Không có đơn hàng nào</td></tr>";
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <?php
    // Đóng kết nối
    $conn->close();
    ?>
</div>

<!--   Core JS Files   -->
<script src="assets/js/core/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function() {
        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function() {
            $("#add-row")
            .dataTable()
            .fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action,
            ]);
            $("#addRowModal").modal("hide");
        });
    });
</script>