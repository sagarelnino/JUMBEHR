<nav class="navbar navbar-inverse navbar-static-top my-nav">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><span class="ju">JUMBEHR</span></a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navHeaderCollapse">
            <ul class="nav navbar-nav navbar-right">
                <li <?php if($page == 'home'){ echo 'class="active"';} ?>><a href="home.php">Home</a></li>
                <li class="dropdown <?php if($page == 'recruiters' || $page == 'members' || $page == 'recruiter_approval' || $page == 'member_approval'){ echo 'active';} ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Approval<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if($page == 'recruiters'){ echo 'class="active"';} ?>><a href="recruiters.php">Recruiters</a></li>
                        <li <?php if($page == 'members'){ echo 'class="active"';} ?>><a href="members.php">Members</a></li>
                        <li <?php if($page == 'recruiter_approval'){ echo 'class="active"';} ?>><a href="recruiter_approval.php">Approve Recruiter</a></li>
                        <li <?php if($page == 'member_approval'){ echo 'class="active"';} ?>><a href="member_approval.php">Approve Member</a></li>
                    </ul>
                </li>

                <li class="dropdown <?php if($page == 'admins' || $page == 'add_admin'){ echo 'active';} ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if($page == 'add_admin'){ echo 'class="active"';} ?>><a href="add_admin.php">Add Admin</a></li>
                        <li <?php if($page == 'admins'){ echo 'class="active"';} ?>><a href="admins.php">Admins</a></li>
                    </ul>
                </li>

                <li class="dropdown <?php if($page == 'events' || $page == 'add_event'){ echo 'active';} ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Event<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if($page == 'add_event'){ echo 'class="active"';} ?>><a href="add_event.php">Add Event</a></li>
                        <li <?php if($page == 'events'){ echo 'class="active"';} ?>><a href="events.php">Events</a></li>
                    </ul>
                </li>

                <li class="dropdown <?php if($page == 'notices' || $page == 'add_notice'){ echo 'active';} ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Notice<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if($page == 'add_notice'){ echo 'class="active"';} ?>><a href="add_notice.php">Add Notice</a></li>
                        <li <?php if($page == 'notices'){ echo 'class="active"';} ?>><a href="notices.php">Notices</a></li>
                    </ul>
                </li>

                <li <?php if($page == 'messages'){ echo 'class="active"';} ?>><a href="messages.php">Messages</a></li>
                <li <?php if($page == 'subscribers'){ echo 'class="active"';} ?>><a href="subscribers.php">Subscriptions</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>