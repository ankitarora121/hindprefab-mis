
<body>
<img src="cover.gif" width="100%">
<h1>
WELCOME TO USER VIEWING MODE
</H1>
<?php

setcookie("ID_my_site", "Alex Porter", time()+120);

echo "<center>";
echo "<a href=viewall.php> <ul> <li> VIEW ALL PROJECTS </LI> </A>";
echo "<a href=viewID.php> <LI> VIEW BY PROJECT ID </LI> </A>";
echo "<a href=viewro.php> <li> VIEW BY REGIONAL OFFICE </LI> </UL> </A>";

?>

<html>

</body>
</html>
