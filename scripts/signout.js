$(document).ready(function(){
				$(".sign-out").click(function (e) {
				e.preventDefault();
				$.ajax({
				type : 'POST',
				url: 'action_page.php',
				data: {signout:true},
				dataType : 'json',
				success : function(data) {
					if(data.result=="OK") {
						window.location.replace('https://здравствую.рф');
					}
				  }
				});
			});
	});