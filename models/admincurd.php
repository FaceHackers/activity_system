  <?php
    class admincurd {
        public function __construct() {
            
        }
        //新增活動資料
        public function addactivity() {
            if(strtotime($this->startDate) > strtotime($this->endDate)){
                $_SESSION['alert'] = "時間日期錯誤";
                 return false;
            }
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $sql = "INSERT INTO `activity` (`name`,`max`,`bring`,`start`,`end`,`disables`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $this->name, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->maxx, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->yes, PDO::PARAM_STR);
            $stmt->bindValue(4, $this->startDate, PDO::PARAM_STR);
            $stmt->bindValue(5, $this->endDate, PDO::PARAM_STR);
            $stmt->bindValue(6, $this->lab);
            $data = $stmt->execute();
            $PDO->closeConnection();
            return true;
        }
        //讀取活動資料
        public function readactivity() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `activity` order by `activity_id`");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $PDO->closeConnection();
            return $data;
        }
        //判斷員工編號不能重複
        public function checkid() {
		    $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `employee` WHERE `employee_id` = ? LIMIT 1");
            $stmt->bindValue(1, $this->employee_id, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetch(); 
            $PDO->closeConnection();
            //return $rows;
             if($rows > 0) {
                $_SESSION['alert'] = "員工編號重複";
                return true;
            }
        }
        //新增員工資料
        public function addemployee(){
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $sql = "INSERT INTO `employee` (`employee_id`,`name`,`department`,`disables`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $this->employee_id, PDO::PARAM_STR);
            $stmt->bindValue(2, $this->employee_name, PDO::PARAM_STR);
            $stmt->bindValue(3, $this->department, PDO::PARAM_STR);
            $stmt->bindValue(4, $this->lab, PDO::PARAM_STR);
            $data = $stmt->execute();
            $PDO->closeConnection();
            return $data;
        }
        //讀取員工資料
        public function reademployee() {
            $PDO = new myPDO();
            $conn = $PDO->getConnection();
            $stmt = $conn->prepare("SELECT * FROM `employee` order by `id`");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $PDO->closeConnection();
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