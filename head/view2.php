


<?php 
session_start();
include('../config/conn.php');
if (isset($_SESSION['idhod']) && isset($_SESSION['fnamehod'])) {  
    $id=$_GET['id'];
    if (isset($id)) {
       

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/consulte2.css">
  
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>

     <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/info.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
:root {
  --purple2: #CFB7FF;
  --purple3: #9967CE;
  --purple4: #bb7efc;
  --purple: #BA9CF6;
  --blueColor: #696cff;
  --whiteColor: #ffffff;
  --lightGray: #f7f7f7;
  --textColor: #d1d1d1;
  --borderColor: #e4e4e4;
  --smallBorder: .5rem;
  --bigBorder: 2rem;
  --fs13: 1.3rem;
  --fs14: 1.4rem;
  --fs15: 1.5rem;
  --fs16: 1.6rem;
  --fs20: 2rem;
  --fs30: 3rem;
}

.profile-cardinfo {
  position: relative;
  height: auto;
  width: auto;
  margin-top: auto;
  justify-content: center;
  align-items: center;
}

.containerinfo {
  position: relative;
  /* z-index: 100; */
  width: 1100px;
  height: 600px;
  margin-left: 1.5cm;
  border-radius: 25px;
  padding: 30px;
  background: #fff;
  box-shadow: 0 3px 14px rgba(154, 154, 156, 0.219);
  border: 1px solid rgba(255, 255, 255, .18);
}

.containerinfo .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  opacity: 0.8;
  border-radius: 10px;
  z-index: -1;
}

.containerinfo .img-informa {
  position: absolute;
  top: 15px;
  right: 13px;
  width: 120px;
  height: 120px;
  z-index: 100;
}

.containerinfo .img-informa img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  margin: 0 auto;
  border-radius: 65%;
}

.containerinfo .inform {
  position: relative;
  z-index: 100;
}

.containerinfo .information-form h1 {
  font-size: 22px;
  width: 50%;
  color: #696cff;
  margin-bottom: 15px;
  padding-bottom: 10px;
  border-bottom: 1px solid var(--main-color);
}

.containerinfo .information-form p {
  font-size: 14px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  color: #353e50e0;
}

.containerinfo .information-form p span {
  color: #353e50e0;
  flex: 1;
}

.containerinfo .information-form .titreinfoform {
  color: #6652bda9;
  font-size: medium;
  font-weight: bolder;
  letter-spacing: 1px;
  text-transform: capitalize;
}

.containerinfo .information-form p:last-of-type {
  letter-spacing: 1.5px;
}

.containerinfo .information-form p i {
  color: var(--main-color);
  padding-right: 15px;
}

.containerinfo .links-buttonconsult {
  display: flex;
  align-items: center;
 

    margin-top: 30px;
    position: relative;
  
  }
  
  
  .containerinfo .links-buttonconsult a i {
    line-height: 10px;
    font-size: 20px;
  }
  .containerinfo .links-buttonconsult a{
    text-decoration: none;
    display: inline;
  }
  @media (max-width: 767px) {
    .containerinfo {
      width: 100%;
      height: auto;
      padding: 15px;
    }
  
    .containerinfo .img-informa {
      position: relative;
      margin: 0 auto;
      width: 250px;
      height: 250px;
      right: auto;
      margin-bottom: 15px;
    }
  
    .containerinfo .information-form h1 {
      font-size: 30px;
    }
  
    .containerinfo .img-informa img {
      border-radius: 50%;
    }
  }
  @media (max-width: 650px) {
    .profile-cardinfo{
    justify-content: right;
    align-items: flex-start;
    }
    .containerinfo {
      width: 450px;
      height: auto;
      padding: 15px;
    
    }
  
    .containerinfo .img-informa {
      position: relative;
      margin: 0 auto;
      width: 230px;
      height: 230px;
      right: auto;
      margin-bottom: 15px;
    }
  
    .containerinfo .information-form h1 {
      font-size: 28px;
    }
  
    .containerinfo .img-informa img {
      border-radius: 50%;
    }
    .containerinfo .links-buttonconsult {
      display: -moz-box;
      
      
      align-items: center;
      
      position: relative;
    
    }
    #accepet-rq{
      width: 20%;
    }
    #refuse-rq{
      width: 40%;
    }
    #cancel-rq{
      width: 40%;
    }
  }
  
  
  .btn-forminfo {
    display: block;
    
    padding: 12px 40px;
    border: 0;
   
    color: #fff;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s ease-in-out;
    box-shadow: 0 .1rem .2rem #0002;
    border-radius: 15px;
    cursor: pointer;
  margin-top: 1cm;
  
  }
  
  #accepet-rq{
  text-align: center;
    width: 130%;
    height: 45%;
    background-color:#96b7a1;
    font-weight: 600;
  }
  #accepet-rq:hover{
    width: 131%; 
    background-color: #a3c2c177;
  }
  #refuse-rq{
  margin-left: 3cm;
    text-align: center;
    width: 75%;
    height: 45%;
    background-color: rgba(253, 0, 0, 0.342);
    font-weight: 600;
  }
  #refuse-rq:hover{
    width: 76%;
    background-color: #faa2a23b;
  }
  #cancel-rq{
    margin-left: 9cm;
  background-color: rgba(153, 132, 243, 0.733);
  font-weight: 600;
  }
  #cancel-rq:hover{
   background-color: rgb(245, 214, 203);
  }
  
  /*table*/
  
  
  /*table reaqust*/
  
  
   .popup_box{
    position: absolute;
    margin-top: 2cm;
    justify-content: center;
    text-align: center;
    align-items: center;
    top: 50%;
    left: 48%;
    transform: translate(-50%, -50%);
    border-radius: 5px;
  }
  
  .popup_box{
    width: 370px;
    background: #fefefe;
    justify-content: center;
    text-align: center;
    align-items: center;
    padding: 40px;
    border: 1px solid #ffffff;
    box-shadow: 0px 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    z-index: 9999;
    display: none;
  }
  
  .popup_box h1{
    font-size: 20px;
    color: var(--purple);
    margin-bottom: 5px;
  }
  .popup_box label{
    font-size: 17px;
    color: #404040;
    font-weight: 300;
  }
  .popup_box .btns{
    margin: 40px 0 0 0;
 
  }
  .btns-res .btn1-res, .btns-res .btn2-res{
    background: #b2a3e6;
    color: white;
    font-size: 14px;
    border-radius: 5px;
   
    padding: 10px 25px;
  
  }
  .btns-res .btn2-res{
    margin-left: 20px;
    background: #b547f5e1;
   
  
  }
  .btns-res .btn1-res:hover{
    transition: .5s;
    background: #8c8c8c;
  }
  .btns-res .btn2-res:hover{
    transition: .5s;
    background: #c1dcf7;
  }
  a{
    text-decoration: none;
  }
  
  
  
  
  
  
  
  
  
  
  
  
  .fields-res{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }
  .fields-res .input-reason{
    display: flex;
    width: calc(100% / 1 - 15px);
    flex-direction: column;
    margin: 4px 0;
    margin-bottom: 0.4cm;
  }
  .input-reason label{
    font-size: 17px;
    font-weight: 450;
    color: #615f5fd7;
  }
  .input-reason input, select{
    outline: none;
    font-size: 13px;
    font-weight: 300;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaaaaa28;
    padding: 0 15px;
    height: 38px;
    margin: 8px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.041);
  }
  .input-reason input :focus,
  .input-reason select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
  }
  .input-reason select,
  .input-reason input[type="date"]{
    color: #707070;
  }
  .input-reason input[type="date"]:valid{
    color: #333;
  }
  /*pop2*/
  
  
  
  
  
   .popup_box2{
    position: absolute;
    margin-top: 3.5cm;
   
    top: 50%;
    left: 48%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
  }
  
  .popup_box2{
    width: 350px;
    background: #ffffff;
    text-align: center;
    align-items: center;
    padding: 30px;
    border: 1px solid #ffffff;
    box-shadow: 0px 5px 10px rgba(211, 210, 210, 0.2);
    z-index: 9999;
    display: none;
    border-radius: 5px;
  }
  .popup_box2 span i{
    font-size: 40px;
    font-weight: bolder;
    color:  #207bf3bb;
   
    border: 6px solid #207bf3bb;
    padding: 4px 8px;
    border-radius: 50%;
    margin: -10px 0 20px 0;
  }
  .popup_box2 h1{
    font-size: 17px;
    color: #4d4e4ea4;
    margin-bottom: 5px;
  }
  .popup_box2 label{
    font-size: 23px;
    color: #404040;
  }
  .popup_box2 .btns-ac{
    margin: 40px 0 0 0;
  }
  .btns-ac .btn1-ac, .btns-ac .btn2-ac{
    background: #f71a1a41;
    color: white;
    font-size: 16px;
    border-radius: 7px;
    border: 1px solid transparent;
    padding: 12px 18px;
  }
  .btns-ac .btn2-ac{
    margin-left: 20px;
    background: #6933ffa9;
    border: 1px solid transparent;
  }
  .btns-ac .btn1-ac:hover{
    transition: .5s;
    background: #ff1b1bbd;
  }
  .btns-ac .btn2-ac:hover{
    transition: .5s;
    background: #c954f769;
  }
 
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
    .statc0lor{
        color:#7ac7b0 ;
    }

  
</style>
</head>
<body>
   <div class="container" id="top">
    <!--start sidebar///////////////////////////////////////////////-->
    <aside class="sidebar-wrapper">
            <div class="sidebar-header">
                <img src="send2.png" alt="Logo">
                <h4>Staget</h4>
                <div class="close-menu">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <nav>
                <ul>
                    <li ><a href="index.php" data-section="home">
                            <i class="fas fa-home"></i>
                            <div class="title">Home  </div>
                           
                        </a></li>


                        <li>
                            <a href="#internship" class="dropdown-toggle">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <div class="title">internship Request</div>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="submenu">
                                <li ><a href="request.php"><i class='bx bx-send' style="font-size: 2rem;"></i>Request</a></li>
                                <li><a href="acc.php"><i class='bx bx-check-circle' style="font-size: 2rem;"></i>Accepted</a></li>
                                <li  class="active"><a href="ref.php"> <i class='bx bx-x-circle' style="font-size: 2rem;"></i>Refused</a></li>
                            </ul>
                        </li>
                    <li><a  href="intern.php" data-section="company">
                        <i class="fa-solid fa-briefcase"></i>
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
                    <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #8041f5ab;"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="header-right">

<div class="dropdown dt">
    <div class="star-container bell">
        <i class='bx bx-bell'></i>
        <span class="count" ></span>
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
					}
				}
			});
		}

		load_unseen_notification();

		$(document).on('click', '.dt', function() {
			$('.count').html('');
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
        <section  id="consulte-section" class="page-section ">
        <div class="home__title" style="font-size: 1.6rem;
  color: #0e0e0ed0;  margin-top: 0.8cm;  margin-left: 0.5cm;">Dashboard <i class='bx bx-right-arrow-alt bx-tada' style="font-size: 1.6rem;
  color:#0e0e0e8f; "></i><span style=" color: #8041f5ab;">Request Information </span> </div><br>
               <div class="row">
               <div class="profile-cardinfo" id="req">
     <?php
             $sql = "SELECT * FROM request INNER JOIN student ON student.id_student = request.id_student where id_req='$id'";  
             $result = mysqli_query($conn, $sql);  
              
             if (mysqli_num_rows($result) === 1) {
              $row = mysqli_fetch_assoc($result);
     ?>
                  <div class="containerinfo">
                    <div class="img-informa">
                    
                      <img src="../student/img/<?=$row['profile_student']?>" alt="profile-img" />
                    </div>
                    <div class="information-form">
                    <h1> <a href="ref.php"><i class="fa-sharp fa-solid fa-circle-xmark"></i></a></h1>

                      <h1><?=$row['firstname_student']." ".$row['lastname_student']?></h1>
            
                      <p>
                        <span class="titreinfoform">Personal Details: </span>
                       
                      </p>
                     <p>
                        <span> Date of Birth: <?=$row['birthday_student']?></span>
                        
                      </p>
                      
                      <p>
                        <span>Speciality: <?=$row['speciality_student']?></span>
                        <span>Level: <?=$row['level_student']?></span>
                      </p>
                      
                     
                      <p><span> Semester: <?=$row['semester_student']?></span>
                        <span>Academic Year: <?=$row['acyear_student']?></span></p>
                      <p>
                        <p>
                          <span class="titreinfoform">information relating to the establishment: </span>
                         
                        </p>
                        <p>
                        <span>Name instution: <?=$row['name_comp']?></span>
                        
                        <span>Address: <?=$row['add_comp']?></span>
            
                      </p>
                      <p>
                        <span>phone number: <?=$row['phone_comp']?></span>
                        <span>EMAIL: <?=$row['email_comp']?></span>
                      </p>
                      <p>
                        <span>Internship manager: <?=$row['manager']?></span>
                        <span>Contact details: <?=$row['email_manager']?></span>
                      </p>
                      <p>
                        <span class="titreinfoform">Internship information: </span>
                       
                      </p>
                      <p><span>Duration  of the course: <?=$row['duration']?></span>
                        <span>work plan: <?=$row['work_plan']?></span>
                      </p>
                      <p>
                        <span>starting date: <?=$row['str_date']?></span>
                        <span>finishing date: <?=$row['end_date']?></span>
                      
                      </p>
                      
                    </div>
                   
            
            <?php } ?>
                     
            
                    </div>
                  </div>

                </div>
                
           
                </div>
       
               </div>
            
            </section>


        </div>
<br><br><br>
        <footer>
            <div class="copyright">
                copyright &copy; 2023 | Staget made with ❤️ by girls team | all right reserved.
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
    
    
   </div>
   <!--incriment num-->
   
   <!--cicle bar-->

    



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
               }}
                ?>
