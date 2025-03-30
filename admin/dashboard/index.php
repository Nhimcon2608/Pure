<?php
require '../check_admin_login.php';
require '../root.php';

$month = date('Y-m');

$year = date('Y-m-d');

$sql = "SELECT SUM(total_price) as total FROM `orders` WHERE DATE_FORMAT(created_at, '%Y-%m') = '$month' AND status = 1";
$result = mysqli_query($connect, $sql);
$eachMonth = mysqli_fetch_array($result);

$sql = "SELECT COUNT(*) FROM `orders` WHERE DATE_FORMAT(created_at, '%Y-%m') = '$month' AND status < 2";
$result = mysqli_query($connect, $sql);
$totalMonth = mysqli_fetch_array($result)['COUNT(*)'];

$sql = "SELECT SUM(total_price) as total FROM `orders` WHERE DATE_FORMAT(created_at, '%Y-%m-%d') >= (SELECT MIN(DATE_FORMAT(created_at, '%Y')) FROM `orders` WHERE status = 1 IN(DATE_FORMAT('$year', '%Y'))) AND status = 1";
$result = mysqli_query($connect, $sql);
$eachYear = mysqli_fetch_array($result);




$sql = "SELECT COUNT(*) FROM `admins` WHERE status = 1 AND lever != 1";
$result = mysqli_query($connect, $sql);
$result_user = mysqli_fetch_array($result)['COUNT(*)'];


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../partials/head_view.php';
    ?>
    <title>Dashboard</title>

</head>

<body id="page-top">
    <?php
    include '../partials/header_view.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    DOANH THU (THÁNG)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php if (empty($eachMonth['total'])) {
                                        echo '0đ';
                                    } else {
                                        echo currency_format($eachMonth['total']);
                                    } ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    DOANH THU (NĂM)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo currency_format($eachYear['total']) ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SỐ ĐƠN HÀNG TRONG THÁNG
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $totalMonth ?>
                                            <small class="text-muted">(kể cả đơn chưa được duyệt)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    SỐ LƯỢNG NHÂN SỰ</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (!empty($result_user)) { ?>
                                        <?php echo $result_user; ?>
                                    <?php } else { ?>
                                        0
                                    <?php } ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">THỐNG KÊ DOANH THU 30 NGÀY GẦN NHẤT</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">MINH HỌA</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="../public/img/undraw_posting_photo.svg" alt="...">
                        </div>
                        <p>Thêm các hình ảnh minh họa chất lượng SVG vào dự án của bạn từ <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, một bộ sưu tập hình ảnh SVG đẹp mắt được cập nhật thường xuyên mà bạn có thể sử dụng hoàn toàn miễn phí!</p>
                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Xem thêm minh họa →</a>
                    </div>
                </div>

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">THÔNG TIN HỆ THỐNG</h6>
                    </div>
                    <div class="card-body">
                        <p>Hệ thống quản trị Shop Điện Tử sử dụng Bootstrap 4 để tạo giao diện người dùng đẹp mắt và dễ sử dụng.</p>
                        <p class="mb-0">Hệ thống bao gồm các chức năng quản lý sản phẩm, đơn hàng, và thống kê báo cáo toàn diện.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include '../partials/footer_view.php';

    include '../partials/js_link.php';
    ?>
    <script src="../public/vendor/chart.js/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                    url: 'get_orders_total.php',
                    dataType: 'json',
                    data: {
                        days: 30
                    },
                })
                .done(function(response) {
                    const arrX = Object.keys(response);
                    const arrY = Object.values(response);
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: arrX,
                            datasets: [{
                                label: "Earnings",
                                lineTension: 0.3,
                                backgroundColor: "rgba(78, 115, 223, 0.05)",
                                borderColor: "rgba(78, 115, 223, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointBorderColor: "rgba(78, 115, 223, 1)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                data: arrY,
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                }
                            },
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'date'
                                    },
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 7
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        maxTicksLimit: 5,
                                        padding: 10,
                                        // Include a dollar sign in the ticks
                                        callback: function(value, index, values) {
                                            return number_format(value) + ' đ';
                                        }
                                    },
                                    gridLines: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        borderDash: [2],
                                        zeroLineBorderDash: [2]
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            },
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: 'index',
                                caretPadding: 10,
                                callbacks: {
                                    label: function(tooltipItem, chart) {
                                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                        return datasetLabel + ':' + number_format(tooltipItem.yLabel) + ' đ';
                                    }
                                }
                            }
                        }
                    });
                })
        });
    </script>
    <script src="../public/js/demo/chart-area-demo.js"></script>
</body>

</html>

<style>
.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    margin-bottom: 24px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(135deg, #43cea2, #185a9d);
    border-bottom: none;
    border-top-left-radius: 15px !important;
    border-top-right-radius: 15px !important;
    padding: 1.2rem 1.5rem;
}

.card-header h6 {
    color: white !important;
    letter-spacing: 1px;
    font-weight: 600;
    margin: 0;
}

.border-left-primary {
    border-left: 4px solid #4e73df !important;
    background: linear-gradient(to right, rgba(78, 115, 223, 0.1), rgba(255, 255, 255, 0.8));
}

.border-left-success {
    border-left: 4px solid #1cc88a !important;
    background: linear-gradient(to right, rgba(28, 200, 138, 0.1), rgba(255, 255, 255, 0.8));
}

.border-left-warning {
    border-left: 4px solid #f6c23e !important;
    background: linear-gradient(to right, rgba(246, 194, 62, 0.1), rgba(255, 255, 255, 0.8));
}

.border-left-danger {
    border-left: 4px solid #e74a3b !important;
    background: linear-gradient(to right, rgba(231, 74, 59, 0.1), rgba(255, 255, 255, 0.8));
}

.chart-area {
    height: 20rem;
    padding: 10px;
}

.text-xs {
    font-size: 0.8rem;
    letter-spacing: 0.05rem;
}

.text-primary {
    color: #4e73df !important;
}

.text-success {
    color: #1cc88a !important;
}

.text-warning {
    color: #f6c23e !important;
}

.text-danger {
    color: #e74a3b !important;
}

.card-body {
    padding: 1.5rem;
}

.container-fluid {
    padding: 1.5rem 2rem;
}

.btn-primary {
    background: linear-gradient(135deg, #3a7bd5, #00d2ff);
    border: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2e6ac0, #00b8e0);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

canvas#myAreaChart {
    max-width: 100%;
}
</style>