
 function UpdateBillStatus(id){
    var status = $('#billstatus'+id+' option:selected').val();
    window.location = "./Admin/Bill/updateBillStatus/"+id+"/"+status;
}
 function UpdateRule(id){
    // var status = $('#accountstatus'+id+' option:selected').val();
    alert(status);
    // window.location = "./Admin/Bill/updateAccountRule/"+id+"/"+status;
}
function abc() {
	// body...
	alert("abc");
}