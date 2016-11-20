function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			//if (charCode > 31 && (charCode < 48 || charCode > 57))
			if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
			{alert("only number is allowed");return false;}
			return true;
		}

var teaGender = '';
function newTeacherValidation(){
   var teaId = document.getElementById('teaId').value;
   var teaName = document.getElementById('teaName').value;
   var teaPassword = document.getElementById('teaPassword').value;
   var teaconPassword=document.getElementById('teaconfirmPassword').value; 
   var teaPhone = document.getElementById('teaPhone').value;
   var teaEmail = document.getElementById('teaEmail').value;
   var teaDOB = document.getElementById('teaDOB').value;
   var teaHireDate = document.getElementById('teaHireDate').value;
   var teaSalary = document.getElementById('teaSalary').value;
   if(!teaId){
       alert('Teacher Id Must be fild out.')
       return false;
   }
   else if(!teaName){
       alert('Teacher Name must be fild out.')
       return false;
   }
   else if(!teaPassword){
       alert('Teacher Password must be fild out.')
       return false;
   }
   
   else if (teaconPassword !=teaPassword)
   {
	   alert('teacher password must be same')
       return false;
	   }
   
   else if(!teaPhone){
       alert('Teacher Phone must be fild out.')
       return false;
   }
   else if(!teaEmail){
       alert('Teacher Email must be fild out.')
       return false;
   }
   
   else if(teaEmail !=0){
	   
       var atpos = teaEmail.indexOf("@");
    var dotpos = teaEmail.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
     
   }
   
   else if(!teaGender){
       alert('Teacher Gender must be fild out.')
       return false;
   }
   else if(!teaDOB){
       alert('Teacher Date Of Birth must be fild out.')
       return false;
   }
   else if(!teaParentId){
       alert('Teacher Salary must be fild out.')
       return false;
   }
   else return true;
}
function date(){
  var date = new Date();
  document.getElementById('date').innerHTML = date;
}
