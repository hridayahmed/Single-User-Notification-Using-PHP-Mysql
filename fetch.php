<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");

 $query = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
     if ($row['comment_status'] == 0) 
     {
        $output .= '
         <li> 
            <a href="view.php?id='.$row["comment_id"].'">
               <strong style="text-size: 26px; color: red;">'.$row["comment_subject"].'</strong><br />
               <small style="text-size: 20px; color: red;"><em>'.$row["comment_text"].'</em></small>
            </a>
         </li>
         <li class="divider"></li>
         ';
     }

     else
     {
        $output .= '
         <li>
          <a href="view.php?id='.$row["comment_id"].'">
           <span>'.$row["comment_subject"].'</span><br />
           <span><em>'.$row["comment_text"].'</em></span>
          </a>
         </li>
         <li class="divider"></li>
         ';
     }
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM comments WHERE comment_status=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>