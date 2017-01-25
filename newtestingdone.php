<em><?php
require_once('sector.php');
$connection = mysqli_connect("localhost","vivek","1140908","test_db");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
if(isset($_POST['submit']) || isset($_POST['custom_submit']))
{       
/* These variables are defined for making the default configurations , if some variables are not set in the customisation section , then this will take in place for them but the rest of the variables which are selected by the user will be overriden in the isset($_post["custom_submit"]) section !!*/

		$head_col = explode(",","128,128,128");
        $bod_col = explode(",","211,211,211");
		$name_col = explode(",","128,255,0");
		$heading_col = explode(",","0,204,102");
		$hskill_col = explode(",","0,0,128");
		$mskill_col = explode(",","128,128,0");
		$lskill_col = explode(",","72,209,204");
		$border_col = explode(",","0,0,0");
	    $currentcom_col = explode(",","120,120,255");
		$pcom1_col = explode(",","120,255,120");
		$pcom2_col = explode(",","255,120,120");
		$pcom3_col = explode(",","112,128,144");
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

// ------------------this is the code for customization-----------------------------------------------
	if(isset($_POST['custom_submit']))
	{
		global $address_img,$basicinfo_img,$bod_col,$border_col,$comp_img,$contact_img,$edu_img,$email_img,$exp_img,$font_siz,$head_col,$hskill_col,$lskill_col,$mskill_col,$name_col,$removelogo,$skill_img,$heading_col,$currentcom_col,$pcom1_col,$pcom2_col,$pcom3_col;
		
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
		if(isset($_POST["currentcom_col"])) 
		   $currentcom_col = explode(",",$_POST["currentcom_col"]);
		if(isset($_POST["pcom1_col"])) 
		   $pcom1_col = explode(",",$_POST["pcom1_col"]);  
		if(isset($_POST["pcom2_col"])) 
		   $pcom2_col = explode(",",$_POST["pcom2_col"]);
		if(isset($_POST["pcom3_col"])) 
		   $pcom3_col = explode(",",$_POST["pcom3_col"]);     	    
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
// -----------------Now we start our query to database and tetreive results and make pdf ----------------------------	
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
/* In this while loop we will start placing the items on pdf object then last we will output the pdf */	
	
$pdf = new PDF_Sector();	
$pdf->AddPage();
$pdf->SetFillColor($head_col[0],$head_col[1],$head_col[2]);
$pdf->Rect( 0, 0, 250, 45 ,'F');
$pdf->SetFillColor($bod_col[0],$bod_col[1],$bod_col[2]);
$pdf->Rect(0, 44, 250,254,F);
$pdf->AddFont('FORTE','','FORTE.php');   
$pdf->SetFont('FORTE','',40);
$pdf->SetTextColor($name_col[0],$name_col[1],$name_col[2]);
$name_len = strlen($row["f_name"]);
$name_len2= strlen($row["m_name"]);
$name_len3= strlen($row["l_name"]);
if(($name_len + $name_len2 +$name_len3) > 20)
 {
	 $pdf->SetFont('FORTE','',25);
	 }   
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
         $pdf->Cell(40,10,'Academia ',0,1);
		 $pdf->SetTextColor(0,0,0);
		 $pdf->image($edu_img,50,$y-6,20);
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
 
  //----------------------------- For next printing from top of page starting from the person's image -----------------------
 
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
	  $pdf->SetFillColor($currentcom_col[0],$currentcom_col[1],$currentcom_col[2]);
	  $x_temp = $x+40;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->setXY($x_temp-($strlen/2),$y_temp-5);
	  $pdf->Cell(40,10,$row["company_name"],0,1);
	  $y=$y+13;
     }
	  if(!empty($row["pre_comone"]))
     {
	  $strlen = $pdf->GetStringWidth($row["pre_comone"]);	 
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor($pcom1_col[0],$pcom1_col[1],$pcom1_col[2]);
	  $x_temp = $x+50;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->setXY($x_temp-($strlen/2),$y_temp-5);
	  $pdf->Cell(40,10,$row["pre_comone"],0,1);
	  $y=$y+13;
     }
	  if(!empty($row["pre_comtwo"]))
     {
	  $strlen = $pdf->GetStringWidth($row["pre_comtwo"]);
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor($pcom2_col[0],$pcom2_col[1],$pcom2_col[2]);
	  $x_temp = $x+40;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->setXY(($x_temp-($strlen/2)),$y_temp-5);
      $pdf->Cell(40,10,$row["pre_comtwo"],0,1);
	  $y=$y+13;
     }
      if(!empty($row["pre_comthree"]))
     {
	  $strlen = $pdf->GetStringWidth($row["pre_comthree"]);
      $pdf->setXY($x,$y+10);
	  $pdf->SetFillColor($pcom3_col[0],$pcom3_col[1],$pcom3_col[2]);
	  $x_temp = $x+50;
	  $y_temp =$y+16;
	  $pdf->Ellipse($x_temp,$y_temp,$strlen,5,'F');
	  $pdf->setXY(($x_temp-($strlen/2)),$y_temp-5);
      $pdf->Cell(40,10,$row["pre_comthree"],0,1);
	  $y=$y+5; 
     }
	 
}

if(!empty($row["company_name"]) && !empty($row["current_from"]) && !empty($row["current_to"]))
  $time_current = $row["current_to"] - $row["current_from"]; // calculating time period for current company.
else
  $time_current = 0;  
if(!empty($row["pre_comone"]) && !empty($row["com1_from"]) && !empty($row["com1_to"]))  
  $time_comp1 = $row["com1_to"] - $row["com1_from"];  // calculating time period for previous 1 company.
else
  $time_comp1 = 0;  
if(!empty($row["pre_comtwo"]) && !empty($row["com2_from"]) && !empty($row["com2_to"]))  
  $time_comp2 = $row["com2_to"] - $row["com2_from"];  // calculating time period for previous 2 company.
else
  $time_comp2 = 0;  
if(!empty($row["pre_comthree"]) && !empty($row["com3_from"]) && !empty($row["com3_to"]))  
  $time_comp3 = $row["com3_to"] - $row["com3_from"];  // calculating time period for previous 3 company.
else
  $time_comp3 = 0;  

$curr_percent = ($time_current/($time_comp1+$time_comp2+$time_comp3+$time_current))*100; //% for current comp.
$curr_angle = ($time_current/($time_comp1+$time_comp2+$time_comp3+$time_current))*360;  // angle for current comp 
$percent1 = ($time_comp1/($time_comp1+$time_comp2+$time_comp3+$time_current))*100;  /* similarlly for each one */
$angle1 = ($time_comp1/($time_comp1+$time_comp2+$time_comp3+$time_current))*360;
$percent2 = ($time_comp2/($time_comp1+$time_comp2+$time_comp3+$time_current))*100;
$angle2 = ($time_comp2/($time_comp1+$time_comp2+$time_comp3+$time_current))*360;
$percent3 = ($time_comp3/($time_comp1+$time_comp2+$time_comp3+$time_current))*100;
$angle3 = ($time_comp3/($time_comp1+$time_comp2+$time_comp3+$time_current))*360;

$xc=$x+25;  // x coordinate for pie chart
$yc=$y+45;  // y coordinate for pie chart
$r=20;      // radius of pie chart
$x = 170;   // setting variable x 
$y = 180;   // setting variable y

$pdf->setXY($x,$y);
if(!empty($row["company_name"]) && !empty($row["current_from"]) && !empty($row["current_to"]))
 {
   $pdf->SetFillColor($currentcom_col[0],$currentcom_col[1],$currentcom_col[2]); 
   $pdf->Rect($x,$y+12,3,3,'F');
   $pdf->setXY($x+5,$y+12);
   $pdf->SetFontSize(8);
   $y = $y+12;
   $pdf->Cell(10,3,$row["current_from"] .'  to  '.$row["current_to"],0,1);
	}
if(!empty($row["pre_comone"]) && !empty($row["com1_from"]) && !empty($row["com1_to"])) 	
 {
   $pdf->SetFillColor($pcom1_col[0],$pcom1_col[1],$pcom1_col[2]); 
   $pdf->Rect($x,$y+5,3,3,'F');
   $pdf->setXY($x+5,$y+5);
   $pdf->SetFontSize(8);
   $pdf->Cell(10,3,$row["com1_from"] .'  to  '.$row["com1_to"],0,1);
   $y = $y+5;
  }
if(!empty($row["pre_comtwo"]) && !empty($row["com2_from"]) && !empty($row["com2_to"]))
 {
   $pdf->SetFillColor($pcom2_col[0],$pcom2_col[1],$pcom2_col[2]); 
   $pdf->Rect($x,$y+5,3,3,'F');
   $pdf->setXY($x+5,$y+5);
   $pdf->SetFontSize(8);
   $pdf->Cell(10,3,$row["com2_from"] .'  to  '.$row["com2_to"],0,1);
   $y = $y+5;
	}
if(!empty($row["pre_comthree"]) && !empty($row["com3_from"]) && !empty($row["com3_to"]))
 {	
   $pdf->SetFillColor($pcom3_col[0],$pcom3_col[1],$pcom3_col[2]); 
   $pdf->Rect($x,$y+5,3,3,'F');
   $pdf->setXY($x+5,$y+5);
   $pdf->SetFontSize(8);
   $pdf->Cell(10,3,$row["com3_from"] .'  to  '.$row["com3_to"],0,1);
   $y = $y+5;
 }

$pdf->SetFillColor($currentcom_col[0],$currentcom_col[1],$currentcom_col[2]);
$pdf->Sector($xc,$yc,$r,0,$curr_angle,'F');
$pdf->SetFillColor($pcom1_col[0],$pcom1_col[1],$pcom1_col[2]);
$pdf->Sector($xc,$yc,$r,$curr_angle,$curr_angle+$angle1,'F');
$pdf->SetFillColor($pcom2_col[0],$pcom2_col[1],$pcom2_col[2]);
$pdf->Sector($xc,$yc,$r,$curr_angle+$angle1,$curr_angle+$angle1+$angle2,'F');
$pdf->SetFillColor($pcom3_col[0],$pcom3_col[1],$pcom3_col[2]);
$pdf->Sector($xc,$yc,$r,$curr_angle+$angle1+$angle2,$curr_angle+$angle1+$angle2+$angle3,'F');

if($removelogo == "no")
{
  $x = $x - 10;	
  $y=$y+60;
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

<!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<title>Resume</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<style type="Text/CSS"></style>
</head>
<body>
<div class="main-content" style="color:red;">
<header style="color:white;">
<body>
<h3>Login and take your resume..</h3>

<div>
<h3>Want to customise your resume ?&nbsp;&nbsp;<input type="checkbox" id="custom_id" name="custom"  /></h3>
  <form id="customize" action="newtestingdone.php" method="post" style="display:none">
    <h5>select color for Header part </h5>
      <canvas id="picker1"></canvas>
      <canvas id="pview1"></canvas>
	    <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal1" name="head_col" value="128,128,128" class="overview2"/></td></tr></table></div>
	    </div>
    
	  <h5>select color for Body part </h5>
	
    <canvas id="picker2"></canvas>
    <canvas id="pview2"></canvas>
	    <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal2" name="bod_col" value="211,211,211"  class="overview2"/></td></tr></table></div>
	    </div> 
 
     <h5>Select font color for Your Name </h5>
	   <canvas id="picker3"></canvas>
    <canvas id="pview3"></canvas>
	    <div class="controls">

	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal3" name="name_col"  value="128,255,0"  class="overview2"/></td></tr></table></div>
	    </div>     
          
        <h5>select color for headings</h5>
           <canvas id="picker4"></canvas>
           <canvas id="pview4"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal4" name="heading_col"  value="0,204,102"  class="overview2"/></td></tr></table></div>
	       </div>    
      
          
        <h5>select color for High skill scale </h5>
        
          <canvas id="picker5"></canvas>
           <canvas id="pview5"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal5" name="hskill_col" value="210,105,30"  class="overview2"/></td></tr></table></div>
	       </div> 
           
         <h5>select color for Moderate skill scale </h5>
        
        <canvas id="picker6"></canvas>
           <canvas id="pview6"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal6" name="mskill_col" value="128,128,0"  class="overview2"/></td></tr></table></div>
	       </div> 
    
         
          <h5>select color for Basic skill scale </h5>
           <canvas id="picker7"></canvas>
           <canvas id="pview7"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal7" name="lskill_col" value="244,164,96"  class="overview2"/></td></tr></table></div>
	       </div>  
           
         <h5>select color for Border of resume </h5>
           <canvas id="picker8"></canvas>
           <canvas id="pview8"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal8" name="border_col" value="0,0,139"  class="overview2"/></td></tr></table></div>
	       </div> 
           
         <h5>select color for Current company </h5>
           <canvas id="picker9"></canvas>
           <canvas id="pview9"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal9" name="currentcom_col" value="255,255,0"  class="overview2"/></td></tr></table></div>
	       </div> 

         <h5>select color for first Previous company </h5>
          <canvas id="picker10"></canvas>
           <canvas id="pview10"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal10" name="pcom1_col" value="205,133,63"  class="overview2"/></td></tr></table></div>
	       </div> 
           
         <h5>select color for second Previous company </h5>
           <canvas id="picker11"></canvas>
           <canvas id="pview11"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal11" name="pcom2_col" value="255,222,173"  class="overview2"/></td></tr></table></div>
	       </div> 
           
          <h5>select color for third Previous company </h5>
          <canvas id="picker12"></canvas>
           <canvas id="pview12"></canvas>
	       <div class="controls">
	        <div><table><tr><td><label>RGB</label></td><td><input type="text" id="rgbVal12" name="pcom3_col" value="189,183,107"  class="overview2"/></td></tr></table></div>
	       </div>

       <h5>Select icon for Address</h5>
         <img src="custom_address.png" alt="address icon" width="80" height="60" />
         <input type="radio" name="address_img" value="custom_address.png" />
         <img src="custom_address1.png" alt="address icon"  width="80" height="60"/>
         <input type="radio" name="address_img" value="custom_address1.png" />
         <img src="custom_address2.png" alt="address icon" width="80" height="60" />
         <input type="radio" name="address_img" value="custom_address2.png" />
         <img src="custom_address3.png" alt="address icon" width="80" height="60" />
         <input type="radio" name="address_img" value="custom_address3.png" />
         <img src="custom_address4.png" alt="address icon" width="80" height="60" />
         <input type="radio" name="address_img" value="custom_address4.png" />
         <img src="custom_address5.png" alt="address icon" width="80" height="60" />
         <input type="radio" name="address_img" value="custom_address5.png" />
         <img src="custom_address6.png" alt="address icon" width="80" height="60" />
         <input type="radio" name="address_img" value="custom_address6.png" />


        <h5>Select icon for Contact number</h5>
         <img src="contact_1.png" alt="contact icon" width="80" height="60" />
         <input type="radio" name="contact_img" value="contact_1.png" />
         <img src="contact_2.png" alt="contact icon"  width="80" height="60"/>
         <input type="radio" name="contact_img" value="contact_2.png" />
         <img src="contact_3.png" alt="contact icon" width="80" height="60" />
         <input type="radio" name="contact_img" value="contact_3.png" />
         <img src="contact_4.png" alt="contact icon" width="80" height="60" />
         <input type="radio" name="contact_img" value="contact_4.png" />
         <img src="contact_5.jpg" alt="contact icon" width="80" height="60" />
         <input type="radio" name="contact_img" value="contact_5.png" />
         <img src="contact_6.jpg" alt="contact icon" width="80" height="60" />
         <input type="radio" name="contact_img" value="contact_6.jpg" />

         <h5>Select icon for Email</h5>
         <img src="email_1.jpg" alt="email icon" width="80" height="60" />
         <input type="radio" name="email_img" value="email_1.jpg" />
         <img src="email_2.png" alt="email icon"  width="80" height="60"/>
         <input type="radio" name="email_img" value="email_2.png" />
         <img src="email_3.gif" alt="email icon" width="80" height="60" />
         <input type="radio" name="email_img" value="email_3.gif" />
         <img src="email_4.png" alt="email icon" width="80" height="60" />
         <input type="radio" name="email_img" value="email_4.png" />
         <img src="email_5.png" alt="email icon" width="80" height="60" />
         <input type="radio" name="email_img" value="email_5.png" />

         <h5>Select icon for Basic information</h5>
         <img src="basic_info.jpg" alt="Baic info icon" width="80" height="60" />
         <input type="radio" name="basicinfo_img" value="basic_info.jpg" />
         <img src="basic_info1.png" alt="Baic info icon"  width="80" height="60"/>
         <input type="radio" name="basicinfo_img" value="basic_info1.png" />
         <img src="basic_info2.png" alt="Baic info icon" width="80" height="60" />
         <input type="radio" name="basicinfo_img" value="basic_info2.png" />
         <img src="basic_info3.jpg" alt="Baic info icon" width="80" height="60" />
         <input type="radio" name="basicinfo_img" value="basic_info3.jpg" />
         <img src="basic_info4.png" alt="Baic info icon" width="80" height="60" />
         <input type="radio" name="basicinfo_img" value="basic_info4.png" />
         <img src="basic_info5.png" alt="Baic info icon" width="80" height="60" />
         <input type="radio" name="basicinfo_img" value="basic_info5.png" />
         <img src="basic_info6.png" alt="Baic info icon"  width="80" height="60"/>
          <input type="radio" name="basicinfo_img" value="basic_info6.png" />

         <h5>Select icon for Educational Qualifications</h5>
         <img src="edu_1.png" alt="education icon" width="80" height="60" />
         <input type="radio" name="edu_img" value="edu_1.png" />
         <img src="edu_2.png" alt="education icon"  width="80" height="60"/>
         <input type="radio" name="edu_img" value="edu_2.png" />
         <img src="edu_3.png" alt="education icon" width="80" height="60" />
         <input type="radio" name="edu_img" value="edu_3.png" />
         <img src="edu_4.png" alt="education icon" width="80" height="60" />
         <input type="radio" name="edu_img" value="edu_4.png" />
         <img src="edu_5.png" alt="education icon" width="80" height="60" />
         <input type="radio" name="edu_img" value="edu_5.png" />
       
         <h5>Select icon for Skills</h5>
         <img src="skill1.png" alt="skill icon" width="80" height="60" />
         <input type="radio" name="skill_img" value="skill1.png" />
         <img src="skill2.png" alt="skill icon"  width="80" height="60"/>
         <input type="radio" name="skill_img" value="skill2.png" />
         <img src="skill3.png" alt="skill icon" width="80" height="60" />
         <input type="radio" name="skill_img" value="skill3.png" />
         <img src="skill4.png" alt="skill icon" width="80" height="60" />
         <input type="radio" name="skill_img" value="skill4.png" />
         <img src="skill5.png" alt="skill icon" width="80" height="60" />
         <input type="radio" name="skill_img" value="skill5.png" />

         <h5>Select icon for Work Experience</h5>
         <img src="exp_1.png" alt="experience icon" width="80" height="60" />
         <input type="radio" name="exp_img" value="exp_1.png" />
         <img src="exp_2.png" alt="experience icon"  width="80" height="60"/>
         <input type="radio" name="exp_img" value="exp_2.png" />
         <img src="exp_3.png" alt="experience icon" width="80" height="60" />
         <input type="radio" name="exp_img" value="exp_3.png" />
         <img src="exp_4.png" alt="experience icon" width="80" height="60" />
         <input type="radio" name="exp_img" value="exp_4.png" />
         <img src="exp_5.png" alt="experience icon" width="80" height="60" />
         <input type="radio" name="exp_img" value="exp_5.png" />

         <h5>Select icon for Companies worked</h5>
         <img src="comp_1.png" alt="company icon" width="80" height="60" />
         <input type="radio" name="comp_img" value="comp_1.png" />
         <img src="comp_2.png" alt="company icon"  width="80" height="60"/>
         <input type="radio" name="comp_img" value="comp_2.png" />
         <img src="comp_3.png" alt="company icon" width="80" height="60" />
         <input type="radio" name="comp_img" value="comp_3.png" />
         <img src="comp_4.png" alt="company icon" width="80" height="60" />
         <input type="radio" name="comp_img" value="comp_4.png" />
         <img src="comp_5.png" alt="company icon" width="80" height="60" />
         <input type="radio" name="comp_img" value="comp_5.png" />

         <h5>Remove logo for vivekmitivyom.com ?</h5>
         No: <input type="radio" name="removelogo" value="no" />
         Yes: <input type="radio" name="removelogo" value="yes" />
         
         <h5>Choose your Font size:&emsp;&emsp;
           Font Size : &emsp;&emsp; <select name="font_siz" value="">
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option> </select></h5><br />
         <table cellspacing="20"><tr><td>
User id :  </td><td><input type = "text" name = "user_id" value""   class="overview2"/></td></tr><tr><td>
Password :</td><td><input  type = "password" name = "password" value""  class="overview2" /></td></tr>
<tr><td><input id ="customise_button" type="submit" name="custom_submit" value"customize" class="overview1"/></td></tr></table>
 </form>
</div>

<div id = "wrap">
<form action = "newtestingdone.php" method = "post" ><table cellspacing="20"><tr><td>
User id :  </td><td><input type = "text" name = "user_id" value""   class="overview2"/></td></tr><tr><td>
Password :</td><td><input  type = "password" name = "password" value""  class="overview2" /></td></tr>
<tr><td><input id ="customise_button" type="submit" name="custom_submit" value"customize" class="overview1"/></td></tr></table>
</form>
<div id="footer">
</div>   
<script src="customise.js"></script>
<script src="jquery-min.js"></script>
<script src="picker.js"></script>
</body>
<?php
mysqli_close($connection);
?>
</html></em>