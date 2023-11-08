<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Music Player</title>
  <link rel="stylesheet" href="sign in.css">

</head>
<body>

    <div class="sidebar">
    <div class="MusicLogo">
        <a id="logo" href="index.html"><img src="images/logo/logo1.png" height="100" width="150" alt="Logo Image"></a>
      </div> 
      <div class="navigation">
        <ul>
          <li>
            <a href="#">
              <span class="fa fa-search"></span>
              <span>Search</span>
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="#">
              <span class="fa fas fa-plus-square"></span>
              <span>Create Playlist</span>
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="#">
              <span class="fa fas fa-heart"></span>
              <span>Liked Songs</span>
            </a>
          </li>
        </ul>
      </div>

      
    </div>

    <div class="main-container">
      <div class="topbar">
        

        <div class="navbar">
          <ul>
            
            <li>
              <a style="color:white; font-weight:bold;"><?php echo $username;?></a>
            </li>
          </ul>
          <button class="login"><a href="logout.php" style="color:black">Logout</a></button>
        </div>
      </div>
      <div class="spotify-playlists">
        <h2>Your favorite albums are here</h2>

        <div class="list">
          <div class="item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUS8YD3joDZRX3MQfftin3aNjXdWs90IExg&usqp=CAU" />
            <div class="play">
              <a href="playlist1.html"><span class="fa fa-play"></span></a>
            </div>
            <h4>Hits of Arijit Singh</h4>
            <p>Rema & Selena Gomez are on top of the...</p>
          </div>

          <div class="item">
            <img src="https://morungexpress.com/sites/default/files/field/image/Shreya%20Ghoshal.jpg" />
            <div class="play">
              <a href="playlist2.html"><span class="fa fa-play"></span></a>
            </div>
            <h4>Hits of Shreya Ghoshal</h4>
            <p>New Music from Lil Baby, Juice WRLD an...</p>
          </div>

          <div class="item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUBK3t_eBkyOZVIjyYK6z-b78B8rWSxQD1fw&usqp=CAU">
            <div class="play">
              <a href="playlist3.html"><span class="fa fa-play"></span></a>
            </div>
            <h4>Hits of Arman Mallick</h4>
            <p>The biggest spmgs pf tje 2010s. Cover:...</p>
          </div>

          <div class="item">
            <img src="https://images.indulgexpress.com/uploads/user/imagelibrary/2022/7/7/original/SourceDarshansInstagram.jpg" />
            <div class="play">
              <a href="playlist4.html"><span class="fa fa-play"></span></a>
            </div>
            <h4>Hits of Darshan Raval</h4>
            <p>Rock Legends & epic songs that continue t...</p>
          </div>

          <div class="item">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/ImanChakkoty.jpg/1200px-ImanChakkoty.jpg">
            <div class="play">
              <a href="playlist5.html"><span class="fa fa-play"></span></a>
            </div>
            <h4>Hits of Iman chakraborty</h4>
            <p>Kick back to the best new and recent chill...</p>
          </div>

          <div class="item">
            <img src="data:image/jpeg;base64,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" />
            <div class="play">
              <a href="playlist6.html"><span class="fa fa-play"></span></a>
            </div>
            <h4>Hits of Guru Randhawa</h4>
            <p>Today's top Latin hits elevando nuestra...</p>
          </div>
        </div>
      </div>
      <div class="spotify-playlists">
        <div class="list">
          <div class="item">
            <img src="images/upama/upama.jpg" />
            <div class="play">
              <a href="playlist7.html"><span class="fa fa-play"></span></a>
            </div>
            <h4>Upama Sings</h4>
            <p>Relax and indulge with beautiful piano pieces</p>
          </div>
        </div>
      </div>

  

    <script
      src="https://kit.fontawesome.com/23cecef777.js"
      crossorigin="anonymous"
    ></script>
  
</body>
</html>