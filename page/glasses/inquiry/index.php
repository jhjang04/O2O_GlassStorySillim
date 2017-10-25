<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
	$_LEVEL1 = "glasses";
  $_LEVEL2 = "inquiry";
	$_TITLE = "안경/도수렌즈";
	
  require_once(ROOT_PATH."/page/common/header.php");
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
                <h3 class="box-title">header</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <label class="checkbox-inline"><input type="checkbox" value="">국산1</label>
								<label class="checkbox-inline"><input type="checkbox" value="">수입1</label>
								<label class="checkbox-inline"><input type="checkbox" value="">수입2</label>
								<br>
								<label class="checkbox-inline"><input type="checkbox" value="">굴절1</label>
								<label class="checkbox-inline"><input type="checkbox" value="">굴절2</label>
								<label class="checkbox-inline"><input type="checkbox" value="">굴절3</label>
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
