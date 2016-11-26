<?
if ($categories["errStatus"]) {
	echo "<br> ".$categories["errText"];
} else {
	// var_dump($categories["data"])
?> 
<link rel="stylesheet" href="/web/static/css/all_A.css" type="text/css" media="screen"/>
<ul id="accordion" class="accordion">
	<?foreach ($categories["data"] as $catkey => $catvalue) {?>
		<?if (is_null($catvalue["parentid"])) {?>
			<li>
			<div class="link">
			<?
			$fistSubMenuFlag=true;
			$isHasSubMenu=false;
			foreach ($categories["data"] as $subcatkey => $subcatvalue) {
				if ($subcatvalue["parentid"]==$catvalue["id"]) {
					$isHasSubMenu=true;
					if ($fistSubMenuFlag) {?>
							<a href=<?echo "\"".$catvalue["name"]."\"";?> class="left_menu_a_href">
								<i class=<? echo "\"fa fa-".$catvalue["logo"]."\"";?>></i><?echo $catvalue["title"];?>
							</a>	
							<i class="fa fa-chevron-down"></i>
							
							<ul class="submenu">
							<?$fistSubMenuFlag=false;
					}?>
					<li>						
						 <i class=<? echo "\"fa fa-".$subcatvalue["logo"]."\"";?>></i>
						 <a href=<?echo "\"".$subcatvalue["name"]."\"";?>>
						 	<?echo $subcatvalue["title"];?>						 	
						 </a>						  
					</li>
				<?}
			}
			if ($isHasSubMenu) {
				echo "</ul>";
			} else {?>
				<a href=<?echo "\"".$catvalue["name"]."\"";?> class="left_menu_a_href">
					<i class=<? echo "\"fa fa-".$catvalue["logo"]."\"";?>></i><?echo $catvalue["title"];?></i>
				</a>
			<?}?>

			</div>
			</li>
		<?}?>			

	<?}?>
</ul>
<?}?>

<?require_once 'web/temp/menu.php';?>

<ul id="accordion" class="accordion">
	<?for ($i=0; $i <=count($menu)-1 ; $i++) {?>
		<li>

			<div class="link">
				<!--i class="fa fa-chevron-down"></i></div-->
				<?if ((isset($menu[$i]["sub_menu"])) && (count($menu[$i]["sub_menu"])>0)){// если есть подменюшки ?>
					<i class=<? echo "\"fa fa-".$menu[$i]["logo"]."\"";?>></i><?echo $menu[$i]["ru_name"];?>
					<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu">
						<?for ($j=0; $j <=count($menu[$i]["sub_menu"])-1 ; $j++) {?>						
							<li>
								<i class=<? echo "\"fa fa-".$menu[$i]["sub_menu"][$j]["logo"]."\"";?>></i> 
						 		<a href=<?echo "\"".$menu[$i]["sub_menu"][$j]["url"]."\"";?>>
						 			<?echo $menu[$i]["sub_menu"][$j]["ru_name"];?>
						 		</a>
						 	</li>
						<?}?>
					</ul>
				<?} else {?>
				<a href=<?echo "\"".$menu[$i]["url"]."\"";?> class="left_menu_a_href">
					<i class=<? echo "\"fa fa-".$menu[$i]["logo"]."\"";?>></i><?echo $menu[$i]["ru_name"];?>
				</a>
				</i></div>
				<?}?>
		</li>
	<?}?>
</ul>

<script>
	$(function() {
		var Accordion = function(el, multiple) {
			this.el = el || {};
			this.multiple = multiple || false;

			var links = this.el.find('.link');
			links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
		}

		Accordion.prototype.dropdown = function(e) {
			var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

			$next.slideToggle();
			$this.parent().toggleClass('open');

			if (!e.data.multiple) {
				$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
			};
		}

		var accordion = new Accordion($('#accordion'), false);
	});
</script>