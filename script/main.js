$(document).ready(function(){

      // Pencarian User
      $("#search").keyup(function(){
            var src = $(this).val();
            if(src != ''){
                  loadsearch(src);
            } else {
                  loadsearch();
            }
      });

      // Tampilkan pop up pengaturan
      $("#config").on('click',function(){
            $('.pengaturan').fadeIn();
      });
      // Tutup jika batal mengubah profil
      $(".btn-cancel").on('click',function(){
            $('.pengaturan').fadeOut();
      });
});



// Pencarian
function loadsearch(query){
      if(query != ''){
            $.ajax({
                  url: "proses/prosesSearch.php",
                  data: {query:query},
                  method: "POST",
                  success: function(data){
                        $(".result-search").html(data);
                  }
            });
      }
}

// Fungsi Unfollow
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

// Fungsi Unfollow
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

// Fungsi Like
function doLike($postingID, $iduser, $toiduser){
      $.ajax({
            url: "proses/prosesLike.php",
            type: "POST",
            data: {postingID:$postingID, iduser:$iduser, toiduser:$toiduser},
            cache: false,
            beforeSend: function(){
                  console.log("Loading");
            },
            success: function(){
                  $(".like" + $postingID).hide();
                  $(".unlike" + $postingID).show();
            }
      });
}

// Fungsi Dislike
function doUnlike($postingID, $iduser, $toiduser){
      $.ajax({
            url: "proses/prosesUnlike.php",
            type: "POST",
            data: {postingID:$postingID, iduser:$iduser, toiduser:$toiduser},
            cache: false,
            beforeSend: function(){
                  console.log("Loading");
            },
            success: function(){
                  $(".like" + $postingID).show();
                  $(".unlike" + $postingID).hide();
            }
      });
}

// Tampil komentar
function showComment($idtweet){
      $(".commentfromid"  + $idtweet).show();
}