<div class="container-fluid">
    <div class="header">
        <div class="col-md-2">
            <img class="img-responsive" src="utilities/images/logo.png" style="max-width: 100%" align="center">
        </div>
        <div class="col-md-8 text-center">
            <h3>Jahangirnagar University Marketing Branding Enterpreneuer & Human Resource Study Group</h3>
        </div>
        <div class="col-md-2">
            <div class="icons-inline">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
            <div class="member-btn">
                <!--<a href="register.php" class="btn btn-sm btn-success">Become a Member</a>-->
                <li class="dropdown <?php if($page == 'register_as_recruiter' || $page == 'register_as_member'){ echo 'active';} ?>">
                    <a href="#" class="dropdown-toggle btn btn-sm btn-success" data-toggle="dropdown">Become a Member <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="<?php if($page == 'register_as_recruiter'){ echo 'active';} ?>"><a href="register_as_recruiter.php">Recruiter</a></li>
                        <li class="<?php if($page == 'register_as_member'){ echo 'active';} ?>"><a href="register_as_member.php">General Member</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</div>
<div class="navbar">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php if($page == 'index'){ echo 'active';} ?>"><a href="index.php">Home</a></li>
                <li class="dropdown  <?php if ($page == 'mission_and_vision' || $page == 'constitution' || $page == 'what_we_offer' || $page == 'gallery'){ echo 'active';} ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="<?php if ($page == 'mission_and_vision'){ echo 'active';} ?>"><a href="mission_and_vision.php">Mission & Vision</a></li>
                        <li class="<?php if ($page == 'constitution'){ echo 'active';} ?>"><a href="constitution.php">Constitution</a></li>
                        <li class="<?php if ($page == 'what_we_offer'){ echo 'active';} ?>"><a href="what_we_offer.php">What we offer</a></li>
                        <li class="<?php if ($page == 'gallery'){ echo 'active';} ?>"><a href="gallery.php">Gallery</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php if($page == 'events'){ echo 'active';} ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Event <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="events.php?time=future">Upcoming Events</a></li>
                        <li><a href="events.php?time=past">Previous Events</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php if($page == 'committee' || $page == 'honorarium_panel' || $page == 'founder_members'){ echo 'active';} ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Organization <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown <?php if($page == 'committee'){ echo 'active';} ?>"><a href="committee.php">Committee</a></li>
                        <li class="dropdown <?php if($page == 'honorarium_panel'){ echo 'active';} ?>"><a href="honorarium_panel.php">Honorarium Members</a></li>
                        <li class="dropdown <?php if($page == 'founder_members'){ echo 'active';} ?>"><a href="founder_members.php">Founder Members</a></li>
                    </ul>
                </li>

                <li class="dropdown <?php if($page == 'recruiters'){ echo 'active';} ?>"><a href="recruiters.php">Recruiters</a></li>
                <li class="dropdown <?php if($page == 'notices'){ echo 'active';} ?>"><a href="notices.php">Notice</a></li>
                <li class="dropdown <?php if($page == 'contact'){ echo 'active';} ?>"><a href="contact.php">Contact</a></li>
                <li class="dropdown <?php if($page == 'login'){ echo 'active';} ?>"><a href="login.php">Login</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

</div>