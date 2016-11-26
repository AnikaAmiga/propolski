<?
if ($menu["errStatus"]) {
	echo "<br> ".$menu["errText"];
} else {
	// var_dump($menu["data"])
?> 
 <div class="hor_menu_container">
	<nav>
		<ul class="hor_menu_mcd-menu">
			<?for ($i=0; $i <=count($menu["data"])-1 ; $i++) {?>
			<li>
				<a <?
				// если урл менюшки такой же как текущий 
				if ("/".$menu["data"][$i]["url"]==$_SERVER['REQUEST_URI']){
					echo "class=\"active\"";// подсвечиваем его
				}
				?> href=<?echo "\"".$menu["data"][$i]["url"]."\"";?>>
					<i class=<? echo "\"fa fa-".$menu["data"][$i]["logo"]."\"";?>></i>
					<strong><?echo $menu["data"][$i]["ru_name"];?></strong>
					<small> <?echo $menu["data"][$i]["small_name"];?></small>
				</a>
				<?if ((isset($menu["data"][$i]["sub_menu"])) && (count($menu["data"][$i]["sub_menu"])>0)){// если есть подменюшки ?>
					<ul>
					<?for ($j=0; $j <=count($menu["data"][$i]["sub_menu"])-1 ; $j++) {?>
						<li>
							<a href=<?echo "\"".$menu["data"][$i]["sub_menu"][$j]["url"]."\"";?>>
							<i class=<? echo "\"fa fa-".$menu["data"][$i]["sub_menu"][$j]["logo"]."\"";?>></i>
							<?echo $menu["data"][$i]["sub_menu"][$j]["ru_name"];?>
							</a>	
						</li>

					<?}?>
					</ul>
				<?}?>
			</li>
			<?}?>
			<!--поисковик пока коментим. Его надо будет перенести-->
		
			<!--li >
				<a class="search">
					<input type="text" value="Поиск по сайту ...">
					<button><i class="fa fa-search"></i></button>
				</a>
				<a href="" class="search-mobile">
					<i class="fa fa-search"></i>
				</a>
			</li-->		
		</ul>
	</nav>
</div>

<?}?>