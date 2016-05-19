var ost_controller = "module/controller/";
function sendPSOT(fileName,dataPOST,showID){
	$.ajax({
		url: ost_controller+fileName+".php",
		type: "POST",         
		data: dataPOST,
		success: function(data)  
		{
			var data_txt	=	$.trim(data);
			$('#'+showID).html(data_txt);
		}
	});				
}