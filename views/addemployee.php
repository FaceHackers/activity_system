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
    <body onbeforeunload="checkLeave()">
    <?php
        require_once 'meun.php';
    ?>
     <div id="wrapper">
  
  <h1>新增員工資料</h1>
  
  <form method="post" name="form" action="addstu">
  <div class="col-2">
    <label>
     學號
      <input type="number" type="number" min="1" max="9999999999" placeholder=" 例1004060XX" id="course_id" name="student_id"  tabindex="1" maxlength="20" autofocus = "autofocus" autocomplete="off" required>
    </label>
  </div>
  <div class="col-2">
    <label>
     學生姓名
      <input placeholder="student_name" id="course_name" name="student_name" tabindex="2" maxlength="20" autofocus = "autofocus" autocomplete="off" required>
    </label>
  </div>
  
  <div class="col-3">
    <label>
     科系
      <input placeholder="Dept" id="teacher_name" name="Dept" tabindex="3" maxlength="20" autofocus = "autofocus" autocomplete="off" required>
    </label>
  </div>
  <div class="col-3">
    <label>
      性別
      <select name="sex" id="sex" tabindex="5">
        <option value="男">男</option>
        <option ="女">女</option>
        
      </select>
    </label>
  </div>
  
  
  <div class="col-4">
    <label>
     班級
      <input  placeholder="class" id="Credit" name="class" tabindex="6" autofocus = "autofocus" autocomplete="off" maxlength="20" required >
    </label>
  </div>
  <div class="col-4">
    <label>
     密碼
      <input type="password"  placeholder="password" id="Credit" name="Credit" tabindex="6" autofocus = "autofocus" autocomplete="off" maxlength="20" required >
    </label>
  </div>
<div class="col-submit">
    <button class="submitbtn" name="insertstu">確定新增</button>
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