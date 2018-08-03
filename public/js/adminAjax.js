	$(document).ready(function(){
		adsOutput();
	})

	function adsOutput(){
		$("#adsOutput").html("<p>Confirm the ads you want</p>");
		$.getJSON('<?php echo URL_ROOT;?>admins/getjs',function(data){
			var adminid = '<?php echo $_SESSION['admin_id'];?>';
			$.each(data,function(i,item){
				$('#adsOutput').append('<p>' + data[i].title + '</p>');
				$('#adsOutput').append('<p>' + data[i].subject + '</p>');
				$('#adsOutput').append('<p>' + data[i].description + '</p>');
				$('#adsOutput').append('<p>' + data[i].price + '</p>');
				$('#adsOutput').append('<p>' + data[i].location + '</p>');
				$("#adsOutput").append('<input type="submit" class="publish" value="publish" adid=' + data[i].id +  ' adminid=' +adminid +' >' );
				
			})
		})
	}
	

	$("#adsOutput").on('click','.publish',function(){
		var adid = this.getAttribute('adid');
		var adminid = this.getAttribute('adminid');
		var vars = {
			adid:adid,
			adminid:adminid
		};
		$.post('<?php echo URL_ROOT ;?>admins/permissionSets',vars,function(data){
			adsOutput();
		})

	})
		