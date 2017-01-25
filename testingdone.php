<em><?php
require_once('ellipse.php');
$connection = mysqli_connect("localhost","vivek","1140908","test_db");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
if(isset($_POST['submit']) || isset($_POST['custom_submit']))
{       
		$head_col = explode(",","49,79,79");
        $bod_col = explode(",","100,59,15");
		$name_col = explode(",","128,255,0");
		$heading_col = explode(",","0,204,102");
		$hskill_col = explode(",","0,0,128");
		$mskill_col = explode(",","128,128,0");
		$lskill_col = explode(",","72,209,204");
		$border_col = explode(",","102,0,0");
		$address_img = "address.gif";
		$contact_img = "phone_img.png";
		$email_img = "gmail.png";
		$basicinfo_img = "basic_info.png";
		$edu_img = "edu_qualifications.png";
		$skill_img = "expert.png";
		$exp_img = "recent-experience.png";
		$comp_img = "companies_worked.png";
		$removelogo = "no";
		$font_siz = 14; 

// this is the code for customization ..........................................................................	
	if(isset($_POST['custom_submit']))
	{
		global $address_img,$basicinfo_img,$bod_col,$border_col,$comp_img,$contact_img,$edu_img,$email_img,$exp_img,$font_siz,$head_col,$hskill_col,$lskill_col,$mskill_col,$name_col,$removelogo,$skill_img,$heading_col;
		
		if(isset($_POST["head_col"]))
		  $head_col = explode(",",$_POST["head_col"]);
		if(isset($_POST["bod_col"]))
		  $bod_col = explode(",",$_POST["bod_col"]);
		if(isset($_POST["name_col"]))  
		  $name_col = explode(",",$_POST["name_col"]);
		if(isset($_POST["heading_col"]))  
		  $heading_col = explode(",",$_POST["heading_col"]);
		if(isset($_POST["hskill_col"]))  
		   $hskill_col = explode(",",$_POST["hskill_col"]);
        if(isset($_POST["mskill_col"]))
		  $mskill_col = explode(",",$_POST["mskill_col"]);
        if(isset($_POST["lskill_col"]))
		  $lskill_col = explode(",",$_POST["lskill_col"]);
        if(isset($_POST["border_col"]))
		  $border_col = explode(",",$_POST["border_col"]);
		if(isset($_POST["address_img"]))  
		  $address_img = $_POST["address_img"];
		if(isset($_POST["contact_img"]))  
	      $contact_img = $_POST["contact_img"];
		if(isset($_POST["email_img"]))  
	      $email_img = $_POST["email_img"];
        if(isset($_POST["basicinfo_img"]))
		  $basicinfo_img = $_POST["basicinfo_img"];
        if(isset($_POST["edu_img"]))
	      $edu_img = $_POST["edu_img"];
        if(isset($_POST["skill_img"]))
		  $skill_img = $_POST["skill_img"];
        if(isset($_POST["exp_img"]))
		  $exp_img = $_POST["exp_img"];
        if(isset($_POST["comp_img"]))
		  $comp_img = $_POST["comp_img"];
        if(isset($_POST["removelogo"]))
	      $removelogo = $_POST["removelogo"];
		if(isset($_POST["font_siz"]))  
	      $font_siz = $_POST["font_siz"];
		}
// Now we start our query to database and tetreive results and make pdf ........................................	
	$flag = 0;
	$x=10;
	$y=142;
    $user_id = trim($_POST["user_id"]);
	if((!isset($user_id)||empty($user_id))||(strlen($user_id)>8))
	{
		global $flag;
		$flag = 1;
		}	
	
    $password = $_POST["password"];
	if((!isset($password)||empty($password))||(strlen($password)>4 || preg_match('/[^0-9]+/i', $password)))
	{
		global $flag;
		$flag = 1;
		}	 
	if($flag == 0)
	{   
 	$query = mysqli_query($connection,"SELECT * FROM customer_resume where user_id = '$user_id' and password = '$password' ");
	if($query)
	while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
    {     
$pdf = new PDF_Ellipse();	
$pdf->AddPage();
$pdf->SetFillColor($head_col[0],$head_col[1],$head_col[2]);
$pdf->Rect( 0, 0, 250, 45 ,'F');
$pdf->SetFillColor($bod_col[0],$bod_col[1],$bod_col[2]);
$pdf->Rect(0, 44, 250,254,F);
$pdf->AddFont('FORTE','','FORTE.php');   
$pdf->SetFont('FORTE','',40);
$pdf->SetTextColor($name_col[0],$name_col[1],$name_col[2]);
   
if(empty($row["m_name"]) && empty($row["l_name"]))
{   $pdf->Cell(130,15,$row["f_name"],0,1);
    $pdf->Ln(5);
	}
elseif(empty($row["m_name"]))
{
	$pdf->Cell(130,15,$row["f_name"].' ' .$row["l_name"],0,1);
	$pdf->Ln(5);
	}
else
{
	$pdf->Cell(130,15,$row["f_name"].' '.$row["m_name"].' '.$row["l_name"],0,1);
	$pdf->Ln(5);
	}		
if(!empty($row["about_me"]))
{
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(130,10,$row["about_me"],0,1);
	$pdf->Ln(10);
	}		
$pdf->SetFont('FORTE','',20);
$pdf->SetTextColor($heading_col[0],$heading_col[1],$heading_col[2]);
$pdf->Cell(80,10,'Basic Information',0,1);
$pdf->image($basicinfo_img,72,48,17);

$pdf->Ln(5);

$pdf->SetDrawColor($border_col[0],$border_col[1],$border_col[2]); // Hot marron
$pdf->SetLineWidth(2); // We will change the line width now to 2mm
$pdf->Rect(2, 2, 206,293, 'D');
$pdf->SetFont('FORTE','',$font_siz);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,10,'D.O.B :'.'   '.$row["date"].'/'.$row["month"].'/'.$row["year"],0,1);
$pdf->Ln(2);
$pdf->image($address_img,5,80,5);
$pdf->cell(80, 10,' '.$row["address1"],0,1);
$pdf->Cell(80,10,' '.$row["address2"].' '.$row["address3"].' '.$row["pin"],0,1);
$pdf->Ln(2);
$pdf->image($contact_img,5,101,5);
$pdf->Cell(50,10,' '.$row["mob"],0,1);
$pdf->Ln(2);
$pdf->image($email_img,5,113,5);
$pdf->Cell(80,10,' '.$row["email_id"],0,1);
$pdf->Ln(5);
if((((((!empty($row["highsch_name"])||!empty($row["gradclg_name"]))|| (!empty($row["hpass_year"])))|| (!empty($row["gpass_year"])))|| (!empty($row["hsc_cgp"])) && $row["hsc_cgp"]!=0.0) || (!empty($row["grad_cgp"]))&& $row["grad_cgp"]!=0.0) ||((!empty($row["certfir"]) || !empty($row["certsec"]))|| !empty($row["certthird"])))
{
	     global $x,$y;
		 $x=10;
		 $y=130;
		 $pdf->setXY($x,$y);
		 $pdf->SetFont('FORTE','',20);
		 $pdf->SetTextColor($heading_col[0],$heading_col[1],$heading_col[2]);
         $pdf->Cell(80,10,'Educational qualification',0,1);
		 $pdf->SetTextColor(0,0,0);
		 $pdf->image($edu_img,90,$y-6,20);
		 $y=$y+15;
		 $pdf->SetFont('FORTE','',$font_siz);
  }  
  
if(!empty($row["highsch_name"]))
{ 
$pdf->setXY($x,$y);
$pdf->Cell(50,10,'High School :'.'   '.$row["highsch_name"],0,1);
global $y;
$y=$y+10;
  }
if(!empty($row["hpass_year"]))  
{
$pdf->setXY($x,$y);
$pdf->Cell(80,10,'High School Passing Year :'.'   '.$row["hpass_year"],0,1);
$y=$y+10;
  }
if(!empty($row["gradclg_name"]))  
{
$pdf->setXY($x,$y);
$pdf->Cell(100,10,'Graduation College :'.'   '.$row["gradclg_name"],0,1);
$y=$y+10;
  }
if(!empty($row["gpass_year"]))  
{
$pdf->setXY($x,$y);
$pdf->Cell(80,10,'Greaduation Passing Year :'.'   '.$row["gpass_year"],0,1);
$y=$y+10;
  }
if(!empty($row["hsc_cgp"]) && $row["hsc_cgp"]!=0.0)
{
$pdf->setXY($x,$y);  
$pdf->Cell(50,10,'High School Cgpa :'.'   '.$row["hsc_cgp"],0,1);
$y=$y+10;
  }
if(!empty($row["grad_cgp"]) && $row["grad_cgp"]!=0.0)  
{
$pdf->setXY($x,$y);
$pdf->Cell(50,10,'Graduation Cgpa :'.'   '.$row["grad_cgp"],0,1);
$y=$y+10;
  }
if((!empty($row["certfir"]) || !empty($row["certsec"]))|| !empty($row["certthird"]))
{  
$pdf->setXY($x,$y);
$pdf->Cell(100,10,'Certifications :'.'   '.$row["certfir"].','.' '.$row["certsec"].','.' '.$row["certthird"],0,1);
$y=$y+15;
  }
if((!empty($row["intfir"]) || !empty($row["intsec"]))|| !empty($row["intthird"]))
{ 
$pdf->setXY($x,$y);
$pdf->SetFont('FORTE','',20);
$pdf->SetTextColor($heading_col[0],$heading_col[1],$heading_col[2]);
$pdf->Cell(80,10,'Areas Of Skills',0,1);
$pdf->image($skill_img,$x+58,$y-5,22);
$pdf->SetTextColor(0,0,0);
$y=$y+15;
$pdf->SetFont('FORTE','',$font_siz);
  }

if(!empty($row["intfir"]))
{
$strlen = $pdf->GetStringWidth($row["intfir"]);	
  if($row["skillone"] == "low")
   {
	   $pdf->SetFillColor($lskill_col[0],$lskill_col[1],$lskill_col[2]);
	   $pdf->Rect($x,$y+3,40,6,'F');
	   }
   if($row["skillone"] == "moderate")
   {
	   $pdf->SetFillColor($mskill_col[0],$mskill_col[1],$mskill_col[2]);
	    $pdf->Rect($x,$y+3,50,6,'F');
	   }
  if($row["skillone"] == "high")
   {
	   $pdf->SetFillColor($hskill_col[0],$hskill_col[1],$hskill_col[2]);
	   $pdf->Rect($x,$y+3,60,6,'F');
	   }   	   
$pdf->setXY($x,$y);
$pdf->Cell(80,12,$row["intfir"],0,1);	   
$y=$y+10;
  }
  
  
if(!empty($row["intsec"]))
{  
$strlen = $pdf->GetStringWidth($row["intfir"]);
    if($row["skilltwo"] == "low")
   {
	   $pdf->SetFillColor($lskill_col[0],$lskill_col[1],$lskill_col[2]);
	   $pdf->Rect($x,$y+3,40,6,'F');
	   }
   if($row["skilltwo"] == "moderate")
   {
	   $pdf->SetFillColor($mskill_col[0],$mskill_col[1],$mskill_col[2]);
	   $pdf->Rect($x,$y+3,50,6,'F');
	   }
  if($row["skilltwo"] == "high")
   {
	   $pdf->SetFillColor($hskill_col[0],$hskill_col[1],$hskill_col[2]);
	   $pdf->Rect($x,$y+3,60,6,'F');
	   }
   $pdf->setXY($x,$y);
   $pdf->Cell(80,12,$row["intsec"],0,1);   
   $y=$y+10;
}
  
if(!empty($row["intthird"])) 
{ 
$strlen = $pdf->GetStringWidth($row["intfir"]);
  if($row["skillthree"] == "low")
   {
	   $pdf->SetFillColor($lskill_col[0],$lskill_col[1],$lskill_col[2]);
	   $pdf->Rect($x,$y+3,40,6,'F');
	   }
 if($row["skillthree"] == "moderate")
   {
	   $pdf->SetFillColor($mskill_col[0],$mskill_col[1],$mskill_col[2]);
	   $pdf->Rect($x,$y+3,50,6,'F');
	   }
  if($row["skillthree"] == "high")
   {
	   $pdf->SetFillColor($hskill_col[0],$hskill_col[1],$hskill_col[2]);
	   $pdf->Rect($x,$y+3,60,6,'F');
	   }
   $pdf->setXY($x,$y);
   $pdf->Cell(80,12,$row["intthird"],0,1);   
 }
 $pdf->SetFontSize(7);
 $pdf->SetFillColor($hskill_col[0],$hskill_col[1],$hskill_col[2]); 
 $pdf->Rect($x,$y+12,3,3,'F');
 $pdf->setXY($x+5,267);
 $pdf->Cell(20,3,'High Skilled',0,1);
 $pdf->SetFillColor($mskill_col[0],$mskill_col[1],$mskill_col[2]);
 $pdf->Rect($x,$y+15,3,3,'F');
 $pdf->setXY($x+5,270);
 $pdf->Cell(20,3,'Moderate Skilled',0,0);
 $pdf->SetFillColor($lskill_col[0],$lskill_col[1],$lskill_col[2]);
 $pdf->Rect($x+30,$y+12,3,3,'F');
 $pdf->setXY($x+35,267);
 $pdf->Cell(20,3,'Basic Skilled',0,1);
 
  //----------------------------- For next printing from top of page starting from the person's image ---------------------------
 
 $x = 170;
 $y = 10;
 $pdf->MemImage($row["photo"],$x,$y,30,0); 
 $x=120;
 $y=$y+40;

if((!empty($row["pre_expfir"])|| !empty($row["pre_expsec"])) || !empty($row["pre_expthird"]))
{
	 global $x,$y;
	 $pdf->setXY($x,$y);
	 $pdf->SetFont('FORTE','',20);
	 $pdf->SetTextColor($heading_col[0],$heading_col[1],$heading_col[2]);
     $pdf->Cell(80,10,'Previous Experiences',0,1);
	 $pdf->image($exp_img,$x+65,$y-3,15);
	 $pdf->SetTextColor(0,0,0);
	 $pdf->SetFont('FORTE','',$font_siz);
	 $y= $y+15;
  } 
  
if(!empty($row["pre_expfir"])) 
{ 
$strlen = $pdf->GetStringWidth($row["pre_expfir"]);
    if($row["exp_timeone"] == "low")
   {
	   $pdf->SetFillColor($lskill_col[0],$lskill_col[1],$lskill_col[2]);
	   $pdf->Rect($x,$y+3,40,6,'F');
	   }
   if($row["exp_timeone"] == "moderate")
   {
	   $pdf->SetFillColor($mskill_col[0],$mskill_col[1],$mskill_col[2]);
	   $pdf->Rect($x,$y+3,50,6,'F');
	   }
  if($row["exp_timeone"] == "high")
   {
	   $pdf->SetFillColor($hskill_col[0],$hskill_col[1],$hskill_col[2]);
	   $pdf->Rect($x,$y+3,60,6,'F');
	   }
   $pdf->setXY($x,$y);
   $pdf->Cell(40,12,$row["pre_expfir"],0,1);	   
   $y=$y+10;
 }
if(!empty($row["pre_expsec"]))  
{
$strlen = $pdf->GetStringWidth($row["pre_expfir"]);
    if($row["exp_timetwo"] == "low")
   {
	   $pdf->SetFillColor($lskill_col[0],$lskill_col[1],$lskill_col[2]);
	   $pdf->Rect($x,$y+3,40,6,'F');
	   }
   if($row["exp_timetwo"] == "moderate")
   {
	   $pdf->SetFillColor($mskill_col[0],$mskill_col[1],$mskill_col[2]);
	   $pdf->Rect($x,$y+3,50,6,'F');
	   }
  if($row["exp_timetwo"] == "high")
   {
	   $pdf->SetFillColor($hskill_col[0],$hskill_col[1],$hskill_col[2]);
	   $pdf->Rect($x,$y+3,60,6,'F');
	   }
   $pdf->setXY($x,$y);	
   $pdf->Cell(40,12,$row["pre_expsec"],0,1);	   
   $y=$y+10;
  }
if(!empty($row["pre_expthird"]))  
{
$strlen = $pdf->GetStringWidth($row["pre_expfir"]);
    if($row["exp_timethree"] == "low")
   {
	   $pdf->SetFillColor($lskill_col[0],$lskill_col[1],$lskill_col[2]);
	   $pdf->Rect($x,$y+3,40,6,'F');
	   }
   if($row["exp_timethree"] == "moderate")
   {
	   $pdf->SetFillColor($mskill_col[0],$mskill_col[1],$mskill_col[2]);
	   $pdf->Rect($x,$y+3,50,6,'F');
	   }
  if($row["exp_timethree"] == "high")
   {
	   $pdf->SetFillColor($hskill_col[0],$hskill_col[1],$hskill_col[2]);
	   $pdf->Rect($x,$y+3,60,6,'F');
	   }
  $pdf->setXY($x,$y);
  $pdf->Cell(40,12,$row["pre_expthird"],0,1);	   
  $y=$y+10;
}
if(!empty($row["company_name"]) || !empty($row["pre_comone"]) || !empty($row["pre_comtwo"]) || !empty($row["pre_comthree"]))
{
     $pdf->setXY($x,$y+10);
	 $pdf->SetFont('FORTE','',20);
	 $pdf->SetTextColor($heading_col[0],$heading_col[1],$heading_col[2]);
     $pdf->Cell(80,10,'Companies worked',0,1);
	 $pdf->image($comp_img,$x+61,$y+3,20);
	 $pdf->SetTextColor(0,0,0);
	 $pdf->SetFont('FORTE','',$font_siz);
	 $y= $y+15;
     if(!empty($row["company_name"]))
     {
	  $strlen = $pdf->GetStringWidth($row["company_name"]);	
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor(106,90,205);
	  $x_temp = $x+52;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->Cell(60,10,'current :');
	  $pdf->setXY($x_temp-($strlen/2),$y_temp-5);
	  $pdf->Cell(40,10,$row["company_name"],0,1);
	  $y=$y+13;
     }
	  if(!empty($row["pre_comone"]))
     {
	  $strlen = $pdf->GetStringWidth($row["pre_comone"]);	 
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor(95,158,160);
	  $x_temp = $x+52;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
      $pdf->Cell(60,10,'previous :');
	  $pdf->setXY($x_temp-($strlen/2),$y_temp-5);
	  $pdf->Cell(40,10,$row["pre_comone"],0,1);
	  $y=$y+13;
     }
	  if(!empty($row["pre_comtwo"]))
     {
	  $strlen = $pdf->GetStringWidth($row["pre_comtwo"]);
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor(30,144,255);
	  $x_temp = $x+50;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->setXY(($x_temp-($strlen/2)),$y_temp-5);
      $pdf->Cell(40,10,$row["pre_comtwo"],0,1);
	  $y=$y+13;
     }
      if(!empty($row["pre_comthree"]))
     {
	  $strlen = $pdf->GetStringWidth($row["pre_comtwo"]);
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor(138,43,226);
	  $x_temp = $x+50;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->setXY(($x_temp-($strlen/2)),$y_temp-5);
      $pdf->Cell(40,10,$row["pre_comthree"],0,1);
	  $y=$y+5; 
     }
	 
}

if($removelogo == "no")
{
  $x=$x+35;
  $y=$y+115;
  $pdf->setXY($x,$y);
  $pdf->SetFont('Arial','B',8);
  $pdf->cell(50,5,'produced by- vivekandvyom.com',0,1);
}
ob_end_clean();
$pdf->Output();
	    }
	else
	die("Error: ".mysqli_error($connection));	
	}
    else
	echo "BAD USER ID AND PASSWORD OR OTP, TRY AGAIN ";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resume</title>
<!--<link rel = "stylesheet" type = "text/css" href = "css2.css" />-->
</head>
<body>
<h3>Login and take your resume..</h3>

<div>
<h3>Want to customise your resume ?<input type="checkbox" id="custom_id" name="custom"  /></h3>
  <form id="customize" action="testingdone.php" method="post" style="display:none">
    <h5>select color for Header part </h5>
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(128,128,0);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
            <input type="radio" name="head_col" value="128,128,0" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(0,128,128);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="head_col" value="0,128,128" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(220,20,60);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="head_col" value="220,20,60" />
           
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(255,69,0);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
          <input type="radio" name="head_col" value="255,69,0" />
          
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(184,134,11);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
           <input type="radio" name="head_col" value="184,134,11" />
		   
		<svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(0,255,127);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>
          <input type="radio" name="head_col" value="0,255,127" />
    
	  <h5>select color for Body part </h5>
	
	     <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(205,133,63);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="bod_col" value="205,133,63" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(244,164,96);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="bod_col" value="244,164,96" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(112,128,144);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="bod_col" value="112,128,144" />
           
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(60,179,113);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
          <input type="radio" name="bod_col" value="60,179,113" />
          
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(95,158,160);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
           <input type="radio" name="bod_col" value="95,158,160" />
		   
		<svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(30,144,255);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>
          <input type="radio" name="bod_col" value="30,144,255" />
 
     <h5>Select font color for Your Name </h5>
	   
       <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(0,0,0);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="name_col" value="0,0,0" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(128,0,128);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="name_col" value="128,0,128" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(0,0,255);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="name_col" value="0,0,255" />
           
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(128,0,0);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
          <input type="radio" name="name_col" value="128,0,0" />
        		   
		<svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(255,69,0);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>
          <input type="radio" name="name_col" value="255,69,0" />
  
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(0,100,0);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>
          <input type="radio" name="name_col" value="0,100,0" />
          
        <h5>select color for headings</h5>
        
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(128,128,128);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
            <input type="radio" name="heading_col" value="128,128,128" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(128,0,0);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="heading_col" value="128,0,0" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(255,99,71);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="heading_col" value="255,99,71" />  
          
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(255,140,0);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="heading_col" value="255,140,0" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(124,252,0);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="heading_col" value="124,252,0" />    
          
          
          
        <h5>select color for High skill scale </h5>
        
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(50,205,50);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
            <input type="radio" name="hskill_col" value="50,205,50" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(100,149,237);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="hskill_col" value="100,149,237" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(75,0,130);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="hskill_col" value="75,0,130" />  
          
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(139,0,139);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="hskill_col" value="139,0,139" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(210,105,30);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="hskill_col" value="210,105,30" />  
           
         <h5>select color for Moderate skill scale </h5>
        
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(105,105,105);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
            <input type="radio" name="mskill_col" value="105,105,105" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(188,143,143);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="mskill_col" value="188,143,143" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(255,192,203);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="mskill_col" value="255,192,203" />  
          
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(221,160,221);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="mskill_col" value="221,160,221" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(189,183,107);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="mskill_col" value="189,183,107" />   
    
         
          <h5>select color for Basic skill scale </h5>
        
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(255,99,71);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
            <input type="radio" name="lskill_col" value="255,99,71" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(255,127,80);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="lskill_col" value="255,127,80" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(240,230,140);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="lskill_col" value="240,230,140" />  
          
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(152,251,152);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="lskill_col" value="152,251,152" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(244,164,96);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="lskill_col" value="244,164,96" />   
      
         <h5>select color for Border of resume </h5>
        
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(139,69,19);stroke:black;stroke-width:5;opacity:0.5" />
        </svg> 
            <input type="radio" name="border_col" value="139,69,19" />
            
         <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(0,0,0);stroke:black;stroke-width:5;opacity:0.5" />
         </svg> 
            <input type="radio" name="border_col" value="0,0,0" />
            
        <svg width="40" height="30">
           <rect width="40" height="30"
           style="fill:rgb(0,0,139);stroke:black;stroke-width:5;opacity:0.5" />
        </svg>  
           <input type="radio" name="border_col" value="0,0,139" />     
            
       <h5>Select icon for Address</h5>
         <img src="custom_address.png" alt="address icon" width="40" height="30" />
         <input type="radio" name="address_img" value="custom_address.png" />
         <img src="custom_address1.png" alt="address icon"  width="40" height="30"/>
         <input type="radio" name="address_img" value="custom_address1.png" />
         <img src="custom_address2.png" alt="address icon" width="40" height="30" />
         <input type="radio" name="address_img" value="custom_address2.png" />
         <img src="custom_address3.png" alt="address icon" width="40" height="30" />
         <input type="radio" name="address_img" value="custom_address3.png" />
         <img src="custom_address4.png" alt="address icon" width="40" height="30" />
         <input type="radio" name="address_img" value="custom_address4.png" />
         <img src="custom_address5.png" alt="address icon" width="40" height="30" />
         <input type="radio" name="address_img" value="custom_address5.png" />
         <img src="custom_address6.png" alt="address icon" width="40" height="30" />
         <input type="radio" name="address_img" value="custom_address6.png" />


        <h5>Select icon for Contact number</h5>
         <img src="contact_1.png" alt="contact icon" width="40" height="30" />
         <input type="radio" name="contact_img" value="contact_1.png" />
         <img src="contact_2.png" alt="contact icon"  width="40" height="30"/>
         <input type="radio" name="contact_img" value="contact_2.png" />
         <img src="contact_3.png" alt="contact icon" width="40" height="30" />
         <input type="radio" name="contact_img" value="contact_3.png" />
         <img src="contact_4.png" alt="contact icon" width="40" height="30" />
         <input type="radio" name="contact_img" value="contact_4.png" />
         <img src="contact_5.jpg" alt="contact icon" width="40" height="30" />
         <input type="radio" name="contact_img" value="contact_5.png" />
         <img src="contact_6.jpg" alt="contact icon" width="40" height="30" />
         <input type="radio" name="contact_img" value="contact_6.jpg" />

         <h5>Select icon for Email</h5>
         <img src="email_1.jpg" alt="email icon" width="40" height="30" />
         <input type="radio" name="email_img" value="email_1.jpg" />
         <img src="email_2.png" alt="email icon"  width="40" height="30"/>
         <input type="radio" name="email_img" value="email_2.png" />
         <img src="email_3.gif" alt="email icon" width="40" height="30" />
         <input type="radio" name="email_img" value="email_3.gif" />
         <img src="email_4.png" alt="email icon" width="40" height="30" />
         <input type="radio" name="email_img" value="email_4.png" />
         <img src="email_5.png" alt="email icon" width="40" height="30" />
         <input type="radio" name="email_img" value="email_5.png" />

         <h5>Select icon for Basic information</h5>
         <img src="basic_info.jpg" alt="Baic info icon" width="40" height="30" />
         <input type="radio" name="basicinfo_img" value="basic_info.jpg" />
         <img src="basic_info1.png" alt="Baic info icon"  width="40" height="30"/>
         <input type="radio" name="basicinfo_img" value="basic_info1.png" />
         <img src="basic_info2.png" alt="Baic info icon" width="40" height="30" />
         <input type="radio" name="basicinfo_img" value="basic_info2.png" />
         <img src="basic_info3.jpg" alt="Baic info icon" width="40" height="30" />
         <input type="radio" name="basicinfo_img" value="basic_info3.jpg" />
         <img src="basic_info4.png" alt="Baic info icon" width="40" height="30" />
         <input type="radio" name="basicinfo_img" value="basic_info4.png" />
         <img src="basic_info5.png" alt="Baic info icon" width="40" height="30" />
         <input type="radio" name="basicinfo_img" value="basic_info5.png" />
         <img src="basic_info6.png" alt="Baic info icon"  width="40" height="30"/>
          <input type="radio" name="basicinfo_img" value="basic_info6.png" />

         <h5>Select icon for Educational Qualifications</h5>
         <img src="edu_1.png" alt="education icon" width="40" height="30" />
         <input type="radio" name="edu_img" value="edu_1.png" />
         <img src="edu_2.png" alt="education icon"  width="40" height="30"/>
         <input type="radio" name="edu_img" value="edu_2.png" />
         <img src="edu_3.png" alt="education icon" width="40" height="30" />
         <input type="radio" name="edu_img" value="edu_3.png" />
         <img src="edu_4.png" alt="education icon" width="40" height="30" />
         <input type="radio" name="edu_img" value="edu_4.png" />
         <img src="edu_5.png" alt="education icon" width="40" height="30" />
         <input type="radio" name="edu_img" value="edu_5.png" />
       
         <h5>Select icon for Skills</h5>
         <img src="skill1.png" alt="skill icon" width="40" height="30" />
         <input type="radio" name="skill_img" value="skill1.png" />
         <img src="skill2.png" alt="skill icon"  width="40" height="30"/>
         <input type="radio" name="skill_img" value="skill2.png" />
         <img src="skill3.png" alt="skill icon" width="40" height="30" />
         <input type="radio" name="skill_img" value="skill3.png" />
         <img src="skill4.png" alt="skill icon" width="40" height="30" />
         <input type="radio" name="skill_img" value="skill4.png" />
         <img src="skill5.png" alt="skill icon" width="40" height="30" />
         <input type="radio" name="skill_img" value="skill5.png" />

         <h5>Select icon for Work Experience</h5>
         <img src="exp_1.png" alt="experience icon" width="40" height="30" />
         <input type="radio" name="exp_img" value="exp_1.png" />
         <img src="exp_2.png" alt="experience icon"  width="40" height="30"/>
         <input type="radio" name="exp_img" value="exp_2.png" />
         <img src="exp_3.png" alt="experience icon" width="40" height="30" />
         <input type="radio" name="exp_img" value="exp_3.png" />
         <img src="exp_4.png" alt="experience icon" width="40" height="30" />
         <input type="radio" name="exp_img" value="exp_4.png" />
         <img src="exp_5.png" alt="experience icon" width="40" height="30" />
         <input type="radio" name="exp_img" value="exp_5.png" />

         <h5>Select icon for Companies worked</h5>
         <img src="comp_1.png" alt="company icon" width="40" height="30" />
         <input type="radio" name="comp_img" value="comp_1.png" />
         <img src="comp_2.png" alt="company icon"  width="40" height="30"/>
         <input type="radio" name="comp_img" value="comp_2.png" />
         <img src="comp_3.png" alt="company icon" width="40" height="30" />
         <input type="radio" name="comp_img" value="comp_3.png" />
         <img src="comp_4.png" alt="company icon" width="40" height="30" />
         <input type="radio" name="comp_img" value="comp_4.png" />
         <img src="comp_5.png" alt="company icon" width="40" height="30" />
         <input type="radio" name="comp_img" value="comp_5.png" />

         <h5>Remove logo for vivekandvyom.com ?</h5>
         No: <input type="radio" name="removelogo" value="no" />
         Yes: <input type="radio" name="removelogo" value="yes" />
         
         <h5>Choose your Font size:&emsp;&emsp;
           Font Size : &emsp;&emsp; <select name="font_siz" value="">
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option> </select></h5><br />
         
User id :  <input type = "text" name = "user_id" value"" /> <br /><br  />
Password : <input  type = "password" name = "password" value"" /><br/><br />  
<br /><br />     
<input id ="customise_button" type="submit" name="custom_submit" value"customize" />
 </form>
</div>

<div id = "wrap">
<form action = "testingdone.php" method = "post" >
User id :  <input type = "text" name = "user_id" value"" /> <br /><br  />
Password : <input  type = "password" name = "password" value"" /><br/><br /></div>
<input id = "button"  type = "submit" name = "submit" value = "Show My Resume" />
</form>
<div id="footer">
Copyright © vivekandvyom.com
</div>   
<script src="customise.js"></script>
</body>
<?php
mysqli_close($connection);
?>
</html></em>