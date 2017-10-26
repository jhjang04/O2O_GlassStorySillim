<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    global $db_info;

    $dbconnector = getConnection($db_info);
    $sql = "SELECT glasses_id AS idx, name AS glasses_name, brand_code, price, can_photochromic, can_block_bluelight, block_bluelight_price, uv_max FROM o2oglasses WHERE glasses_id={$id} LIMIT 1";
    $res = $dbconnector->executeRawQuery($sql);

    if (!$res) {
      $err_message = $dbconnector->getError();
    } else {
      $edit_row = mysqli_fetch_assoc($res);

      extract($edit_row);
    }
  }

  $_LEVEL1 = "glasses";
  $_LEVEL2 = "manage";
  $_LEVEL3 = "modify";
  $_TITLE = "안경/도수렌즈";
    
  require_once(ROOT_PATH."/page/common/header.php");

  if (isset($_POST['btnupdate'])) {
    $glasses_name = $_POST['glasses_name'];
    $brand_code = $_POST['brand_code'];
    $price = $_POST['price'];
    $can_photochromic = $_POST['can_photochromic'];
    $can_block_bluelight = $_POST['can_block_bluelight'];
    $block_bluelight_price = $_POST['block_bluelight_price'];
    $uv_max = $_POST['uv_max'];

    if (!isset($err_message)) {
      global $db_info;

      $dbconnector = getConnection($db_info);
      $sql = "UPDATE o2oglasses AS gla SET name='{$glasses_name}', brand_code={$brand_code}, price={$price}, can_photochromic={$can_photochromic}, can_block_bluelight={$can_block_bluelight}, block_bluelight_price={$block_bluelight_price}, uv_max={$uv_max} WHERE glasses_id={$idx}";
      if (!$dbconnector->executeRawQuery($sql)) {
        $err_message = $dbconnector->getError();
      } else {
        $success_message = "안경/도수렌즈 수정이 완료되었습니다";
        // header("refresh:5;index.php");
      }
    }
  } else if (isset($_POST['btndelete'])) {
    global $db_info;

    $dbconnector = getConnection($db_info);
    $sql = "DELETE FROM o2oglasses WHERE glasses_id={$idx}";
    if (!$dbconnector->executeRawQuery($sql)) {
        $err_message = $dbconnector->getError();
      } else {
        ?>
        <script>alert("안경/도수렌즈 삭제가 완료되었습니다");window.location.href='index.php';</script>
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
                <h3 class="box-title">안경/도수렌즈 수정</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <table class="table table-bordered table-responsive">
                    <!-- 이름 -->
                    <tr>
                      <td><label class="control-label">안경/도수렌즈 이름</label></td>
                      <td><input class="form-control" type="text" name="glasses_name" placeholder="Enter glasses/lens name" <?php if(isset($glasses_name)){echo "value='{$glasses_name}'";} ?> required/></td>
                    </tr>

                    <!-- 브랜드 (코드) -->
                    <tr>
                      <td><label class="control-label">안경/도수렌즈 브랜드</label></td>
                      <td>
                        <?php
                        global $db_info;

                        $dbconnector = getConnection($db_info);
                        $result = $dbconnector->executeRawQuery("SELECT * FROM o2obrand");
                        echo "<select class='form-control' name='brand_code'>";
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<option value='{$row['brand_code']}' ".(($row['brand_code']==$brand_code)?"selected":"").">{$row['brand_name']}</option>";
                        }
                        echo "</select>";
                        ?>
                      </td>
                    </tr>

                    <!-- 가격 -->
                    <tr>
                      <td><label class="control-label">가격</label></td>
                      <td><input class="form-control" type="text" name="price" placeholder="Enter price" <?php if(isset($price)){echo "value='{$price}'";} ?> required/></td>
                    </tr>

                    <!-- 변색 가능 -->
                    <tr>
                      <td><label>변색 가능</label></td>
                      <td>
                        <select class="form-control" name="can_photochromic">
                          <option value="1">O</option>
                          <option value="0" <?php if(isset($can_photochromic) && $can_photochromic=='0'){echo 'selected';} ?>>X</option>
                        </select>
                      </td>
                    </tr>

                    <!-- 청광 차단 가능 -->
                    <tr>
                      <td><label>청광 차단 가능</label></td>
                      <td>
                        <select class="form-control" name="can_block_bluelight">
                          <option value="1">O</option>
                          <option value="0" <?php if(isset($can_block_bluelight) && $can_block_bluelight=='0'){echo 'selected';} ?>>X</option>
                        </select>
                      </td>
                    </tr>

                    <!-- 청광 차단 가격 -->
                    <tr>
                      <td><label class="control-label">청광 차단 가격</label></td>
                      <td><input class="form-control" type="text" name="block_bluelight_price" placeholder="Enter block bluelight price" <?php if(isset($block_bluelight_price)){echo "value='{$block_bluelight_price}'";} ?> required/></td>
                    </tr>

                    <!-- uv_max -->
                    <tr>
                      <td><label>UV MAX 여부</label></td>
                      <td>
                        <select class="form-control" name="uv_max">
                          <option value="1">O</option>
                          <option value="0" <?php if(isset($uv_max) && $uv_max=='0'){echo 'selected';} ?>>X</option>
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
                <h3 class="box-title">안경/도수렌즈 삭제</h3>
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
