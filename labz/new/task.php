<?php
mysql_connect("localhost", "root", "");
mysql_select_db("quiz");

$query = "SELECT students.name as name, students.surname as surname, groups.name as groupname, universities.name as university, faculties.name as faculty 
FROM students, groups, universities, faculties 
WHERE students.group_id = groups.id 
AND students.univer_id = universities.id 
AND students.faculty_id=faculties.id 
ORDER BY students.id";
$result = mysql_query($query);
$num = mysql_num_rows($result);
for($i=0;$i<$num;$i++){
	$row = mysql_fetch_array($result);
	?>
	<ul>
		<li><?= $row['name']." ".$row['surname']."-".$row['groupname']."-".$row['university']."-".$row['faculty'] ?></li>
	</ul>
	<?php
}
?>