<?php
  require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
	$_LEVEL1 = "color-lens";
  $_LEVEL2 = "inquiry";
	$_TITLE = "컬러렌즈";
	
  require_once(ROOT_PATH."/page/common/header.php");
  // require_once(ROOT_PATH."/core/db/mysqlConnector.php");
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
                $db_info = array(
                  'type' => 'MYSQL',
                  'host' => 'localhost',
                  'port' => 3306,
                  'user_nm' => 'root',
                  'pwd' => null,
                  'db_name' => 'o2o_glass_story'
                );

                # db connector 오류 있음
                $conn = mysqli_connect($db_info['host'].':3306', $db_info['user_nm'], $db_info['pwd'], $db_info['db_name']);
                // echo "<pre>";
                // var_dump($conn);
                // echo "</pre>";

                // 한글 깨짐
                // --> http://luckyyowu.tistory.com/279 참고
                mysqli_query($conn, "SET NAMES utf8");
                mysqli_query($conn, "SET SESSION character_set_connection=utf8");
                mysqli_query($conn, "SET SESSION character_set_results=utf8");
                mysqli_query($conn, "SET SESSION character_set_client=utf8");

                // select
                $products = mysqli_query($conn, "SELECT goods.Goods_Code AS idx, brand.Brand_Name, company.Company_Name, gr.Group_Name, goods.Goods_Name FROM tblgoods AS goods, tblbrand AS brand, tblcompany AS company, tblgroup AS gr WHERE goods.Brand_Code = brand.Brand_Code AND goods.Company_Code = company.Company_Code AND goods.Group_Code = gr.Group_Code");

                //make table
                echo "<table class='table table-striped table-hover table-condensed'>";
                echo "<thead><tr><th>index</th><th>브랜드명</th><th>회사명</th><th>그룹명</th><th>상품명</th></tr></thead>";
                echo "<tbody>";
                while ($prod = mysqli_fetch_array($products)) {
                  echo "<tr>";
                  echo "<td>{$prod['idx']}</td>";
                  echo "<td>{$prod['Brand_Name']}</td>";
                  echo "<td>{$prod['Company_Name']}</td>";
                  echo "<td>{$prod['Group_Name']}</td>";
                  echo "<td>{$prod['Goods_Name']}</td>";
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
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<script type="text/javascript">

</script>

	
	
<?php
  require_once(ROOT_PATH."/page/common/footer.php");
?>
