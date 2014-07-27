<script>
	$('#modal-log-in').on('click',function(event){
		var output=$('#login-output').hide();
		event.preventDefault();
		var email=$('#login-email').val();
		var password=$('#login-password').val();
		var request=$.ajax({
			type:"POST",
			url:"./core/api/user-auth.php",
			data:{
				email:email,
				password:password
			}
		});
		request.done(function(name){
			if(name=='false'){
				output.text('Wrong username or password.');
				output.show();
			}else{
				$('#login-modal').modal('hide');
				$('#log-in').hide();
				$('#sign-up').hide();
				$('#welcome-name').text("Welcome, "+name);
			}
		});
	});

	$('#signup-button').on('click',function(event){
		event.preventDefault();
		var name=$('#signup-name').val();
		var email=$('#signup-email').val();
		var password=$('#signup-password').val();
		var request=$.ajax({
			type:"POST",
			url:"./core/api/signup.php",
			data:{
				name:name,
				email:email,
				password:password
			}
		});
		request.done(function(name){
			$('#signup-modal').modal('hide');
			$('#log-in').hide();
			$('#sign-up').hide();
			$('#welcome-name').text("Welcome, "+name);
		});
	});
</script>
</body>
</html>