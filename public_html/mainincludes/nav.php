
<nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean" style="background: rgba(242,239,234,0.75);color: rgb(85,96,82);">
    <div class="container">
        <a href="index.php"><img src="assets/img/logo/CCOHVABlackTransparent.png" style="height:
    100px;"></a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php" style="font-size: 20px;">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="ourgoal.php" style="font-size: 20px;">Our Goal</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 20px;">Events</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="events.php">Events</a>
                        <a class="dropdown-item" href="archives.php">Archived Events</a>
                        <a class="dropdown-item" href="otherevents.php">Other Events</a>
                        <a class="dropdown-item" href="otherarchives.php">Other Archived Events</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 20px;">Support</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="partners.php">Partners</a>
                        <a class="dropdown-item" href="sponsors.php">Sponsers</a>
                        <a class="dropdown-item" href="landmanagement.php">Land Management</a>
                    </div>
                </li>

                <li class="nav-item"></li>
                <li class="nav-item"><a class="nav-link" href="News.php" style="font-size: 20px;">News</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="font-size: 20px;">Contact Us</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="contactus.php">Contact Us</a>
                        <a class="dropdown-item" href="joinus.php">Join CCOHVA</a>
                        <a class="dropdown-item" href="boardmembers.php">Board Members</a>
                    </div>
                </li>
                <?php
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    $getUserInfo = query("SELECT firstname, lastname FROM users WHERE username = '$username'");
                    while($row = fetch_array($getUserInfo)){
                        $name = $row['lastname'] . ", " . $row['firstname'];
                    }
                    echo "<li class='nav-item dropdown'>
                    <a class='dropdown-toggle nav-link' data-toggle='dropdown' aria-expanded='false' href='#' style='font-size: 20px;'>$name</a>
                    <div class='dropdown-menu'>
                    <a class='dropdown-item' href='admin/admin.php'>Dashboard</a>
                        <a class='dropdown-item' href='admin/logout.php'>Logout</a>
                        
                </li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='login.php' style='font-size: 20px;'>login</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>