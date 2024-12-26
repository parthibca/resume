<?php
  define('Token','HGsZOXpfNC');
  $skills = [];
  $skill_levels = [];
  $hobbies = [];
  $institutes = [];
  $degrees = [];
  $froms = [];
  $tos = [];
  $grades = [];
  $titles = [];
  $companys = [];
  $descriptions = [];
  $experiences = [];

  if(Token == $_POST['token'])
  {
    $temp_profile = $_FILES['profile_image']['tmp_name'];
    $profile = $_FILES['profile_image']['name'];
    move_uploaded_file($temp_profile,'images/'.$profile);
    $full_name = $_POST['full_name'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $about_me = $_POST['about_me'];
    array_push($skills,$_POST['skill1']);
    array_push($skill_levels,intval($_POST['skill_level1']));
    array_push($hobbies,$_POST['hobby1']);
    array_push($institutes,$_POST['institute1']);
    array_push($degrees,$_POST['degree1']);
    array_push($froms,$_POST['from1']);
    array_push($tos,$_POST['to1']);
    array_push($grades,$_POST['grade1']);
   

    if(isset($_POST['skill2']) && !empty($_POST['skill2']))
    {
      if(isset($_POST['skill_level2']) && !empty($_POST['skill_level2']))
      {
        array_push($skills,$_POST['skill2']);
        array_push($skill_levels,intval($_POST['skill_level2']));
      }
    }
    if(isset($_POST['skill3']) && !empty($_POST['skill3']))
    {
      if(isset($_POST['skill_level3']) && !empty($_POST['skill_level3']))
      {
        array_push($skills,$_POST['skill3']);
        array_push($skill_levels,intval($_POST['skill_level3']));
      }
    }
    if(isset($_POST['skill4']) && !empty($_POST['skill4']))
    {
      if(isset($_POST['skill_level4']) && !empty($_POST['skill_level4']))
      {
        array_push($skills,$_POST['skill4']);
        array_push($skill_levels,intval($_POST['skill_level4']));
      }
    }
    if(isset($_POST['skill5']) && !empty($_POST['skill5']))
    {
      if(isset($_POST['skill_level5']) && !empty($_POST['skill_level5']))
      {
        array_push($skills,$_POST['skill5']);
        array_push($skill_levels,intval($_POST['skill_level5']));
      }
    }
    if(isset($_POST['hobby2']) && !empty($_POST['hobby2']))
    {
      array_push($hobbies,$_POST['hobby2']);
    }
    if(isset($_POST['hobby3']) && !empty($_POST['hobby3']))
    {
      array_push($hobbies,$_POST['hobby3']);
    }
    if(isset($_POST['hobby4']) && !empty($_POST['hobby4']))
    {
      array_push($hobbies,$_POST['hobby4']);
    }
    if(isset($_POST['institute2']) && !empty($_POST['institute2']))
    {
      if(isset($_POST['degree2']) && !empty($_POST['degree2']))
      {
        if(isset($_POST['from2']) && !empty($_POST['from2']))
        {
          if(isset($_POST['to2']) && !empty($_POST['to2']))
          {
            if(isset($_POST['grade2']) && !empty($_POST['grade2']))
            {
              array_push($institutes,$_POST['institute2']);
              array_push($degrees,$_POST['degree2']);
              array_push($froms,$_POST['from2']);
              array_push($tos,$_POST['to2']);
              array_push($grades,$_POST['grade2']);
            }
          }
        } 
      }
    }
    if(isset($_POST['institute3']) && !empty($_POST['institute3']))
    {
      if(isset($_POST['degree3']) && !empty($_POST['degree2']))
      {
        if(isset($_POST['from3']) && !empty($_POST['from3']))
        {
          if(isset($_POST['to3']) && !empty($_POST['to3']))
          {
            if(isset($_POST['grade3']) && !empty($_POST['grade3']))
            {
              array_push($institutes,$_POST['institute3']);
              array_push($degrees,$_POST['degree3']);
              array_push($froms,$_POST['from3']);
              array_push($tos,$_POST['to3']);
              array_push($grades,$_POST['grade3']);
            }
          }
        } 
      }
    }
  
    if(isset($_POST['title1']) && !empty($_POST['title1'])) {
      $company1 = isset($_POST['Company1']) ? $_POST['Company1'] : '';  
      $from1 = isset($_POST['from1']) ? $_POST['from1'] : '';
      $to1 = isset($_POST['to1']) ? $_POST['to1'] : '';
      $description1 = isset($_POST['description1']) ? $_POST['description1'] : '';
      
      array_push($experiences, [
        'title' => $_POST['title1'],
        'company' => $company1,
        'from' => $from1,
        'to' => $to1,
        'description' => $description1
      ]);
    }
 
    for($i = 2; $i <= 5; $i++) {
      if(isset($_POST["title$i"]) && !empty($_POST["title$i"])) {
        $company = isset($_POST["Company$i"]) ? $_POST["Company$i"] : '';
        $from = isset($_POST["from$i"]) ? $_POST["from$i"] : '';
        $to = isset($_POST["to$i"]) ? $_POST["to$i"] : '';
        $description = isset($_POST["description$i"]) ? $_POST["description$i"] : '';
        
        array_push($experiences, [
          'title' => $_POST["title$i"],
          'company' => $company,
          'from' => $from,
          'to' => $to,
          'description' => $description
        ]);
      }
    }
  }
  else {
    header('location: /resumegenerator');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="bb.css">
  <title><?php echo ucwords($full_name). ' Resume'; ?></title>
</head>
<body>
<?php 
$total_experiences = !empty($experiences) ? count($experiences) : 0;
$experiences_per_page = 3;
$total_pages = ceil($total_experiences / $experiences_per_page); 

if($total_experiences > 0) {
    for($page = 0; $page < $total_pages; $page++) {
        $start_index = $page * $experiences_per_page;
        $end_index = min(($page + 1) * $experiences_per_page, $total_experiences);
?>
        <div class="page">
            <?php if($page == 0) { ?>
                <div class="zone-1">
                    <div class="toCenter">
                        <img src="images/<?php echo $profile;?>" class="profile">
                    </div>
                    <div class="contact-box">
                    <div class="title">
                        <h2>Contact</h2>
                      </div>
                      <hr>
                      <div class="call"><i class="fas fa-phone-alt"></i>
                        <div class="text"><?php echo $phone;?></div>
                      </div>
                      <div class="email"><i class="fas fa-envelope"></i>
                        <div class="text"><?php echo $email;?></div>
                      </div>
                      <div class="address"><i class='fas fa-map-marker-alt'></i>
                        <div class="text"><?php echo $address;?></div>
                      </div>
                    </div>
                    <div class="skills-box">
                    <div class="title">
                        <h2>Skills</h2>
                      </div>
                      <hr>
                      <?php 
                      for($j=0; $j<count($skills); $j++){
                          echo "<div class='skill-1'>
                                  <p><strong>" . strtoupper($skills[$j]) . "</strong></p>
                                  <div class='progress'>";
                            for($i=0;$i<$skill_levels[$j];$i++){
                              echo '<div class="fas fa-star active"></div>';
                              
                            }
                            echo '</div></div>';

                          }
                      ?>
                    </div>
                    <div class="hobbies-box">
                    <div class="title">
                        <h2>Hobbies</h2>
                      </div>
                      <hr>
                      <?php 
                        foreach($hobbies as $hobby)
                        {
                          echo "<div class='d-flex align-items-center'>
                          <div class='circle'></div>
                          <div><strong>" . ucwords($hobby) . "</strong></div>
                        </div>";
                        }
                      
                      
                      ?>
                    </div>
                </div>
            <?php } ?>
            
            <div class="zone-2 <?php echo $page == 0 ? '' : 'full-width'; ?>">
                <?php if($page == 0) { ?>
                    <div class="headTitle">
                        <h1><?php echo ucwords($full_name);?></h1>
                    </div>
                    <div class="subTitle">
                        <h1><?php echo ucwords($profession);?></h1>
                    </div>
                    
                    <div class="group-1">
                      <div class="title">
                        <div class="box">
                          <h2>About Me</h2>
                        </div>
                        <hr>
                      </div>
                      <div class="desc"><?php echo $about_me;?></div>
                    </div>
                    <div class="group-2">
                      <div class="title">
                        <div class="box">
                          <h2>Education</h2>
                        </div>
                        <hr>
                      </div>
                      <div class="desc">
                        <?php 
                          for($i=0; $i<count($institutes);$i++)
                          {
                            echo "<ul>
                            <li>
                              <div class='msg-1'>" . $froms[$i] . "-" . $tos[$i]. " | " . ucwords($degrees[$i]) . ", " . $grades[$i]. "</div>
                              <div class='msg-2'>" . ucwords($institutes[$i]) . "</div>
                              
                            </li>
                          </ul>";
                          }
                        ?>
                      </div>
                    </div>


                <?php } ?>

                <div class="group-2">
                    <div class="title">
                        <div class="box">
                            <h2>Experience </h2>
                        </div>
                        <hr>
                    </div>
                    <div class="desc">
                        <?php 
                        for($i = $start_index; $i < $end_index; $i++) {
                            echo "<ul>
                                <li>
                                    <div class='msg-1'>" . $experiences[$i]['from'] . "-" . $experiences[$i]['to'] . " | " . ucwords($experiences[$i]['title']) . "</div>
                                    <div class='msg-2'>" . ucwords($experiences[$i]['company']) . "</div>
                                    <div class='msg-3'>" . $experiences[$i]['description'] . "</div>
                                </li>
                            </ul>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php 
    }
}
?>
</body>
</html>