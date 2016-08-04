<!DOCTYPE html>
<html>
    <head>
        <?PHP require_once('header.php'); ?>
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
    </head>
    <body>
    <?php
        require_once 'meun.php';
    ?>
      <div id="wrapper">
      <h1>新增員工資料</h1>
      <form method="post" name="form" action="addemployee">
      <div class="col-2">
        <label>
          員工編號
          <input type="number" placeholder=" 例2016070401" id="employee_id" name="employee_id"  tabindex="1"  autocomplete="off" required>
        </label>
      </div>
      <div class="col-2">
        <label>
          員工名稱
          <input placeholder="employee_name" id="employee_name" name="employee_name" tabindex="2"  autocomplete="off" required>
        </label>
      </div>
       <div class="col-2">
        <label>
          員工部門
           <select name="department" id="department" tabindex="5">
            <option value="技術部門">技術部門</option>
            <option value="人資部門">人資部門</option>
            <option ="企劃部門">企劃部門</option>
          </select>
        </label>
      </div>
      <div class="col-3">
          <label>
          員工級別
          <select name="lab" id="lab" tabindex="5">
            <option value="經理">經理</option>
            <option value="主管">主管</option>
            <option ="一般員工">一般員工</option>
          </select>
          </label>
      </div>
      <div class="col-submit">
        <button class="submitbtn" name="insertstu">新增員工</button>
      </div>
  </form>
  </div>    
   <script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
    var switchery = new Switchery(html);
    });
    </script> 
</body>
</html>