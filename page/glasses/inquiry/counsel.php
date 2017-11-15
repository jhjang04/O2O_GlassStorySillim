<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
  if (isset($_GET['id']) && !empty($_GET['id'])) {
  } else {
    //id 없을 경우
    header("Location: index.php");
  }

  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
  $_LEVEL1 = "glasses";
  $_LEVEL2 = "inquiry";
  $_LEVEL3 = "counsel";
  $_TITLE = "안경/도수렌즈";
    
  require_once(ROOT_PATH."/page/common/header.php");

?>
<style media="screen">
</style>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-9">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">안경/도수렌즈 상세 페이지</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <p>&nbsp;<i class="fa fa-info"></i> &nbsp; 기본 정보</p>
                <table class='table table-bordered table-responsive'>
                  <tr>
                    <td><label class="control-label">index</label></td>
                    <td>32</td>
                  </tr>

                  <tr>
                    <td><label class="control-label">브랜드 명</label></td>
                    <td>케미 (국산)</td>
                  </tr>

                  <tr>
                    <td><label class="control-label">제품명</label></td>
                    <td>SF-비스토</td>
                  </tr>

                  <tr>
                    <td><label class="control-label">기본가</label></td>
                    <td>320,000</td>
                  </tr>

                  <tr>
                    <td><label class="control-label">구분</label></td>
                    <td>개인 맞춤 설계</td>
                  </tr>
                </table>
                
                <hr>
                <p>&nbsp;<i class="fa fa-plus"></i> &nbsp; 추가 정보</p>
                청광차단 여부 (+20,000) &nbsp;&nbsp;&nbsp;&nbsp;
                <label class="checkbox-inline"><input type="checkbox" name="can_bluelight">가능</label>

                <br>
                착색 여부 (+20,000) &nbsp;&nbsp;&nbsp;&nbsp;
                <label class="checkbox-inline"><input type="checkbox" name="can_bluelight">가능</label>

                <hr>
                <p>&nbsp;<i class="fa fa-balance-scale"></i> &nbsp; 누진대</p>
                <label class="radio-inline"><input type="radio">10mm</label>
                <label class="radio-inline"><input type="radio" checked>12mm</label>
                <label class="radio-inline"><input type="radio">14mm</label>

                <hr>
                <p>&nbsp;<i class="fa fa-eye"></i> &nbsp; 굴절률</p>
                <label class="radio-inline"><input type="radio" checked>1.50</label>
                <label class="radio-inline"><input type="radio">1.55</label>
                <label class="radio-inline"><input type="radio">1.60</label>
                <label class="radio-inline"><input type="radio">1.67</label>
                <label class="radio-inline"><input type="radio">1.74</label>

              </div>
            </div>
          </div>

          <div class="col-xs-3">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">합계</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <strong>360,000</strong> 원

                <hr>
                <a href="index.php" class="btn btn-default btn-block" role="button">
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
