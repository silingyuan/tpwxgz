$(function() {
	$("#px-btn").bind("click",function(){
		$("#notice").show(100);
		window.setTimeout(function(){
		var qq = $("#qq").val();
		var sn = $("#sn").val();
		if (qq == '') 
		{
			alert("请输入您的QQ号");
			return;
		}
		else if(sn=='')
		{
			alert("请输入您的SN码");
			return;
		}
		else
		{
			var submitData = {qq: qq,sn: sn,}
			$.get('./php/submit.php', submitData,function(data) {alert(data);});
		}},300);
	});
	$("#cx-btn").bind("click",function(){
			//alert($("#cx").val());
			var cx=$("#cx").val();
			var sdata={cx:cx};
			if(cx=="")
			{
				alert("请输入您要查询的QQ号");
			}
			else
			{
				$.get('./php/submit.php',sdata,function(data){alert(data);});
			}
		});
});