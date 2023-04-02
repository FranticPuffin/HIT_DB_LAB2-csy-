<?php 
    $servername = "localhost";
    $username = "root";
    $password = "wwd20020906";
    $dbname = "student_score_management_system";
    // 创建连接
    $conn = new mysqli($servername, $username, $password,$dbname);
    // 检测连接
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
    // 接受表单数据
    $stu_id=isset($_POST['stu_id']) ? $_POST['stu_id'] : '';
    $stu_name=isset($_POST['stu_name']) ? $_POST['stu_name'] : '';
    $class_id=isset($_POST['class_id']) ? $_POST['class_id'] : '';
    $dorm_id=isset($_POST['dorm_id']) ? $_POST['dorm_id'] : '';
    $grade=isset($_POST['grade']) ? $_POST['grade'] : "";
    $gender=isset($_POST['gender']) ? $_POST['gender'] : "";
    // 检查非空约束
    if($stu_id=='' || $stu_name=='' || $class_id=='' || $dorm_id==''){
        // 存在输入数据为空值
        header("location:add.php?err=1");
    }
    else if(strlen($stu_id)>10 || strlen($stu_name)>20 ||strlen($class_id)>10 ||strlen($dorm_id)>10 ){
        // 输入数据超出规定范围
        header("location:add.php?err=2");
    }
    else{
            
        // 初始数据检查通过，检查数据库对比信息
        $check_class="SELECT    s3_class.class_id
        FROM    s3_class
        WHERE   s3_class.class_id = '$class_id'";
        $check_dorm="SELECT s6_dormitory.dorm_id
        FROM    s6_dormitory
        WHERE   s6_dormitory.dorm_id = '$dorm_id'";
        // 主键约束
        $check_stu_id="SELECT s5_student.stu_id
        FROM s5_student
        WHERE s5_student.stu_id = '$stu_id'";

        $result = mysqli_query($conn,$check_class);
        $dorm_res = mysqli_query($conn,$check_dorm);
        $stuid_res = mysqli_query($conn,$check_stu_id);
        if ($result->num_rows==0||$dorm_res->num_rows==0){
            // 插入学生数据的班级或宿舍号不存在（外键）
            header("location:add.php?err=3");
        }
        else if ($stuid_res->num_rows>0){
            // 已经存在相同id
            header("location:add.php?err=4");
        }
        // 事实上将上述判断都去除直接执行插入代码也可以，因为在我建表的时候已经定义了约束
        else{
            $insert="INSERT INTO s5_student (stu_id,stu_name,grade,gender,class_id,dorm_id)
            VALUES ('$stu_id','$stu_name','$grade','$gender','$class_id','$dorm_id');
            ";
            if ($conn->query($insert) === TRUE ){
                // 插入成功
                header("location:add.php?err=0");
            }else
            {
                // 发生额外错误
                header("location:add.php?err=5");
            }   
        }   
    }        
?>