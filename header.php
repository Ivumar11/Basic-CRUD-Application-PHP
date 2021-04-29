<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="dashStyle.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="ti-unlink"></span> 
                <span>Zuri CRUD app</span>
            </h3> 
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-face-smile"></span>
                        <span>Team</span>
                    </a>
                </li>
                <li>
                    <a href="courses.php">
                        <span class="ti-book"></span>
                        <span>Courses</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="ti-settings"></span>
                        <span>Account</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="ti-time"></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    
    <div class="main-content">
        
        <header>
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>
            
            <div class="social-icons">
                <span><h3 class="dash-title"><?php echo "Welcome, " . $_SESSION['first_name'];?></h3></span>
                <span><a href="add_course.php">
                <button class="button" style="border-radius:10px; padding: 10px; background:#027581;">
                ADD COURSE
                </button>
                </a></span>
                <span class="ti-comment"></span>
                <div></div>
            </div>
        </header>