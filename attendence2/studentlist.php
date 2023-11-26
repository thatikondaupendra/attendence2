<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$sq="SHOW TABLES FROM $db";
$rr=mysqli_query($conn,$sq);

echo "<select onchange='func()' id='insert' >";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0]>$table[0]</option>");
}

echo "</select>";


if (array_key_exists('insert',$_POST)){
    insert();
}


function insert(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//define variables
$sname=$id=$phno=$table="";

$table=$_POST['table'];
$sname=$_POST['sname'];
$id=$_POST['id'];
$phno=$_POST['phno'];

$sq="INSERT INTO $table  values 
('$id','$sname','$phno')";
//insert in database
$rs=mysqli_query($conn,$sq);
if($rs){
    echo "details record inserted";
}
else{
    echo "error:".$sq."<br>".mysqli_error($conn);
}
echo "<h3>$sname</h3>";
mysqli_close($conn);
}
//$rrr=mysqli_fetch_all($rr);
//for ($i=0;$i<count($rrr);$i++){
//    echo $r[$i];
//}
////////$r=mysqli_fetch_all($rr);
////////echo count($r);
////////for ($i=0;$i<count($r);$i++){
////////    echo $i;
////////    echo $r[$i];
////////}
////////$n=$r[0];
////////echo $n;
////////foreach($r as $f){
////////    echo $r[0];
////////}
//while($n){
//    echo($r[0]." ");
//    $n-1;
//}
//for($i=0;$i<$n;$i++){
//    echo $i;
//    echo $r[$i];
//}
////define variables
//$sname=$id=$phno="";
//
//$sname=$_POST['sname'];
//$id=$_POST['id'];
//$phno=$_POST['phno'];
//
//$sq="INSERT INTO studentdetails  values 
//('$id','$sname','$phno')";
////insert in database
//$rs=mysqli_query($conn,$sq);
//if($rs){
//    echo "details record inserted";
//}
//else{
//    echo "error:".$sq."<br>".mysqli_error($conn);
//}
//echo "<h3>"+$sname+"</h3>";
//mysqli_close($conn);
?>
<html>
    <script>
        function func(){
            ele=document.getElementById('insert')
        val=ele.value
        document.getElementById('table').value=val
        }
    </script>
    <body>
    <form method="post" action="http://localhost/attendence2/studentlist.php">
        <label for='table'>'table name:'</label>
        <input type='text' value=''name='table' id='table'/>
            <label for="id">Enter Student ID:</label>
            <input type="text" name="id"/>
            <br>
            <label for="sname">Enter Student Name:</label>
            <input type="text" name="sname"/>
            <br>
            <label for="phno">Enter parent phone number:</label>
            <input type="text" name="phno"/>
            <br>
            <input type="submit" value="submit" name='insert' >
        </form>

</body>
</html>