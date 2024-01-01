<?php
 
if(isset($_POST["addnote"]))
{      
   $title=$_POST["title"];
   $desc=$_POST["desc"];
   $today=date("Y/m/d");
   
    $inquery="insert into userdata values('','$title','$desc','$today')";
    $cn=mysqli_connect("localhost","root","","note-app") or die("Server not connected");
    $rec= mysqli_query($cn,$inquery) or die("Record not saved");  
   
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>note app using html ,css ,js php and mysql</title>
    <link href="style.css" rel="stylesheet"></link>
</head>
<body>
    <h1>NOTE-APP</h1>
    <div class="con">
        <div class="noteinput">
             <form name="note" action="" method="post">
                <table  align="center">
                <tr>
                    <th>Title:</th>
                    <td>
                       <input type="text" name="title" placeholder="Enter Title Here" id="title"  maxlength="100" required> 
                    </td>
               </tr>
               <tr> <th>Description:</th>
                <td>
                    <textarea name="desc" rows="50" cols="10" placeholder="enter description  here......" maxlength="300"  required></textarea>    </td>
              </tr>
              <tr><th></th><td ><input type="submit" name="addnote" id="addnote" value="Add Note"></td></tr>
                </table>
             </form>
        </div>
        <div class="showdata" >
            <table >
                <tr>
             <td >
                  Show<select >
                <option value="10"  >10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="70">70</option>
                <option value="100">100</option>
                   <a href="index.php?option=value"></a>  <select>
            </td>
            <td>entries</td>
            <td colspan="6"></td>
           
            <td id="search" colspan="3" align="end">Search:<input type="text"></td>
            </tr>
            
            <tr >
                <th>S.No</th>
                <th colspan="4">Title</th>
                <th colspan="4">Description</th>
                <th colspan="2">Action</th>
            </tr>
            <hr/>
            <?php
            
            $Squery="select * from userdata order by sno desc limit 5";
            $cn=mysqli_connect("localhost","root","","note-app") or die("Server not connected");
             $rec= mysqli_query($cn,$Squery) or die("Record not grt"); 
              $i=1; 
             while($row=mysqli_fetch_array($rec))
{  
	echo("<tr ><th>$i</th>");
	echo("<td colspan='4'>".$row["title"]."</td>");
	echo("<td colspan='4'>".$row["desc"]."</td>");
    $x=$row['sno'];
	echo("<td>
    <form action='index.php' method='post'>
    <input type='submit' value='Delete'id='deletebtn' name='delete'>
    </form></td>");

	$i++;
}             ?>
          <hr/> </table>
        </div>
        
    </div>
    
    <script src="script.js"></script>
</body>
</html>

<!-- /////============================delete/ -->
<?php
if(isset($_POST['delete']))
{
  //  $x=$row['sno'];


$query="delete from userdata where sno='$x'";

$cn=mysqli_connect("localhost","root","","note-app")or die ("not canennect to server");
$result=mysqli_query($cn,$query)or die("not delete ");
if($result==1)
{
    echo("seccesfull detele");
  header("Refresh:0");
}
else
{
    echo("error::") ;
}
}
?>

