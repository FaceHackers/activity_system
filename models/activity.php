  <?php
    class activity {
        var $con ;
        public function __construct() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection(); 
            $this->con = $conn;
        }
        //新增活動資料
        public function addactivity() {
            if(strtotime($this->startDate) > strtotime($this->endDate)){
                $_SESSION['alert'] = "時間日期錯誤";
                 return false;
            }
            $sql = "INSERT INTO `activity` (`name`,`max`,`bring`,`start`,`end`,`disables`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $this->name, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->maxx, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->yes, PDO::PARAM_STR);
            $stmt->bindValue(4, $this->startDate, PDO::PARAM_STR);
            $stmt->bindValue(5, $this->endDate, PDO::PARAM_STR);
            $stmt->bindValue(6, $this->lab);
            $data = $stmt->execute();
            return true;
        }
        //讀取活動資料
        public function readactivity() {
            $sql ="SELECT * FROM `activity` order by `activity_id`";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        }
        //讀取活動ID
        public function readid() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `activity` WHERE `activity_id` = ? LIMIT 1");
            $stmt->bindValue(1, $this->activity_id, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch();
            $PDO->closeConnection();
            return $data;
        }
    }