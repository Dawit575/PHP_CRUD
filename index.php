<?php
  $server = "localhost";
  $user = "root";
  $password = "";
  $databse = "student";
  $conn = mysqli_connect($server,$user,$password,$databse);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD app</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1>CRUD APP</h1>

 <form action="" method="post">
  <input type="text" name="id" placeholder="Enter Id">
  <br>
  <input type="text" name="name" placeholder="Enter your name">
  <br>
  <h4>Select your gender</h4>
  <input type="radio" value="male" name="gender">male
  <input type="radio" value="female" name="gender">Female
  <br>
  <input type="text" name="dep" placeholder="Enter Department">
  <br>
  <input type="date" name="date" placeholder="Enter Date">
  <br>
  <button name="save">Save</button>
  <button name="delete">Delete</button>
  <button name="update">Update</button>
  <button name="display">Display</button>
 </form>

 <form action="" method="post">
  <button name="search">Search</button>
  <input type="text" name="input" placeholder="Search by ID">
 </form>
 <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Department</th>
      <th>Date</th>
    </tr>
   <?php
    if(isset($_POST['display'])){
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn,$sql);

      while($data = mysqli_fetch_assoc($result)){
        ?>
         <tr>
          <td><?php echo$data['id']; ?></td>
          <td><?php echo$data['name']; ?></td>
          <td><?php echo$data['gender']; ?></td>
          <td><?php echo$data['dep']; ?></td>
          <td><?php echo$data['date']; ?></td>
         </tr>
      <?php } ?>
    <?php } ?>

 <?php
 if(isset($_POST['search'])){
  $input = isset($_POST['input']) ? $_POST['input'] : "";
  $sql = "SELECT * FROM users WHERE id = '$input'";

  $value = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($value)){
            ?>
         <tr>
          <td><?php echo$row['id']; ?></td>
          <td><?php echo$row['name']; ?></td>
          <td><?php echo$row['gender']; ?></td>
          <td><?php echo$row['dep']; ?></td>
          <td><?php echo$row['date']; ?></td>
         </tr>
      <?php } ?>
    <?php } ?>
    </table>
</body>
</html>

<?php
 if(isset($_POST['save'])){
   $id = isset($_POST['id']) ? $_POST['id'] : "";
   $name = isset($_POST['name']) ? $_POST['name'] : "";
   $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
   $dep = isset($_POST['dep']) ? $_POST['dep'] : "";
   $date = isset($_POST['date']) ? $_POST['date'] : "";

   $sql = "INSERT INTO users (id,name,gender,dep,date) VALUES('$id','$name','$gender','$dep','$date')";
   mysqli_query($conn,$sql);
 }

 if(isset($_POST['delete'])){
  $id = isset($_POST['id']) ? $_POST['id'] : "";
  $sql = "DELETE FROM users WHERE id = '$id'";
  mysqli_query($conn,$sql);
 }

 if(isset($_POST['update'])){
   $id = isset($_POST['id']) ? $_POST['id'] : "";
   $name = isset($_POST['name']) ? $_POST['name'] : "";
   $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
   $dep = isset($_POST['dep']) ? $_POST['dep'] : "";
   $date = isset($_POST['date']) ? $_POST['date'] : "";

   $sql = "UPDATE users SET id='$id',name='$name',gender='$gender',dep='$dep',date='$date' WHERE id = '$id'";
   mysqli_query($conn,$sql);
 }
?>
