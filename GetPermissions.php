

<?php
	include('db.php');
      session_start();
    
     if(!isset($_SESSION['id'])){
       header("location:index.php");
     }

     	$name = $_SESSION["name"];
		$role = $_SESSION["role"];
		$regno = $_SESSION["regno"];

		$page = $_GET['page'];
		$data="<table border=1>";

	$rs = mysqli_query($con, "SELECT * FROM permissions INNER JOIN students ON permissions.RegNo=students.RegNo WHERE students.RegNo='".$regno."' LIMIT 5 OFFSET ".$page);
			
			$i=0;
			while($row = mysqli_fetch_array($rs)){
				
				$i+=1;
				$data=$data."<tr>"
				."<td>".$row["PermissionID"]."</td>"
				."<td>".$row["FirstName"]." ".$row["LastName"]."</td>"
				."<td>".$row["RegNo"]."</td>"
				."<td>".$row["Department"]."</td>"
				."<td>".$row["Reason"]."</td>"
				."<td>".$row["LeaveStartDate"]."</td>"
				."<td>".$row["LeaveEndDate"]."</td>"
				."<td>".$row["Status"]."</td>"
				."<td>";

				if($row["Status"] == "Pending") {
					$data = $data."<a onmouseover=\"document.getElementById('edit1').value='".$row["LeaveStartDate"]."'; "
							. "document.getElementById('edit2').value='".$row["LeaveEndDate"]."';"
							. "document.getElementById('pid').value='".$row["PermissionID"]."';"
							. "document.getElementById('edit3').value='".$row["Reason"]."'\" "
							. ""
							. "type=\"button\" class=\"text-success\" data-toggle=\"modal\" data-target=\"#editPermission\"><i class='fa fa-edit'></i></a>&nbsp;"
							. ""
							. "<a onmouseover=\"document.getElementById('del').value=".$row["PermissionID"]."\" href=\"?id=".$row["PermissionID"]."\" type=\"bukktton\" class=\"text-danger\" data-toggle=\"modal\" data-target=\"#deletePermission\">"
									. "<i class='fas fa-trash-alt'></i></a>";
				}
				
					$data=$data."</td>"
						."</tr>";
			}
			$data=$data."</table>";
			echo($data);





?>