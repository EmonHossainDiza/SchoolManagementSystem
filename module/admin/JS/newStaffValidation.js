function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			//if (charCode > 31 && (charCode < 48 || charCode > 57))
			if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
			{alert("only number is allowed");return false;}
			return true;
		}

var Gender = '';
function newStudentValidation(){
   var Id = document.getElementById('stuId').value;
   var Name = document.getElementById('stuName').value;
   var Password = document.getElementById('stuPassword').value;
   var staconPassword=document.getElementById('staconfirmPassword').value;
   var Phone = document.getElementById('stuPhone').value;
   var Email = document.getElementById('stuEmail').value;
   var DOB = document.getElementById('stuDOB').value;
   var HireDate = document.getElementById('stuAddmissionDate').value;
   var Address = document.getElementById('stuParentId').value;
   var Salary = document.getElementById('stuClassId').value;
   if(!Id){
       alert('Staff Id Must be fild out.')
       return false;
   }
   else if(!Name){
       alert('Staff Name must be fild out.')
       return false;
   }
   else if(!Password){
       alert('Staff Password must be fild out.')
       return false;
   }
   
   else if (staconPassword !=Password)
   {
	   alert('staff password must be same')
       return false;
	   }
	   
   else if(!Phone){
       alert('Staff Phone must be fild out.')
       return false;
   }
   else if(!Email){
       alert('Staff Email must be fild out.')
       return false;
   }
   
   else if(Email !=0){
	   
       var atpos = Email.indexOf("@");
    var dotpos = Email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
     
   }
   else if(!Gender){
       alert('Staff Gender must be fild out.')
       return false;
   }
   else if(!DOB){
       alert('Staff Date Of Birth must be fild out.')
       return false;
   }
   else if(!HireDate){
       alert('Staff Parent Id must be fild out.')
       return false;
   }
   else if(!Address){
       alert('Staff Class Id must be fild out.')
       return false;
   }
   else if(!Salary){
       alert('Staff Class Id must be fild out.')
       return false;
   }
   else return true;
}
