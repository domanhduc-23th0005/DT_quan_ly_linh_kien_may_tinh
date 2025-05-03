<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Danh Sách Thương Hiệu</h3>
    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Thêm thương hiệu</h4>
              <button class="btn btn-primary btn-round ms-auto"><i class="fa fa-plus"></i> Thêm thương hiệu</button>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table id="add-row" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>MÃ THƯƠNG HIỆU</th>
                    <th>TÊN THƯƠNG HIỆU</th>
                    <th style="width: 10%">CHỨC NĂNG</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>MÃ THƯƠNG HIỆU</th>
                    <th>TÊN THƯƠNG HIỆU</th>
                    <th>CHỨC NĂNG</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>System Architect</td>
                    <td>
                      <div class="form-button-action">
                        <button type="button" title="Sửa" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></button>
                        <button type="button" title="Xoá" class="btn btn-link btn-danger"><i class="fa fa-times"></i></button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>

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