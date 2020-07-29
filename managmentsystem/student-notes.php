<?php

if (array_key_exists("pass", $_GET)) {    
    session_start();
    if (isset($_SESSION['id'])) {
    include "connection.php";
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `students` WHERE `id` = '$id'";
        $result = mysqli_query($link, $query);
        if (!mysqli_num_rows($result)) {
          header("Location: index.php");
      }

      $query = "SELECT * FROM `students` WHERE id = '$id'";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $class = $row['Class'];
      $rec = "$class-All";
      $dep = $row['Department'];
      $or = "$class-$dep";




    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}

?>
<?php include "header.php"; include "student-nav.php"; ?>
<div class="det">
<br>
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Submitted By</th>
      <th scope="col">To</th>
      <th scope="col">Subject</th>
      <th scope="col">Note</th>
      <th scope="col">File</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
  
  $query = "SELECT * FROM `note` WHERE Reciever = '$rec' OR Reciever = '$or' OR Reciever = 'Students'";
  $result = mysqli_query($link, $query);
  $sn = 0;
  while ($row = mysqli_fetch_array($result)) {
    $sn++;
    $file = $row['Note_File'];
  ?>
    <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $row['Teacher']; ?></td>
      <td><?php echo $row['Reciever']; ?></td>
      <td><?php echo $row['Subject']; ?></td>
      <td><?php echo $row['Note_Text']; ?></td>
      <td><a class="btn btn-primary" target="_blank" href='<?php  if ($file) {
          echo "./Files/Attached_Note_Files/$file";
      }else{
          echo "#";
      } ?>'>  <?php 
        if ($file) {
            echo $file;
        }else{
            echo "No File";
        }
      ?>  </a></td>
    </tr>
    <?php
  }
    ?>
  </tbody>
</table>


</div>