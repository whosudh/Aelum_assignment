<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Form</title>
<style>
	body{
		background-color: #FFFFCC;
	}
	form{
		margin-left: 40vh;
		width: 50%;
	}
	p{
		margin-left: 40vh;
		width: 50%;
	}
	}
	fieldset{
		padding: 5px;
	}
	.btn{
		background-color:black; color:white;
	}
	#para{
		background-color: red;
		color: white;
		border: 2px solid black;
	}
	form{
		border: 1px solid #000;
		border-radius :2px;
		background-color: #6040B0;
	}
	#leg{

	text-align: center;
	font-size:  25px;
	font-weight:  bold;
	}

	label{
		padding-left: 5px;
	}
	.btn{
		margin-bottom: 16px;
  		margin-left:  70%;
	}
</style>
</head>
<body onload="generate()">
	<div class="container">
    <p id="para">Hurry-Up !! only <span id="timer">03:00</span> minutes left!</p>
	<form action="" method="POST">
		<fieldset>
			<legend id="leg"><b>Profile</b></legend>
<div class="form-group">
	<label for="name"> FULL NAME</label>
<input type="text" class="form-control" placeholder="Full Name" id="name" name="fullname" value="" required><br>
</div>
<div class="form-group">
	<label for="name">Email</label>
<input type="text" class="form-control" placeholder="Email ID" id="email" name="email" value="" required><br>
</div>
<div class="form-group">
	<label for="dob"> Date Of Birth</label>
<input type="date" class="form-control" placeholder="D.O.B" id="dob" name="dob" value="" required><br>
</div>
<div class="form-group">
	<label for="msg"> ABOUT</label>
<textarea rows="6" col="8" class="form-control" placeholder="About Yourself" name="msg" value="">
</textarea>
</div>
<div class="form-group">
	<label for="cap">Captcha</label>
<input type="text" class="form-control"  id="capt" name="cap" readonly><br>
</div>
<div class="form-group">
<input type="text" class="form-control" id="inputcap" name="cap"><br>
</div>
<div class=" form-group text-left">
<button onclick="validatecap()" class="btn" name="button">Confirm & Submit</button>
</div>
</fieldset>
</form>
</div>
<script>
	
	function generate(){
						data1 = Math.round(Math.random() * 20);
						data2 = Math.round(Math.random() * 20);
						str = `Enter ${data1} + ${data2}`
						document.getElementById('capt').innerHTML = str;
						sum = data1 + data2;
						}
						function validatecap(){
							data3 = document.getElementById("inputcap").value;
							if(sum == data3){
								alert('Captcha matched $ validated!');
							}else{
								alert('Oops!! Captcha mis-matched!');
							};
						};
			 window.onload = function () {
            var minute = 2;
            var sec = 59;
            myVar = setInterval(function () {
               document.getElementById("timer").innerHTML =
                  minute + " : " + sec;
               sec--;
               if (sec == 00) {
                  minute--;
                  sec = 60;
              }else
			   if (minute == 0 && sec == 0) {
                     minute = 0;
                     sec = 0;
                     clearInterval(myVar)
                  } 
            }, 1000);
            }; 
</script>
</body>
</html>
<?php
include 'connection.php';
if(isset($_POST['button'])){
$name=$_POST['fullname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$about=$_POST['msg'];
$insertquery= "insert into profile(Name,Email,DOB,About)values('$name','$email','$dob','$about')";
$res= mysqli_query($con,$insertquery);
if($res){
?>
<script>
alert('data inserted properly');
</script>
<?php
}
else{
	?>
<script>
alert('data not found');
</script>
<?php
}
}
?>
