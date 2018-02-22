<head>
  <style>
    body{
      margin-top:20px;
      background:#eee;
      overflow: hidden;
    }
    #main
    {
      overflow: hidden;
    }
    .row.row-broken {
      padding-bottom: 0;
    }
    .col-inside-lg {
      padding: 20px;
    }
    .chat {
      height: calc(100vh - 180px);
    }
    .decor-default {
      background-color: #ffffff;
    }
    .chat-users h6 {
      font-size: 20px;
      margin: 0 0 20px;
    }
    .chat-users .user {
      position: relative;
      padding: 0 0 0 50px;
      display: block;
      cursor: pointer;
      margin: 0 0 20px;
    }
    .chat-users .user .avatar {
      top: 0;
      left: 0;
    }
    .chat .avatar {
      width: 40px;
      height: 40px;
      position: absolute;
    }
    .chat .avatar img {
      display: block;
      border-radius: 20px;
      height: 100%;
    }
    .chat .avatar .status.off {
      border: 1px solid #5a5a5a;
      background: #ffffff;
    }
    .chat .avatar .status.online {
      background: #4caf50;
    }
    .chat .avatar .status.busy {
      background: #ffc107;
    }
    .chat .avatar .status.offline {
      background: #ed4e6e;
    }
    .chat-users .user .status {
      bottom: 0;
      left: 28px;
    }
    .chat .avatar .status {
      width: 10px;
      height: 10px;
      border-radius: 5px;
      position: absolute;
    }
    .chat-users .user .name {
      font-size: 14px;
      font-weight: bold;
      line-height: 20px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .chat-users .user .mood {
      font: 200 14px/20px "Raleway", sans-serif;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    /*****************CHAT BODY *******************/
    .chat-body h6 {
      font-size: 20px;
      margin: 0 0 20px;
    }
    .chat-body .answer.left {
      padding: 0 0 0 58px;
      text-align: left;
      float: left;
    }
    .chat-body .answer {
      position: relative;
      max-width: 600px;
      overflow: hidden;
      clear: both;
    }
    .chat-body .answer.left .avatar {
      left: 0;
    }
    .chat-body .answer .avatar {
      bottom: 36px;
    }
    .chat .avatar {
      width: 40px;
      height: 40px;
      position: absolute;
    }
    .chat .avatar img {
      display: block;
      border-radius: 20px;
      height: 100%;
    }
    .chat-body .answer .name {
      font-size: 14px;
      line-height: 36px;
    }
    .chat-body .answer.left .avatar .status {
      right: 4px;
    }
    .chat-body .answer .avatar .status {
      bottom: 0;
    }
    .chat-body .answer.left .text {
      background: #ebebeb;
      color: #333333;
      border-radius: 8px 8px 8px 0;
    }
    .chat-body .answer .text {
      padding: 12px;
      font-size: 16px;
      line-height: 26px;
      position: relative;
    }
    .chat-body .answer.left .text:before {
      left: -30px;
      border-right-color: #ebebeb;
      border-right-width: 12px;
    }
    .chat-body .answer .text:before {
      content: '';
      display: block;
      position: absolute;
      bottom: 0;
      border: 18px solid transparent;
      border-bottom-width: 0;
    }
    .chat-body .answer.left .time {
      padding-left: 12px;
      color: #333333;
    }
    .chat-body .answer .time {
      font-size: 16px;
      line-height: 36px;
      position: relative;
      padding-bottom: 1px;
    }
    /*RIGHT*/
    .chat-body .answer.right {
      padding: 0 58px 0 0;
      text-align: right;
      float: right;
    }

    .chat-body .answer.right .avatar {
      right: 0;
    }
    .chat-body .answer.right .avatar .status {
      left: 4px;
    }
    .chat-body .answer.right .text {
      background: #7266ba;
      color: #ffffff;
      border-radius: 8px 8px 0 8px;
    }
    .chat-body .answer.right .text:before {
      right: -30px;
      border-left-color: #7266ba;
      border-left-width: 12px;
    }
    .chat-body .answer.right .time {
      padding-right: 12px;
      color: #333333;
    }

    /**************ADD FORM ***************/
    .chat-body .answer-add {
      clear: both;
      position: relative;
      margin: 20px -20px -20px;
      padding: 20px;
      background: #46be8a;
    }
    .chat-body .answer-add input {
      border: none;
      background: none;
      display: block;
      width: 100%;
      font-size: 16px;
      line-height: 20px;
      padding: 0;
      color: #ffffff;
    }
    .chat input {
      -webkit-appearance: none;
      border-radius: 0;
    }
    .chat-body .answer-add .answer-btn-1 {
      background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-40.png") 50% 50% no-repeat;
      right: 56px;
    }
    .chat-body .answer-add .answer-btn {
      display: block;
      cursor: pointer;
      width: 36px;
      height: 36px;
      position: absolute;
      top: 50%;
      margin-top: -18px;
    }
    .chat-body .answer-add .answer-btn-2 {
      background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-41.png") 50% 50% no-repeat;
      right: 20px;
    }
    .chat input::-webkit-input-placeholder {
     color: #fff;
   }

   .chat input:-moz-placeholder { /* Firefox 18- */
     color: #fff;  
   }

   .chat input::-moz-placeholder {  /* Firefox 19+ */
     color: #fff;  
   }

   .chat input:-ms-input-placeholder {  
     color: #fff;  
   }
   .chat input {
    -webkit-appearance: none;
    border-radius: 0;
  }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
<script>
  $(function(){
    $(".chat").niceScroll();
  }) 
  function scrollTo(hash) {
    location.hash = "#" + hash;
  }
</script>
<script>
  var actual = "message";
  function afficher(objet)
  {
    if(actual!="message")
    {
      document.getElementById(actual).style.display="none";
    }
    document.getElementById(objet).style.display="inline";
    actual = objet;
  }
</script>
</head>
<div style="margin-top:6vh" class="content container-fluid bootstrap snippets">
  <div class="row row-broken">
    <div class="col-sm-3 col-xs-12">
      <div class="col-inside-lg decor-default chat" style="overflow: hidden; outline: none;" tabindex="5000">
        <div class="chat-users">
          <h6>Conversations</h6>
          <?php
          $i = 0;
          foreach ($conversations as $conversation) 
          {
            if ($_SESSION["utilisateur"]["id"] == $conversation["ID_UTILISATEUR1"])
            {
              $nom = $Utilisateur->getUtilisateurParId($conversation["ID_UTILISATEUR2"]);                  
            }
            else
            {
              $nom = $Utilisateur->getUtilisateurParId($conversation["ID_UTILISATEUR1"]);                  
            }
            $nom = $nom[0]["PRENOM_UTILISATEUR"] . " " . $nom[0]["NOM_UTILISATEUR"];
            ?>
            <div class="user" style="margin-top:3vh" onclick='afficher("<?php echo "message$i"; ?>")'>
              <div class="avatar">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                <div class="status off"></div>
              </div>
              <div class="name"><?php echo $nom ?></div>
            </div>
            <?php 
            $i = $i + 1;
          } ?>
        </div>
      </div>
    </div>

    <?php
    $i=0;
    foreach ($conversations as $conversation) 
    {
      if ($_SESSION["utilisateur"]["id"] == $conversation["ID_UTILISATEUR1"])
      {
        $nom = $Utilisateur->getUtilisateurParId($conversation["ID_UTILISATEUR2"]);
        $id_correspondant = $conversation["ID_UTILISATEUR2"];               
      }
      else
      {
        $nom = $Utilisateur->getUtilisateurParId($conversation["ID_UTILISATEUR1"]);  
        $id_correspondant = $conversation["ID_UTILISATEUR1"];                               
      }
      $nom = $nom[0]["PRENOM_UTILISATEUR"] . " " . $nom[0]["NOM_UTILISATEUR"];
      $messages = $Messagerie->getMessagesParConversation($conversation["ID_CONVERSATION"]);
      if (isset($current))
      {
        if ($current == $id_correspondant) 
          echo "<script> actual = 'message$i'; </script>"; 
      } 
      ?>
      <div class="col-sm-9 col-xs-12 chat" style="overflow: hidden; outline: none; <?php if (isset($current)){ if ($current != $id_correspondant) echo 'display: none'; }else { echo 'display: none'; } ?>" id='<?php echo "message$i"; ?>' tabindex="5001">
        <div class="col-inside-lg decor-default">
          <div class="chat-body">
            <h6>Conversation avec <?php echo $nom; ?></h6>

            <?php
            $ii = count($messages); 
            
            if ($ii>10)
            {
              echo '<a style="position:fixed;" class="btn btn-primary" role="button" href="index.php?url=messagerie&amp;correspondant=' . $id_correspondant . '&amp;afficher=1;"> Afficher toute la conversation</a> ';
            }
            $indexMessage =0;
            foreach ($messages as $message) 
            {
              $indexMessage++;
              if ($ii>10 && $afficher != $id_correspondant)
              {
                $ii--;                    
              }
              else
              {
                if ( $indexMessage == count($messages))
                {
                  if ($message["ID_EXPEDITEUR"] == $_SESSION["utilisateur"]["id"])
                    { ?>
                  <div class="answer right">
                    <div class="avatar">
                      <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                      <div class="status offline"></div>
                    </div>
                    <div class="name">Vous</div>
                    <div class="text" style="margin-bottom: 2vh;">
                      <?php echo $message["LIBELLE"] ?>
                    </div>
                  </div>                    
                  <?php }
                  else
                  {
                    ?>

                    <div class="answer left">
                      <div class="avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                        <div class="status offline"></div>
                      </div>
                      <div class="name"><?php echo $nom; ?></div>
                      <div class="text" style="margin-bottom: 2vh;">
                        <?php echo $message["LIBELLE"]; ?>
                      </div>
                    </div>
                    <?php } 
                  }
                  else
                  {
                    if ($message["ID_EXPEDITEUR"] == $_SESSION["utilisateur"]["id"])
                      { ?>
                    <div class="answer right">
                      <div class="avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                        <div class="status offline"></div>
                      </div>
                      <div class="name">Vous</div>
                      <div class="text">
                        <?php echo $message["LIBELLE"] . ' ' . $indexMessage; ?>
                      </div>
                    </div>                    
                    <?php }
                    else
                    {
                      ?>

                      <div class="answer left">
                        <div class="avatar">
                          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                          <div class="status offline"></div>
                        </div>
                        <div class="name"><?php echo $nom; ?></div>
                        <div class="text">
                          <?php echo $message["LIBELLE"]; ?>
                        </div>
                      </div>
                      <?php } 
                    }
                  }
                  ?>

                  <?php
                }
                ?>

                <form autocomplete="off"  class="answer-add" method="post" action="">
                  <input style="visibility:hidden;position: absolute;" name="conversation" value='<?php echo $conversation["ID_CONVERSATION"]; ?>'/>
                  <input style="visibility:hidden;position: absolute;" name="correspondant" value='<?php echo $id_correspondant; ?>'/>
                  <input name="message" placeholder="Ecrivez un message">
                  <input type="submit" name="submit" value="" class="answer-btn answer-btn-2"></input>
                </form>
              </div>
            </div>
          </div>        
          <?php 
          $i = $i+1;
        } ?>
      </div>
      <?php 
      if (isset($current))
      {
        echo '<script> scrollTo("auto")</script>';
      }
      ?>

    </div>
