<aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn"
                                    href="#" data-activates="profile-dropdown"><?php echo $name;?> <i
                                        class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal"><?php echo $role;?></p>
                            </div>
                        </div>
                    </li>
                    <?php
                        if (isset($_SESSION['admin_sid']) and $_SESSION['admin_sid']==session_id())
                        {
                    ?>
                        <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i
                            class="mdi-editor-border-color"></i> Food Menu</a>
                        </li>
                        <li class="bold"><a href="display-report.php" class="waves-effect waves-cyan"><i class="mdi-content-report"></i>Report</a>

                        <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i
                                        class="mdi-action-question-answer"></i> Tickets</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="all-tickets.php">All Tickets</a>
                                        </li>
                                        <?php
                                            $sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
                                            while($row = mysqli_fetch_array($sql)){
                                            echo '<li><a href="all-tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                            </li>';
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="bold"><a href="users.php" class="waves-effect waves-cyan"><i
                                    class="mdi-social-person"></i> Users</a>
                        </li>
                    <?php
                        }
                    ?>
                    
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"><i
                                        class="mdi-editor-insert-invitation"></i> Orders</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li class="<?php
								if(!isset($_GET['status'])){
										echo 'active';
									}?>
									"><a href="all-orders.php">All Orders</a>
                                        </li>
                                        <?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
									while($row = mysqli_fetch_array($sql)){
									if(isset($_GET['status'])){
										$status = $row['status'];
									}
                                    echo '<li class='.(isset($_GET['status'])?($status == $_GET['status'] ? 'active' : ''): '').'><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <?php
                            if (isset($_POST['waiter_sid']) and ($_POST['waiter_sid'] == session_id())){
                        ?>
                        <li class="bold"><a href="waiter-map.php" class="waves-effect waves-cyan"><i class="mdi-device-gps-fixed"></i>Order Locations</a>
                        <?php
                            }
                        ?>
                    </li>
                    
                </ul>
                <a href="#" data-activates="slide-out"
                    class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i
                        class="mdi-navigation-menu"></i></a>
            </aside>