<?php
session_start();


//echo $_SESSION["NaID"];

$naid = $_SESSION["NaID"];

if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "12345678", "student");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM tbl_images WHERE NID = '".$naid."' ORDER BY id DESC";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="20%">ชื่อเอกสาร</th>
     <th width="50%">ภาพเอกสาร</th>
     <th width="15%">เปลี่ยน</th>
     <th width="15%">ลบ</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["doc"].'</td>
     <td>
      <img src=" data:image/jpeg;base64,'.base64_encode($row['name'] ).' "
         height="60" width="75" class="img-thumbnail" />
     </td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["id"].'">เปลี่ยน</button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">ลบ</button></td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $nid = $_POST["txtID"];
  $doc = $_POST["txtDoc"];
  $query = "INSERT INTO tbl_images(name,NID,doc) VALUES ('$file',$nid,'$doc')";
  if(mysqli_query($connect, $query))
  {
   echo 'เพิ่มรูปภาพสำเร็จ';
  }
 }
 if($_POST["action"] == "update")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE tbl_images SET name = '$file' WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'เปลี่ยนรูปภาพสำเร็จ';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM tbl_images WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'ลบข้อมูลสำเร็จ';
  }
 }
}
?>