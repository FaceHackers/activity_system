<!DOCTYPE html>
<html>
    <head>
    <?PHP require_once('header.php'); ?>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script language="javascript" type="text/javascript">
        function my_key_down(e){
            var key;
            //console.warn(e.keyCode);
            //console.warn(e.which);
            if(window.event) {
                key = e.keyCode;
            }else if(e.which) {
                key = e.which;
            } else {
                return true;
            }
            //console.log(key);
            if( (key>=48 && key<=57)
                || (key>=96 && key<=105) //數字鍵盤
                || 8==key || 46==key || 37==key || 39==key //8:backspace 46:delete 37:左 39:右 (倒退鍵、刪除鍵、左、右鍵也允許作用)
                ){
                return true;
            }else{
                return false;
            }
        }
        //console.log(String.fromCharCode(229));
        //console.log(String.fromCharCode(0));
    </script>
    <script>
      //set the default value
      var txtId = 1;
      
      //add input block in showBlock
      $("#btn").click(function () {
          $("#showBlock").append('<div id="div' + txtId + '">Input:<input type="text" name="test[]" /> <input type="button" value="del" onclick="deltxt('+txtId+')"></div>');
          txtId++;
      });
      //remove div
      function deltxt(id) {
          $("#div"+id).remove();
      }
</script> 
    </head>
    <body>
    <?php
        require_once 'meun.php';
    ?>
    <div id="wrapper">
  
    <h1>新增活動資料</h1>
  
    <form method="post" name="form" action="addactivity">
    <div class="col-2">
        <label>
             活動名稱
             <input type="text" placeholder=" 例PHP社團聚餐" id="name" name="name"  tabindex="1" autocomplete="off"  required>
        </label>
     </div>
    <div class="col-2">
        <label>
              可參加人數
              <input type="number" placeholder="數量" id="max" name="maxx" tabindex="2" autocomplete="off" required requiredonkeyup="this.value=this.value.replace(/[^\d]/g,'')" onkeydown="this.value=this.value.replace(/[^\d]/g,'')" onkeypress="return my_key_down(event)">
        </label>
    </div>
    <div class="col-3">
        <label>
              是否攜伴
              <select name="yes" id="yes" tabindex="5">
                 <option value="是">是</option>
                 <option ="否">否</option>
              </select>
        </label>
    </div>
    <div class="col-3">
        <label>
             開始日期
             <input type="date" name="startDate"  required/>
        </label>
    </div>
     <div class="col-3">
        <label>
             結束日期
             <input type="date" name="endDate"  required/>
        </label>
    </div>
    <div class="col-4">
        <label>
             可參加員工
             <select name="lab" id="sex" tabindex="5">
                 <option value="主管">全公司</option>
                 <option value="主管">經理</option>
                 <option value="主管">主管</option>
                 <option value="一般員工">一般員工</option>
             </select>
        </label>
    </div>
    
    <div class="col-submit">
        <button class="submitbtn" name="insert">新增活動</button>
    </div>
  <div class="col-4">
    
    </div>
  </form>
  <!-- add new item Dynamically in the show block -->
    <div id="showBlock"></div>
    <!-- click the button to add new item -->
    <input type="button" class="submitbtn" id="btn" value="addItem" />
  </div>    
  <script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
    var switchery = new Switchery(html);
    });
  </script> 
</body>
</html>