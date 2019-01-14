<nav class="navbar navbar-inverse" style="background-color: #010047;width: 100%!important;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">


				<?php
					
					//$mysqli = new mysqli('127.0.0.1', 'root', '', 'test_easy_accounts');
					$mysqli = new mysqli('192.168.1.87', 'remoteUser', 'remoteFor@87', 'test_easy_accounts');
					if ($mysqli->connect_errno)
					{
						echo "Sorry, this website is experiencing problems.";
						echo "Error: Failed to make a MySQL connection, here is why: \n";
						echo "Errno: " . $mysqli->connect_errno . "\n";
    					echo "Error: " . $mysqli->connect_error . "\n";
						exit;
					}
					
					
					$GLOBALS['permitted_actions'] = explode(",", $_SESSION['permitted_action']);
					//echo "<pre>"; print_r($permitted_actions); exit();
					
					generate_menu(0, $mysqli); 			
					
					function generate_menu($parent_id, $mysqli)
					{
						$sql = "SELECT * FROM user_roles WHERE parent_id = $parent_id";
						
						if (!$result = $mysqli->query($sql))
						{
							echo "Error: Our query failed to execute and here is why: \n";
							echo "Query: " . $sql . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
						    echo "Error: " . $mysqli->error . "\n";
						}
						else if ($result->num_rows > 0)
						{							
							while ($each_role = $result->fetch_assoc())
							{
								
								if(in_array($each_role['id'], $GLOBALS['permitted_actions']))
								{
									
									$has_child = false;
										
									$has_child_sql = "SELECT COUNT(*) AS no_of_child FROM user_roles WHERE parent_id = ".$each_role['id']."";
									if (!$has_child_result = $mysqli->query($has_child_sql))
									{
										echo "Error: Our query failed to execute and here is why: \n";
										echo "Query: " . $has_child_sql . "\n";
										echo "Errno: " . $mysqli->errno . "\n";
										echo "Error: " . $mysqli->error . "\n";
									}
									else
									{
										$no_of_child = $has_child_result->fetch_assoc();
										if($no_of_child['no_of_child'] > 0)
											$has_child = true;
									}
									
									
									if($parent_id == 0)
									{
										?>
										
										<li class="dropdown">
											<a href="<?php echo base_url().$each_role['url_link']; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $each_role['user_role_name'];  ?><span class="caret"></span></a>
											<?php
											if($has_child == true)
											{
												?>
												<ul class="dropdown-menu dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">											
												<?php
											}
									}
									else
									{									
										if($has_child == true)
										{
											?>
											<li class="dropdown-submenu"><a tabindex="-1" href="<?php echo base_url().$each_role['url_link'];  ?>"><?php echo $each_role['user_role_name'];  ?></a>
												<ul class="dropdown-menu">
											
											<?php
										}
										else
										{
											?>
											<li><a href="<?php echo base_url().$each_role['url_link'];  ?>"><?php echo $each_role['user_role_name'];  ?></a>										
											<?php
										}
										
										
									}
									
									generate_menu($each_role['id'], $mysqli);
									
									if($has_child == true)
									{
										echo "</ul>";
									}
									
									echo "</li>";
								}
							}
						}
					}
				
				
				?>
				
				
				
				               
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <script type="text/javascript">
        $(document).ready(function () {
            $('dropdown-toggle').dropdown()
        });
    </script>