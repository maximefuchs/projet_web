<ul id="menu">
  <a onclick="animation('inscription')"><li>Incription</li></a>
  <a onclick="animation('connexion')"><li>Connexion</li></a>
  <!-- href="index.php?action=inscription"
   href="index.php?action=connexion"-->
</ul>
<script type="text/javascript">
	function animation(action){
		document.getElementById("content").setAttribute('style', 'animation-name: goToRight; animation-duration: 0.5s;');
		setTimeout(function(){
			window.location = "index.php?action="+action;
		}, 300);
	}
</script>
