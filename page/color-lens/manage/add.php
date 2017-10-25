<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
    $_LEVEL1 = "color-lens";
    $_LEVEL2 = "manage";
    $_LEVEL3 = "add";
    $_TITLE = "컬러렌즈";
    
  require_once(ROOT_PATH."/page/common/header.php");
  require_once(ROOT_PATH."/core/db/mysqlConnector.php");

  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";
  
  // echo "<pre>";
  // var_dump($_FILES);
  // echo "</pre>";


  if (isset($_POST['btnupload'])) {
    // $err_message = "Please enter username";
    // $success_message = "success";
    $color_code = (int)$_POST['color_code'];
    $lens_name = $_POST['lens_name'];
    $power_start = floatval($_POST['power_start']);
    $power_end = floatval($_POST['power_end']);
    $astigmatism = $_POST['astigmatism'];

    $img_file_name = $_FILES['lens_image']['name'];
    $img_tmp_path = $_FILES['lens_image']['tmp_name'];
    $img_size = $_FILES['lens_image']['size'];

    //error check
    if (0) {
      //텍스트 빈 칸 있을 경우
      //--> required 붙였으니까 대충 생략
    } else {
      //img upload
      $upload_dir = ROOT_PATH.'/color-lens/';
      $img_ext = strtolower(pathinfo($img_file_name, PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
      $user_pic = rand(1000, 1000000).".".$img_ext; //rename

      if (in_array($img_ext, $valid_extensions)) {
        if ($img_size < 30000000) {
          //below 10mb
          $lens_path = $upload_dir.$user_pic;
          // echo "<pre>";
          // var_dump($lens_path);
          // echo "</pre>";
          move_uploaded_file($img_tmp_path, $lens_path);
        } else {
          $err_message = "이미지 파일 용량은 30mb로 제한됩니다";
        }
      } else {
        $err_message = "jpeg, jpg, png, gif 파일만 허용됩니다";
      }
    }


    if (!isset($err_message)) {
      $db_info = array(
        'type' => 'MYSQL',
        'host' => 'localhost',
        'port' => 3306,
        'user_nm' => 'root',
        'pwd' => null,
        'db_name' => 'o2o_glass_story'
      );

      $dbconnector = new mysqlConnector($db_info);
      $sql = "INSERT INTO o2ocolorlens (id, color_code, power_start, power_end, astigmatism, lens_name, lens_path, availability) VALUES (NULL, {$color_code}, {$power_start}, {$power_end}, {$astigmatism}, '{$lens_name}', '{$lens_path}', '1')";
      if (!$dbconnector->executeRawQuery($sql)) {
        $err_message = $dbconnector->getError();
      } else {
        $success_message = "컬러렌즈 추가가 완료되었습니다";
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
                <h3 class="box-title">컬러렌즈 추가</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                  <table class="table table-bordered table-responsive">
                    <!-- 색깔 -->
                    <tr>
                      <td><label class="control-label">렌즈 색깔</label></td>
                      <td>
                        <?php
                        $db_info = array(
                          'type' => 'MYSQL',
                          'host' => 'localhost',
                          'port' => 3306,
                          'user_nm' => 'root',
                          'pwd' => null,
                          'db_name' => 'o2o_glass_story'
                        );

                        $dbconnector = new mysqlConnector($db_info);
                        $result = $dbconnector->executeRawQuery("SELECT * FROM o2ocolor");
                        echo "<select class='form-control' name='color_code'>";
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<option value='{$row['color_code']}'>{$row['color_name']}</option>";
                        }
                        echo "</select>";
                        ?>
                      </td>
                    </tr>

                    <!-- 도수 -->
                    <tr>
                      <td><label class="control-label">도수범위(시작~끝)</label></td>
                      <td>
                        <div class="input-group">
                          <input type="number" step="0.01" class="form-control" name="power_start" placeholder="Enter power start" required>
                          <span class="input-group-addon">~</span>
                          <input type="number" step="0.01" class="form-control" name="power_end" placeholder="Enter power end" required>
                        </div>
                      </td>
                    </tr>

                    <!-- 난시 -->
                    <tr>
                      <td><label>난시 기능</label></td>
                      <td>
                        <select class="form-control" name="astigmatism">
                          <option value="1">O</option>
                          <option value="0">X</option>
                        </select>
                      </td>
                    </tr>

                    <!-- 렌즈명 -->
                    <tr>
                      <td><label class="control-label">렌즈 이름</label></td>
                      <td><input class="form-control" type="text" name="lens_name" placeholder="Enter Lens name" required/></td>
                    </tr>

                    <!-- 이미지 -->
                    <tr>
                      <td><label class="control-label">렌즈 이미지</label></td>
                      <td>
                        <input class="input-group" type="file" name="lens_image" accept="image/*" required/>
                        <p class="help-block">허용 확장자: jpeg, jpg, gif, png</p>
                        <p class="help-block">허용 크기: 30mb 이하</p>
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
