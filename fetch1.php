<?php
$connect = mysqli_connect("localhost", "root", "", "hiking");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM person 
  WHERE type='admin' AND (firstname LIKE '%".$search."%'
  OR lastname LIKE '%".$search."%' 
  OR id LIKE '%".$search."%' 
  OR email LIKE '%".$search."%') 
 ";
}
else
{
 $query = "
  SELECT * FROM person WHERE type='admin' ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

  <div class="table-responsive">
   <table class="table table-bordered table-striped">
    <tr>
<th>First Name</th>  
<th>Last Name</th>
<th>Email</th>
<th>Age</th>
<th>Gender</th>
<th>ID</th>
<th>Mobile</th>
<th>Type</th>
<th>Salary</th>

    </tr>

';
 
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
            <td>' .$row['firstname'].'</td>
            <td>'.$row['lastname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['age'].'</td>
            <td>'.$row['gender'].'</td>
            <td>'.$row['id'].'</td>
            <td>' .$row['mobile'].'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['salary'].'</td>


  </tr>
   
  ';

 }

 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
</body>
</html>