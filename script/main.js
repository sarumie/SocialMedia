function dofollow($iduser, $toiduser, $status)
{
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