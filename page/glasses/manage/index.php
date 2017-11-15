<?php
//완성
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
	$_LEVEL1 = "glasses";
  $_LEVEL2 = "manage";
	$_TITLE = "안경/도수렌즈";
	
  require_once(ROOT_PATH."/page/common/header.php");
?>
<style media="screen">
</style>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">안경/도수렌즈 추가</h3>
              </div>
              <div class="box-body">
                <a href="add.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle"></i> &nbsp; 안경/도수렌즈 추가</a>
              </div>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">안경/도수렌즈 조회 &amp; 수정</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <!--컬러렌즈 관리 body-->
                <?php
                global $db_info;

                $dbconnector = getConnection($db_info);
                $products = $dbconnector->executeRawQuery("SELECT glasses_id, name, brand_name, price, can_photochromic, can_block_bluelight, block_bluelight_price, uv_max FROM o2oglasses as gla, o2obrand as br WHERE gla.brand_code=br.brand_code ORDER BY gla.glasses_id ASC;");

                //make table
                echo "<table class='table table-striped table-hover table-bordered'>";
                echo "<thead>";
                echo "<th>index</th>";
                echo "<th>이름</th>";
                echo "<th>브랜드</th>";
                echo "<th>가격</th>";
                echo "<th>변색 가능</th>";
                echo "<th>청광차단 가능</th>";
                echo "<th>청광차단 가격</th>";
                echo "<th>UV_MAX 여부</th>";
                echo "<th>수정/삭제</th>";
                echo "</thead>";
                echo "<tbody>";
                while ($prod = mysqli_fetch_array($products)) {
                  echo "<tr>";
                  echo "<td>{$prod['glasses_id']}</td>";
                  echo "<td>{$prod['name']}</td>";
                  echo "<td>{$prod['brand_name']}</td>";
                  echo "<td>{$prod['price']}</td>";
                  echo "<td>".(($prod['can_photochromic']==1)?"O":"X")."</td>";
                  echo "<td>".(($prod['can_block_bluelight']==1)?"O":"X")."</td>";
                  echo "<td>".(($prod['can_block_bluelight']==1)?$prod['block_bluelight_price']:"0")."</td>";
                  echo "<td>".(($prod['uv_max']==1)?"O":"X")."</td>";
                  echo "<td><a href='modify.php?id={$prod['glasses_id']}'>수정/삭제</a></td>";
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

</script>


<?php
  require_once(ROOT_PATH."/page/common/footer.php");
?>
