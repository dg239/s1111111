<?php require_once('db_connect.php');
/*******************************************************************
** Fill the $posts array with all the posts from the database
** Fill the $authors array with all the authors from the database
*******************************************************************/
?>
<!DOCTYPE>
<html>
	<head>
		<title>My first blog</title>
		<link rel="stylesheet" src="style.css" />
	</head>
	<body>
		<frameset cols="120,360,*">
		

		<div id="container">
			<?php require_once('blogheader.php') ?>
			<hr/>
			<section>
				<h1>Overview posts</h1>
				<ul>
					<?php // Get posts from database and print in list

					$sql = "SELECT day2_post.id, day2_post.title, day2_author.name
							FROM day2_post 
							INNER JOIN day2_author 
							ON day2_post.author = day2_author.id"; // Query to get all posts from database (try to join with authors http://www.w3schools.com/sql/sql_join.asp)
					if($result = mysqli_query($db, $sql)) // If everything goes ok
					{
						// We loop over every post and print this as a list item
						while($row = mysqli_fetch_array($result))
						{
							$id 	= $row['id'];
							$title 	= $row['title'];
							$author = $row['name'];
							
							echo "<li>";					
							
								//open anchor tag (link) <a href="post.php?id=...">
								echo "<a href='post.php?id=$id'>";
								
									//echo post title
									echo "<span>$title</span> | $author";
									
								//close anchor tag
								echo '</a>';
							
							echo "</li>";	
						}
					}
					else // If something went wrong
					{
						echo'error';
						die(mysqli_error($db));	
					}
					?>
				</ul>
			</section>
			<hr/>
			<section>
				<h1>Overview authors</h1>
				<ul>
					<?php // Get authors and print in list

					$sql = "SELECT * FROM day2_author WHERE mailconfirmed=1"; // Query to get authors from database
					if($result = mysqli_query($db, $sql)) // If everything goes ok
					{
						// We loop over the every author so we can provide this author as an option
						while($row = mysqli_fetch_array($result))
						{
							$id 	= $row['id'];
							$name 	= $row['name'];

							echo "<li>";
								echo "<a href='author.php?id=$id'>$name</a>";
							echo "</li>";
						}
					}
					else // If something went wrong
					{
						die(mysqli_error($db));	
					}
					?>
				</ul>
			</section>
		</div>
		
		</frameset>
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test
<br> test

	</body>
</html>
<?php require_once('db_close.php') ?>