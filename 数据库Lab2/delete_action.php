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
    // 检查输入值是否存在于学生表
    $check_stu_id="SELECT s5_student.stu_id
        FROM s5_student
        WHERE s5_student.stu_id = '$stu_id'";
    $stuid_res = mysqli_query($conn,$check_stu_id);
    if ($stuid_res->num_rows==0){
        // 待删除学生不存在
        header("location:delete.php?err=1");
    }
    else {
        // 删除学生以及以学生id作为外键的score中数据
        $delscore="DELETE FROM t0_score WHERE stu_id='$stu_id';";
        $del_stu ="DELETE FROM s5_student WHERE stu_id='$stu_id'";
        if ($conn->query($delscore) === TRUE && $conn->query($del_stu) === TRUE){
            // 删除成功
            header("location:delete.php?err=0");
        }else
        {
            // 发生额外错误
            header("location:delete.php?err=2");
        }   


    }
?>