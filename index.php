<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assests/images/logo.jpeg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Student Information System</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="100">
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand p-0" href="#"><img src="assests/images/brand.png" style="height:10%; width:10%; padding-bottom:5px;"> MY University</a>
            <ul class="navbar-nav mx-auto" style="padding-right:200px;">
                <li class="nav-item">
                    <a class="nav-link" href="#home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#course">COURSES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
            </ul>
            <nav class="navbar-nav">
                <a href="login.php" class="btn btn-secondary">LOGIN</a>
            </nav>
        </nav>
    </header>
    <div id="home" class="container" style="margin-top: 56px;">
        <div class="text-center pt-4">
            <img src="assests/images/home.jpg" alt="home">
        </div>
        <div id="slideShow" class="carousel slide pt-2" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slideShow" data-slide-to="0" class="active"></li>
                <li data-target="#slideShow" data-slide-to="1"></li>
                <li data-target="#slideShow" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="width:100%;" src="assests/images/img.png" alt="UM">
                </div>
                <div class="carousel-item">
                    <img style="width:100%;" src="assests/images/img1.jpg" alt="UM">
                </div>
                <div class="carousel-item">
                    <img style="width:100%;" src="assests/images/img2.png" alt="UM">
                </div>
            </div>
            <a class="carousel-control-prev" href="#slideShow" data-slide="prev">
    	    	<span class="carousel-control-prev-icon"></span>
  		    </a>
        

            <a class="carousel-control-next" href="#slideShow" data-slide="next">
    		    <span class="carousel-control-next-icon"></span>
  		    </a>
        

        </div>
    </div>
    <div id="course" class="jumbotron jumbotron-fluid mt-5" style="background-color:#2D2D2D">
        <div class="container">
            <h1 class="text-center text-white">COURSES</h1>
            <p class="text-center text-white">FACULTY OF COMPUTER SCIENCE</p>
        </div>
    </div>
    <div class="container">
        <div class="accordion" id="accordionContent">
            <div class="card" style="background-color:#6B6B6B">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0 text-center">
                        <button class="btn text-white btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ARTIFICIAL INTELLIGENCE
                        </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionContent">
                    <div class="card-body text-white">
                        This programme equips students with the knowledge and skills to design and develop computer systems that emulate and exhibit human intelligence. Students will learn the theoretical and practical aspects of Robotics, Cognitive Science, Image Processing, Natural Language Processing, Machine Learning, Artificial Neural Network, Fuzzy Logic, Expert Systems and Logic Programming. Students will apply their skills and knowledge through the development of real world applications in their final year projects.
                    </div>
                </div>
            </div>
            <div class="card" style="background-color:#808080">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0 text-center">
                        <button class="btn text-white btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            COMPUTER SYSTEM AND NETWORK
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionContent">
                    <div class="card-body text-white">
                        The purpose of this programme is to produce graduates who understand and able to apply the knowledge in networking and the theory of computer systems. The graduates will have the ability to apply critical thinking skills and advanced scientific techniques in solving computer-based problems in line with the rapidly changing computer systems and technology.
                    </div>
                </div>
            </div>
            <div class="card" style="background-color:#6B6B6B">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0 text-center">
                        <button class="btn text-white btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            INFORMATION SYSTEMS
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionContent">
                    <div class="card-body text-white">
                        This programme aims to equip graduates with the ability to apply the concepts and principles of Information Systems to support the design, development and management of Information Systems. The graduates will be able to design and develop Information Systems to suit the orgaizational needs using highest quality technology-based services, with high ethical values in the context of professional practice of computing.
                    </div>
                </div>
            </div>
            <div class="card" style="background-color:#808080">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0 text-center">
                        <button class="btn text-white btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            MULTIMEDIA
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionContent">
                    <div class="card-body text-white">
                        This programme aims to produce graduates with knowledge and skills in the field of information technology and multimedia computing. The graduates will be able to apply the techniques and algorithms to solve information technology problem, and to utilize suitable software to process the elements of multimedia to achieve the goals of multimedia system developments.
                    </div>
                </div>
            </div>
            <div class="card" style="background-color:#6B6B6B">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0 text-center">
                        <button class="btn text-white btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            DATA SCIENCE
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionContent">
                    <div class="card-body text-white">
                        This programme aims to produce excellent graduates who are able to apply the knowledge gained in the field of Computer Science and Data Science and apply scientific techniques to solve computer-based problems, as well as having entrepreneurship mindset.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="about">
        <div class="jumbotron jumbotron-fluid mt-5" style="background-color:#474747">
            <h1 class="text-center text-white">ABOUT US</h1>
        </div>
        <div class="text-center" style="width:60%; margin:auto">
            <h3 class="pt-3">Vision</h3>
            <p>To be an internationally renowned institution of higher learning in research, innovation,
			publication and teaching.</p><br/>
            <hr>
            <h3 class="pt-3">Mission</h3>
            <p>To advance knowledge and learning through quality research and education for the nation
            and for humanity.</p><br/>
            <hr>
            <h3 class="pt-3">History</h3>
            <p>The University of Malaya derives its name from the term 'Malaya' as the country was then known. The Carr-Saunders
            Commission on University Education in Malaya recommended the setting up of the university. The growth of the University was very rapid during the first decade of its establishment and this resulted in the
            setting up of two autonomous Divisions on 15 January 1959, one located in Singapore and the other in Kuala
            Lumpur. In 1960, the government of the two territories indicated their desire to change the status of the
            Divisions into that of a national university. Legislation was passed in 1961 and the University of Malaya was
            established on 1st January 1962.</p>
        </div>
    </div>
    <div id="contact">
        <div class="jumbotron jumbotron-fluid mt-5" style="background-color:#6F6D6D">
            <h1 class="text-center text-white">CONTACT US</h1>
        </div>
        <div class="container pt-3">
            <div class="row" style="width:80%; margin:auto">
            <div class="col-6 text-center">
                <br>
                <b>Student Affairs</b><br>
				<p>Tel: +603-7967 3204<br>
				Email: tnc_hep@um.edu.my</p><br>
				<b>Academic Administration</b><br>
				<p>Tel: +603-7967 3282<br>
				Email: pengarah_aasc@um.edu.my</p><br>
				<b>Faculty of Computer Science</b><br>
				<p>Tel: +603-7967 6300<br>
				Email: dekan_fsktm@um.edu.my</p>
            </div>
            <div class="col-6">
                <form action="https://formspree.io/lytw1997@gmail.com" method="POST" rel="nofollow">
				    <div class="form-group">
    				    <label for="name">Name:</label>
   					    <input type="text" class="form-control" placeholder="Enter name" name="name" required>
  		            </div>
  		            <div class="form-group">
    				    <label for="email">Email address:</label>
   					    <input type="email" class="form-control" placeholder="Enter email" name="email" required>
  		            </div>
  		            <div class="form-group">
    				    <label for="message">Message:</label>
      						<textarea class="form-control" rows="5" placeholder="Leave your message here" name="message" required></textarea>
  		            </div>
  		            <button type="submit" class="btn btn-dark">Send Message</button>
				</form>
            </div>
            </div>
        </div>
    </div>
    <footer class="mt-5 text-white" style="text-align:center; height:40px; background:#222222;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p></footer>
</body>
</html>