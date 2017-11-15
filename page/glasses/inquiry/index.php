<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
  $_LEVEL1 = "glasses";
  $_LEVEL2 = "inquiry";
  $_TITLE = "안경/도수렌즈";
  
  require_once(ROOT_PATH."/page/common/header.php");

  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  if (isset($_POST['btnsearch'])) {
    //search

  } else if (isset($_POST['btnreset'])) {
    //reset
  }
?>
<style media="screen">

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
                <form method="post" id="searchform">
                  <!-- name=brand{$id} -->
                  국산/수입&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" name="brand1">케미(국산)</label>
                  <label class="checkbox-inline"><input type="checkbox" name="brand2">니덱(수입)</label>
                  <label class="checkbox-inline"><input type="checkbox" name="brand3">호야(수입)</label>

                  <br>
                  굴절률&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" name="ref1.50">1.50</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ref1.55">1.55</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ref1.60">1.60</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ref1.67">1.67</label>
                  <label class="checkbox-inline"><input type="checkbox" name="ref1.74">1.74</label>

                  <br>
                  가격대&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" name="price_below_15">&lt;15만 원</label>
                  <label class="checkbox-inline"><input type="checkbox" name="price_between_15_25">15~25만 원</label>
                  <label class="checkbox-inline"><input type="checkbox" name="price_between_25_35">25~35만 원</label>
                  <label class="checkbox-inline"><input type="checkbox" name="price_over_35">&gt;35</label>

                  <br>
                  변색 가능 여부&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" name="can_photochromic">가능</label>

                  <br>
                  청광차단 가능 여부&nbsp;&nbsp;&nbsp;&nbsp;
                  <label class="checkbox-inline"><input type="checkbox" name="can_bluelight">가능</label>

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

            <div class="box box-primary" id="resultbox" <?php if(!isset($_POST['btnsearch'])){echo "hidden";} ?>>
              <div class="box-header with-border">
                <h3 class="box-title">안경/도수렌즈 검색 결과</h3>
              </div> <!-- /.box-header -->
              <div class="box-body">
                검색 결과
                <!-- TODO: MOCKUP -->
                <table class='table table-striped table-hover table-bordered'>
                  <thead>
                    <th>index</th>
                    <th>이름</th>
                    <th>브랜드</th>
                    <th>기본 가격</th>
                    <th>변색 가능</th>
                    <th>청광차단 가능</th>
                    <th>상세 보기</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>SF-비스토</td>
                      <td>니덱</td>
                      <td>230,000</td>
                      <td>X</td>
                      <td>O</td>
                      <td><a href="counsel.php?id=1">상세 보기</a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>SF-Profit</td>
                      <td>니덱</td>
                      <td>370,000</td>
                      <td>O</td>
                      <td>O</td>
                      <td><a href="counsel.php?id=2">상세 보기</a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>NF-캐리어 (와이드형)</td>
                      <td>니덱</td>
                      <td>250,000</td>
                      <td>O</td>
                      <td>O</td>
                      <td><a href="counsel.php?id=3">상세 보기</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->
  
<script type="text/javascript">
$(function() {
//$('#searchform')[0].reset();
</script>


<?php
  require_once(ROOT_PATH."/page/common/footer.php");
?>
