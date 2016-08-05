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
    <?php $row = $data;?>
    
     <div id="wrapper">
     <h1>活動細節</h1>
  
   <form method="post" name="form" action="insert">
    <div class="col-3">
        <label>
             活動名稱
             <input type="text" placeholder=" 例PHP社團聚餐" id="name" name="name"  tabindex="1" autocomplete="off" value="<?=htmlspecialchars($row['name']) ?>" readonly  required>
        </label>
     </div>
    <div class="col-3">
        <label>
              可參加人數
              <input type="number" placeholder="數量" id="max" name="maxx" tabindex="2" autocomplete="off" value="<?=htmlspecialchars($row['max']) ?>" readonly required requiredonkeyup="this.value=this.value.replace(/[^\d]/g,'')" onkeydown="this.value=this.value.replace(/[^\d]/g,'')" onkeypress="return my_key_down(event)">
        </label>
    </div>
    <div class="col-3">
        <label>
              剩餘人數
              <input type="number"  id="max" name="maxx" tabindex="2" autocomplete="off" value="<?=htmlspecialchars($row['people']) ?>" readonly required requiredonkeyup="this.value=this.value.replace(/[^\d]/g,'')" onkeydown="this.value=this.value.replace(/[^\d]/g,'')" onkeypress="return my_key_down(event)">
        </label>
    </div>
    <div class="col-3">
        <label>
              是否攜伴
              <input type="text" name="bring" value="<?=htmlspecialchars($row['bring']) ?>" readonly/>
        </label>
    </div>
    <div class="col-3">
        <label>
             開始日期
             <input type="date" name="startDate"  value="<?=htmlspecialchars($row['start']) ?>" readonly required/>
        </label>
    </div>
     <div class="col-3">
        <label>
             結束日期
             <input type="date" name="endDate" value="<?=htmlspecialchars($row['end']) ?>" readonly required/>
        </label>
    </div>
    <div class="col-3">
        <label>
             可參加員工
             <input type="text" name="lab" value="<?=htmlspecialchars($row['disables']) ?>" readonly/>
        </label>
    </div>
    <br>
    <div class="col-1">
        <label>
             <h2>活動報名填寫資料</h2>
        </label>
    </div>
    <br>
    <div class="col-2">
        <label>
             員工編號
             <input type="text" placeholder="例2016070401" id="name" name="employee_id"  tabindex="1" autocomplete="off" value=""  required>
        </label>
    </div>
    <div class="col-2">
        <label>
            <?php if($row['bring']=='是') { ?>
             攜伴人數
             <input type="number" placeholder="數量" id="max" name="maxx" tabindex="2" autocomplete="off" required requiredonkeyup="this.value=this.value.replace(/[^\d]/g,'')" onkeydown="this.value=this.value.replace(/[^\d]/g,'')" onkeypress="return my_key_down(event)">
            <?php }
                else {
                    echo "此活動無法攜伴參加";
                }
            ?>
        </label>
    </div>
  <div class="col-submit">
      <input type="hidden" name="show_id" value="<?php echo $_GET['show_id'] ?>">
      <button class="submitbtn" type="submit" name="update">報名</button>
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
