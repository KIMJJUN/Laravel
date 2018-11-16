<?php

define("MAIN_PAGE","main.php"); //상수는 앞에 $ 붙지 않음.
  function requestValue($name){
    return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
  }

  function errorBack($msg){
    // echo "
    //   <script>
    //     alert(",$msg,");
    //     location.href='member_join_form.php';
    //   </script>
    // ";/>
    ?>
    <script>
      alert('<?= $msg ?>');
      history.back();
    </script>
    <?php
    exit();
  }
  function okGo($msg,$url){
    ?>
    <script>
      alert('<?= $msg ?>');
      location.href='<?= $url ?>';

    </script>
    <?php
  }
    function goNow($url){
          ?>
         <script>
             location.href = '<?= $url ?>';

        </script>
         <?php
              exit();
    }
 ?>