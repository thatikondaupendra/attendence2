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

echo "<select onchange='fun()' id='insert'>";
while($table=mysqli_fetch_array($rr)){
 echo ("<option name=$table[0] value=$table[0] >$table[0]</option>");
$s=$table[0];
}

echo "</select>";
//echo "<select onchange='fun()'><option>hello</option><option>hello2</option></select>";

?>

<html>
    <script>
        function fun(){
            ele=document.getElementById('insert')
        val=ele.value
        document.getElementById('table').value=val
        }
    </script>
    <body style="display:'None'">
    <form  method='post' action='http://localhost/attendence2/show.php'>
        <table id="stable">
        <label for='table'>'table name:'</label>
        <input type='text' value='select'name='tabl' id='table'/>
        <input type='submit' name='table' value='tableclick me'/>
    </form>
    
</body>
</html>
<form  method='post' action='http://localhost/attendence2/show.php'>
        <table border='1' style='border-collapse:collapse;'>
        <?php
      if (array_key_exists('table',$_POST)){
        creating();
    }
    function creating(){
        $sn="localhost";
    $un="system";
    $p="system";
    $db="myDB1";
        $conn=mysqli_connect($sn,$un,$p,$db);
    if(!$conn){
        die("connection failed:".mysqli_connect_error());
    }
    $tab=$_POST['tabl'];   
    //$ll=array(); 
    $needs=mysqli_query($conn,"SELECT * FROM $tab");
    echo "<thead>student details</thead><tr><th>register number</th><th>name</th><th>Phone number</th></tr>";
while($ta=mysqli_fetch_array($needs)){
    $id=$ta['id'];
    $name=$ta['studentname'];
    $phno=$ta['phone_num'];
    //array_push($ll,array($id,$name,$phno));
    ?>
<tr>
    <td>
        <?php echo $id;?>
</td>
<td>
        <?php echo $name;?>
</td>
<td>
        <?php echo $phno;?>
</td>
</tr>
<?php
 
}
?>
<?php
//echo sizeof($ll);
 //echo ("<tr><td><input type='text' value=$id oninput='msg()' name='reg'/></td><td><input type='text' value=$name  name='reg'/></td><td><input type='text' value=$phno name='reg'/></td></tr>");
    }
?>
</table>
</form>