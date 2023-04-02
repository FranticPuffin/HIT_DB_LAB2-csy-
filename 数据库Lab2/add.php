<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增数据界面</title>
    <link rel="stylesheet" href="./add.css">
</head>
<body>
    <h1>欢迎使用学生成绩管理系统</h1>
    <hr>
    <button onclick="javascript:window.location.href='./home.html'" >
        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
        <span>Back</span>
    </button>
    
    <div class ="add_form">
        <h2>
            请输入添加学生信息
            <hr>
        </h2>
        <form action="add_action.php" method="post">
            <!-- 收集添加表单信息 -->
            <p>请输入学生学号:
                <input type="text" id="stu_id" name="stu_id" placeholder="请输入学生ID" >
            </p>
            <p>请输入学生姓名:
            <input type="text" id="stu_name" name="stu_name" placeholder="请输入学生姓名" >
            </p>
            <p>
                请输入学生班级:
            <input type="text" id="class_id" name="class_id" placeholder="请输入学生班级" >
            </p>
            <p>请输入学生寝室:
            <input type="text" id="dorm_id" name="dorm_id" placeholder="请输入学生寝室" >
            </p>
            请选择学生年级:
            <select name="grade">
                <option value="1" selected>大一</option>
                <option value="2">大二</option>
                <option value="3" >大三</option>
                <option value="4">大四</option>
            </select>
            <p>请选择学生性别：
                <input type="radio" name="gender" value="男" checked>男
                <input type="radio" name="gender" value="女">女
            </p>
            <input type="submit" class="btn" value="确认添加">
        </form>
    </div>

    <?php
            $err = isset($_GET["err"]) ? $_GET["err"] : "";
            switch ($err) {
                case '':
                    break;
                case 0:
                    // 无异常
                    echo "<script>alert('已成功添加');</script>";
                    break;
                case 1:
                    // 表格空值
                    echo "<script>alert('您输入的数据存在非法空值!');</script>";
                    break;
                case 2:
                    // 输入长度过长
                    echo "<script>alert('您输入的数据长度过长(len<10)!');</script>";
                    break;
                case 3:
                    echo "<script>alert('您输入的寝室号或班级号不存在于已存在的班级或寝室（外键约束）！');</script>";
                    break;
                case 4:
                    echo "<script>alert('您输入的学号重复（主键约束）');</script>";
                    break;
                case 5:
                    echo "<script>alert('发生不知名错误，插入失败');</script>";
                    break;
            }
                
     ?>
</body>
</html>