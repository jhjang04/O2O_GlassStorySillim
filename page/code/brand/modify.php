<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    global $db_info;

    $dbconnector = getConnection($db_info);
    $sql = "SELECT brand_code AS idx, brand_name, is_domestic FROM o2obrand WHERE brand_code={$id} LIMIT 1";
    $res = $dbconnector->executeRawQuery($sql);

    if (!$res) {
      $err_message = $dbconnector->getError();
    } else {
      $edit_row = mysqli_fetch_assoc($res);

      extract($edit_row);
    }
  }

  $_LEVEL1 = "code";
  $_LEVEL2 = "brand";
  $_LEVEL3 = "modify";
  $_TITLE = "브랜드";

  require_once(ROOT_PATH."/page/common/header.php");

  if (isset($_POST['btnupdate'])) {
    $brand_name = $_POST['brand_name'];

    if (!isset($err_message)) {
      global $db_info;

      $dbconnector = getConnection($db_info);
      $sql = "UPDATE o2obrand SET brand_name='{$brand_name}', is_domestic={$is_domestic} WHERE brand_code={$idx}";
      if (!$dbconnector->executeRawQuery($sql)) {
        $err_message = $dbconnector->getError();
      } else {
        $success_message = "브랜드 수정이 완료되었습니다";
        // header("refresh:5;index.php");
      }
    }
  } else if (isset($_POST['btndelete'])) {
    global $db_info;

    $dbconnector = getConnection($db_info);
    $sql = "DELETE FROM o2obrand WHERE brand_code={$idx}";
    if (!$dbconnector->executeRawQuery($sql)) {
        $err_message = $dbconnector->getError();
      } else {
        ?>
        <script>alert("브랜드 삭제가 완료되었습니다");window.location.href='index.php';</script>
        <?php
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
                <h3 class="box-title">브랜드 코드 수정</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <table class="table table-bordered table-responsive">
                    <!-- 브랜드 코드 -->
                    <tr>
                      <td><label class="control-label">브랜드 코드</label></td>
                      <td><input class="form-control" type="text" name="brand_code" placeholder="Enter brand code" <?php if(isset($id)){echo "value='{$id}'";} ?> readonly/></td>
                    </tr>

                    <!-- 이름 -->
                    <tr>
                      <td><label class="control-label">브랜드명</label></td>
                      <td><input class="form-control" type="text" name="brand_name" placeholder="Enter brand name" <?php if(isset($brand_name)){echo "value='{$brand_name}'";} ?> required/></td>
                    </tr>

                    <!-- 국산 여부 -->
                    <tr>
                      <td><label>국산 여부</label></td>
                      <td>
                        <select class="form-control" name="is_domestic">
                          <option value="1">O</option>
                          <option value="0" <?php if(isset($is_domestic) && $is_domestic=='0'){echo "selected";} ?>>X</option>
                        </select>
                      </td>
                    </tr>


                    <tr>
                      <td colspan="2"><button type="submit" name="btnupdate" class="btn btn-primary">
                        <i class="fa fa-pencil-square-o"></i> &nbsp; 수정
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

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">브랜드 코드 삭제</h3>
              </div>
              <div class="box-body">
                <form method="post" id="deleteform" onsubmit="return confirm('정말 삭제하시겠습니까?')">
                  <button type="submit" name="btndelete" class="btn btn-danger">
                    <i class="fa fa-trash"></i> &nbsp; 삭제
                  </button>
                </form>
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
