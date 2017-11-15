<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
  $_LEVEL1 = "code";
  $_LEVEL2 = "brand";
  $_LEVEL3 = "add";
  $_TITLE = "브랜드";
    
  require_once(ROOT_PATH."/page/common/header.php");

  if (isset($_POST['btnupload'])) {
    

    if (!isset($err_message)) {
      global $db_info;
      $brand_name = $_POST['brand_name'];
      $is_domestic = $_POST['is_domestic'];

      $dbconnector = getConnection($db_info);
      $sql = "INSERT INTO o2obrand (brand_code, brand_name, is_domestic) VALUES (NULL, '{$brand_name}', {$is_domestic})";
      if (!$dbconnector->executeRawQuery($sql)) {
        $err_message = $dbconnector->getError();
      } else {
        $success_message = "브랜드 코드 추가가 완료되었습니다";
        // header("refresh:5;index.php");
      }
    }
  }
?>
<style media="screen">
</style>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
        //alert
        if (isset($err_message)) {
          ?>
          <div class="alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $err_message; ?></strong>
          </div>
          <?php
        } else if (isset($success_message)) {
          ?>
          <div class="alert alert-success">
            <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $success_message; ?></strong>
          </div>
        <?php
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">브랜드 코드 추가</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <table class="table table-bordered table-responsive">
                    <!-- 이름 -->
                    <tr>
                      <td><label class="control-label">브랜드명</label></td>
                      <td><input class="form-control" type="text" name="brand_name" placeholder="Enter brand name" required/></td>
                    </tr>

                    <!-- 국산 여부 -->
                    <tr>
                      <td><label>국산 여부</label></td>
                      <td>
                        <select class="form-control" name="is_domestic">
                          <option value="1">O</option>
                          <option value="0">X</option>
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2"><button type="submit" name="btnupload" class="btn btn-primary">
                        <i class="fa fa-cloud-upload"></i> &nbsp; 추가
                      </button>
                      </td>
                    </tr>

                  </table>
                </form>

                <a href="index.php" class="btn btn-default" role="button">
                  <i class="fa fa-backward"></i> &nbsp; 뒤로
                </a>
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
