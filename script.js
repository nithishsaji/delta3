function validateForm()
{
  var a=document.forms["myForm"]["name"].value;
  var b=document.forms["myForm"]["dob"].value;
  var c=document.forms["myForm"]["frn"].value;
  var f=document.forms["myForm"]["email"].value;
  var h=document.forms["myForm"]["pass"].value;
  var i=document.forms["myForm"]["cpass"].value;
  var z=document.forms["myForm"]["image"]; 
  var e=document.forms["myForm"]["gender"];
  var p=document.forms["myForm"]["delta"];
  var q=document.forms["myForm"]["spider"];
  var r=document.forms["myForm"]["rmi"];
  var s=document.forms["myForm"]["design"];
  var d=c.length;
  var len=h.length;


  if (a=="") {//alert("Fill name");
     document.getElementById("fname").style.display='block';
  return false;}
  if (b="") {//alert("dob");
    document.getElementById("fdob").style.display='block';
  return false;}
  if (c=="") {//alert("rn");
  document.getElementById("frn").style.display='block';
  return false;}
  if (d<5) {//alert("10 digits");
  document.getElementById("frn").style.display='block';
  return false;}
  if (f=="") {//alert("email");
  return false;}
  if (h=="") {//alert("pass");
  document.getElementById("fpass").style.display='block';
  return false;}
  if (i=="") {//alert("cpass");
  document.getElementById("fcpass").style.display='block';
  return false;}
  if(h!=i){//alert("passwords do not match")
    document.getElementById("fcpass").style.display='block';
  return false;}
  if(a.charAt(0)!=a.charAt(0).toUpperCase()){
  //alert("Name starts with uppercase");
  document.getElementById("fname").style.display='block';
  return false;}
  if (len < 5|| len >10||len==0){
  //alert("passwords must not be empty and should be between 5 and 10 characters");
  document.getElementById("fpass").style.display='block';
  return false;}
  if( /[^a-zA-Z0-9]/.test(h) ) {
       //alert('Input is not alphanumeric');
       document.getElementById("fpass").style.display='block';
       return false;}

  if(/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(b)){
  return true}
  else {// alert("invalid Date")
    document.getElementById("fdob").style.display='block';
       //return false;
       }      

  var x =0;
  if(p.checked==true){x++}
  if(q.checked==true){x++}
  if(r.checked==true){x++}
  if(s.checked==true){x++}
  if(x<3){ //alert("min3");
  document.getElementById("fclub").style.display='block';
   return false;}

       
  if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(f)){return true;}
  else {
      //alert("email invalid")
      document.getElementById("femail").style.display='block';
      return false;
    }
    if(!(/\.(jpg|jpeg|png)$/i).test(z)){
      document.getElementById("im").style.display='block';
      return false;}
    
}
     
    
