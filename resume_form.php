<?php
$connection=mysqli_connect("localhost","vivek","1140908","test_db");

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<div class="main-content">
<?php
if(isset($_POST['submit'])){
	//form was submited 
	$flag = 0;
    $f_name = trim($_POST["f_name"]);
	if((preg_match('/[^a-z ]+/i', $f_name))||( !isset($f_name)||empty($f_name) ))
	 {
		 global $flag; 
		 echo "enter a valid name<br />"; 
		 $flag = 1; 
	 }
	 
	$m_name = htmlspecialchars(trim($_POST["m_name"]));
	if(preg_match('/[^a-z ]+/i', $m_name))
	 {   global $flag;
		 echo "enter a valid middle name <br />"; 
		 $flag = 1;
		 }
	
	$l_name = trim($_POST["l_name"]);
	if(preg_match('/[^a-z ]+/i', $l_name))
	 {   
	     global $flag;
		 echo "enter a valid last name <br />";
		 $flag = 1; 
		 }

	$selected_date = $_POST["date"];
	$selected_month = $_POST["month"];	 
		 
	$dobyear = trim($_POST["dobyear"]);
	if(((strlen($dobyear)<4 || strlen($dobyear)>4 ) || preg_match('/[^0-9 ]+/i', $dobyear))||!isset($dobyear))
	{
		global $flag ; 
        echo("Enter the year of your birth in YYYY format <br />");
		$flag = 1;
         }
	
	$address1 = htmlspecialchars($_POST["address1"]);
	if((preg_match('/[^a-z0-9- ]+/i', $address1))||(!isset($address1)||empty($address1)))
	 {   global $flag;
		 echo "enter a valid address in line 1 <br />"; 
		 $flag = 1;
		 }
	
	$address2 = htmlspecialchars($_POST["address2"]);
	if(preg_match('/[^a-z0-9- ]+/i', $address2))
	{
		global $flag;
		 echo "enter a valid address in line 2 <br />"; 
		 $flag = 1;
		
		}
	
	$address3 = htmlspecialchars($_POST["address3"]);
	if(preg_match('/[^a-z0-9- ]+/i', $address3))
	{
		global $flag;
		 echo "enter a valid address in line 3 <br />"; 
		 $flag = 1;
		
		}
	$pin = htmlspecialchars(trim($_POST["pin"]));
	if((!isset($pin)||empty($pin))||!is_numeric($pin))
	{
		global $flag;
		 echo "enter a valid pin code <br />"; 
		 $flag = 1;
		
		}
	$mob = trim($_POST["mob"]);
	if(((!isset($mob)||empty($mob))||(strlen($mob)!=10))||!is_numeric($mob))
	{
		 global $flag;
		 echo "enter a valid mobile number <br />"; 
		 $flag = 1;
		
		}
    $email_id = trim($_POST["email_id"]);
	if(preg_match('/[^a-z0-9.@ ]+/i', $email_id))
	{
		global $flag;
		echo "enter a valid email address ";
		$flag = 1;
		}
		
	$company_name = $_POST["company_name"];
	if(isset($company_name)&&!is_string($company_name))
	{
		 global $flag;
		 echo "enter a valid company name <br />"; 
		 $flag = 1;
		
		}
	
	$file_extensions = array("jpg","bmp","jpeg","png","gif");
	$upload_extensions = end(explode(".", $_FILES["file"]["name"]));
	if(!getimagesize($_FILES["file"]["tmp_name"])||
	   !in_array($upload_extensions , $file_extensions))
	   {
		   global $flag;
		   echo "Please upload a suitable image file (jpg,jpeg,png,gif or bmp) <br />";
		   $flag = 1;
		   }	
	else
	{
		$photo = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
	    $image_name = addslashes($_FILES["file"]["name"]);
		}	
	
	$user_id = trim($_POST["user_id"]);
	$useridver = mysqli_query($connection,"SELECT user_id FROM customer_resume WHERE user_id = '$user_id'");	
	if((!isset($user_id)||empty($user_id))||(strlen($user_id)>4))
	{
		global $flag;
		echo "Please set a valid username <br />";
		$flag = 1;
		}
	elseif(mysqli_num_rows($useridver) > 0)
	{
		global $flag;
		echo "User id already taken , try another one ";
		$flag = 1;
		}		      
	
	$password = $_POST["password"];
	if(((!isset($password)||empty($password))||(strlen($password)>4))||!is_numeric($password))
	{
		global $flag;
		echo "Please set a valid password <br />";
		$flag = 1;
		}
	
	$password1 = $_POST["password1"];
	if(((!isset($password1)||empty($password1))||(strlen($password1)>4))||!is_numeric($password1))
	{
		global $flag;
		$flag = 1;
		}
	elseif($password1 != $password)
	{
		global $flag;
		echo "Passwords does not match";
		$flag = 1;
	    }			      	
		
	$highsch_name = $_POST["highsch_name"];
	if((!isset($highsch_name) && empty($highsch_name))||is_numeric($highsch_name))
	{
		global $flag;
		echo "enter a valid High School name <br />";
		$flag = 1;
		}
		
	$hpass_year = trim($_POST["hpass_year"]);
	if(isset($highsch_name) && ( strlen($hpass_year)!=4 || preg_match('/[^0-9 ]+/i', $hpass_year )))
	{
		global $flag;
		echo "enter a valid High school passing year <br />";
		$flag = 1;
		
		}		
	
	$gradclg_name = htmlspecialchars($_POST["gradclg_name"]);
	if(isset($gradclg_name) && preg_match('/[^a-z. ]+/i', $gradclg_name))
	{
		global $flag;
		echo "enter a valid Graduation College name <br />";
		$flag = 1;
		}
	
	$gpass_year = trim($_POST["gpass_year"]);
    if((isset($gradclg_name)) && ( strlen($gpass_year)!=4 || preg_match('/[^0-9 ]+/i', $gpass_year )))
	{
		 global $flag;
		 echo "enter a valid graduation passing year <br />"; 
		 $flag = 1;
	   }
		 
	$hsc_cgp = trim($_POST["hsc_cgp"]);
	if(empty($hpass_year)&&!is_numeric($hsc_cgp))
	{
		 global $flag;
		 echo "enter a valid high school cgpa <br />"; 
		 $flag = 1;
	  }
	
	$grad_cgp = trim($_POST["grad_cgp"]);
	if(empty($gpass_year)&&!is_numeric($grad_cgp))
	{
		 global $flag;
		 echo "enter a valid graduation cgpa <br />"; 
		 $flag = 1;
	  }
	
	$cert1 = $_POST["cert1"];
	if(isset($cert1)&&(!is_string($cert1) || preg_match('/[^a-z+ ]+/i', $cert1)))
	{
		 global $flag;
		 echo "enter a valid certification in first line <br />"; 
		 $flag = 1;
		}
		
	$cert2 = $_POST["cert2"];
	if(isset($cert2)&&(!is_string($cert2) || preg_match('/[^a-z+ ]+/i', $cert2)))
	{
		 global $flag;
		 echo "enter a valid certification in second line <br />"; 
		 $flag = 1;
		}
	
	$cert3 = $_POST["cert3"];
	if(isset($cert3)&&(!is_string($cert3) || preg_match('/[^a-z+ ]+/i', $cert3)))
	{
		 global $flag;
		 echo "enter a valid certification in third line <br />"; 
		 $flag = 1;
		}
	
	$int1 = $_POST["int1"];
	if(isset($int1)&&(!is_string($int1) || preg_match('/[^a-z ]+/i', $int1)))
	{
		 global $flag;
		 echo "enter a valid area of interest in first line <br />"; 
		 $flag = 1;
		}
		else
		{
			$skill1 = $_POST["skill1"];
		}
	
	$int2 = $_POST["int2"];
	if(isset($int2)&&(!is_string($int2) || preg_match('/[^a-z ]+/i', $int2)))
	{
		 global $flag;
		 echo "enter a valid area of interest in second line <br />"; 
		 $flag = 1;
		}
		else
		{
			$skill2 = $_POST["skill2"];
		}
	
	$int3 = $_POST["int3"];
	if(isset($int3)&&(!is_string($int3) || preg_match('/[^a-z ]+/i', $int3)))
	{
		 global $flag;
		 echo "enter a valid area of interest in third line <br />"; 
		 $flag = 1;
		}
		else
		{
			$skill3 = $_POST["skill3"];
		}	

	$pre_exp1 = $_POST["pre_exp1"];
	if(isset($pre_exp1)&&(!is_string($pre_exp1) || preg_match('/[^a-z0-9 ]+/i', $pre_exp1)))
	{
		 global $flag;
		 echo "enter a valid previous exerience in first line <br />"; 
		 $flag = 1;
		}
		else
		{
			$exp_time1 = $_POST["exp_time1"];
		}	
	
	$pre_exp2 = $_POST["pre_exp2"];
	if(isset($pre_exp2)&&(!is_string($pre_exp2) || preg_match('/[^a-z0-9 ]+/i', $pre_exp2)))
	{
		 global $flag;
		 echo "enter a valid previous exerience in second line <br />"; 
		 $flag = 1;
		}
		else
		{
			$exp_time2 = $_POST["exp_time2"];
		}	
	
	
	$pre_exp3 = $_POST["pre_exp3"];
	if(isset($pre_exp3)&&(!is_string($pre_exp3) || preg_match('/[^a-z0-9 ]+/i', $pre_exp3)))
	{
		 global $flag;
		 echo "enter a valid previous exerience in third line <br />"; 
		 $flag = 1;
		}	
		else
		{
			$exp_time3 = $_POST["exp_time3"];
		}	
		
	$pre_com1 = $_POST["pre_com1"];
	if(isset($pre_com1)&&(!is_string($pre_com1) || preg_match('/[^a-z0-9 ]+/i', $pre_com1)))
	{
		 global $flag;
		 echo "enter a valid company name <br />"; 
		 $flag = 1;
		}	
	$pre_com2 = $_POST["pre_com2"];
	if(isset($pre_com2)&&(!is_string($pre_com2) || preg_match('/[^a-z0-9 ]+/i', $pre_com2)))
	{
		 global $flag;
		 echo "enter a valid company name <br />"; 
		 $flag = 1;
		}
	$pre_com3 = $_POST["pre_com3"];
	if(isset($pre_com3)&&(!is_string($pre_com3) || preg_match('/[^a-z0-9 ]+/i', $pre_com3)))
	{
		 global $flag;
		 echo "enter a valid company name <br />"; 
		 $flag = 1;
		}	
		
	$current_from = trim($_POST["current_from"]);
	if(isset($current_from) && !empty($current_from) && (strlen($current_from)<4 || strlen($current_from)>4) || preg_match('/[^0-9 ]+/i', $current_from)) 
	 {
		 global $flag;
		 echo "enter correct year in 'FROM' feild of current company <br />"; 
		 $flag = 1;
		} 
	$current_to = trim($_POST["current_to"]);
	if( isset($current_to) && !empty($current_to)  && (strlen($current_to)<4 || strlen($current_to)>4 || empty($current_from)) ||  preg_match('/[^0-9 ]+/i', $current_to))
	 {
		 global $flag;
		 if(empty($current_from))
		   echo "enter current company 'FROM' feild <br />";
		 echo "enter correct year in 'TO' feild of current company <br />"; 
		 $flag = 1;
		}	
		
	$com1_from = $_POST["com1_from"];
	if(isset($com1_from) && !empty($com1_from) && (strlen($com1_from)<4 || strlen($com1_from)>4 ) || preg_match('/[^0-9 ]+/i', $com1_from))
	 {
		 global $flag;
		 echo "enter correct year in 'FROM' feild of Previous company <br />"; 
		 $flag = 1;
		}	
		
	$com1_to = $_POST["com1_to"];
	if(isset($com1_to) && !empty($com1_to) && (strlen($com1_to)<4 || strlen($com1_to)>4 || empty($com1_from) ) || preg_match('/[^0-9 ]+/i', $com1_to))
	 {
		 global $flag;
		 if(empty($com1_from))
		   echo "enter 'FROM' feild of previous company in first line <br />";
		 echo "enter correct year in 'TO' feild of Previous company <br />"; 
		 $flag = 1;
		}	
	$com2_from = $_POST["com2_from"];
    if(isset($com2_from) && !empty($com2_from) && (strlen($com2_from)<4 || strlen($com2_from)>4 ) || preg_match('/[^0-9 ]+/i', $com2_from))
	 {
		 global $flag;
		 echo "enter correct year in 'FROM' feild of Previous company <br />"; 
		 $flag = 1;
		}	
	$com2_to = $_POST["com2_to"];
	if(isset($com2_to) && !empty($com2_to) && (strlen($com2_to)<4 || strlen($com2_to)>4 || empty($com2_from) ) || preg_match('/[^0-9 ]+/i', $com2_to))
	 {
		 global $flag;
		 if(empty($com2_from))
		   echo "enter 'FROM' feild of second previous company <br /> ";
		 echo "enter correct year in 'TO' feild of Previous company <br />"; 
		 $flag = 1;
		}	
	$com3_from = $_POST["com3_from"];
	if(isset($com3_from) && !empty($com3_from) && (strlen($com3_from)<4 || strlen($com3_from)>4 ) || preg_match('/[^0-9 ]+/i', $com3_from))
	 {
		 global $flag;
		 echo "enter correct year in 'FROM' feild of Previous company <br />"; 
		 $flag = 1;
		}		
	$com3_to = $_POST["com3_to"];
	if(isset($com3_to) && !empty($com3_to) && (strlen($com3_to)<4 || strlen($com3_to)>4 || empty($com3_from) ) || preg_match('/[^0-9 ]+/i', $com3_to))
	 {
		 global $flag;
		 if(empty($com3_from))
		   echo "enter 'FROM' feild of third previous company <br /> ";
		 echo "enter correct year in 'TO' feild of Previous company <br />"; 
		 $flag = 1;
		}
		
	$about_me = $_POST["about_me"];
	//if((preg_match('/[^a-z ]+/i', $about_me))||( !isset($about_me)||empty($about_me) )||(strlen($password1)>4))
	if(preg_match('/[^a-z.! ]+/i', $about_me))
	{
		 global $flag;
		 echo "enter some valid text in about yourself feild. <br />"; 
		 $flag = 1;
		}			

		
	if($flag == 0)
	{
		global $gender;
	echo "<h2>FORM SUBMITTED SUCCESSFULLY </h2> <br />";
	mysqli_query($connection,"INSERT INTO    customer_resume(f_name,m_name,l_name,date,month,year,address1,address2,address3,pin,mob,email_id,company_name,photo,highsch_name,hpass_year,gradclg_name,gpass_year,hsc_cgp,grad_cgp,certfir,certsec,certthird,intfir,intsec,intthird,pre_expfir,pre_expsec,pre_expthird,password,user_id,pre_comone,pre_comtwo,pre_comthree,about_me,skillone,skilltwo,skillthree,exp_timeone,exp_timetwo,exp_timethree,current_from,current_to,com1_from,com2_to,com1_to,com2_from,com3_from,com3_to)
    VALUES ('$f_name','$m_name','$l_name','$selected_date','$selected_month','$dobyear','$address1','$address2','$address3','$pin','$mob','$email_id','$company_name','$photo','$highsch_name','$hpass_year','$gradclg_name','$gpass_year','$hsc_cgp','$grad_cgp','$cert1','$cert2','$cert3','$int1','$int2','$int3','$pre_exp1','$pre_exp2','$pre_exp3','$password','$user_id','$pre_com1','$pre_com2','$pre_com3','$about_me','$skill1','$skill2','$skill3','$exp_time1','$exp_time2','$exp_time3','$current_from','$current_to','$com1_from','$com2_to','$com1_to','$com2_from','$com3_from','$com3_to')");
	}
	else
	{
	echo "<h3>FORM NOT SUBMITTED CORRECTLY , ENTER THE REQUIRED GENIUINE VALUES .</h3>";
	  }
}
?>
</div>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<title>Resume builder form</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<style type="Text/CSS"></style>
</head>
<body>
<div class="main-content" style="color:red;">
<header style="color:white;">
  <p> You hereby acknowledge that all the information provided by you is true to your knowledge.<br />
    We, in any form, will not alter your information. </p>
  <strong><u>Note</u> - </strong> ''(*) marked items are mandatory !!'' </header>
<form action = "resume_form.php" method = "post" enctype = "multipart/form-data" >
  <table cellpadding="20" cellspacing="10">
  <tr>
    <th colspan='2'>GENERAL INFORMATION:</th>
  </tr>
  <tr>
    <td>First Name* :</td>
    <td><input type = "text" name = "f_name" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Middle Name :</td>
    <td><input type = "text" name = "m_name" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Last Name :</td>
    <td><input type = "text" name = "l_name" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Date Of Birth* :</td>
    <td>Date:
      <select name = "date" value ="" class="overview" style="color:black"/>
        <option value="1">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
        <option value="6">06</option>
        <option value="7">07</option>
        <option value="8">08</option>
        <option value="9">09</option>
        <option value='10'>10</option>
        <option value='11'>11</option>
        <option value='12'>12</option>
        <option value='13'>13</option>
        <option value='14'>14</option>
        <option value='15'>15</option>
        <option value='16'>16</option>
        <option value='17'>17</option>
        <option value='18'>18</option>
        <option value='19'>19</option>
        <option value='20'>20</option>
        <option value='21'>21</option>
        <option value='22'>22</option>
        <option value='23'>23</option>
        <option value='24'>24</option>
        <option value='25'>25</option>
        <option value='26'>26</option>
        <option value='27'>27</option>
        <option value='28'>28</option>
        <option value='29'>29</option>
        <option value='30'>30</option>
        <option value='31'>31</option><
      </select>
      <br />
      Month :
      <select name = "month" value = "" class="overview" style="color:black"/><
        <option value='jan'>January</option>
        <option value='feb'>February</option>
        <option value='mar'>March</option>
        <option value='apr'>April</option>
        <option value='may'>May</option>
        <option value='jun'>June</option>
        <option value='jul'>July</option>
        <option value='aug'>August</option>
        <option value='sep'>September</option>
        <option value='oct'>October</option>
        <option value='nov'>November</option>
        <option value='dec'>December</option>
      </select>
      <br />
      Year :
      <input id = "year" type = "text" name = "dobyear" value="" class="overview"/></td>
  </tr>
  <tr>
    <td>Address :</td>
    <td>Line 1*:
      <input type = "text" name = "address1" value"" class="overview"/>
      <br />
      Line 2:
      <input id = "line2" type = "text" name = "address2" value"" class="overview"/>
      <br />
      Line 3:
      <input id = "line3" type = "text" name = "address3" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Pin code* :</td>
    <td><input type = "text" name = "pin" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Mobile no.* :</td>
    <td><input type = "text" name = "mob" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Email-id* :</td>
    <td><input type = "text" name = "email_id" value"" class="overview"/></td>
  </tr>
  <tr>
    <td><label for="file" >Your Photograph* :</label></td>
    <td><input type="file" name="file" id="file" class="submit"></td>
  </tr>
  <tr>
    <th colspan='2'>SET YOUR LOGIN CREDENTIALS:</th>
  </tr>
  <tr>
    <td>Username* :</td>
    <td><input type = "text" name = "user_id" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Password (4 digits only)* :</td>
    <td><input type = "password" name = "password" value ="" class="overview"/></td>
  </tr>
  
    <td>Re - type* :</td>
    <td><input type = "password" name = "password1" value ="" class="overview"/></td>
  </tr>
  <tr>
    <th colspan='2'>EDUCATIONAL QULAIFICATIONS: </th>
  </tr>
  <tr>
    <td>High-School-Name :</td>
    <td><input type = "text" name = "highsch_name" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>High-School Passing Year* :</td>
    <td><input type = "text" name = "hpass_year" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Graduation-College :</td>
    <td><input type = "text" name = "gradclg_name" value""  class="overview"/></td>
  </tr>
  <tr>
    <td>Graduation-Passing Year* :</td>
    <td><input type = "text" name = "gpass_year" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>High-School Cgpa* :</td>
    <td><input type = "text" name = "hsc_cgp" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Graduation-College Cgpa* :</td>
    <td><input type = "text" name = "grad_cgp" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Certifications :</td>
    <td><input  type = "text" name = "cert1" value"" class="overview"/>
      <br />
      <input id = "cert2" type = "text" name = "cert2" value"" class="overview"/>
      <br />
      <input id = "cert3" type = "text" name = "cert3" value"" class="overview"/></td>
  </tr>
  <tr>
    <td>Areas Of Skills :</td>
    <td>Subject 1 :<br />
      <input type = "text" name = "int1" value"" class="overview"/>
      <br />
      Novice
      <input type="radio" name="skill1" value="low"/>
      Moderate
      <input type="radio" name="skill1" value="moderate"/>
      High
      <input type="radio" name="skill1" value="high"/>
      <br /><br />
      Subject 2 :<br />
      <input type = "text" name = "int2" value"" class="overview"/>
      <br />
      Novice
      <input type="radio" name="skill2" value="low"/>
      Moderate
      <input type="radio" name="skill2" value="moderate"/>
      High
      <input type="radio" name="skill2" value="high"/>
      <br /><br />
      Subject 3 :<br />
      <input type = "text" name = "int3" value"" class="overview"/>
      <br />
      Novice
      <input type="radio" name="skill3" value="low"/>
      Moderate
      <input type="radio" name="skill3" value="moderate"/>
      High
      <input type="radio" name="skill3" value="high" /></td>
  </tr>
  <tr>
    <td>Previous Exeriences : </td>
    <td>Field 1:<br />
      <input type = "text" name = "pre_exp1" value"" class="overview"/>
      Low
      <input type="radio" name="exp_time1" value="low"/>
      Moderate
      <input type="radio" name="exp_time1" value="moderate"/>
      High
      <input type="radio" name="exp_time1" value="high"/>
      <br/>
      Field 2:<br />
      <input type = "text" name = "pre_exp2" value"" class="overview"/>
      Low
      <input type="radio" name="exp_time2" value="low"/>
      Moderate
      <input type="radio" name="exp_time2" value="moderate"/>
      High
      <input type="radio" name="exp_time2" value="high"/>
      <br/>
      Field 3:<br />
      <input type = "text" name = "pre_exp3" value"" class="overview"/>
      Low
      <input type="radio" name="exp_time3" value="low"/>
      Moderate
      <input type="radio" name="exp_time3" value="moderate"/>
      High
      <input type="radio" name="exp_time3" value="high"/></td>
  </tr>
  <tr>
    <th colspan='2'>WORK EXPERIENCE:</th>
  </tr>
  <tr>
    <td>Current-Company :</td>
    <td><input type = "text" name = "company_name" value"" class="overview"/></td>
  </tr>
  
    <td>Previous company :</td>
    <td><input type = "text" name = "pre_com1" value"" class="overview"/>
      <br />
      <input type = "text" name = "pre_com2" value"" class="overview"/>
      <br />
      <input type = "text" name = "pre_com3" value"" class="overview"/>
      <br /></td>
  </tr>
  <tr>
    <td>About yourself :(200 characters)</td>
    <td><textarea class="overview1"></textarea></td>
  </tr>
  
    <th colspan='2'><input id = "button"  type = "submit" name = "submit" value = "Submit data" class="submit"/>
</form>
<form action="newtestingdone.php" method = "post" >
  <input id ="button"   type = "submit" name = "see_resume" value ="See Your Resume !!" class="submit"/>
</form>

<?php
mysqli_close($connection);
?>
</body>
</html>