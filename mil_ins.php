<html>
<head>
	<title>데이터입력</title>
	<meta charset=utf-8" />
</head>
<body>
<?php
//스크립트 종료할때까지
set_time_limit(0);

//데이터 베이스 연결하기
$board = "ci_board";
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "ci_book");

//mysqli_query($conn, "set session character_set_connection=utf8;");

//mysqli_query($conn, "set session character_set_results=utf8;");

//mysqli_query($conn, "set session character_set_client=utf8;");

// 글 등록에 대한 기본적인 정보
$userid = "hong";
$name = "홍길동";

if (ob_get_level() == 0) ob_start();

for ($i=1;$i<=100;$i++)
{
	$subject = "$i 번째 테스트 게시물";
	$contents = "$i 번째 테스트 게시물 내용";

	$query = "INSERT INTO $board (user_id, user_name, subject, contents, hits, reg_date) ";
	$query .= "VALUES ('$userid', '$name', '$subject', '$contents', '0', now())";

	$result=mysqli_query($conn, $query);

	if ($result) {
		//$success++;
		print("$i INSERT 성공<BR>\r\n");
	}
	else {
		//$failure++;
		print("$i INSERT <B>실패</B><BR>\r\n");
	}
	// 이 프로그램이 시스템 자원을 많이 할당받는것을 막기위해
	// 10000번당 1초씩 쉬어줍니다.
	if(($i%10000) == 0) sleep(1);
}
//데이터베이스와의 연결 종료
mysqli_close($conn);
?>
</body>
</html>
