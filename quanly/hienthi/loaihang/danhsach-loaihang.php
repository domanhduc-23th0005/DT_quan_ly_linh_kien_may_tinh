<?php
require('../cauhinh/env.php');

// Lấy danh sách mặt hàng
$sql = "SELECT * FROM `loaihang`";
$result = mysqli_query($conn, $sql);
?>
<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Danh Sách Loại hàng</h3>
    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Thêm Loại hàng</h4>
              <a href="index.php?quanly=loaihang&hienthi=them" class="btn btn-primary btn-round ms-auto"><i class="fa fa-plus"></i> Thêm Loại Hàng</a>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table id="add-row" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>MÃ LOAIHANG</th>
                    <th>TÊN LOAIHANG</th>
                    <th style="width: 10%">CHỨC NĂNG</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>MÃ LOAIHANG</th>
                    <th>TÊN LOAIHANG</th>
                    <th>CHỨC NĂNG</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                  if (mysqli_num_rows($result) != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                  <tr>
                    <td><?php echo $row['MALOAIHANG'] ?></td>
                    <td><?php echo $row['TENLOAIHANG'] ?></td>
                    <td>
                      <div class="form-button-action">
                      <a href="index.php?quanly=loaihang&hienthi=sua&id=<?php echo $row['MALOAIHANG'] ?>" type="button" title="Sửa" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                      <a href="index.php?quanly=loaihang&hienthi=xoa&id=<?php echo $row['MALOAIHANG'] ?>"  type="button" title="Xoá" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                      </div>
                    </td>

                  </tr>
                  <?php }}?>
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