 <?php  

if(isset($_GET["sarah"])){
	
	$query = $_GET["sarah"];
	
	
	if(strpos($query,"Toyota") !== false){
		
		echo "we have many type of toyota<br> please choose one below";
		echo "<hr>";
		echo "Camry<br>";
		echo "Corola<br>";
		echo "Venza<br>";
		echo "Datsun<hr>";
		echo "and many more<br>";
		
		
	}







}else{
	print("You are not allow.");
}

 ?>