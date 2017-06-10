$(document).ready(function () {
	$(".seat").each(function(){
		$(this).attr('id', $(this).html());
	});
	$(".seat").on('click', function(){
		gS($(this).attr('id'));
	});
	gS('');
});

var gS = function(SS){
	jQuery.get("/schedules/selectSeat/"+SC+"/"+SS, {}, function (data, status) {
        for (var i = 0; i < data.seats.length; i++) {
        	var classname = "open";
        	switch(parseInt(data.seats[i].status)){
        		case 2:classname="selected";break;
        		case 3:classname="booked";break;
        		case 5:classname="myselection";break;
        	}
        	$("#"+data.seats[i].name).removeClass("open").removeClass("selected").removeClass("booked").removeClass("myselection").addClass(classname);
        	// console.log("name = "+data[i].name);
        }
        $("#selected").html(data.count + " seats selected " + data.selected + " for price " + data.price);
    }, "json");
}