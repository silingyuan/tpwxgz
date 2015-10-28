$('#scratchpage').bind('pageinit', function(event) {
	var num = 0;
	var goon = true;
	$("#scratchpad").wScratchPad({
		width: 150,
		height: 40,
		color: "#a9a9a7",
		scratchMove: function() {
			num++;
			if (num > 10 && goon) {						
				goon = false;							
				$("#zjl").slideToggle(500);
			}
		}
	});
	$("#prize").slideToggle(10);
});