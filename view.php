<?php 
	include("connect.php");
	$comment_id = $_GET['id'];
	if (isset($comment_id)) 
	{
		$query = "SELECT * FROM comments WHERE comment_id = '$comment_id' ";
		$res = mysqli_query($connect, $query);
		$row = mysqli_fetch_assoc($res);

		$update_query = "UPDATE comments SET comment_status = 1 WHERE comment_id = '$comment_id' ";
        mysqli_query($connect, $update_query); 
	}
	

?>

<button> <a href="index.php">Home</a> </button>

<h2 align="center">Notification using PHP Ajax Bootstrap</h2>
<br />
<div class="form-group">
	<label>Enter Subject</label>
	<input type="text" value="<?php echo $row['comment_subject']; ?>" name="subject" id="subject" class="form-control" readonly>
</div>
<div class="form-group">
	<label>Enter Comment</label>
	<input type="text" value="<?php echo $row['comment_text']; ?>" name="comment" id="comment" class="form-control" readonly>
</div>