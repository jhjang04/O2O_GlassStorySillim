<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
	$_LEVEL1 = "sales";
  $_LEVEL2 = "inquiry";
	$_TITLE = "매출 조회";
	
  require_once(ROOT_PATH."/page/common/header.php");
?>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">매출 차트</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">

              </div>
            </div>
          </div>
        </div>
      </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

</script>


<?php
  require_once(ROOT_PATH."/page/common/footer.php");
?>
