<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
  $_LEVEL1 = "glasses";
  $_LEVEL2 = "inquiry";
  $_TITLE = "안경/도수렌즈";
  
  require_once(ROOT_PATH."/page/common/header.php");

  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  if (isset($_POST['btnsearch'])) {
    //search

  } else if (isset($_POST['btnreset'])) {
    //reset
  }
?>
<style media="screen">
/*fieldset.scheduler-border {
  border: 1px groove #ddd !important;
  padding: 0 1.4em 1.4em 1.4em !important;
  margin: 0 0 1.5em 0 !important;
  -webkit-box-shadow:  0px 0px 0px 0px #000;
  box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
  font-size: 1.2em !important;
  font-weight: bold !important;
  text-align: left !important;
  width:auto;
  padding:0 10px;
  border-bottom:none;
}*/
</style>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">검색 옵션 설정</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <form method="post">
                  국산/수입&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" value="">국산1(케미)</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">수입1(니덱)</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">수입2(호야)</label>

                  <br>
                  굴절률&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" value="">1.50</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">1.55</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">1.60</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">1.67</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">1.74</label>

                  <br>
                  가격대&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" value="">&lt;15</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">15~25</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">25~35</label>
                  <label class="checkbox-inline"><input type="checkbox" value="">&gt;35</label>

                  <br>
                  변색 가능 여부&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" value="">가능</label>

                  <br>
                  청광차당 가능 여부&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" value="">가능</label>

                  <hr>
                  <button type="submit" name="btnsearch" class="btn btn-primary" >
                    <i class="fa fa-search"></i> &nbsp; 검색
                  </button>
                  &nbsp;
                  <button type="submit" name="btnreset" class="btn btn-default" >
                    <i class="fa fa-refresh"></i> &nbsp; 검색 옵션 초기화
                  </button>
                </form>
              </div>
            </div>

            <div class="box box-primary" id="resultbox" <?php if(0){echo "hidden";} ?>>
              <div class="box-header with-border">
                <h3 class="box-title">안경/도수렌즈 검색 결과</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                검색결과
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
