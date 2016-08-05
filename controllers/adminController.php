<?php
session_start(); 
require_once "core/Tools.php";
class adminController extends Controller {
    //接收使用者資料
    function setDefaultValue($admin){
        $admin->activity_idd    = isset( $_POST["activity_idd"] ) ? $_POST["activity_idd"] : "" ;
        $admin->name            = isset( $_POST["name"] ) ? $_POST["name"] : "" ;
        $admin->maxx            = isset( $_POST["maxx"] ) ? $_POST["maxx"] : "" ;
        $admin->yes             = isset( $_POST['yes'] ) ? $_POST["yes"] : "" ;
        $admin->startDate       = isset( $_POST['startDate'] ) ? $_POST["startDate"] : "" ;
        $admin->endDate         = isset( $_POST["endDate"] ) ? $_POST["endDate"] : "" ;
        $admin->lab             = isset( $_POST["lab"] ) ? $_POST["lab"] : "" ;
        $admin->employee_id     = isset( $_POST["employee_id"] ) ? $_POST["employee_id"] : "" ;
        $admin->employee_name   = isset( $_POST["employee_name"] ) ? $_POST["employee_name"] : "" ;
        $admin->department      = isset( $_POST["department"] ) ? $_POST["department"] : "" ;
        $admin->activity_id     = isset( $_GET["show_id"] ) ? $_GET["show_id"] : "" ;
        $admin->activityy_id    = isset( $_POST["show_id"] ) ? $_POST["show_id"] : "" ;
    }
    //顯示活動頁面
    function index() {
        $this->view("addactivity");
    }
    //顯示活動參加頁面
    function viewactivity() {
        $this->view("viewactivity");
    }
    //新增活動
    function addactivity() {
        $admin =  $this->model("activity");
        $this->setDefaultValue($admin);
        $admin->url_hash = Tools::getPasswordHash($admin->activity_idd);
        $num = $admin->activityid();
        if($num==0){
            $data = $admin->addactivity();
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
        $admin =  $this->model("employee");
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
        $crud =  $this->model("activity");
        $data = $crud->readactivity();
        $this->view("activity", $data);
    }
     //讀取員工清單
    function reademployee() {
        $crud =  $this->model("employee");
        $data = $crud->reademployee();
        $this->view("employee", $data);
    }
    //讀取活動ID
    function readmodify() {
        $admin =  $this->model("activity");
        $this->setDefaultValue($admin);
        $data = $admin->readid();
        $this->view("viewactivity", $data);
    }
    //報名活動
    function insert() {
        $admin =  $this->model("activity");
        $this->setDefaultValue($admin);
        $admin->maxx = $admin->maxx + 1; //攜伴人數加上自己
        $getid= $admin->getid();
        // var_dump($getid[0]["people"]);
        // exit;
        $num = $admin->check_id();
        if($num > 0) {
            $newcount = $getid[0]["people"] - $admin->maxx;
            if($newcount >= 0) {
            $data= $admin->updatecount($newcount);
            //$data= $admin->insert();
            header("location: readmodify?show_id=$admin->activityy_id");
    		exit;
            }
    	else {
    		header("location: readmodify?show_id=$admin->activityy_id");
    		exit;
    	}
        }
    }   
}