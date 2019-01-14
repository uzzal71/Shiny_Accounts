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

				include('manual_db_connect.php');
					// $mysqli = new mysqli('192.168.1.87', 'remoteUser', 'remoteFor@87', 'test_easy_accounts');
					// if ($mysqli->connect_errno)
					// {
					// 	echo "Sorry, this website is experiencing problems. Error: Failed to make a MySQL connection, here is why: \n Errno: " . $mysqli->connect_errno . "\n Error: " . $mysqli->connect_error . "\n";
					// 	exit;
					// }
					$GLOBALS['permitted_actions'] = explode(",", $_SESSION['permitted_action']);
					//echo "<pre>"; print_r($permitted_actions); exit();
					
					generate_menu(0, $mysqli); 			
					
					function generate_menu($parent_id, $mysqli)
					{
						$sql = "SELECT
									a.id,
									a.user_role_name,
									a.url_link,
									(SELECT count(*) FROM user_roles b WHERE a.id = b.parent_id AND company_id = ".$_SESSION['company_id'].") AS no_of_child
								FROM
									user_roles a
								WHERE
									company_id = ".$_SESSION['company_id']."
									AND parent_id = ".$parent_id." 
									AND id IN (".$_SESSION['permitted_action'].")";





									//echo $sql;exit();
						
						if (!$result = $mysqli->query($sql))
						{
							echo "Error: Our query failed to execute and here is why: \n Query: " . $sql . "\n Errno: " . $mysqli->errno . "\n Error: " . $mysqli->error . "\n";
							exit;
						}
						else if ($result->num_rows > 0)
						{							
							while ($each_role = $result->fetch_assoc())
							{								
								
								if($parent_id == 0)
								{
									echo "<li class='dropdown'>
											<a href='".base_url().$each_role['url_link']."' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>".$each_role['user_role_name']."<span class='caret'></span></a>";
										
										
										if($each_role['no_of_child'] > 0)
										{
											echo '<ul class="dropdown-menu dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';
										}
								}
								else
								{									
									if($each_role['no_of_child'] > 0)
									{
										echo "<li class='dropdown-submenu'><a tabindex='-1' href='".base_url().$each_role['url_link']."'>".$each_role['user_role_name']."</a>
											<ul class='dropdown-menu'>";
									}
									else
									{
										echo "<li><a href='".base_url().$each_role['url_link']."'>".$each_role['user_role_name']."</a>";
									}
									
								}
								
								generate_menu($each_role['id'], $mysqli);
								
								if($each_role['no_of_child'] > 0)
								{
									echo "</ul>";
								}
								
								echo "</li>";
								
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