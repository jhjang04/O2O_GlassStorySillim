<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
  $_LEVEL1 = "code";
  $_LEVEL2 = "color";
  $_TITLE = "색상";
  
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
              <p>색상 코드를 삭제할 경우, 해당하는 색상의 모든 컬러렌즈가 DB에서 삭제되니 유의해주세요.</p>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">색상 코드 추가</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <a href="add.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle"></i> &nbsp; 색상 코드 추가</a>
              </div>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">색상 코드 수정/삭제</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <?php
                global $db_info;
                $dbconnector = getConnection($db_info);
                $products = $dbconnector->executeRawQuery("SELECT * FROM o2ocolor ORDER BY color_code ASC");

                echo "<table class='table table-striped table-hover table-bordered'>";
                echo "<thead>";
                echo "<th>index</th>";
                echo "<th>색상명</th>";
                echo "<th>수정/삭제</th>";
                echo "</thead>";
                echo "<tbody>";
                while ($prod = mysqli_fetch_array($products)) {
                  echo "<tr>";
                  echo "<td>{$prod['color_code']}</td>";
                  echo "<td>{$prod['color_name']}</td>";
                  echo "<td><a href='modify.php?id={$prod['color_code']}'>수정/삭제</a></td>";
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
