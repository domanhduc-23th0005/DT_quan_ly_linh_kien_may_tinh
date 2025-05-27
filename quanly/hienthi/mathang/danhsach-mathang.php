<?php
require('../cauhinh/env.php');

// Lấy danh sách mặt hàng
$sql = "SELECT 
mh.MAHANG, mh.TENHANG, mh.DONVITINH, mh.GIABAN, mh.ANHMINHHOA,
lh.TENLOAIHANG, th.TENTHUONGHIEU
FROM mathang mh
LEFT JOIN loaihang lh ON mh.MALOAIHANG = lh.MALOAIHANG
LEFT JOIN thuonghieu th ON mh.MATHUONGHIEU = th.MATHUONGHIEU";
$result = mysqli_query($conn, $sql);
?>
<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Danh Sách Mặt Hàng</h3>
    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Thêm mặt hàng</h4>
              <a href="index.php?quanly=mathang&hienthi=them" class="btn btn-primary btn-round ms-auto"><i class="fa fa-plus"></i> Thêm mặt hàng</a>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table id="add-row" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>MÃ HÀNG</th>
                    <th>TÊN HÀNG</th>
                    <th>LOẠI HÀNG</th>
                    <th>THƯƠNG HIỆU</th>
                    <th>ĐƠN VỊ TÍNH</th>
                    <th>GIÁ BÁN</th>
                    <th>ẢNH MINH HOẠ</th>
                    <th style="width: 10%">CHỨC NĂNG</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>MÃ HÀNG</th>
                    <th>TÊN HÀNG</th>
                    <th>LOẠI HÀNG</th>
                    <th>THƯƠNG HIỆU</th>
                    <th>ĐƠN VỊ TÍNH</th>
                    <th>GIÁ BÁN</th>
                    <th>ẢNH MINH HOẠ</th>
                    <th>CHỨC NĂNG</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  if (mysqli_num_rows($result) != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td><?php echo $row['MAHANG'] ?></td>
                        <td><?php echo $row['TENHANG'] ?></td>
                        <td><?php echo $row['TENLOAIHANG'] ?></td>
                        <td><?php echo $row['TENTHUONGHIEU'] ?></td>
                        <td><?php echo $row['DONVITINH'] ?></td>
                        <td><?php echo number_format($row['GIABAN'], 0, ',', '.') ?></td>
                        <td>
                          <?php 
                          if (!empty($row['ANHMINHHOA'])) {
                            ?>
                            <img src="../hinhanh/<?php echo $row["ANHMINHHOA"] ?>" class="product-img" alt="Hình ảnh" width="150">
                            <?php
                          } else {
                            ?>
                            <span class="text-muted">Không có ảnh</span>
                            <?php
                          }
                          ?>
                        </td>
                        <td>
                          <div class="form-button-action">
                            <!-- <a href="index.php?quanly=mathang&hienthi=xem&id=<?php echo $row['MAHANG'] ?>" type="button" title="Xem" class="btn btn-link btn-primary btn-lg"><i class="fa fa-share-square"></i></a> -->
                            <a href="index.php?quanly=mathang&hienthi=sua&id=<?php echo $row['MAHANG'] ?>" type="button" title="Sửa" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                            <a href="index.php?quanly=mathang&hienthi=xoa&id=<?php echo $row['MAHANG'] ?>"  type="button" title="Xoá" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
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

<!--   Core JS Files   -->
<script src="assets/js/core/jquery-3.7.1.min.js"></script>

<script>
  $(document).ready(function () {
    // Add Row
    $("#add-row").DataTable({
      pageLength: 5,
    });

    var action =
    '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $("#addRowButton").click(function () {
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