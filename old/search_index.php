<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<script type="text/javascript" src="assets/jquery.min.js"></script>
	<script type="text/javascript">
		function searchq(){
			var searchTxt = $("input[name='search']").val();
			$.post("search_employees.php", {searchVal: searchTxt}, function(output){
				$("#output").html(output);
			});
		}
	</script>
</head>
<body bgcolor="purple">
	<h3>Search Employee</h3>
    <form name="search-form" action="search_employees.php" method="post">
        <input type="text" name="search" size="15" maxlength="50" placeholder="Enter a name" onkeydown="searchq();" />
        <input type="submit" name="Submit" value="Search" />
    </form>

    <div id="output">
    	<div>
    	
    	</div>
    </div>
</body>
</html>




