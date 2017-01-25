<em><?php
//require('mem_image.php');
require_once('ellipse.php');
$connection = mysqli_connect("localhost","vivek","1140908","test_db");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
if(isset($_POST['submit']))
{
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
$pdf->SetFont('Arial','B',20);
$pdf->SetFillColor(49,79,79);
$pdf->Rect( 0, 0, 250, 45 ,F);
$pdf->SetFillColor(100, 59, 15);
$pdf->Rect(0, 44, 250,254,F);
$pdf->AddFont('FORTE','','FORTE.php');
$pdf->AddFont('comicbd','','comicbd.php');
$pdf->SetFont('FORTE','',40);
$pdf->SetTextColor(128,255,0);
if(empty($row["m_name"]) && empty($row["l_name"]))
{   $pdf->Cell(130,15,$row["f_name"],1,1);
    $pdf->Ln(5);
	}
elseif(empty($row["m_name"]))
{
	$pdf->Cell(130,15,$row["f_name"].' ' .$row["l_name"],1,1);
	$pdf->Ln(5);
	}
else
{
	$pdf->Cell(130,15,$row["f_name"].' '.$row["m_name"].' '.$row["l_name"],1,1);
	$pdf->Ln(5);
	}		
if(!empty($row["about_me"]))
{
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(130,10,$row["about_me"],1,1);
	$pdf->Ln(10);
	}		
$pdf->SetFont('FORTE','',20);
$pdf->SetTextColor(0,204,102);
$pdf->Cell(80,10,'Basic Information',1,1);
$pdf->image('basic_info.png',72,48,17);
$pdf->SetTextColor(0,0,0);


$pdf->Ln(5);
$pdf->SetDrawColor(102, 0, 0); // Hot marron
$pdf->SetLineWidth(2); // We will change the line width now to 2mm
$pdf->Rect(2, 2, 206,293, 'D');
$pdf->SetFont('comicbd','',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,10,'D.O.B :'.'   '.$row["date"].'/'.$row["month"].'/'.$row["year"],1,1);
$pdf->Ln(2);
$pdf->image('address.gif',5,80,5);
$pdf->cell(80, 10,' '.$row["address1"],1,1);
$pdf->Cell(80,10,' '.$row["address2"].' '.$row["address3"].' '.$row["pin"],1,1);
$pdf->Ln(2);
$pdf->image('phone_img.png',5,101,5);
$pdf->Cell(50,10,' '.$row["mob"],1,1);
$pdf->Ln(2);
$pdf->image('gmail.png',5,113,5);
$pdf->Cell(80,10,' '.$row["email_id"],1,1);
$pdf->Ln(5);
if((((((!empty($row["highsch_name"])||!empty($row["gradclg_name"]))|| (!empty($row["hpass_year"])))|| (!empty($row["gpass_year"])))|| (!empty($row["hsc_cgp"])) && $row["hsc_cgp"]!=0.0) || (!empty($row["grad_cgp"]))&& $row["grad_cgp"]!=0.0) ||((!empty($row["certfir"]) || !empty($row["certsec"]))|| !empty($row["certthird"])))
{
	     global $x,$y;
		 $x=10;
		 $y=130;
		 $pdf->setXY($x,$y);
		 $pdf->SetFont('FORTE','',20);
		 $pdf->SetTextColor(0,204,102);
         $pdf->Cell(80,10,'Educational qualification',1,1);
		 $pdf->image('edu_qualifications.png',90,$y-6,20);
		 $pdf->SetTextColor(0,0,0);
		 $y=$y+15;
		 $pdf->SetFont('comicbd','',11);
  }  
  
if(!empty($row["highsch_name"]))
{ 
$pdf->setXY($x,$y);
$pdf->Cell(50,10,'High School :'.'   '.$row["highsch_name"],1,1);
global $y;
$y=$y+10;
  }
if(!empty($row["hpass_year"]))  
{
$pdf->setXY($x,$y);
$pdf->Cell(80,10,'High School Passing Year :'.'   '.$row["hpass_year"],1,1);
$y=$y+10;
  }
if(!empty($row["gradclg_name"]))  
{
$pdf->setXY($x,$y);
$pdf->Cell(100,10,'Graduation College :'.'   '.$row["gradclg_name"],1,1);
$y=$y+10;
  }
if(!empty($row["gpass_year"]))  
{
$pdf->setXY($x,$y);
$pdf->Cell(80,10,'Greaduation Passing Year :'.'   '.$row["gpass_year"],1,1);
$y=$y+10;
  }
if(!empty($row["hsc_cgp"]) && $row["hsc_cgp"]!=0.0)
{
$pdf->setXY($x,$y);  
$pdf->Cell(50,10,'High School Cgpa :'.'   '.$row["hsc_cgp"],1,1);
$y=$y+10;
  }
if(!empty($row["grad_cgp"]) && $row["grad_cgp"]!=0.0)  
{
$pdf->setXY($x,$y);
$pdf->Cell(50,10,'Graduation Cgpa :'.'   '.$row["grad_cgp"],1,1);
$y=$y+10;
  }
if((!empty($row["certfir"]) || !empty($row["certsec"]))|| !empty($row["certthird"]))
{  
$pdf->setXY($x,$y);
$pdf->Cell(100,10,'Certifications :'.'   '.$row["certfir"].','.' '.$row["certsec"].','.' '.$row["certthird"],1,1);
$y=$y+15;
  }
if((!empty($row["intfir"]) || !empty($row["intsec"]))|| !empty($row["intthird"]))
{ 
$pdf->setXY($x,$y);
$pdf->SetFont('FORTE','',20);
$pdf->SetTextColor(0,204,102);
$pdf->Cell(80,10,'Areas Of Skills',1,1);
$pdf->image('expert.png',$x+58,$y-5,22);
$pdf->SetTextColor(0,0,0);
$y=$y+15;
$pdf->SetFont('comicbd','',11);
  }

if(!empty($row["intfir"]))
{
$pdf->setXY($x,$y);
$pdf->Cell(80,10,$row["intfir"],1,1);
  if($row["skillone"] == "low")
   {
	   $pdf->SetFillColor(72,209,204);
	   $pdf->Rect($x+50,$y+3,30,5,F);
	   }
   if($row["skillone"] == "moderate")
   {
	   $pdf->SetFillColor(128,128,0);
	   $pdf->Rect($x+50,$y+3,50,5,F);
	   }
  if($row["skillone"] == "high")
   {
	   $pdf->SetFillColor(0,0,128);
	   $pdf->Rect($x+50,$y+3,70,5,F);
	   }   	   
$y=$y+10;
  }
  
  
if(!empty($row["intsec"]))
{  
$pdf->setXY($x,$y);
$pdf->Cell(80,10,$row["intsec"],1,1);

    if($row["skilltwo"] == "low")
   {
	   $pdf->SetFillColor(72,209,204);
	   $pdf->Rect($x+50,$y+3,30,5,F);
	   }
   if($row["skilltwo"] == "moderate")
   {
	   $pdf->SetFillColor(128,128,0);
	   $pdf->Rect($x+50,$y+3,50,5,F);
	   }
  if($row["skilltwo"] == "high")
   {
	   $pdf->SetFillColor(0,0,128);
	   $pdf->Rect($x+50,$y+3,70,5,F);
	   }
   $y=$y+10;
}
  
if(!empty($row["intthird"])) 
{ 
$pdf->setXY($x,$y);
$pdf->Cell(80,10,$row["intthird"],1,1);

  if($row["skillthree"] == "low")
   {
	   $pdf->SetFillColor(72,209,204);
	   $pdf->Rect($x+50,$y+3,30,5,F);
	   }
 if($row["skillthree"] == "moderate")
   {
	   $pdf->SetFillColor(128,128,0);
	   $pdf->Rect($x+50,$y+3,50,5,F);
	   }
  if($row["skillthree"] == "high")
   {
	   $pdf->SetFillColor(0,0,128);
	   $pdf->Rect($x+50,$y+3,70,5,F);
	   }
 }
 $pdf->SetFontSize(7);
 $pdf->SetFillColor(0,0,128); 
 $pdf->Rect($x,$y+12,3,3,F);
 $pdf->setXY($x+5,267);
 $pdf->Cell(20,3,'High Skilled',0,1);
 $pdf->SetFillColor(128,128,0);
 $pdf->Rect($x,$y+15,3,3,F);
 $pdf->setXY($x+5,270);
 $pdf->Cell(20,3,'Moderate Skilled',0,0);
 $pdf->SetFillColor(72,209,204);
 $pdf->Rect($x+30,$y+12,3,3,F);
 $pdf->setXY($x+35,267);
 $pdf->Cell(20,3,'Novice',0,1);
 
  //----------------------------- For next printing from top of page starting from the person's image ---------------------------
 
 $x = 170;
 $y = 14;
 $pdf->MemImage($row["photo"],$x,$y,30,0); 
 $x=120;
 $y=$y+35;

if((!empty($row["pre_expfir"])|| !empty($row["pre_expsec"])) || !empty($row["pre_expthird"]))
{
	 global $x,$y;
	 $pdf->setXY($x,$y);
	 $pdf->SetFont('FORTE','',20);
	 $pdf->SetTextColor(0,204,102);
     $pdf->Cell(80,10,'Previous Experiences',1,1);
	 $pdf->image('recent-experience.png',$x+65,$y-3,15);
	 $pdf->SetTextColor(0,0,0);
	 $pdf->SetFont('comicbd','',11);
	 $y= $y+15;
  } 
  
if(!empty($row["pre_expfir"])) 
{ 
$pdf->setXY($x,$y);
$pdf->Cell(40,10,$row["pre_expfir"],1,1);

    if($row["exp_timeone"] == "low")
   {
	   $pdf->SetFillColor(72,209,204);
	   $pdf->Rect($x+30,$y+2,20,5,F);
	   }
   if($row["exp_timeone"] == "moderate")
   {
	   $pdf->SetFillColor(128,128,0);
	   $pdf->Rect($x+30,$y+2,40,5,F);
	   }
  if($row["exp_timeone"] == "high")
   {
	   $pdf->SetFillColor(0,0,128);
	   $pdf->Rect($x+30,$y+2,60,5,F);
	   }
   $y=$y+10;
 }
if(!empty($row["pre_expsec"]))  
{
$pdf->setXY($x,$y);	
$pdf->Cell(40,10,$row["pre_expsec"],1,1);

    if($row["exp_timetwo"] == "low")
   {
	   $pdf->SetFillColor(72,209,204);
	   $pdf->Rect($x+30,$y+2,20,5,F);
	   }
   if($row["exp_timetwo"] == "moderate")
   {
	   $pdf->SetFillColor(128,128,0);
	   $pdf->Rect($x+30,$y+2,40,5,F);
	   }
  if($row["exp_timetwo"] == "high")
   {
	   $pdf->SetFillColor(0,0,128);
	   $pdf->Rect($x+30,$y+2,60,5,F);
	   }
   $y=$y+10;
  }
if(!empty($row["pre_expthird"]))  
{
$pdf->setXY($x,$y);
$pdf->Cell(40,10,$row["pre_expthird"],1,1);

    if($row["exp_timethree"] == "low")
   {
	   $pdf->SetFillColor(72,209,204);
	   $pdf->Rect($x+30,$y+2,20,5,F);
	   }
   if($row["exp_timethree"] == "moderate")
   {
	   $pdf->SetFillColor(128,128,0);
	   $pdf->Rect($x+30,$y+2,40,5,F);
	   }
  if($row["exp_timethree"] == "high")
   {
	   $pdf->SetFillColor(0,0,128);
	   $pdf->Rect($x+30,$y+2,60,5,F);
	   }
  $y=$y+10;
}
if(!empty($row["company_name"]) || !empty($row["pre_comone"]) || !empty($row["pre_comtwo"]) || !empty($row["pre_comthree"]))
{
     $pdf->setXY($x,$y+10);
	 $pdf->SetFont('FORTE','',20);
	 $pdf->SetTextColor(0,204,102);
     $pdf->Cell(80,10,'Companies worked',1,1);
	 $pdf->image('companies_worked.png',$x+61,$y+3,20);
	 $pdf->SetTextColor(0,0,0);
	 $pdf->SetFont('comicbd','',11);
	 $y= $y+15;
     if(!empty($row["company_name"]))
     {
	  $strlen = $pdf->GetStringWidth($row["company_name"]);	
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor(106,90,205);
	  $x_temp = $x+52;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->Cell(60,10,'current company ');
	  $pdf->setXY($x_temp-($strlen/2),$y_temp-5);
	  $pdf->Cell(40,10,$row["company_name"],1,1);
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
      $pdf->Cell(60,10,'previous  :');
	  $pdf->setXY($x_temp-($strlen/2),$y_temp-5);
	  $pdf->Cell(40,10,$row["pre_comone"],1,1);
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
      $pdf->Cell(40,10,$row["pre_comtwo"],1,1);
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
      $pdf->Cell(40,10,$row["pre_comthree"],1,1);
	  $y=$y+5; 
     }
	 
}


$x=$x+35;
$y=$y+115;
$pdf->setXY($x,$y);
$pdf->SetFont('Arial','B',8);
$pdf->cell(50,5,'produced by vivekandvyom.com',1,1);
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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<title>Resume builder form</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<style type="Text/CSS"></style>

<body>
<div class="main-content">
<form action = "useridandpasswd.php" method = "post" >
<table cellpadding="20" cellspacing="10" style="font-size:30px; margin-top: 20%">
<caption style="margin-bottom:20px;">Enter your credentials to see your resume</caption>
<tr>
<td>User id :</td>
<td><input type = "text" name = "user_id" value"" class="overview"/></td>
</tr>
<tr>
<td>Password :</td>
<td><input  type = "password" name = "password" value"" class="overview"/></td>
</tr>
<th colspan='2'>
<input id = "button"  type = "submit" name = "submit" value = "See Your Resume" class="submit" class="overview"/></th></form>
</div>   
</body>
<?php
mysqli_close($connection);
?>
</html></em>