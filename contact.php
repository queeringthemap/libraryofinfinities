<style>

@font-face {
  font-family: Edition;
  src: url(fonts/Phase-GGX_0-0-0.woff);
}

@font-face {
  font-family: Phase;
  src: url(fonts/Phase-GGX_10-63-100.woff);
}

body {
    background:linear-gradient(90deg, #ffe85c 50%, #e1271e 50%);;
    width:50vw;
    margin:0;
    -webkit-box-shadow: -2px 0px 15px 5px #000000; 
    box-shadow: -2px 0px 15px 5px #000000;
}

p {
    font-size:2.8vw;
    font-family: Edition;
    padding:15px 15px 15px 15px;
    line-height:1.25;
    margin-bottom: 0;
    margin-block-start:0;
}

a {
  background: black;
  color: #ffe85c;
  text-align: center;
  border: 2px solid black;
  font-size: 2.8vw;
  padding:10px;
  margin-left: 15px;
  font-family: 'Phase';
  cursor: pointer;
  text-decoration: none;
}

a:hover{
    border: 2px solid black;
  background: #e1271e;
  color:black;
}

</style>



<?php
  
if($_POST) {
    $title = "";
    $author_name = "";
    $link_to_work = "";
    $description = "";
    $affect = "";
    $contributor_name = "";
    $visitor_email = "";
    $concerned_category = "";
    $email_body = "<div>";
      
    if(isset($_POST['title'])) {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Title:</b></label>&nbsp;<span>".$title."</span>
                        </div>";
    }
 

    if(isset($_POST['author_name'])) {
        $author_name = filter_var($_POST['author_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Author Name:</b></label>&nbsp;<span>".$author_name."</span>
                        </div>";
    }

    if(isset($_POST['link_to_work'])) {
        $link_to_work = htmlspecialchars($_POST['link_to_work']);
        $email_body .= "<div>
                           <label><b>Link to Work:</b></label>
                           <div>".$link_to_work."</div>
                        </div>";
    }
      
    if(isset($_POST['description'])) {
        $description = htmlspecialchars($_POST['description']);
        $email_body .= "<div>
                           <label><b>Description:</b></label>
                           <div>".$description."</div>
                        </div>";
    }

    if(isset($_POST['affect'])) {
        $affect = htmlspecialchars($_POST['affect']);
        $email_body .= "<div>
                           <label><b>How The Work Has Affected You:</b></label>
                           <div>".$affect."</div>
                        </div>";
    }

     if(isset($_POST['contributor_name'])) {
        $contributor_name = filter_var($_POST['contributor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Contributor Name:</b></label>&nbsp;<span>".$contributor_name."</span>
                        </div>";
    }
      
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Contributor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }
 
  if(isset($_POST['concerned_category'])) {
        $concerned_category = filter_var($_POST['concerned_category'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Category:</b></label>&nbsp;<span>".$concerned_category."</span>
                        </div>";
    }
   
      
    
    //Remember to change these to your email.
    if($concerned_category == "yes") {
        $recipient = "submissions.libraryofinfinities@gmail.com";
    }
    else if($concerned_category == "no") {
        $recipient = "submissions.libraryofinfinities@gmail.com";
    }
    else {
        $recipient = "submissions.libraryofinfinities@gmail.com";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $author_name, $email_body, $headers)) {
        echo "<p>Thank you for contributing to the Library of Infinities, $contributor_name. <br> <br>We will review your submission, and if approved, will add it to the Library. <br> <br><br></p>" ;
        echo '<a href="library.html" target="_blank">RETURN TO LIBRARY</a>'; 
    } else {
        echo '<p>We are sorry but your submission did not go through.<br><br><br></p>';
        echo '<a href="library.html" target="_blank">RETURN TO LIBRARY</a>'; 
;
    }
      
} else {
    echo '<p>Something went wrong<br><br><br></p>';
    echo '<a href="library.html" target="_blank">RETURN TO LIBRARY</a>'; 
;
}
?>

