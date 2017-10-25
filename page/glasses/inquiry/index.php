<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
	$_LEVEL1 = "glasses";
  $_LEVEL2 = "inquiry";
	$_TITLE = "안경/도수렌즈";
	
  require_once(ROOT_PATH."/page/common/header.php");
?>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">컬러렌즈 추가</h3>
              </div>
              <div class="box-body">
                <a href="add.php" class="btn btn-primary" role="button">컬러렌즈 추가</a>
              </div>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">컬러렌즈 조회 &amp; 수정</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <!--컬러렌즈 관리 body-->
                <?php
                global $db_info;

                $dbconnector = new mysqlConnector($db_info);
                $products = $dbconnector->executeRawQuery("SELECT cl.id AS idx, co.color_name, cl.power_start, cl.power_end, cl.astigmatism, cl.lens_name, cl.lens_path, cl.availability FROM o2ocolorlens AS cl, o2ocolor AS co WHERE cl.color_code = co.color_code");

                // $conn = getConnection($db_info);
                // $sql = "SELECT goods.goods_code AS idx, brand.brand_name, company.company_name, gr.group_name, goods.goods_name,gla.availability FROM tblgoods AS goods, tblbrand AS brand, tblcompany AS company, tblgroup AS gr,o2oglassstory AS gla WHERE goods.brand_code = ? AND goods.company_code = ? AND goods.group_code = ? AND goods.goods_code = ?";
                // $res = $conn->executeQuery($sql, ["brand.brand_code", "company.company_code", "gr.group_code", "gla.goods_code"]);

                // echo "<pre>";
                // var_dump($res);
                // echo "</pre>";
                // $conn->release();
                // die("ffff");

                //make table
                echo "<table class='table table-striped table-hover table-bordered'>";
                // index, 색깔, 도수 범위(계산), 난시여부, 렌즈명, 경로
                echo "<thead>";
                echo "<th>index</th>";
                echo "<th>색깔</th>";
                echo "<th>도수</th>";
                echo "<th>난시기능</th>";
                echo "<th>렌즈명</th>";
                echo "<th>파일경로</th>";
                echo "<th>미리보기</th>";
                echo "<th>프로그램 사용여부</th>";
                echo "<th>수정/삭제</th>";
                echo "</thead>";
                echo "<tbody>";
                while ($prod = mysqli_fetch_array($products)) {
                  echo "<tr>";
                  echo "<td>{$prod['idx']}</td>";
                  echo "<td>{$prod['color_name']}</td>";
                  echo "<td>".sprintf("%.2f ~ %.2f", $prod['power_start'], $prod['power_end'])."</td>";
                  echo "<td>".(($prod['astigmatism']==1)?"O":"X")."</td>";
                  echo "<td>{$prod['lens_name']}</td>";
                  echo "<td>{$prod['lens_path']}</td>";
                  echo "<td><img src='../../../color-lens/{$prod['lens_path']}' height='40' width='40'></td>";
                  echo "<td><input id='toggle{$prod['idx']}' type='checkbox'".(($prod['availability']=='0')?'':'checked')." data-toggle='toggle' data-size='small'></td>";  //toggle
                  echo "<td><a href='modify.php?id={$prod['idx']}'>수정/삭제</a></td>";
                  echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                ?>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->
	
<script type="text/javascript">
$(function() {

</script>


<?php
  require_once(ROOT_PATH."/page/common/footer.php");
?>
