$(document).ready(function(){
	//$("#contactForm").validate();
	// SUCCESS AJAX CALL, replace "success: false," by:     success : function() { callSuccessFunction() }, 
			$("#form1").validationEngine({
				ajaxSubmit: true,
					ajaxSubmitFile: "ajaxSubmit.php",
					ajaxSubmitMessage: "Thank you, We will contact you soon !",
				success :  false,
				failure : function() {alert('Fail to submit')}
			})	
});