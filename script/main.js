function dofollow($iduser, $toiduser, $status)
{
      if($status == 1){
            $.ajax({
                  url: "proses/prosesFollow.php",
                  type: "POST",
                  data: {iduser:$iduser, toiduser:$toiduser, status:$status},
                  cache: false,
                  beforeSend: function(){
                        $(".btnfollowid"+$iduser).html("Loading");
                  },
                  success: function(){
                        $(".btnfollowid"+$iduser).fadeOut();
                  }
            });
      }
}

function doUnfollow($iduser, $toiduser, $status){
      if($status == 1){
            $.ajax({
                  url: "proses/prosesUnfollow.php",
                  type: "POST",
                  data: {iduser:$iduser, toiduser:$toiduser, status:$status},
                  cache: false,
                  beforeSend: function(){
                        $(".btnunfollowid" + $toiduser).html("Loading");
                  },
                  success: function(){
                        $(".btnunfollowid" + $toiduser).fadeOut();
                  }
            });
      }
}