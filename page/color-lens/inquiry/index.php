<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
	$_LEVEL1 = "color-lens";
  $_LEVEL2 = "inquiry";
	$_TITLE = "컬러렌즈";
	
  require_once(ROOT_PATH."/page/common/header.php");
?>
<style media="screen">
/*      .scrollTest{
        white-space:nowrap;
        overflow-x:auto;
      }

      .scrollTestBox{
        width:200px;
        margin:10px;
        display:inline-block
      }

      .ScrollStyle{
        overflow-y:auto;
        overflow-x:hidden;
        height:110px;
      }*/
 </style>

<!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">컬러렌즈 조회</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                <!--컬러렌즈 목록 조회 body-->
                <?php
                global $db_info;

                $dbconnector = new mysqlConnector($db_info);
                $products = $dbconnector->executeRawQuery("SELECT goods.goods_code AS idx, brand.brand_name, company.company_name, gr.group_name, goods.goods_name,gla.availability FROM tblgoods AS goods, tblbrand AS brand, tblcompany AS company, tblgroup AS gr,o2oglassstory AS gla WHERE goods.brand_code = brand.brand_code AND goods.company_code = company.company_code AND goods.group_code = gr.group_code AND goods.goods_code = gla.goods_code");

                //make table
                echo "<table class='table table-striped table-hover table-bordered'>";
                // echo "<thead><tr><th>index</th><th>브랜드명</th><th>회사명</th><th>그룹명</th><th>상품명</th><th>프로그램 사용 여부</th></tr></thead>";
                echo "<tbody>";
                while ($prod = mysqli_fetch_array($products)) {
                  echo "<tr>";
                  echo "<td>{$prod['idx']}</td>";
                  echo "<td>{$prod['brand_name']}</td>";
                  echo "<td>{$prod['company_name']}</td>";
                  echo "<td>{$prod['group_name']}</td>";
                  echo "<td>{$prod['goods_name']}</td>";
                  echo "<td><input id='toggle{$prod['idx']}' type='checkbox'".(($prod['availability']=='0')?'':'checked')." data-toggle='toggle' data-size='small'></td>";  //toggle
                  echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                ?>
              </div>
            </div>
          </div>
        </div>
<!--
        <div class="row" style="margin-bottom: 20px">
          <div class="col-xs-6"><button class="btn btn-primary btn-lg" type="button" name="button" style="width: 100%; height: auto;">매장 주문</button></div>
          <div class="col-xs-6"><button class="btn btn-primary btn-lg" type="button" name="button" style="width: 100%; height: auto;">배달 주문</button></div>
        </div>
-->

      </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->
	
<script type="text/javascript">
$(function() {
  $('input')
    .filter(function() {
      return this.id.match(/toggle[0-9]+/);
    })
    .change(function() {
      // alert($(this).prop('checked'));
      $.ajax({
        url: "update-availability.php",
        type: 'POST',
        data: {
          'id': this.id.slice(6),
          'checked': $(this).prop('checked')
        },
        success: function(data) {
          // console.log("success");
          // console.log(data);
        },
        error: function() {
          // console.log("error");
        }
      });
    });

});
</script>


<?php
  require_once(ROOT_PATH."/page/common/footer.php");
?>
