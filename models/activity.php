  <?php
    class activity {
        public $con ;
        public $pdoo ;
        public function __construct() {
            $this->pdoo = new myPDO();
            $this->con = $this->pdoo ->getConnection(); 
        }
        //新增活動資料
        public function addactivity() {
            if(strtotime($this->startDate) > strtotime($this->endDate)){
                $_SESSION['alert'] = "時間日期錯誤";
                 return false;
            }
            $sql = "INSERT INTO `activity` (`activity_id`,`url`,`name`,`max`,`people`,`bring`,`start`,`end`,`disables`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->activity_idd, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->url_hash, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->name, PDO::PARAM_STR);
            $stmt->bindValue(4, $this->maxx, PDO::PARAM_STR);
            $stmt->bindValue(5, $this->maxx, PDO::PARAM_STR);
            $stmt->bindValue(6, $this->yes, PDO::PARAM_STR);
            $stmt->bindValue(7, $this->startDate, PDO::PARAM_STR);
            $stmt->bindValue(8, $this->endDate, PDO::PARAM_STR);
            $stmt->bindValue(9, $this->lab);
            $data = $stmt->execute();
            $this->pdoo->closeConnection();
            return true;
        }
        //判斷活動編號不能重複
        public function activityid() {
            $sql ="SELECT * FROM `activity` WHERE `activity_id` = ? LIMIT 1";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->activity_idd, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetch(); 
            $this->pdoo->closeConnection();
            //return $rows;
             if($rows > 0) {
                $_SESSION['alert'] = "活動編號重複";
                return true;
            }
        }
        //讀取活動資料
        public function readactivity() {
            $sql ="SELECT * FROM `activity` order by `activity_id`";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $this->pdoo->closeConnection();
            return $data;
        }
        //讀取活動ID
        public function readid() {
            $sql ="SELECT * FROM `activity` WHERE `url` = ? LIMIT 1";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->activity_id, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch();
            $this->pdoo->closeConnection();
            return $data;
        }
        //讀取活動ID
        public function readidd() {
            $sql ="SELECT * FROM `activity` WHERE `activity_id` = ? LIMIT 1";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->activityy_id, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch();
            $this->pdoo->closeConnection();
            return $data;
        }
        //讀取活動ID
        public function getid() {
            $sql ="SELECT * FROM `activity` WHERE `url` = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->activityy_id, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch();
            $this->pdoo->closeConnection();
            return $data;
        }
        //報名活動
         public function insert() {
            $sql = "INSERT INTO `activity_detail` (`employee_id`,`activity_id`,`people`) VALUES (?, ?, ?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->employee_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->activityy_id, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->maxx, PDO::PARAM_STR);
            $data = $stmt->execute();
            $this->pdoo->closeConnection();
            return $data;
        }
        //判斷有沒有此員工編號
        public function check_id() {
            $sql ="SELECT * FROM `employee` WHERE `employee_id` = ? AND `disables` = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->employee_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->lab, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetch();
            $this->pdoo->closeConnection();
            //return $rows;
             if($rows) {
                $_SESSION['alert'] = "報名成功";
                return true;
            }else {
                $_SESSION['alert'] = "資格不符合";
                return false;
            }
        }
        //修改剩餘人數
        public function updatecount($newcount){
        //$sql = "SELECT `people` FROM `activity` WHERE `url`= ? FOR UPDATE ";
        //sleep(5);
        $sql = "UPDATE `activity` SET `people`= ? WHERE `url`= ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(1, $newcount, PDO::PARAM_STR);
        $stmt->bindValue(2, $this->activityy_id, PDO::PARAM_STR);
         $stmt->execute();
        $result = $stmt->fetchAll();
	    $this->pdoo->closeConnection();
	    if($result) {
	        $_SESSION['alert'] = "報名成功";
	        return true;
	        }
        } 
        public function message(){
        $_SESSION['alert'] = "此次報名人數超過報名餘額";
        }
        public function error(){
        $_SESSION['alert'] = "時間還沒開始報名";
        }
        public function errorr(){
        $_SESSION['alert'] = "已結束報名";
        }
        
}