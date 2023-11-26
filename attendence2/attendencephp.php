<?php
$sn="localhost";
$un="system";
$p="system";
$db="myDB1";

$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

//define variables
$name=$regno=$pa=$stu=$year=$branch="";
//$name=$_POST['sname'];
//$regno=array($_POST['list']);
//foreach($regno as $regno){
//echo $regno;
//}

$sq="SHOW TABLES FROM $db";
$rr=mysqli_query($conn,$sq);

echo "<select onchange='func()' id='insert' >";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0]>$table[0]</option>");
}

echo "</select>";

if (array_key_exists('final',$_POST)){
    finall();
}


function finall(){
    $sn="localhost";
$un="system";
$p="system";
$db="myDB1";
echo 'hello world';
$conn=mysqli_connect($sn,$un,$p,$db);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
$s=" DELETE FROM todayabs";
$rs=mysqli_query($conn,$s);
$table=$_POST['table'];
echo $table;
$needs=mysqli_query($conn,"SELECT id FROM $table");
while($ta=mysqli_fetch_array($needs)){
    $reg=$ta[0];
    //echo $regn;
$pa=$_POST[$reg];
//echo $pa;
$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT studentname,phone_num FROM $table WHERE id='$reg'"));
if($needs){
$sname=$needs['studentname'];
$phno=$needs['phone_num'];
if ($pa=="0"){
$sq="INSERT INTO todayabs  values ('$reg','$sname','$phno')";
$ss="INSERT INTO totalabs  values ('$reg','$sname','$phno')";
$rss=mysqli_query($conn,$ss);
//insert in database
$rs=mysqli_query($conn,$sq);
}

//echo $reg,"<p>Variable x inside function is: $i</p>";
}
}
if($rs&&$rss){
    echo "Attendence record inserted";
 }
}
//else{
//    echo "error:".$sq."<br>".mysqli_error($conn);
//}
//}
//else{
//    $i=0;
//    $sq="INSERT INTO about5  values 
//    ('$regno','$name','$pa')";
//    //insert in database
//    $rs=mysqli_query($conn,$sq);
//    if(mysqli_query($conn,$sq)){
//        echo "details record inserted";
//        $i=$i+1;
//    }
//    else{
//        echo "error:".$sq."<br>".mysqli_error($conn);
//    }
//}
//echo $name;
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
$table=$_POST['table'];
    $needs=mysqli_query($conn,"SELECT id FROM $table");
    echo "<thead>Attendence sheet</thead><tr><th>regno</th><th>present</th><th>absent</th></tr>";
while($ta=mysqli_fetch_array($needs)){
 echo ("<tr><td><input type='text' value=$ta[0] oninput='msg()' name='reg'/></td><td><input type='radio' name=$ta[0] value='1'class='present'/></td><td><input type='radio' name=$ta[0] value='0' class='present'/></td></tr>");
}


//  $name=$year.$branch;
//  echo $name;
//$s="DROP TABLE $name";
//$rs=mysqli_query($conn,$s);
//if($rs){
//    echo "selected batch file successfully deleted...";
// }
   //$needs=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM $name WHERE id=$id"));
}

mysqli_close($conn);
?>

<html>
    <script>
        function func(){
            ele=document.getElementById('insert')
        val=ele.value
        document.getElementById('table').value=val
        }
    </script>
    <body style="display:'None'">
    <form method="post" action="http://localhost/attendence2/attendencephp1.php">
        <table id="stable">
        <label for='table'>'table name:'</label>
        <input type='text' value=''name='table' id='table'/>
          
        <input type="submit" value="get attendence" name='atten' value='atten' >
    </table>
        </form>
</body>
</html>
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
                font-size: larger;
            }
    </style>
<?php
echo $table;