$(document).ready(function(){
  var k = 9;
  $(".accounts").load("includes/admin.inc.php",{k:k});
  var t = 9;
  $(".orders").load("includes/admin.inc.php",{t:t});


  // acc
  $("#search").click(function(){
    var src = $("#src-inp").val();
    $(".accounts").load("includes/search.handle.php",{src : src})

  });

  // ord
  $("#search2").click(function(){

    var src = $("#srcord").val();
    if (src == "") {
      $(".orders").load("includes/admin.inc.php",{t:t});
    }else{
      $(".orders").load("includes/search.handle.php",{srcord : src})

    }

  });
})
