// JavaScript Document
function lof(x)
{
	location.href=x
}

// 很多地方用到del，直接丟js
function del(table,id){
	$.post("api/del.php",{table,id},()=>{
		location.reload();
	})
}