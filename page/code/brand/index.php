<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
  $_LEVEL1 = "code";
  $_LEVEL2 = "brand";
  $_TITLE = "브랜드";
  
  require_once(ROOT_PATH."/page/common/header.php");
?>

<style>
#close-button {
  text-decoration: none;  /* 언더바 삭제 */
}
</style>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-warning fade in">
              <a href="#" id="close-button" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;<strong>Warning</strong>
              <p>브랜드 코드를 삭제할 경우, 해당하는 브랜드의 안경/도수렌즈가 DB에서 삭제되니 유의해주세요.</p>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">브랜드 코드 추가</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <a href="add.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle"></i> &nbsp; 브랜드 코드 추가</a>
              </div>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">브랜드 코드 수정/삭제</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <?php
                global $db_info;
                $dbconnector = getConnection($db_info);
                $products = $dbconnector->executeRawQuery("SELECT * FROM o2obrand");

                echo "<table class='table table-striped table-hover table-bordered'>";
                echo "<thead>";
                echo "<th>index</th>";
                echo "<th>브랜드명</th>";
                echo "<th>국산 여부</th>";
                echo "<th>수정/삭제</th>";
                echo "</thead>";
                echo "<tbody>";
                while ($prod = mysqli_fetch_array($products)) {
                  echo "<tr>";
                  echo "<td>{$prod['brand_code']}</td>";
                  echo "<td>{$prod['brand_name']}</td>";
                  echo "<td>".(($prod['is_domestic']==1)?"O":"X")."</td>";
                  echo "<td><a href='modify.php?id={$prod['brand_code']}'>수정/삭제</a></td>";
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
