<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class adminController extends Controller {
    //接收使用者資料
    function setDefaultValue($admin){
        $admin->name     = isset( $_POST["name"] ) ? $_POST["name"] : "" ;
        $admin->maxx     = isset( $_POST["maxx"] ) ? $_POST["maxx"] : "" ;
        $admin->yes      = isset( $_POST['yes'] ) ? $_POST["yes"] : "" ;
        $admin->startDate= isset( $_POST['startDate'] ) ? $_POST["startDate"] : "" ;
        $admin->endDate  = isset( $_POST["endDate"] ) ? $_POST["endDate"] : "" ;
        $admin->lab      = isset( $_POST["lab"] ) ? $_POST["lab"] : "" ;
    }
    function setstutValue($student){
        $student->student_id    = isset( $_POST["student_id"] ) ? $_POST["student_id"] : "" ;
        $student->student_name  = isset( $_POST["student_name"] ) ? $_POST["student_name"] : "" ;
        $student->Dept          = isset( $_POST['Dept'] ) ? $_POST["Dept"] : "" ;
        $student->sex           = isset( $_POST["sex"] ) ? $_POST["sex"] : "" ;
        $student->classs        = isset( $_POST["class"] ) ? $_POST["class"] : "" ;
        $student->password      = isset( $_POST["password"] ) ? $_POST["password"] : "" ;
    }
    function index() {
      $this->view("addactivity");
    }
    //新增活動
    function addactivity() {
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
        $data= $admin->addactivity();
        $this->view("addactivity");
    }
    //新增員工
    function addemployee() {
        $this->view("addemployee"); 
    }
    //讀取活動清單
    function readactivity() {
        $crud =  $this->model("admincurd");
        $data = $crud->readactivity();
        $this->view("activity", $data);
    }
    //修改課程資料
    function update() {
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
        $data= $admin->update();
        $this->readcourse();     
    }
    //讀取課程ID
    function readmodify() {
        $admin =  $this->model("admincurd");
        $this->setDefaultValue($admin);
        $data = $admin->readid();
        $this->view("editcourse", $data);
    }
   
}