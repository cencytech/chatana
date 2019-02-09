<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('../pages/header-main.php'); ?>
<div class="container">
	<div class="row">
		<?php include('myprofile_userlist.php'); ?>
	</div>
</div>

<?php include('myprofile_updateuser_modal.php'); ?>

<script>
$(document).ready(function(){

	$(document).on('click', '.edituser', function(){
		var rid=$(this).val();
		var name=$('#ename'+rid).val();
		var username=$('#eusername'+rid).val();
		var password=$('#epassword'+rid).val();
		$('#edit_user').modal('show');
		$('.modal-body #user_name').val(name);
		$('.modal-body #user_user').val(username);
		$('.modal-body #user_pass').val(password);
		$('.modal-footer #confirm_update').val(rid);
	});

	$(document).on('click', '#confirm_update', function(){
		var nrid=$(this).val();
		var nname=$('#user_name').val();
		var nuser=$('#user_user').val();
		var npass=$('#user_pass').val();
		$('#edit_user').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"myprofile_update_user.php",
				method:"POST",
				data:{
					id: nrid,
					name: nname,
					username: nuser,
					password: npass,
					edit: 1,
				},
				success:function(){
					window.location.href='myprofile.php?id=<?php echo $_SESSION["id"]?>';
				}
			});
	});
 
});

</script>	
</body>
</html>