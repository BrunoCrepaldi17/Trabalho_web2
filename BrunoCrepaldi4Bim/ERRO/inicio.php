  <?php require_once('menu.php')?>

<!DOCTYPE html>
<html lang="pt">
      <h2> seja bem vindo, <?php echo $_SESSION['nome'] ;?></h2>
    <script>
	function destroySession() {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "destroy_session.php", true);
		xmlhttp.send();
	}
	</script>
    </div>
</div>
</body>
</html>