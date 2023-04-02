<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./select.css">
    <title>查询系统</title>
</head>
<body>
<h1>欢迎使用学生成绩管理系统</h1>
    <hr>
	<button onclick="javascript:window.location.href='./home.html'" >
        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
        <span>Back</span>
    </button>
<div class="tab_Content">
			<input type="radio" class="hide" name="tab_list" id="tab_list1" checked />
			<input type="radio" class="hide" name="tab_list" id="tab_list2" />
			<input type="radio" class="hide" name="tab_list" id="tab_list3" />
			<input type="radio" class="hide" name="tab_list" id="tab_list4" />
			<label for="tab_list1">单表查询</label>
			<label for="tab_list2">嵌套查询</label>
			<label for="tab_list3">分组查询</label>
			<label for="tab_list4">连接查询</label>
			<ul>
				<li>
					<!-- 测试查询 -->
					<!-- 查询前 -->
					<h2 id="h2_0" class="show" >查询总学生名单</h2>
					<input type="button" value="点击查询" class="btn show" id="ask0" onclick="sendsql(0)">

					<!-- 查询后 -->
					<input type="button" value="返回" class="btn hide" id="ret0" onclick="change(0)">
					<div id="form0"  class="hide">
					</div>

				</li>
				<li>
					<!-- 嵌套查询 -->
					<!-- 查询前 -->
					<h2 id="h2_1" class="show">查询课程分数高于x</h2>
					<form id="ask1" class='show'>
						<div>
							课程id:
							<input type="text" id="course1" placeholder="请输入课程id"><br>
						</div>
						<div>
							查询分数：
							<input type="text" id="grade1" placeholder="请输入查询分数"><br>
						</div>
						<div>
							<input type="button" value="点击查询" class="btn" onclick="sendsql(1)">
						</div>
					</form>
					<!-- 查询后 -->
					<input type="button" value="返回" class="btn hide" id="ret1" onclick="change(1)">
					<div id="form1" class="hide">
					</div>
				</li>
				<li>
					<!-- 分组查询 -->
					<!-- 查询前 -->
					<h2 id="h2_2" class="show">查询每门课程分数高于x的人数</h2>
					<form id="ask2" class='show'>
						<div>
							查询分数：
							<input type="text" id="grade2" placeholder="请输入查询分数"><br>
						</div>
						<div>
							<input type="button" value="点击查询" class="btn" onclick="sendsql(2)">
						</div>
					</form>
					<!-- 查询后 -->
					<input type="button" value="返回" class="btn hide" id="ret2" onclick="change(2)">
					<div id="form2" class="hide">
					</div>
				</li>
				<li>	
					<!-- 连接查询 -->
					<!-- 查询前 -->
					<h2 id="h2_3" class="show">学号x所参加考试的分数以及对应授课教师</h2>
					<form id="ask3" class='show'>
						<div>
							查询学号：
							<input type="text" id="stuid3" placeholder="请输入查询学号"><br>
						</div>
						<div>
							<input type="button" value="点击查询" class="btn" onclick="sendsql(3)">
						</div>
					</form>
					<!-- 查询后 -->
					<input type="button" value="返回" class="btn hide" id="ret3" onclick="change(3)">
					<div id="form3" class="hide">
					</div>
				</li>
			</ul>
		</div>
		<script>
			function change(option){
				switch (option){
					// 返回查询
					case 0:
						var bef00 = document.getElementById("h2_0");
						var aft00 = document.getElementById("form0");
						var bef01 = document.getElementById("ask0");
						var aft01 = document.getElementById("ret0");
						bef00.classList.remove("hide");
						bef00.classList.add("show");
						bef01.classList.remove("hide");
						bef01.classList.add("show");
						aft00.classList.remove("show");
						aft00.classList.add("hide");
						aft01.classList.remove("show");
						aft01.classList.add("hide");
					case 1:
						var bef10 = document.getElementById("h2_1");
						var aft10 = document.getElementById("form1");
						var bef11 = document.getElementById("ask1");
						var aft11 = document.getElementById("ret1");
						bef10.classList.remove("hide");
						bef10.classList.add("show");
						bef11.classList.remove("hide");
						bef11.classList.add("show");
						aft10.classList.remove("show");
						aft10.classList.add("hide");
						aft11.classList.remove("show");
						aft11.classList.add("hide");
					case 2:
						var bef20 = document.getElementById("h2_2");
						var aft20 = document.getElementById("form2");
						var bef21 = document.getElementById("ask2");
						var aft21 = document.getElementById("ret2");
						bef20.classList.remove("hide");
						bef20.classList.add("show");
						bef21.classList.remove("hide");
						bef21.classList.add("show");
						aft20.classList.remove("show");
						aft20.classList.add("hide");
						aft21.classList.remove("show");
						aft21.classList.add("hide");
					case 3:
						var bef30 = document.getElementById("h2_3");
						var aft30 = document.getElementById("form3");
						var bef31 = document.getElementById("ask3");
						var aft31 = document.getElementById("ret3");
						bef30.classList.remove("hide");
						bef30.classList.add("show");
						bef31.classList.remove("hide");
						bef31.classList.add("show");
						aft30.classList.remove("show");
						aft30.classList.add("hide");
						aft31.classList.remove("show");
						aft31.classList.add("hide");
				}
			}
			function sendsql(option){
				switch (option){
					case 0:
						var sql = "select `s5_student`.`stu_id` AS `stu_id`,`s5_student`.`stu_name` AS `stu_name` from `s5_student`";
						show_data(sql,0);
						if(document.getElementById("form0").innerHTML.trim() !==''){
							var bef00 = document.getElementById("h2_0");
							var aft00 = document.getElementById("form0");
							var bef01 = document.getElementById("ask0");
							var aft01 = document.getElementById("ret0");
							bef00.classList.remove("show");
							bef00.classList.add("hide");
							bef01.classList.remove("show");
							bef01.classList.add("hide");
							aft00.classList.remove("hide");
							aft00.classList.add("show");
							aft01.classList.remove("hide");
							aft01.classList.add("show");
						}
						break;
					case 1:
						var course1 = document.getElementById("course1").value;
						var grade1 = document.getElementById("grade1").value;
						var sql ="SELECT s5_student.stu_name, s5_student.stu_id, score.grade FROM score , s5_student WHERE s5_student.stu_id IN (SELECT t0_score.stu_id FROM t0_score WHERE t0_score.grade > "+grade1+" AND t0_score.course_id = '"+course1+"') AND score.stu_id = s5_student.stu_id ";
						show_data(sql,1);
						if(document.getElementById("form1").innerHTML.trim() !==''){
							var bef10 = document.getElementById("h2_1");
							var aft10 = document.getElementById("form1");
							var bef11 = document.getElementById("ask1");
							var aft11 = document.getElementById("ret1");
							bef10.classList.remove("show");
							bef10.classList.add("hide");
							bef11.classList.remove("show");
							bef11.classList.add("hide");
							aft10.classList.remove("hide");
							aft10.classList.add("show");
							aft11.classList.remove("hide");
							aft11.classList.add("show");
						}
						break;
					case 2:
						var grade2 = document.getElementById("grade2").value;
						var sql = "SELECT s7_course.cou_name, Count(t0_score.stu_id) FROM t0_score ,s7_course WHERE t0_score.course_id = s7_course.course_id AND t0_score.grade > '"+grade2+"' GROUP BY t0_score.course_id";
						show_data(sql,2);
						if(document.getElementById("form2").innerHTML.trim() !==''){
							var bef20 = document.getElementById("h2_2");
							var aft20 = document.getElementById("form2");
							var bef21 = document.getElementById("ask2");
							var aft21 = document.getElementById("ret2");
							bef20.classList.remove("show");
							bef20.classList.add("hide");
							bef21.classList.remove("show");
							bef21.classList.add("hide");
							aft20.classList.remove("hide");
							aft20.classList.add("show");
							aft21.classList.remove("hide");
							aft21.classList.add("show");
						}
						break;
					case 3:
						var stuid = document.getElementById("stuid3").value;
						var sql = "SELECT s5_student.stu_name, s7_course.cou_name, t0_score.grade, s4_teacher.teacher_name FROM s5_student , t0_score , s7_course , t2_teach , s4_teacher WHERE s5_student.stu_id = t0_score.stu_id AND t0_score.course_id = t2_teach.course_id AND t2_teach.teacher_id = s4_teacher.teacher_id AND t0_score.course_id = s7_course.course_id AND s5_student.stu_id = '"+stuid+"'";
						show_data(sql,3);
						if(document.getElementById("form3").innerHTML.trim() !==''){
							var bef30 = document.getElementById("h2_3");
							var aft30 = document.getElementById("form3");
							var bef31 = document.getElementById("ask3");
							var aft31 = document.getElementById("ret3");
							bef30.classList.remove("show");
							bef30.classList.add("hide");
							bef31.classList.remove("show");
							bef31.classList.add("hide");
							aft30.classList.remove("hide");
							aft30.classList.add("show");
							aft31.classList.remove("hide");
							aft31.classList.add("show");
						}
						break;
				}
			}
			function show_data(sql,option){
				if (window.XMLHttpRequest)
				{
					// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
					xmlhttp=new XMLHttpRequest();
				}
				else
				{
					// IE6, IE5 浏览器执行代码
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("form"+option).innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","select_action.php?q="+sql,true);
    			xmlhttp.send();
			}
		</script>
</body>
</html>