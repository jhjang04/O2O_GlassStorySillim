<?php

	$_LEVEL1 = "dashboard";
	$_TITLE = "대시보드";

  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/api/include/include.php");
  require_once("/api/include/include.php");
	require_once("common/menu.php");
  require_once("config/common.php");
	require_once("common/header.php");
*/
	
?>
<style media="screen">
      .scrollTest{
        white-space:nowrap;
        overflow-x:auto;
      }

      .scrollTestBox{
        width:200px;
        margin:10px;
        display:inline-block
      }

      .ScrollStyle{
        overflow-y:auto;
        overflow-x:hidden;
        height:110px;
      }
 </style>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">배달 현황</h3>
              </div>
            <!-- /.box-header -->
              <div class="box-body scrollTest">

                <div class="scrollTestBox bg-red-active" style="text-align: center;">
                  <form action="#">
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    이상명 님
                  </div>
                  <div class="row" style="color: black; background-color: white; padding: 15px; padding-left: 20px; text-align: left;">
                    <div class="ScrollStyle">
                      <div class="row">
                        <div class="col-xs-7" style="text-align: left">
                          파인애플(패밀리)
                        </div>
                        <div class="col-xs-5" style="text-align: right">
                          x1
                          &nbsp;
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-xs-7" style="text-align: left">
                          방울토마토(메인)
                        </div>
                        <div class="col-xs-5" style="text-align: right">
                          x1
                          &nbsp;
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    8700 원
                  </div>
                  <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: white;">
                    <div class="bg-red-active col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-shopping-cart" style="color: white;"></i>
                    </div>
                    <div class="bg-orange disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-circle-o-notch"></i>
                    </div>
                    <div class="bg-green disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-truck"></i>
                    </div>
                    <div class="bg-gray disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-map-marker" style="color: white;"></i>
                    </div>
                  </div>
                  <div class="row" style="text-align: center;">
                    <input class="bg-red-active" type="submit" name="add" value="주문완료" style="width: 87.6%; height: auto; border: 1px solid white; padding-top: 5%; padding-bottom: 5%;">
                  </div>
                  </form>
                </div>

                <div class="scrollTestBox bg-orange" style="text-align: center;">
                  <form action="#">
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    정현수 님
                  </div>
                  <div class="row" style="color: black; background-color: white; padding: 15px; padding-left: 20px; text-align: left;">
                    <div class="ScrollStyle">
                      <div class="row">
                        <div class="col-xs-7" style="text-align: left">
                          모듬과일(패밀리)
                        </div>
                        <div class="col-xs-5" style="text-align: right">
                          x2
                          &nbsp;
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    11000 원
                  </div>
                  <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: white;">
                    <div class="bg-red disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-shopping-cart" style="color: white;"></i>
                    </div>
                    <div class="bg-orange col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-circle-o-notch"></i>
                    </div>
                    <div class="bg-green disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-truck"></i>
                    </div>
                    <div class="bg-gray disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-map-marker" style="color: white;"></i>
                    </div>
                  </div>
				  <div  class="row" style="text-align: center;">
                    <a href="/admin/index2.php" class="bg-orange" type="button" value="" style="width: 87.6%; display: inline-block; height: auto; border: 1px solid white; padding-top: 5%; padding-bottom: 5%;">상품 준비 중</a>
                  </div>
                  </form>
                </div>

                <div class="scrollTestBox bg-green-active" style="text-align: center;">
                  <form action="#">
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    박민수 님
                  </div>
                  <div class="row" style="color: black; background-color: white; padding: 15px; padding-left: 20px; text-align: left;">
                    <div class="ScrollStyle">
                      <div class="row">
                        
                        <div class="col-xs-7" style="text-align: left">
                          청포도(메인)
                        </div>
                        <div class="col-xs-5" style="text-align: right">
                          x2
                          &nbsp;
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-xs-7" style="text-align: left">
                          메론(메인)
                        </div>
                        <div class="col-xs-5" style="text-align: right">
                          x1
                          &nbsp;
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    10400 원
                  </div>
                  <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: white;">
                    <div class="bg-red disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-shopping-cart" style="color: white;"></i>
                    </div>
                    <div class="bg-orange disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-circle-o-notch"></i>
                    </div>
                    <div class="bg-green-active col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-truck"></i>
                    </div>
                    <div class="bg-gray disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-map-marker" style="color: white;"></i>
                    </div>
                  </div>
                  <div class="row" style="text-align: center;">
                    <input class="bg-green-active" type="submit" name="add" value="배달 중" style="width: 87.6%; height: auto; border: 1px solid white; padding-top: 5%; padding-bottom: 5%;">
                  </div>
                  </form>
                </div>

                <div class="scrollTestBox bg-gray-active" style="text-align: center;">
                  <form action="#">
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    조윤민 님
                  </div>
                  <div class="row" style="color: black; background-color: white; padding: 15px; padding-left: 20px; text-align: left;">
                    <div class="ScrollStyle">
                      <div class="row">
                        <div class="col-xs-7" style="text-align: left">
                          열대과일(패밀리)
                        </div>
                        <div class="col-xs-5" style="text-align: right">
                          x1
                          &nbsp;
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-7" style="text-align: left">
                          다이어트(메인)
                        </div>
                        <div class="col-xs-5" style="text-align: right">
                          x2
                          &nbsp;
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="color: white; margin: 5px; text-align: center;">
                    9400 원
                  </div>
                  <div class="row" style="padding-left: 15px; padding-right: 15px; background-color: white;">
                    <div class="bg-red disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-shopping-cart" style="color: white;"></i>
                    </div>
                    <div class="bg-orange disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-circle-o-notch"></i>
                    </div>
                    <div class="bg-green disabled col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-truck"></i>
                    </div>
                    <div class="bg-gray-active col-xs-3" style="text-align: center; padding-top: 5%; padding-bottom: 5%;">
                      <i class="fa fa-map-marker" style="color: white;"></i>
                    </div>
                  </div>
                  <div class="row" style="text-align: center;">
                    <input class="bg-gray-active" type="submit" name="add" value="배달완료" style="color: white; width: 87.6%; height: auto; border: 1px solid white; padding-top: 5%; padding-bottom: 5%;">
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<!--
        <div class="row" style="margin-bottom: 20px">
          <div class="col-xs-6"><button class="btn btn-primary btn-lg" type="button" name="button" style="width: 100%; height: auto;">매장 주문</button></div>
          <div class="col-xs-6"><button class="btn btn-primary btn-lg" type="button" name="button" style="width: 100%; height: auto;">배달 주문</button></div>
        </div>
-->
        <div class="row">
          <div class="col-xs-9">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">매출 추이</h3>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="chart">
                  <canvas id="canvas"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-3">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">재고 정보</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="info-box">
                  <span class="info-box-icon bg-aquq">
                    <i class="glyphicon glyphicon-apple">

                    </i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">사과</span>
                    <span class="info-box-number">
                      77
                      <small>개</small>
                    </span>
                  </div>
                </div>
                <div class="info-box">
                  <span class="info-box-icon bg-aquq">
                    <i class="glyphicon glyphicon-apple">

                    </i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">포도</span>
                    <span class="info-box-number">
                      12.2
                      <small>kg</small>
                    </span>
                  </div>
                </div>
				<div class="info-box">
                  <span class="info-box-icon bg-aquq">
                    <i class="glyphicon glyphicon-apple">

                    </i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">파인애플</span>
                    <span class="info-box-number">
                      28
                      <small>개</small>
                    </span>
                  </div>
                </div>
				<div class="info-box">
                  <span class="info-box-icon bg-aquq">
                    <i class="glyphicon glyphicon-apple">

                    </i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">방울토마토</span>
                    <span class="info-box-number">
                      6.8
                      <small>kg</small>
                    </span>
                  </div>
                </div>
				<div class="info-box">
                  <span class="info-box-icon bg-aquq">
                    <i class="glyphicon glyphicon-apple">

                    </i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">바나나</span>
                    <span class="info-box-number">
                      19
                      <small>개</small>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
         </div>
    </section>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

	
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script type="text/javascript">
window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(231,233,237)'
};

window.randomScalingFactor = function() {
	return (Math.random() > 0.5 ? 1.0 : 0.1) * Math.round(Math.random() * 100);
}
var chartData = {
    labels: ["09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00"],
    datasets: [{
        type: 'line',
        label: '누적매출액(단위:만원)',
        borderColor: window.chartColors.blue,
        borderWidth: 2,
        fill: false,
        data: [
            0,
            2.8,
            6.4,
            19.8,
            42.1,
            54.3,
            62.0
        ]
    }, {
        type: 'bar',
        label: '주문수량',
        backgroundColor: window.chartColors.red,
        data: [
            0,
            7,
            16,
            44,
            86,
            53,
            30
        ],
        borderColor: 'white',
        borderWidth: 2
    }, {
        type: 'bar',
        label: '주문매출액',
        backgroundColor: window.chartColors.green,
        data: [
            0,
            2.8,
            3.6,
            13.4,
            22.3,
            12.2,
            7.7
        ]
    }]

};
window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myMixedChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            title: {
                display: true,
                text: '매출추이 한눈에보기'
            },
            tooltips: {
                mode: 'index',
                intersect: true
            }
        }
    });
};
</script>

	
	
<?php

	require_once("_footer.php");
  
?>
