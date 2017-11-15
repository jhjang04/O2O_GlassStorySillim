<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
	$_LEVEL1 = "sales";
  $_LEVEL2 = "inquiry";
	$_TITLE = "매출 조회";
	
  require_once(ROOT_PATH."/page/common/header.php");
?>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">매출 차트</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <div id="salesChart" style="height: 500px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
// Some raw data (not necessarily accurate)
var data = google.visualization.arrayToDataTable([
  ['Month', '컬러렌즈', '안경', '도수렌즈', '난시렌즈', '소모품', '평균'],
  ['2017/05',  165,      938,         522,             998,           450,      614.6],
  ['2017/06',  135,      1120,        599,             1268,          288,      682],
  ['2017/07',  157,      1167,        587,             807,           397,      623],
  ['2017/08',  139,      1110,        615,             968,           215,      609.4],
  ['2017/09',  136,      691,         629,             1026,          366,      569.6],
  ['2017/10',  238,      988,         327,             1123,          366,      (238+988+327+1123+366)/5],
  ['2017/11(예상)',  279,      1159,        621,             989,           412,      (279+1159+621+989+412)/5],
  ['2017/12(예상)',  256,      1091,        512,             1023,           395,      (256+1091+512+1023+395)/5],
  ['2018/01(예상)',  261,      1017,        587,             1071,           401,      (261+1017+587+1071+401)/5]
  ]);

var options = {
  title : '월간 매출 차트',
  vAxis: {title: '판매 실적'},
  hAxis: {title: '월'},
  seriesType: 'bars',
  series: {5: {type: 'line'}}
};

var chart = new google.visualization.ComboChart(document.getElementById('salesChart'));
chart.draw(data, options);
}
</script>


<?php
  require_once(ROOT_PATH."/page/common/footer.php");
?>
