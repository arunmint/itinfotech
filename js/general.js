// JavaScript Document
function selct_packge(id)
{
	//alert('');
	//alert(divid);
	var ajaxRequest;  
	try{
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		//alert(ajaxRequest.responseText);
				var ajaxDisplay = document.getElementById('sample');
				//alert("disp pro"+ ajaxRequest.responseText);
	
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
	}
	var QueryString;
	QueryString = "?pckid="+id;
	//alert(QueryString);
	ajaxRequest.open("GET", "pin_no.php"+QueryString, true);
	ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajaxRequest.send(null); 
}

function lst_tag(id)
{
	//alert('');
	//alert(divid);
	var ajaxRequest;  
	try{
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		//alert(ajaxRequest.responseText);
				var ajaxDisplay = document.getElementById('tagdiv');
				//alert("disp pro"+ ajaxRequest.responseText);
	
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
	}
	var QueryString;
	QueryString = "?uplneid="+id;
	//alert(QueryString);
	ajaxRequest.open("GET", "list_tag.php"+QueryString, true);
	ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajaxRequest.send(null); 
}

function chk_refid(id)
{
	//alert('');
	//alert(divid);
	var ajaxRequest;  
	try{
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		//alert(ajaxRequest.responseText);
				var ajaxDisplay = document.getElementById('refdiv');
				//alert("disp pro"+ ajaxRequest.responseText);
	            
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
	}
	var QueryString;
	QueryString = "?refid="+id;
	//alert(QueryString);
	ajaxRequest.open("GET", "chck_refid.php"+QueryString, true);
	ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajaxRequest.send(null); 
	
}


