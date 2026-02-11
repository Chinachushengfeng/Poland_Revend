 
 
  <meta charset="UTF-8">
    <title>Black Background</title>
    <style>
 body{
	 margin:0px;
	 
 }
    </style>
 
 
 <?php 
 
 
 include('IncDB.php');
 
 $sql="select * from machineinformation ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);
 $ad0orpic1=$result['ad0orpic1'];
 
 if ($ad0orpic1=="0")
 
 
 {
 echo '  <iframe  src="advideo/index.php"  width=100% height="610"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" > </iframe> 
   ';
 }

else
{
	 echo '  <iframe  src="upadpic/index.php"  width=100% height="630"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" > </iframe> 
   ';
	
}	
   
   
 ?>
      
 
      
  
      <iframe  src="tjt/index.php"  width=100% height="640"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" > </iframe> 
      
       
   <iframe  src="downadpic/index.php"  width=100% height="630"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes" > </iframe> 
        
         
 
      
      
      
	  
	  
	  
	  
	  
	  
	   



	
     



 
    
    
   
    
    
    
    
    
