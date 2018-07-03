<div class="topnav">
    <a href="index.php?page=home"><i class="fas fa-home"></i> HOME</a>
    <a href="index.php?page=news"><i class="far fa-newspaper"></i> NEWS</a>
    <a href="index.php?page=contact"><i class="fas fa-envelope"></i> CONTACT</a>
    <a class="login" href="index.php?page=login"><i class="fas fa-user"></i> LOGIN</a>
</div>

<h1>{$title}</h1>

<form method="get" action="index.php">
    <input type="hidden" name="page" value="news">
    <input name="searchterm">
    <input class="zoekbtn" type="submit" name="submit" value="ZOEK">

</form>