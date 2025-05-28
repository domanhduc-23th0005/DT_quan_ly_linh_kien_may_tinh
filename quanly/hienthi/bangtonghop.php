<?php
require('../cauhinh/env.php');

$sql_khachhang = "SELECT COUNT(*) AS tongkh FROM khachhang";
$result_khachhang = mysqli_query($conn, $sql_khachhang);
$row_khachhang = mysqli_fetch_assoc($result_khachhang);
$tong_khach_hang = $row_khachhang['tongkh'];

$sql_donhang = "SELECT COUNT(*) AS tongdh FROM donhang WHERE TRANGTHAI = 3";
$result_donhang = mysqli_query($conn, $sql_donhang);
$row_donhang = mysqli_fetch_assoc($result_donhang);
$tong_don_hang = $row_donhang['tongdh'];

$sql_doanhso = "
SELECT SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS tong_doanh_so
FROM DONHANG d
JOIN ctDONHANG ct ON d.MADONHANG = ct.MADONHANG
WHERE d.TRANGTHAI = 3
";
$result_doanhso = mysqli_query($conn, $sql_doanhso);
$row_doanhso = mysqli_fetch_assoc($result_doanhso);
$tong_doanh_so = $row_doanhso['tong_doanh_so'] ?? 0;

$sql_dathang = "SELECT COUNT(*) AS tongdh FROM donhang WHERE TRANGTHAI = 0";
$result_dathang = mysqli_query($conn, $sql_dathang);
$row_dathang = mysqli_fetch_assoc($result_dathang);
$tong_dat_hang = $row_dathang['tongdh'];

$sql_kh = "SELECT * FROM `khachhang` LIMIT 10";
$result_kh = mysqli_query($conn, $sql_kh);

$sql_dh = "SELECT * FROM `donhang` WHERE TRANGTHAI = 0 LIMIT 10";
$result_dh = mysqli_query($conn, $sql_dh);

$sql_loaihang = "SELECT COUNT(*) AS tonglh FROM loaihang";
$result_loaihang = mysqli_query($conn, $sql_loaihang);
$row_loaihang = mysqli_fetch_assoc($result_loaihang);
$tong_loai_hang = $row_loaihang['tonglh'];

$sql_mathang = "SELECT COUNT(*) AS tongmh FROM mathang";
$result_mathang = mysqli_query($conn, $sql_mathang);
$row_mathang = mysqli_fetch_assoc($result_mathang);
$tong_mat_hang = $row_mathang['tongmh'];

$sql_thuonghieu = "SELECT COUNT(*) AS tongth FROM thuonghieu";
$result_thuonghieu = mysqli_query($conn, $sql_thuonghieu);
$row_thuonghieu = mysqli_fetch_assoc($result_thuonghieu);
$tong_thuong_hieu = $row_thuonghieu['tongth'];
?>
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Bảng Tổng Hợp</h3>
        <h6 class="op-7 mb-2">Hiển thị nhanh thông tin cửa hàng</h6>
      </div>
<!--     <div class="ms-md-auto py-2 py-md-0">
      <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
      <a href="#" class="btn btn-primary btn-round">Add Customer</a>
    </div> -->
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="fas fa-users"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Khách hàng</p>
                <h4 class="card-title"><?php echo $tong_khach_hang ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-info bubble-shadow-small">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Đơn hàng hoàn thành</p>
                <h4 class="card-title"><?php echo $tong_don_hang ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-success bubble-shadow-small">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Doanh số</p>
                <h4 class="card-title"><?php echo number_format($tong_doanh_so, 0, ',', '.') ?> đ</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-secondary bubble-shadow-small">
                <i class="fas fa-receipt"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Đơn đặt hàng</p>
                <h4 class="card-title"><?php echo $tong_dat_hang ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small" style="background-color: SeaGreen;">
                <i class="fas fa-list"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Loại hàng</p>
                <h4 class="card-title"><?php echo $tong_loai_hang ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-info bubble-shadow-small" style="background-color: Magenta;">
                <i class="fas fa-store"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Mặt hàng</p>
                <h4 class="card-title"><?php echo $tong_mat_hang ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-success bubble-shadow-small" style="background-color: red;">
                <i class="fas fa-bomb"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Thương hiệu</p>
                <h4 class="card-title"><?php echo $tong_thuong_hieu ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row" style="display: none;">
    <div class="col-md-8">
      <div class="card card-round">
        <div class="card-header">
          <div class="card-head-row">
            <div class="card-title">User Statistics</div>
            <div class="card-tools">
              <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                <span class="btn-label">
                  <i class="fa fa-pencil"></i>
                </span>
                Export
              </a>
              <a href="#" class="btn btn-label-info btn-round btn-sm">
                <span class="btn-label">
                  <i class="fa fa-print"></i>
                </span>
                Print
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-container" style="min-height: 375px">
            <canvas id="statisticsChart"></canvas>
          </div>
          <div id="myChartLegend"></div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-primary card-round">
        <div class="card-header">
          <div class="card-head-row">
            <div class="card-title">Daily Sales</div>
            <div class="card-tools">
              <div class="dropdown">
                <button class="btn btn-sm btn-label-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Export
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="card-category">March 25 - April 02</div>
        </div>
        <div class="card-body pb-0">
          <div class="mb-4 mt-2">
            <h1>$4,578.58</h1>
          </div>
          <div class="pull-in">
            <canvas id="dailySalesChart"></canvas>
          </div>
        </div>
      </div>
      <div class="card card-round">
        <div class="card-body pb-0">
          <div class="h1 fw-bold float-end text-primary">+5%</div>
          <h2 class="mb-2">17</h2>
          <p class="text-muted">Users online</p>
          <div class="pull-in sparkline-fix">
            <div id="lineChart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row" style="display: none;">
    <div class="col-md-12">
      <div class="card card-round">
        <div class="card-header">
          <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">Users Geolocation</h4>
            <div class="card-tools">
              <button class="btn btn-icon btn-link btn-primary btn-xs">
                <span class="fa fa-angle-down"></span>
              </button>
              <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card">
                <span class="fa fa-sync-alt"></span>
              </button>
              <button class="btn btn-icon btn-link btn-primary btn-xs">
                <span class="fa fa-times"></span>
              </button>
            </div>
          </div>
          <p class="card-category">
            Map of the distribution of users around the world
          </p>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="table-responsive table-hover table-sales">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="assets/img/flags/id.png" alt="indonesia"/>
                        </div>
                      </td>
                      <td>Indonesia</td>
                      <td class="text-end">2.320</td>
                      <td class="text-end">42.18%</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img src="assets/img/flags/us.png" alt="united states"/>
                        </div>
                      </td>
                      <td>USA</td>
                      <td class="text-end">240</td>
                      <td class="text-end">4.36%</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img
                          src="assets/img/flags/au.png"
                          alt="australia"
                          />
                        </div>
                      </td>
                      <td>Australia</td>
                      <td class="text-end">119</td>
                      <td class="text-end">2.16%</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img
                          src="assets/img/flags/ru.png"
                          alt="russia"
                          />
                        </div>
                      </td>
                      <td>Russia</td>
                      <td class="text-end">1.081</td>
                      <td class="text-end">19.65%</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img
                          src="assets/img/flags/cn.png"
                          alt="china"
                          />
                        </div>
                      </td>
                      <td>China</td>
                      <td class="text-end">1.100</td>
                      <td class="text-end">20%</td>
                    </tr>
                    <tr>
                      <td>
                        <div class="flag">
                          <img
                          src="assets/img/flags/br.png"
                          alt="brazil"
                          />
                        </div>
                      </td>
                      <td>Brasil</td>
                      <td class="text-end">640</td>
                      <td class="text-end">11.63%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mapcontainer">
                <div
                id="world-map"
                class="w-100"
                style="height: 300px"
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="card card-round">
        <div class="card-body">
          <div class="card-head-row card-tools-still-right">
            <div class="card-title">Khách hàng mới</div>
            <div class="card-tools">
              <div class="dropdown">
                <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="index.php?quanly=khachhang&hienthi=danhsach">Xem tất cả</a>
                  <a class="dropdown-item" href="#" style="display: none;">Another action</a>
                  <a class="dropdown-item" href="#" style="display: none;">Something else here</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-list py-4">
            <?php 
            if (mysqli_num_rows($result_kh) > 0) {
              while ($row_kh = mysqli_fetch_assoc($result_kh)) {
                ?>
                <div class="item-list">
                  <div class="avatar">
                    <!-- <img src="" alt="..." class="avatar-img rounded-circle"/> -->
                    <i class="fas fa-user" style="font-size: 30px;"></i>
                  </div>
                  <div class="info-user ms-3">
                    <div class="username"><?php echo $row_kh['HOKHACHHANG'] . ' ' . $row_kh['TENKHACHHANG']; ?></div>
                    <div class="status"><?php echo $row_kh['EMAIL'] . ' | ' . $row_kh['DIENTHOAI']; ?></div>
                  </div>
                  <button class="btn btn-icon btn-link op-8 me-1">
                    <i class="far fa-envelope"></i>
                  </button>
                  <button class="btn btn-icon btn-link btn-danger op-8">
                    <i class="fas fa-ban"></i>
                  </button>
                </div>
                <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card card-round">
        <div class="card-header">
          <div class="card-head-row card-tools-still-right">
            <div class="card-title">Đơn hàng mới</div>
            <div class="card-tools">
              <div class="dropdown">
                <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div
                class="dropdown-menu"
                aria-labelledby="dropdownMenuButton"
                >
                <a class="dropdown-item" href="index.php?quanly=donhang&hienthi=danhsach">Xem tất cả</a>
                <a class="dropdown-item" href="#" style="display: none;">Another action</a>
                <a class="dropdown-item" href="#" style="display: none;">Something else here</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center mb-0">
            <thead class="thead-light">
              <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col" class="text-end">Ngày đặt hàng</th>
                <th scope="col" class="text-end">Thanh toán</th>
                <th scope="col" class="text-end">Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if (mysqli_num_rows($result_dh) > 0) {
                while ($row_dh = mysqli_fetch_assoc($result_dh)) {
                  $madonhang = $row_dh['MADONHANG'];

                  $sql = "SELECT SUM(GIABAN * SOLUONG * (1 - MUCGIAMGIA / 100)) AS TONGTIEN
                  FROM ctDONHANG
                  WHERE MADONHANG = $madonhang";

                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  $tongTien = $row['TONGTIEN'] ?? 0;
                  ?>
                  <tr>
                    <th scope="row">
                      <button class="btn btn-icon btn-round btn-secondary btn-sm me-2">
                        <i class="fa fa-check"></i>
                      </button>
                      #<?php echo $row_dh['MADONHANG']; ?>
                    </th>
                    <td class="text-end"><?= date("d/m/Y H:i:s", strtotime($row_dh["NGAYBANHANG"])) ?></td>
                    <td class="text-end"><?php echo number_format($tongTien, 0, ',', '.') ?> đ</td>
                    <td class="text-end">
                      <span class="badge badge-secondary">Chờ xác nhận</span>
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
$conn->close();
?>