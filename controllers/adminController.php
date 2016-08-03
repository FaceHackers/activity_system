<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class adminController extends Controller {
    //接收使用者資料
    function setDefaultValue($admin){
        $admin->name            = isset( $_POST["name"] ) ? $_POST["name"] : "" ;
        $admin->maxx            = isset( $_POST["maxx"] ) ? $_POST["maxx"] : "" ;
        $admin->yes             = isset( $_POST['yes'] ) ? $_POST["yes"] : "" ;
        $admin->startDate       = isset( $_POST['startDate'] ) ? $_POST["startDate"] : "" ;
        $admin->endDate         = isset( $_POST["endDate"] ) ? $_POST["endDate"] : "" ;
        $admin->lab             = isset( $_POST["lab"] ) ? $_POST["lab"] : "" ;
        $admin->employee_id     = isset( $_POST["employee_id"] ) ? $_POST["employee_id"] : "" ;
        $admin->employee_name   = isset( $_POST["employee_name"] ) ? $_POST["employee_name"] : "" ;
        $admin->department      = isset( $_POST["department"] ) ? $_POST["department"] : "" ;
    }
    //顯示活動頁面
    function index() {
        $this->view("addactivity");
    }
    //新增活動
    function addactivity() {
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
        $data = $admin->addactivity();
        if($data){
            $this->readactivity();
        }else{
            $this->index();
        }
    }
    //顯示員工頁面
    function viewemployee() {
        $this->view("addemployee"); 
    }
    //新增員工
    function addemployee() {
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
        $num = $admin->checkid();
        if(isset($_POST['employee_id'])) {
            if($num==0) {
                $data= $admin->addemployee();
                $this->reademployee();
                exit;
        	}
    		else {
                $this->view("addemployee");
    		}
        }
    }
    //讀取活動清單
    function readactivity() {
        $crud =  $this->model("admincurd");
        $data = $crud->readactivity();
        $this->view("activity", $data);
    }
     //讀取員工清單
    function reademployee() {
        $crud =  $this->model("admincurd");
        $data = $crud->reademployee();
        $this->view("employee", $data);
    }
}