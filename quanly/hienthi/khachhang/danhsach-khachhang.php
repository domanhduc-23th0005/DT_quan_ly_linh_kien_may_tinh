

<?php

require('../cauhinh/env.php');

// Lấy danh sách khách hàng
$sql = "SELECT * FROM `khachhang`";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Danh Sách Khách Hàng</h3>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" style="display: none;">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Thêm khách hàng</h4>
              <a href="index.php?quanly=khachhang&hienthi=them" class="btn btn-primary btn-round ms-auto">
                <i class="fa fa-plus"></i> Thêm Khách Hàng
              </a>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table id="add-row" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>MÃ KHÁCH HÀNG</th>
                    <th>HỌ KHÁCH HÀNG</th>
                    <th>TÊN KHÁCH HÀNG</th>
                    <th>EMAIL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>ĐIỆN THOẠI</th>
                    <th style="display: none;">MẬT KHẨU</th>
                    <th style="width: 10%">CHỨC NĂNG</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>MÃ KHÁCH HÀNG</th>
                    <th>HỌ KHÁCH HÀNG</th>
                    <th>TÊN KHÁCH HÀNG</th>
                    <th>EMAIL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>ĐIỆN THOẠI</th>
                    <th style="display: none;">MẬT KHẨU</th>
                    <th>CHỨC NĂNG</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php 
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td><?php echo $row['MAKHACHHANG']; ?></td>
                        <td><?php echo $row['HOKHACHHANG']; ?></td>
                        <td><?php echo $row['TENKHACHHANG']; ?></td>
                        <td><?php echo $row['EMAIL']; ?></td>
                        <td><?php echo $row['DIACHI']; ?></td>
                        <td><?php echo $row['DIENTHOAI']; ?></td>
                        <td style="display: none;"><?php echo $row['MATKHAU']; ?></td>
                        <td>
                          <div class="form-button-action">
                            <a href="index.php?quanly=khachhang&hienthi=sua&id=<?php echo $row['MAKHACHHANG']; ?>" title="Sửa" class="btn btn-link btn-primary btn-lg">
                              <i class="fa fa-edit"></i>
                            </a>
                            <a href="index.php?quanly=khachhang&hienthi=xoa&id=<?php echo $row['MAKHACHHANG']; ?>" title="Xoá" class="btn btn-link btn-danger">
                              <i class="fa fa-times"></i>
                            </a>
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

  <?php
  // Đóng kết nối
  $conn->close();
  ?>
</div>

<!-- Core JS Files -->
<script src="assets/js/core/jquery-3.7.1.min.js"></script>

<script>
  $(document).ready(function () {
    $("#add-row").DataTable({
      pageLength: 5,
    });
  });
</script>
