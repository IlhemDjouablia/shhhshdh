<?php 
session_start();
include('../config/conn.php');
if (isset($_SESSION['idhod']) && isset($_SESSION['fnamehod'])) {
  $dep=$_SESSION['dephod'];

  $sql = "SELECT count(id_req) FROM request INNER JOIN student ON student.id_student = request.id_student where student.dep_student='$dep'and request.state is null ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($result);
  $_SESSION['request'] = $row[0];
  $sql2 = "SELECT count(id_req) FROM request INNER JOIN student ON student.id_student = request.id_student where student.dep_student='$dep' and request.state = 100";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_row($result2);
  $_SESSION['intern'] = $row2[0];
  $sql3 = "SELECT count(id_req) FROM request INNER JOIN student ON student.id_student = request.id_student where student.dep_student='$dep' and request.state = 0";
  $result3 = mysqli_query($conn, $sql3);
  $row3 = mysqli_fetch_row($result3);
  $_SESSION['refused'] = $row3[0];
 ?>
 <style>

.home__title{
font-size: 3rem;
font-weight: 800;
margin-bottom:1rem;
color: #5B5757;
}
.DROP-PROFIL {
  position: relative;
}

.dropdown-menu-pro4 {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
 
  width: 210px;
  background: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
  border-radius: 10px;
  z-index: 1;
  animation: slideDown 0.3s ease-in-out;
  animation-fill-mode: forwards;
  opacity: 0;
  transform: translateY(-10px);
}

.MY-PROF {
  display: flex;
  align-items: center;
  padding: 20px;
  transition: all 0.2s ease-in-out;
  border-bottom: .1rem solid #aaa7a717;
  cursor:pointer;
  border-radius: 10px;
}

.MY-PROF:hover {
  background-color:#af9ef875;
  
}

.MY-PROF i {
  font-size: large;
  color: #8041f5ab;
  border-radius: 50%;
  margin-right: 10px;
}

.MY-PROF-text {
  flex: 1;
}

.MY-PROF-text p {
  margin: 0;
  font-size: 14px;
  font-weight: bold;
  color: #000000b6;
}

.notification-text span {
  font-size: 11px;
  color: #7884f5;
}

.DROP-PROFIL:hover .dropdown-menu-pro4 {
  display: block;
  opacity: 1;
  transform: translateY(0);
}

@keyframes slideDown {
  0% {
    opacity: 0;
    transform: translateY(-10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
   <div class="container" id="top">
    <!--start sidebar///////////////////////////////////////////////-->
    <aside class="sidebar-wrapper">
            <div class="sidebar-header">
                <img src="img/lgogoo2.png" alt="Logo">
                <h4>Staget</h4>
                <div class="close-menu">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="index.php" data-section="home">
                            <i class="fas fa-home"></i>
                            <div class="title">Home  </div>
                           
                        </a></li>


                        <li>
                            <a href="#internship" class="dropdown-toggle">
                            <i class="fa-solid fa-briefcase"></i>
                                <div class="title">internship Request</div>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="request.php"><i class='bx bx-send' style="font-size: 2rem;"></i>Request</a></li>
                                <li><a href="acc.php"><i class='bx bx-check-circle' style="font-size: 2rem;"></i>Accepted</a></li>
                                <li ><a href="ref.php"> <i class='bx bx-x-circle' style="font-size: 2rem;"></i>Refused</a></li>
                            </ul>
                        </li>
                    <li><a href="intern.php" data-section="company">
                    <i class="fa-solid fa-address-card"></i>
                            <div class="title">List Of intern</div>
                        </a></li>

                    <li><a href="contact.php"  data-section="contact">
                        <i class="fa-solid fa-message"></i>
                            <div class="title">Contact</div>
                        </a></li> 

                    
                  
                </ul>
            </nav>
        </aside>
    <!--end sidebar//////////////////////////////////////////////////-->
    <main class="content">
        <!--start header ////////////////////////////////////////////////-->
        <header>
            <div class="header-wrapper">
                <div class="header-left">
                    <div class="toggle-icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #8041f5ab"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="header-right">

                <div class="dropdown dt">
    <div class="star-container bell">
        <i class='bx bx-bell'></i>
        <span class="count" style="	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid white;
	background: #fe3232d8;
	color: white;
	font-weight: 700;
	font-size: 12px;
	display: none;
	justify-content: center;
	align-items: center;
    display: flex;"></span>
      </div>
    <div class="dropdown-content ">

    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		function load_unseen_notification(view = '') {
			$.ajax({
				url: "fetch.php",
				method: "POST",
				data: { view: view },
				dataType: "json",
				success: function(data) {
					$('.dropdown-content').html(data.notification);
					if (data.unseen_notification > 0) {
						$('.count').html(data.unseen_notification);
						$('.count').css('display', 'flex');
					} else {
						$('.count').html('');
						$('.count').css('display', 'none');
					}
				}
			});
		}

		load_unseen_notification();

		$(document).on('click', '.dt', function() {
			$('.count').html('');
			$('.count').css('display', 'none');
			load_unseen_notification('yes');
		});

		setInterval(function() {
			load_unseen_notification();
		}, 5000);
	});
</script>
<a href="contact.php">
                    <div class="star-container chat">
                    <i class='bx bx-message-detail'></i>
                    </div></a>
                    <div class="DROP-PROFIL">
                   <div class="photp-pro">
                   <img src="img/<?=$_SESSION['phod']?>" alt="avatar" style="height: 45px ;width:45px ;">
                    </div>
                    <div class="dropdown-menu-pro4">
                    
                      <div class="MY-PROF">
                        <a href="profile.php">
                        <i class='bx bx-user-circle'></i>
                        <div class="MY-PROF-text">
                            <p>My Profil</p>
                          </a>
                        </div></div>
                        <div class="MY-PROF">
                          <a href="security.php">
                          <i class='bx bxs-lock-alt'></i>
                          <div class="MY-PROF-text">
                              <p>Security</p>
                            </a>
                          </div></div>
                          <div class="MY-PROF">
                            <a href="../logout.php">
                            <i class='bx bx-log-out-circle'></i>
                            <div class="MY-PROF-text">
                                <p>Log Out</p>
                              </a>
                            </div></div>
                       
                    </div>
                  </div>
                </div>
            </div>
        </header>        
            <section >
            <div class="home__title" style="font-size: 1.6rem;
  color: #0e0e0ed0;  margin-top: 0.8cm;  margin-left: 0.5cm;">Dashboard <i class='bx bx-right-arrow-alt bx-tada' style="font-size: 1.6rem;
  color:#0e0e0e8f; "></i><span style=" color: #8041f5ab;">Home </span> </div><br>
                <div class="row">
                  <div class="contain2">
                    
                          <div class="box-home">
                              <div class="image-home">
                                  <img src="img/<?=$_SESSION['phod']?>">
                            
                              </div> 
                               <div class="content-home">
                                <h3 class="title-home"><i class="fa-thin fa-hand-wave"></i>hello <span style="color:  rgb(96, 106, 247);"><?=$_SESSION['fnamehod']." ".$_SESSION['lnamehod']?></span></h3>
                                <span class="post">head of <?=$_SESSION['dephod']?> department</span>
                                <span class="text-home">Welcome to your  dashboard. Here, you can manage such operation internship applications in real-time, browse available internship company.</span>
                                <a href="profile.php" class="sidebar-link" data-section="profile"> <button class="btn-home"> view profil</button> </a>
                              </div>
                            
                       </div>  
                  </div>
                  <div class="contain3">
                     
                  </div>
                  
           
                 </div> 
                 <br><div class="home__title">   </div><br> 

               <br>
                   <br>
                   <div class="row">

                    <div class="contain1">
                      
                        <img src="about1.png" style="height: 125px ;width:125px ;">
                      <span class="num" data-val="<?=$_SESSION['intern']?>">00</span>
                      <p class="text">Intern</p>
                    </div>
                    <div class="contain1" >
                        
                        <img src="send2.png" style="height: 125px ;width:125px ;">
                      <span class="num" data-val="<?=$_SESSION['request']+1?>">00</span>
                      <p class="text">Requests</p>
                    </div>
                    <div class="contain1">
                       <img src="loop2.png" style="height: 125px ;width:125px ;">
                       
                      <span class="num" data-val="<?=$_SESSION['refused']?>">00</span>
                      <p class="text">Refused</p>
                    </div>
                   </div>
                   <br><div class="home__title"></div>
              </section>
       
<br><br><br>
        <footer>
            <div class="copyright">
            Ilhème & Hadjer L3 TI 2023.
            </div>
        </footer>


    </main>
   </div>

    <div class="switcher-container">
        <div class="switcher-icon">
            <i class="fas fa-cog"></i>
        </div>
        <div class="switcher-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="switcher-header">
            <h3>theme customizer</h3>
            <h4>theme styles</h4>
        </div>
        <div class="switcher-body">
            <ul>
                <li data-color="#f7f7f7" class="active"></li>
                <li data-color="#212529"></li>
            </ul>
        </div>
    </div>
    <a href="#top" class="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    
    
    <script>
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const activeListItem = document.querySelector(".submenu li.active");

    dropdownToggle.addEventListener("click", function (event) {
        event.preventDefault();
        const parentLi = this.parentElement;
        parentLi.classList.toggle("open");
    });

    // Check if there is an active list item and keep the dropdown open
    if (activeListItem) {
        const parentDropdown = activeListItem.closest(".submenu");
        const parentLi = parentDropdown.parentElement;
        parentLi.classList.add("open");
    }
</script>

   <!--incriment num-->
   <script>
  let valueDisplays = document.querySelectorAll(".num");
  let interval = 2000;

  valueDisplays.forEach((valueDisplay) => {
    let startValue = 0;
    let endValue = parseInt(valueDisplay.getAttribute("data-val"));
    let duration = Math.floor(interval / endValue);
    let counter = setInterval(function () {
      valueDisplay.textContent = startValue;
      if (startValue < endValue) {
        startValue += 1;
      } else {
        clearInterval(counter);
      }
    }, duration);
  });
</script>


   <!--cicle bar-->

    

    
   
   <script>
const dropdownToggle = document.querySelector(".dropdown-toggle");

dropdownToggle.addEventListener("click", function (event) {
    event.preventDefault();
    const parentLi = this.parentElement;
    parentLi.classList.toggle("open");
});







</script>
<script>


let btnMenu = document.querySelector('.toggle-icon i');
let menu = document.querySelector('.sidebar-wrapper');
let closeBtn = document.querySelector('.close-menu i');
let switcherBtn = document.querySelector('.switcher-icon i');
let switcherContainer = document.querySelector('.switcher-container');
let switcherClose = document.querySelector('.switcher-close i');

//Function add Class
function addClass(button, containerName, className) {
    button.addEventListener('click', () => {
        containerName.classList.add(className);
    });
}

//Function remove Class
function removeClass(button, containerName, className) {
    button.addEventListener('click', () => {
        containerName.classList.remove(className);
    });
}

addClass(btnMenu, menu, 'active');
removeClass(closeBtn, menu, 'active');
addClass(switcherBtn, switcherContainer, 'open');
removeClass(switcherClose, switcherContainer, 'open');

//Change Color
let colorsBtn = document.querySelectorAll('.switcher-body ul li');

colorsBtn.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        colorsBtn.forEach((btn) => {
            btn.classList.remove('active');
        });
        btn.classList.add('active');
        if (e.target.dataset.color === "#212529") {
            document.documentElement.style.setProperty('--lightGray', e.target.dataset.color);
            document.documentElement.style.setProperty('--whiteColor', '#2b3035');
            document.documentElement.style.setProperty('--textColor', '#9ca2a8');
            //Set Colors in local storage
            let colors = [e.target.dataset.color, '#2b3035', '#9ca2a8'];
            localStorage.setItem("colors-options", JSON.stringify(colors));
        } else {
            document.documentElement.style.setProperty('--lightGray', e.target.dataset.color);
            document.documentElement.style.setProperty('--whiteColor', '#ffffff');
            document.documentElement.style.setProperty('--textColor', '#4c5258');
            //Set Colors in local storage
            let colors = [e.target.dataset.color, '#ffffff', '#4c5258'];
            localStorage.setItem("colors-options", JSON.stringify(colors));
        }
    });
});

//Read Colors From LocalStorage
let colorsStorage = JSON.parse(localStorage.getItem('colors-options'));
//Check If Local Storage is not empty
if (colorsStorage !== null) {
    document.documentElement.style.setProperty('--lightGray', colorsStorage[0]);
    document.documentElement.style.setProperty('--whiteColor', colorsStorage[1]);
    document.documentElement.style.setProperty('--textColor', colorsStorage[2]);
}
</script>






</body>
</html>
                <?php 
               }else{
                    header("Location: ../login.php");
                    exit();
               }
                ?>