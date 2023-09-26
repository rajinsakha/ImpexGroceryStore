<?php
if(isset($_SESSION['message']))
{
    ?>  
<div class="alert"> 
  <span class="closebtn" >&times;</span>  
 <?=$_SESSION['message']?>
</div>

<?php
unset($_SESSION['message']);
}

if(isset($_SESSION['success_msg']))
{
    ?>  
<div class="alert success"> 
  <span class="closebtn">&times;</span>  
 <?=$_SESSION['success_msg']?>
</div>


<?php
unset($_SESSION['success_msg']);
}

?>