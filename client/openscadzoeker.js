$(function(){
 var Done=false;

 function Load1() {
  if($("img.a:eq(0)").length) {
   let file=$("img.a:eq(0)").parent().attr("data-fil");
   $.ajax({
    url:"parse.php",
    data:{"fil": file},
    context: $("img.a:eq(0)").parent()
   }).done(function(data, textStatus, jqXHR) {

    $("img.i",this).prop("src","tmp"+data);
    console.log("done "+"tmp"+data);
    $("img.i",this).removeClass("a");
    Done=true;
   });//done
  }
 }

 Load1();
 setInterval(function(){
  if(Done) {
   Done=false;
   Load1();
  }
 },100);


});
