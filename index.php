<!doctype html>
<html>
<?php require('template/head.php');?>
<body class="bg-primary">
<?php require('template/navbarHeader.php');?>

<?php require('template/page/header.php');?>
<?php require('template/page/mainHome.php');?>

<?php require('template/footer.php');?>
<script>
    window.onscroll = function() {scrollFunction()};
 
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    
    document.getElementById("navbar").style.background = "#000";
  } else {
   
    document.getElementById("navbar").style.background = "none";
  }
}
</script>
</body>
</html>