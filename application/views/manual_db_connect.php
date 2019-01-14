<?php



 $mysqli = new mysqli('localhost', 'root', '', 'test_easy_accounts');
								if ($mysqli->connect_errno)
								{
									echo "Sorry, this website is experiencing problems. Error: Failed to make a MySQL connection, here is why: \n Errno: " . $mysqli->connect_errno . "\nError: " . $mysqli->connect_error . "\n";
									exit;
								} 



	?>