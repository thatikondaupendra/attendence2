function uploads(){
    document.write("<form method='post' action='http://localhost/attendence2/studentdata.php'><label for='yearr'>Enter year:</label><input type='text' name='yearr'/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch'/><input type='submit' name='upload' value='upload'></form>")
    alert("working")
}
function deleting(){
    document.write("<form method='post' action='http://localhost/attendence2/studentdata.php'><label for='yearr'>Enter year:</label><input type='text' name='yearr'/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch'/><input type='submit' name='delete' value='delete'></form>")
    
}
function deleterec(){
    document.write("<form method='post' action='http://localhost/attendence2/studentdata.php'><label for='yearr'>Enter year:</label><input type='text' name='yearr'/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch'/><input type='submit' name='drops' value='delete'></form>")
    
}

function modifys(){
    alert("working..")
    document.write("<label for='change'>choose which you want to change:</label><button onclick='newname()' >Name</button><button onclick='newphno()'>Phone number</button>")
}
function newname(){
    document.write("<form method='post' action='http://localhost/attendence2/studentdata.php'><label for='name'>Enter new name:</label><input type=text name='name'/><label for='yearr'>Enter year:</label><input type='text' name='yearr'/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch'/><label for='id'>enter regno:</label><input type='text' value='' name='id' /><input type='submit' name='modify' value='modify'></form>");
}
function newphno(){
        document.write("<form method='post' action='http://localhost/attendence2/studentdata.php'><label for='phnoo'>Enter new number:</label><input type=text name='phnoo'/><label for='yearr'>Enter year:</label><input type='text' name='yearr'/><br><label for='branch'>Enter Branch:</label><input type='text' name='branch'/><label for='id'>enter regno:</label><input type='text' value='' name='id' /><input type='submit' name='modify1' value='modify1'></form>");
        
}

function shows(){
    alert("helo")
}