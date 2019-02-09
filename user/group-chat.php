<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('../pages/header-main.php'); ?>
<div class="container-fluid">
	<div class="row">
		<?php include('mychat.php'); ?>
		<hr>
		<?php include('chatlist.php'); ?>
	</div>
</div>
<?php include('password_modal.php'); ?>
<?php include('out_modal.php'); ?>
<?php include('modal.php'); ?>
 
<script>
$(document).ready(function(){ 
	
	$(document).on('click', '.join_chat', function(){
		var cid=$(this).val();
		if ($('#status'+cid).val()==1){
			window.location.href='chatroom.php?id='+cid;
		}
		else if ($('#status'+cid).val()==2){
			$('#join_chat').modal('show');
			$('.modal-body #chatid').val(cid);
		}
		else{
			$.ajax({
				url:"addmember.php",
				method:"POST",
				data:{
					id: cid,
				},
				success:function(){
				window.location.href='chatroom.php?id='+cid;
				}
			});
		}
	});
	
	$(document).on('click', '#addchatroom', function(){
		chatname=$('#chat_name').val();
		chatpass=$('#chat_password').val();
			$.ajax({
				url:"add_chatroom.php",
				method:"POST",
				data:{
					chatname: chatname,
					chatpass: chatpass,
				},
				success:function(data){
				window.location.href='chatroom.php?id='+data;
				}
			});
		
	});
	//
	$(document).on('click', '.delete2', function(){
		var rid=$(this).val();
		$('#delete_room2').modal('show');
		$('.modal-footer #confirm_delete2').val(rid);
	});
	
	$(document).on('click', '#confirm_delete2', function(){
		var nrid=$(this).val();
		$('#delete_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"deleteroom.php",
				method:"POST",
				data:{
					id: nrid,
					del: 1,
				},
				success:function(){
					window.location.href='group-chat.php';
				}
			});
	});
	
	$(document).on('click', '.leave2', function(){
		var rid=$(this).val();
		$('#leave_room2').modal('show');
		$('.modal-footer #confirm_leave2').val(rid);
	});
	
	$(document).on('click', '#confirm_leave2', function(){
		var nrid=$(this).val();
		$('#leave_room2').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"leaveroom.php",
				method:"POST",
				data:{
					id: nrid,
					leave: 1,
				},
				success:function(){
					window.location.href='group-chat.php';
				}
			});
	});
 
});
</script>	
 

<?php include "../pages/foobar.php" ?>