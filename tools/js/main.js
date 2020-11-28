function showme(layout){

        Snackbar.show({text: '<i class="fa fa-refresh fa-spin"></i>  Loading <span class="dot1 text-white">.</span><span class="dot2 text-white">.</span><span class="dot3 text-white">.</span>',duration: 2000,pos: 'bottom-right',showAction: false,backgroundColor: '#343a40',textColor: '#fff'});
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $(".body").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "layouts/index.php?fol=" + layout, true);
        xmlhttp.send();
}
function verify(value,req){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $(".body").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "autoloads/index.php?val=" + value + "&req=" + req , true);
        xmlhttp.send();
}



$(document).ready(function(e){
      $.ajaxSetup({cache:false});
      setInterval(function() {$('.headp').load('includes/nav.php')}, 2000);
});
// $(document).ready(function(e){
//       $.ajaxSetup({cache:false});
//       setInterval(function() {$('#code').load('layouts/code.php','request=' + $('#request_id').val())}, 2000);
// });
// $(document).ready(function(e){
//       $.ajaxSetup({cache:false});
//       setInterval(function() {$('#phone').load('layouts/phone.php','request=' + $('#request_id').val())}, 2000);
// });
// $(document).ready(function(e){
//       $.ajaxSetup({cache:false});
//       setInterval(function() {$('#duration').load('layouts/time.php','request=' + $('#request_id').val())}, 2000);
// });
$(document).ready(function(e){
      $.ajaxSetup({cache:false});
      setInterval(function() {$('#changeme').load('layouts/password.php')}, 2000);
});