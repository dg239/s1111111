<?php require_once('db_connect.php');
/*******************************************************************
** Check if a post has been done
** If so, save comment to database
** line 22 get post from database
** line 45 get post comments from database
** line 73 get all authors from database
*******************************************************************/

if(count($_POST))
{

	// Define the variables that need to be saved (comment, author) and store $_POST values in there

	$sql = "INSERT INTO day2_comment (comment, author, postid, ipaddress) VALUES ('".$_POST['comment']."', '".$_POST['author']."', '".$_GET['id']."', '".$_SERVER["REMOTE_ADDR"]."')"; // Write the query to save a comment to the database
	if($result = mysqli_query($db, $sql))
	{

		
		$_POST = array();
	}
	else
	{
		echo'no';
		die(mysqli_error($db));	
	}
}

?>
<!DOCTYPE>
<html>
	<head>
		<title>My first blog</title>
		<link rel="stylesheet" src="style.css" />
		<style>
		.highlight { background-color:#FFFF66; }
		</style>
	</head>
	<body>
		<div id="container">
			<?php require_once('blogheader.php') ?>
			<hr/>
			<section>
				<?php // Get the post from database and show

				// Get the post id from the URL by using $_GET, and save as variable

				$sql = "SELECT day2_post.text, day2_post.title, day2_author.name 
						FROM day2_post 
						INNER JOIN day2_author
						ON day2_post.author = day2_author.id
						WHERE day2_post.id = '".$_GET['id']."'"; //Query to get post with that id from database (try to join with author table http://www.w3schools.com/sql/sql_join.asp)
				if($result = mysqli_query($db, $sql))
				{
					if($row = mysqli_fetch_array($result))
					{
						$title 		= $row['title'];
						$text 		= $row['text'];
						$author 	= $row['name'];

						echo "<h1>$title (By $author)</h1>";
						echo "<p>$text</p>";
					}
				}
				else // If something went wrong
				{
					die(mysqli_error($db));	
				}
				?>
			</section>
			<hr/>
			<section>
				<h1>Comments</h1>
				<ul>
					<?php // Get comments from database and print in list
					//Get the post id from the URL by using $_GET, and save as variable
					$sql = "SELECT day2_comment.comment, day2_author.name, day2_comment.id 
							FROM day2_comment 
							INNER JOIN day2_author
							on day2_comment.author = day2_author.id
							WHERE postid = '".$_GET['id']."'"; 

					if($result = mysqli_query($db, $sql)) // If everything goes ok
					{
						// We loop over every comment and print this as a list item
						while($row = mysqli_fetch_array($result))
						{
							$author 	= $row['name'];
							$comment 	= $row['comment'];
							$commentid	= $row['id'];
							if(isset($_GET['highlight'])){
								$highlight = $_GET['highlight'];
								echo'yeah';
							}
							else {
								$highlight = null;
							}
							
							echo "<li>";					
							echo "<h3>$author</h3>";
							if($highlight==$commentid)
							{
								echo '<p><span class="highlight">' . $comment . '</span></p>';
								
							}
							else
							{
								echo "<p>$comment</p>";

							}
								
							echo "<br/>";
							echo "</li>";	
						}
					}
					else // If something went wrong
					{
						die(mysqli_error($db));	
					}
					?>
				</ul>
				<h2>Add a comment</h2>
				<form action="post.php<?php echo "?id=" . $_GET['id']?>" method="post">
					<textarea name="comment" autofocus></textarea><br/>
					<br/>
					<select name="author">
						<?php // Get authors and print as options for the dropdown 

						$sql = "SELECT * FROM day2_author WHERE mailconfirmed=1"; // Query to get authors from database
						if($result = mysqli_query($db, $sql)) // If everything goes ok
						{
							// We loop over the every author so we can provide this author as an option
							while($row = mysqli_fetch_array($result))
							{
								$id 	= $row['id'];
								$name 	= $row['name'];
								echo "<option value='$id'>$name</option>";
							}
						}
						else // If something went wrong
						{
							die(mysqli_error($db));	
						}
						?>
					</select><br/>
					<br/>
					<input type="submit" />
				</form>
			</section>
		</div>
	</body>
</html>
<?php require_once('db_close.php') ?>