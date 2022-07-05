 <?php  
include 'connect.php';
if (isset($_POST['save'])) { 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $cat = $_POST['cat'];
    $message = $_POST['message'];

// $sql = "INSERT INTO feedback (name,date,email,categories,message) VALUES ('$name','$date','$email','$cat','$message')";
$sql = "INSERT INTO Appointment (name,date,email,categories,message,type) VALUES ('$name','$date','$email','$cat','$message','Appointment')";

$html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Date</td><td>$date</td></tr><tr><td>message</td><td>$message</td></tr></table>";

include('smtp/PHPMailerAutoload.php');
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
     $mail->SMTPDebug  = 3;
    $mail->SMTPSecure="tls";
    $mail->Port=587;
    
    $mail->SMTPAuth=true;
    $mail->CharSet = 'UTF-8';
    $mail->Username="nandan.mrn4@gmail.com";
    $mail->Password="tjddboxjziuvlgdy";
    $mail->SetFrom("nandan.mrn4@gmail.com");
    $mail->addAddress("nandanzzz.mrn4@gmail.com");
    $mail->IsHTML(true);
    $mail->Subject="New Feedback";
    $mail->Body=$html;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false



    // $mail=new PHPMailer(true);
    // $mail->isSMTP();
    // $mail->Host="smtp.hostinger.com";
    // $mail->SMTPDebug  = 3;
    // $mail->SMTPSecure="ssl";
    //   $mail->Port=465;
    // $mail->SMTPAuth=true;
    // $mail->CharSet = 'UTF-8';
    // $mail->Username="info@ghugeimmigration.com";
    // $mail->Password="Password12!!";
    // $mail->SetFrom("info@ghugeimmigration.com");
    // $mail->addAddress("info@ghugeimmigration.com");
    // $mail->IsHTML(true);
    // $mail->Subject="New Feedback";
    // $mail->Body=$html;
    // $mail->SMTPOptions=array('ssl'=>array(
    //     'verify_peer'=>false,
    //     'verify_peer_name'=>false,
    //     'allow_self_signed'=>false




    // $mail->Port=587;
    // $mail->Port=995;

    ));
if(!$mail->Send()){
        // echo $mail->ErrorInfo;
    }else{
        // echo 'Sent';
    }

    // $sql = "INSERT INTO feedback (name,date,email,categories,message) VALUES ('$name','$date','$email','$cat','$message')";
     // printf($sql);
    if (mysqli_query($db,$sql)) {
    	header("Refresh:1; url=index.php");
        // echo "uploaded successfully";
    	}
}

if (isset($_POST['save1'])) { 
    $name = $_POST['name1'];
    $email = $_POST['email1'];
    $cat = $_POST['cat1'];
    $message = $_POST['message1'];

    // $to = "nandan.mrn@gmail.com";
    // $subject = "Enquiry Mail";
    // $message1 = "Name:".$name. "\n"."Email:".$email. "\n"."Categories:".$cat. "\n"."Message:".$message;
    // $headers = "From".$email;

    // if(mail($to, $subject, $message1)){
    //     echo "Mail sent successfully";
    // }
    // else{
    //     echo "Couldnt send mail";
    // }

     $to = "nandan.mrn@gmail.com"; // this is your Email address
    $from = $_POST['email1']; // this is the sender's Email address
    $first_name = $_POST['name1'];
    $last_name = $_POST['name1'];
    $subject = $cat;
    $subject2 = $cat;
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message1'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message1'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";



    // $sql = "INSERT INTO feedback (name,email,categories,message) VALUES ('$name','$email','$cat','$message')";

    $sql = "INSERT INTO Appointment (name,email,categories,message,type) VALUES ('$name','$email','$cat','$message','Enqiry')";
     // printf($sql);
    if (mysqli_query($db,$sql)) {
    	header("Refresh:1; url=index.php");
        // echo "uploaded successfully";
    	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Ghuge Legal Services</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
<link rel="stylesheet" href="css/animate.css" />
<link rel="stylesheet" href="css/owl.carousel.min.css" />
<link rel="stylesheet" href="css/owl.theme.default.min.css" />
<link rel="stylesheet" href="css/magnific-popup.css" />
<link rel="stylesheet" href="css/aos.css" />
<link rel="stylesheet" href="css/ionicons.min.css" />
<link rel="stylesheet" href="css/bootstrap-datepicker.css" />
<link rel="stylesheet" href="css/flaticon.css" />
<link rel="stylesheet" href="css/icomoon.css" />
<link rel="stylesheet" href="css/style111.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navabar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
<a class="navbar-brand" href="index.php">Ghugelegal<span>.com</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>
<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">
<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
<li class="nav-item"><a href="about.php" class="nav-link">About Me</a></li>
<li class="nav-item"><a href="practice.php" class="nav-link">Practice Areas</a></li>
<li class="nav-item"><a href="attorney.php" class="nav-link">Team</a></li>
<!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
</ul>
</div>
</div>
</nav>

<section class="hero-wrap d-flex js-fullheight">
<div class="forth js-fullheight d-flex align-items-center">
<div class="text">
	<br /><br /><br /><br /><br /><br /><br /><br />
	<br /><br />
<span class="subheading">Hello,</span>
<h1>I'm Sunil Ghuge</h1>
<h2 class="mb-5">Immigration Consultant, Licensed Paralegal and Notary Public</h2>
<!-- <p><a href="#" class="btn-custom py-3 pr-2">Contact Me</a></p> -->
</div>
</div>
<div class="third about-img js-fullheight" style="background-image:url(images/xbg_2.webp)">
<!-- <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
<span class="icon-play"></a> -->
</a>
</div>
</section>
<section class="ftco-consult bg-light">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-2 text-lg-right">
<h3 class="mb-4 mb-lg-0">Enqiry Form</h3>
</div>
<div class="col-lg-10">
<form action="#dropdown1"method="post" class="consult-form py-5">
<div class="d-lg-flex align-items-md-end">
<div class="form-group mb-3 mb-lg-0 mr-4">
<label for="#">Name</label>
<input type="text" id="name1" name="name1" class="form-control" placeholder="Name" required>
</div>
<div class="form-group mb-3 mb-lg-0 mr-4">
<label for="#">Email Address</label>
<input type="text" id="email1" name="email1" class="form-control" placeholder="Email Address" required>
</div>
<div class="form-group mb-3 mb-lg-0 mr-4">
<label for="#">Categories(optional)</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="ion-ios-arrow-down"></span></div>
<select  id="cat" name="cat1" class="form-control" required>
<option id="select" value="">SELECT</option>
<option value="Immigration Services">Immigration Services</option>
<option value="Notary Services">Notary Services</option>
<option value="Landlord & Tenant Board">Landlord & Tenant Board</option>
<option value="Indian Visa Services">Indian Visa Services</option>
<option value="Small Claims">Small Claims</option>
<option value="Administritive Law">Administritive Law</option>
</select>
</div>
</div>
</div>
<div class="form-group mb-3 mb-lg-0 mr-4">
<label for="#">Message</label>
<textarea id="message1" name="message1"cols="30" rows="3" class="form-control d-flex align-items-center" placeholder="Message"></textarea>
</div>
<div class="form-group">
<input type="submit" name="save1" value="Send Message" class="btn btn-primary py-3 px-4">
</div>
</div>
</form>
</div>
</div>
</div>
</section>
<section class="ftco-section ftco-services">
<div class="container" id="link">
<div class="row justify-content-center mb-5 pb-3">
<div class="col-lg-7 heading-section ftco-animate">
<h2 class="subheading">Services</h2>

<p>Ghuge Legal Services is a professionally incorporated corporation. We provide legal assistance to individuals, companies, and organizations.</p>
<h4 class="mb-4">My Legal Practice Areas</h4>
</div>
</div>
<div class="row" >
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-family-room"></span>
</div>
<div class="media-body">
<h3 class="heading">Notaries</h3>
<!-- <p>We are a one-stop-shop for all your immigration services need. We provide help in PR, PNP, Visitor Visa and Parents Visa and many more.</p> -->
</div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-bar-chart"></span>
</div>
<div class="media-body">
<h3 class="heading">Small Claims Court</h3>
<!-- <p>Our promotional services are priced at only $20 for the first, second, and third document and $10.00 for every subsequent document per client.</p> -->
</div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-medicine"></span>
</div>
<div class="media-body">
<h3 class="heading">Employment Law</h3>
<!-- <p>It deals with civil disputes of a monetary value of up to $35,000. We have the knowledge of issues and facts that are required to be raised during the course of settlement or litigation and develop a powerful strategy to guard your interests.</p> -->
</div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-prison"></span>
</div>
<div class="media-body">
<h3 class="heading">Commission of Oaths</h3>
<!-- <p>We provide legal representation and advice in disputes between landlords and tenants. We serve the communities in Toronto, Peel, Halton, Kitchener, and Waterloo regions.</p> -->
</div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-prison"></span>
</div>
<div class="media-body">
<h3 class="heading">Landlord & Tenant Disputes</h3>
<!-- <p>We provide legal advice and fight your traffic tickets in Toronto, Peel, Halton, Waterloo, Kitchener, and their surrounding areas. Our primary goal is to either get your tickets dismissed or have the demerit points reduced. Since auto insurance is expensive in Canada, it is worth fighting your traffic ticket.</p> -->
</div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-prison"></span>
</div>
<div class="media-body">
<h3 class="heading">Indian Visa Services</h3>
<!-- <p>There are over 500 provincial boards, agencies, and commissions in Ontario. Some of the boards in which we represent our clients are the Parole Board of Canada and the Ontario Social Benefit Tribunal.</p> -->
</div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-prison"></span>
</div>
<div class="media-body">
<h3 class="heading">Immigration Services</h3>
</div>
</div>
</div>
<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services">
<div class="icon d-flex justify-content-center align-items-center mb-4">
<span class="flaticon-prison"></span>
</div>
<div class="media-body">
<h3 class="heading">Provincial Offences</h3>
</div>
</div>
</div>
</section>
<section class="ftco-section ftco-counter img" id="section-counter" style="background-image:url(images/bg_3.jpg.webp)" data-stellar-background-ratio="0.5">
<div class="container">
<div class="row d-md-flex align-items-center">
<div class="col-lg-4">
<div class="heading-section pl-md-5 heading-section-white">
<div class="ftco-animate">
<span class="subheading">Some</span>
<h2 class="mb-4">Interesting Facts</h2>
</div>
</div>
</div>
<div class="col-lg-8">
<div class="row d-md-flex align-items-center">
<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 text-center">
<div class="text">
<strong class="number" data-number="300">0</strong>
<span>Trusted clients</span>
</div>
</div>
</div>
<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 text-center">
<div class="text">
<strong class="number" data-number="500">0</strong>
<span>Consultations</span>
</div>
</div>
</div>
<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 text-center">
<div class="text">
<strong class="number" data-number="3">0</strong>
<span>Certifications</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="ftco-section ftc-no-pt">
<div class="container">
<div class="row no-gutters">
<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center order-md-last" style="background-image:url(images/bg_1.jpg.webp)">
</div>
<div class="col-md-7 wrap-about pt-md-5 ftco-animate">
<div class="heading-section mb-5 pt-5 pl-md-5">
<div class="pr-md-5 mr-md-5 text-md-right">
<span class="subheading">Facilitating</span>
<h2 class="mb-4">Access to Justice</h2>
</div>
</div>
<div class="pr-md-3 pr-lg-5 pl-md-5 mr-md-5 mb-5">
<div class="services-wrap d-flex">
<div class="icon d-flex justify-content-center align-items-center">
<span class="flaticon-auction"></span>
</div>
<div class="media-body pl-md-0 pl-4 pr-4 order-md-first text-md-right">
<h3 class="heading">Fight for Justice</h3>
<p>We fight for your constitutional rights with Empathy and Dexterity.</p>
</div>
</div>
<div class="services-wrap d-flex">
<div class="icon d-flex justify-content-center align-items-center">
<span class="flaticon-auction"></span>
</div>
<div class="media-body pl-md-0 pl-4 pr-4 order-md-first text-md-right">
<h3 class="heading">Best Case Strategy</h3>
<p>We succeed in this by crafting winning strategies for our clients</p>
</div>
</div>
<div class="services-wrap d-flex">
<div class="icon d-flex justify-content-center align-items-center">
<span class="flaticon-auction"></span>
</div>
<div class="media-body pl-md-0 pl-4 pr-4 order-md-first text-md-right">
<h3 class="heading">Profound Experience</h3>
<p>With our rich and profound experiece we help clients obtaining favourable decisions in complex cases</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="testimony-section">
<div class="container">
<div class="row justify-content-center mb-5">
<div class="col-md-7 heading-section ftco-animate text-center">
<span class="subheading">Testimony</span>
<h2 class="mb-4">Client Testimony</h2>
<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
</div>
</div>
<div class="row ftco-animate">
<div class="col-md-12">
<div class="carousel-testimony owl-carousel">
<div class="item">
<div class="testimony-wrap p-4 pb-5 text-center">
<!-- <div class="user-img mb-5" style="background-image:url(images/person_1.jpg.webp)"> -->
<span class="quote d-flex align-items-center justify-content-center">
<i class="icon-quote-left"></i>
</span>
<!-- </div> -->
<div class="text">
<p class="mb-5 pl-4 line">Sunil has been very welcoming and receptive to my needs. He understands the process very clearly and thoroughly. Despite my very complex circumstances , he explained all the procedures clearly to me and filled out all the information and submitted it to the government in a professional and timely manner without wasting any time or ambiguity.</p>
<p class="name">Imran Butt</p>
<!-- <span class="position">Marketing Manager</span> -->
</div>
</div>
</div>
<div class="item">
<div class="testimony-wrap p-4 pb-5 text-center">
<!-- <div class="user-img mb-5" style="background-image:url(images/person_2.jpg.webp)"> -->
<span class="quote d-flex align-items-center justify-content-center">
<i class="icon-quote-left"></i>
</span>
<!-- </div> -->
<div class="text">
<p class="mb-5 pl-4 line">I would recommend Ghuge Legal Services for all your landlord tenancy issues. Mr. Ghuge is very knowledgeable and handles the cases in a very professional manner, and gets positive results</p>
<br /><br /><br />
<p class="name">Preeti Rao</p>
<!-- <span class="position">Interface Designer</span> -->
</div>
</div>
</div>
<div class="item">
<div class="testimony-wrap p-4 pb-5 text-center">
<!-- <div class="user-img mb-5" style="background-image:url(images/person_3.jpg.webp)"> -->
<span class="quote d-flex align-items-center justify-content-center">
<i class="icon-quote-left"></i>
</span>
<!-- </div> -->
<div class="text">
<p class="mb-5 pl-4 line">The best thing about Mr. Ghuge is him being honest. He will tell you what is possible and what is not. I have been to lawyers who were counting hours by dragging issues with law jargon. Easy to manipulate gullible clients with tech terms we don't understand.</p>
<p class="name">Mohan Reddy Timma Reddy</p>
</div>
</div>
</div>
<!-- <div class="item">
<div class="testimony-wrap p-4 pb-5 text-center">
<div class="user-img mb-5" style="background-image:url(images/person_1.jpg.webp)">
<span class="quote d-flex align-items-center justify-content-center">
<i class="icon-quote-left"></i>
</span>
</div>
<div class="text">
<p class="mb-5 pl-4 line">I happened to get my POA notarized and attested through Ghuge legal services. The experience was so amazing and highly professional. The process was so smooth and well explained to us in advance which helped us getting the process completed in a single visit. I would highly recommend their services.</p>
<p class="name">Saju James</p>
<span class="position">Web Developer</span>
</div>
</div>
</div> -->
<div class="item">
<div class="testimony-wrap p-4 pb-5 text-center">
<!-- <div class="user-img mb-5" style="background-image:url(images/person_1.jpg.webp)"> -->
<span class="quote d-flex align-items-center justify-content-center">
<i class="icon-quote-left"></i>
</span>
<!-- </div> -->
<div class="text">
<p class="mb-5 pl-4 line">Excellent service. HIGHLY recommend!</p>
<p class="name">Gina Palmer</p>
<!-- <span class="position">Web Developer</span> -->
</div>
</div>
</div>
<div class="item">
<div class="testimony-wrap p-4 pb-5 text-center">
<!-- <div class="user-img mb-5" style="background-image:url(images/person_1.jpg.webp)"> -->
<span class="quote d-flex align-items-center justify-content-center">
<i class="icon-quote-left"></i>
</span>
<!-- </div> -->
<div class="text">
<p class="mb-5 pl-4 line">Ghuge helped us notarize our papers and was very willing and able to accommodate our needs accordingly. Thank you.</p>
<p class="name">Charles </p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- <section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-3">
<div class="col-md-7 heading-section ftco-animate text-center">
<span class="subheading">Our latest update</span>
<h2 class="mb-4">Case Study</h2>
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
</div>
</div>
<div class="row">
<div class="col-md-4 ftco-animate">
<div class="blog-entry">
<a href="blog-single.php" class="block-20" style="background-image:url(images/image_1.jpg.webp)">
</a>
<div class="text py-4">
<div class="meta mb-3">
<div><a href="#">Oct. 12, 2018</a></div>
<div><a href="#">Admin</a></div>
<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
</div>
<div class="desc">
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
</div>
</div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="blog-entry" data-aos-delay="100">
<a href="blog-single.php" class="block-20" style="background-image:url(images/image_2.jpg.webp)">
</a>
<div class="text py-4">
<div class="meta mb-3">
<div><a href="#">Oct. 12, 2018</a></div>
<div><a href="#">Admin</a></div>
<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
</div>
<div class="desc">
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
</div>
</div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="blog-entry" data-aos-delay="200">
<a href="blog-single.php" class="block-20" style="background-image:url(images/image_3.jpg.webp)">
</a>
<div class="text py-4">
<div class="meta mb-3">
<div><a href="#">Oct. 12, 2018</a></div>
<div><a href="#">Admin</a></div>
<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
</div>
<div class="desc">
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
</div>
</div>
</div>
</div>
</div>
</div>
</section> -->
<section class="ftco-section ftc-no-pb ftc-no-pt bg-light">
<div class="container">
<div class="row align-items-md-center">
<div class="col-md-5 pt-5">
<form id="#dropdown" method="post" class="consult-form py-5">
<div class="row">
<div class="col-md-6">
<div class="form-group mb-4"> 
<label for="#">Name</label>
<input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group mb-4">
<label for="#">Email Address</label>
<input type="text" id="email" name="email" class="form-control" placeholder="Email Address" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group mb-4">
<label for="#">Date</label>
<div class="form-field">
<input type="Date" id="date" name="date" class="form-control" placeholder="yyyy-mm-dd" required>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group mb-4">
<label for="#">Categories(optional)</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="ion-ios-arrow-down"></span></div>
<select id="cat" id="cat" name="cat" class="form-control" required>
<option id="select" value="">SELECT</option>
<option value="Immigration Services">Immigration Services</option>
<option value="Notary Services">Notary Services</option>
<option value="Landlord & Tenant Board">Landlord & Tenant Board</option>
<option value="Indian Visa Services">Indian Visa Services</option>
<option value="Small Claims">Small Claims</option>
<option value="Administritive Law">Administritive Law</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group mb-4">
<label for="#">Message</label>
<textarea id="message" name="message" cols="30" rows="7" class="form-control form-control-2 d-flex align-items-center" placeholder="Message"></textarea>
</div>
</div>
<div class="col-md-12">
<div class="form-group mb-4">
<input type="submit" name="save" value="Make an Appointment" class="btn btn-primary py-3 px-4">
</div>
</div>
</div>
</form>
</div>
<div class="col-md-7 wrap-about pb-5 ftco-animate">
<div class="heading-section mb-md-5 pl-md-5 mt-md-5 pt-3">
<div class="pl-md-3">
<span class="subheading">Appointment</span>
<h2 class="mb-4">Make An Appointment</h2>
</div>
</div>
<div class="pl-md-3">
<p>Make an appointment or enqiry to get quotes and estimates to avail our services for Notarization, Legalization of Documents, Canadian Immigration & Citizenship applications, Wrongful dismissal, Landlord & Tenant disputes, Indian Visa Services, and Employment Law.</p>
<p>For concerns and inquiries about our legal services, you may get in touch using the contact form on this page.
</p>
</div>
</div>
</div>
</div>
</section>
<footer class="ftco-footer ftco-bg-dark ftco-section">
<div class="container">
<div class="row mb-5 d-flex">
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">About Me</h2>
<p>Licensed Paralegal, Notary Public and Regulated Canadian Immigration Consultant</p>
<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
<li class="ftco-animate"><a target = '_blank' href="https://www.facebook.com/Ghugelegal"><span class="icon-facebook"></span></a></li>
<li class="ftco-animate"><a target = '_blank' href="https://www.instagram.com/ghugelegal"><span class="icon-instagram"></span></a></li>
</ul>
</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4 ml-md-4">
<h2 class="ftco-heading-2">Usefull Links</h2>
<ul class="list-unstyled">
<li><a href="practice.php#link">Immigration Services</a></li>
<li><a href="practice.php#link">Notary Services</a></li>
<li><a href="practice.php#link">Small Claims</a></li>
<li><a href="practice.php#link">Landlord & Tenant Board</a></li>
<li><a href="practice.php#link">Indian Visa Services</a></li>
</ul>
</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">Quick Links</h2>
<ul class="list-unstyled">
<li><a href="about.php">About Us</a></li>
<li><a href="practice.php">Practice Areas</a></li>
<li><a href="attorney.php">Team</a></li>
<li><a href="blog.php">Blog</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">Have a Question?</h2>
<div class="block-23 mb-3">
<ul>
<li><span class="icon icon-map-marker"></span><span class="text">52 Village Center Pl, Suite 103, Mississauga, Ontario. L4Z 1V9</span></li>
<li><a href="tel:+1 289-203-0424"><span class="icon icon-phone"></span><span class="text">+1 289-203-0424</span></a></li>
<li><a href="mailto:info@ghugelegal.com"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="9cf5f2faf3dce5f3e9eef8f3f1fdf5f2b2fff3f1">info@ghugelegal.com</span></span></a></li>
<li><a href="tel:+1 289-327-3161"><span class="icon icon-phone"></span><span class="fax">+1 289-327-3161</span></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 text-center">
<p>
Copyright &copy;<script data-cfasync="false" src="js/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | Ghuge Legal Services
</p>
</div>
</div>
</div>
</footer>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="js/jquery.min.js"></script>


<!-- <script src="js/jquery-migrate-3.0.1.min.js+popper.min.js+bootstrap.min.js+jquery.easing.1.3.js.pagespeed.jc.E8J79OZgT1.js"></script> -->


<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js.pagespeed.jc.E8J79OZgT1.js"></script>




<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js.pagespeed.jc.Ooq5mjv5-e.js"></script>



<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js.pagespeed.jc.E2EXlsLxSa.js"></script>




<script src="js/scrollax.min.js"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js.pagespeed.jc.9itvz-kvdk.js"></script>
<script>eval(mod_pagespeed_KC55CzVDDl);</script>
<script>eval(mod_pagespeed_iHmypBWNFp);</script>
<script>eval(mod_pagespeed_CqIeFRz52A);</script>
<script>eval(mod_pagespeed_G88wUcvWeA);</script>
<!-- <script src="js/jquery.waypoints.min.js+jquery.stellar.min.js+owl.carousel.min.js+jquery.magnific-popup.min.js.pagespeed.jc.Ooq5mjv5-e.js"> --></script><script>eval(mod_pagespeed__gPKz9Igt7);</script>
<script>eval(mod_pagespeed_C8vla874hU);</script>
<script>eval(mod_pagespeed_BSwXZH_IjI);</script>
<script>eval(mod_pagespeed_Cg4Qv3M1Z0);</script>
<!-- <script src="js/aos.js+jquery.animateNumber.min.js+bootstrap-datepicker.js.pagespeed.jc.E2EXlsLxSa.js"></script> -->

<script>eval(mod_pagespeed_g7tY7fS6FC);</script>
<script>eval(mod_pagespeed_uL4PF9GPGr);</script>
<script>eval(mod_pagespeed_2GW74oBafB);</script>
<!-- <script src="js/jquery.timepicker.min.js"></script> -->
<!-- <script src="js/scrollax.min.js+google-map.js+main.js.pagespeed.jc.9itvz-kvdk.js"></script> -->

<script>eval(mod_pagespeed_KA88T91QG9);</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script>eval(mod_pagespeed_oka7wjI_4Y);</script>
<script>eval(mod_pagespeed_x3fPozwB0K);</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"71a96ce42bc93c07","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>