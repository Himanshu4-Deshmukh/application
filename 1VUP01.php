<script language="javascript">
<!--//
/*This Script allows people to enter by using a form that asks for a
UserID and Password*/
function pasuser(form) {
if (form.id.value=="ManpreetVUP01") { 
if (form.pass.value=="India") {              
location="https://gaadiwalaonline.com/2VUP01.php" 

} else {
alert("Invalid Password")
}
} else {  alert("Invalid UserID")
}
}
//-->
</script>


<center>
<div class="form-box">
		<div class="header-text">
			<img src="https://www.gaadiwalaonline.com/images/logo.png" alt="location" width="100" height="90" class="location-icon d-block"><br>
		</div>
<form name="login"><input
name="id" type="text"></td></tr>
<input name="pass"
type="password">
<input type="button" value="Login to Manpreet"
onClick="pasuser(this.form)"></center></form>	</div>

<link href="loginform.css" rel="stylesheet">
