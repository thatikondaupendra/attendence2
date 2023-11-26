<?php
$table=$_POST['table'];



function finall(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
global $table;
$tablea=$table.'absenties';
$tableb=$table.'totalabsenties';
$s=" DELETE FROM $tablea";
$rs=mysqli_query($conn,$s);
$ta=$_POST['table'];

$needs=mysqli_query($conn,"SELECT id FROM $table");
$need=mysqli_query($conn,"SELECT id FROM $table");
while($ta=mysqli_fetch_array($need)){
    $reg=$ta[0];
   // echo $reg."<br>";
    //echo $regn;
$pa=$_POST[$ta[0]];
$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT studentname,phone_num FROM $table WHERE id='$reg'"));
if($needs){
$sname=$needs['studentname'];
$phno=$needs['phone_num'];
if ($pa=="0"){
$sq="INSERT INTO $tablea  values ('$reg','$sname','$phno')";
$ss="INSERT INTO $tableb  values ('$reg','$sname','$phno')";
//insert in database
$rs=mysqli_query($conn,$sq);
$rss=mysqli_query($conn,$ss);
}

//echo $reg,"<p>Variable x inside function is: $i</p>";
}
}
if($rs&$rss){
    echo "Attendence record inserted";
 }
}
?>
<html>
    <body>
    <form method="post" action="http://localhost/attendence2/attendencephp1.php">
        <input type='text' value=<?= $table?> name=table>
        <?php
        if (array_key_exists('atten',$_POST)){
    attendence();
}
function attendence(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
    $conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$year=$newphno=$namval=$id='';
global $table;
$p=1;
$a=0;
    $needs=mysqli_query($conn,"SELECT id FROM $table");
    echo "<form><table><thead>Attendence sheet</thead><tr><th>regno</th><th>present</th><th>absent</th></tr>";
while($ta=mysqli_fetch_array($needs)){
 echo ("<tr><td><input type='text' value=$ta[0] oninput='msg()' name='reg'/></td><td><input type='radio' name=$ta[0] value= $p class='present'/></td><td><input type='radio' name=$ta[0] value= $a class='present'/></td></tr>");
}
echo "</table> ";
echo "<input type='submit' value='post attendence' name='final' ></form>";
}

if (array_key_exists('final',$_POST)){
    finall();
}?>
    </form>
    <style>
            form{
                text-align: center;
                width:auto;
                height: auto;
                background-color: rgba(234, 15, 51, 0.141);
                box-shadow: 5px 10px 18px yellow;
                padding: 0;
                margin:20%;
                border-radius: 2%;
                border-width:20%;
                border-color: blue;
            }
            *{
                font-size: large;
            }
    </style>
</body>
</html>