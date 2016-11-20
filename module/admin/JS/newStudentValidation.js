function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : event.keyCode
			//if (charCode > 31 && (charCode < 48 || charCode > 57))
			if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
			{alert("only number is allowed");return false;}
			return true;
		}
		



		
		
var stuGender = '';
function newStudentValidation(){
   var stuId = document.getElementById('stuId').value;
   var stuName = document.getElementById('stuName').value;
   var stuPassword = document.getElementById('stuPassword').value;
   var stuconPassword=document.getElementById('stuconfirmPassword').value; 
   var stuPhone = document.getElementById('stuPhone').value;
   var stuEmail = document.getElementById('stuEmail').value;
    //= document.getElementById("input[name = 'gender']:checked").value;
   var stuDOB = document.getElementById('stuDOB').value;
   var stuAddmissionDate = document.getElementById('stuAddmissionDate').value;
   var stuParentId = document.getElementById('stuParentId').value;
   var stuClassId = document.getElementById('stuClassId').value;
   if(!stuId){
       alert('Student Id Must be fild out.')
       return false;
   }
   else if(!stuName){
       alert('Student Name must be fild out.')
       return false;
   }
   else if(!stuPassword){
       alert('Student Password must be fild out.')
       return false;
   }
   else if (stuconPassword !=stuPassword)
   {
	   alert('Student password must be same')
       return false;
	   }
   else if(!stuPhone){
       alert('Student Phone must be fild out.')
       return false;
   }
  
   
   else if(!stuEmail){
       alert('Student Email must be fild out.')
       return false;
   }
   
   else if(stuEmail !=0){
	   
       var atpos = stuEmail.indexOf("@");
    var dotpos = stuEmail.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
     
   }
   
  

   
   else if(!stuGender){
       alert('Student Gender must be fild out.')
       return false;
   }
   else if(!stuDOB){
       alert('Student Date Of Birth must be fild out.')
       return false;
   }
   else if(!stuParentId){
       alert('Student Parent Id must be fild out.')
       return false;
   }
   else if(!stuClassId){
       alert('Student Class Id must be fild out.')
       return false;
   }
   else 
   {
		//alert("Entered data successfully");
		return true;
   }
}
function date(){
  var date = new Date();
  document.getElementById('date').innerHTML = date;
}
