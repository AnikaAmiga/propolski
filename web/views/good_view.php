
<link rel="stylesheet" href="/web/static/css/goods.css" type="text/css" media="screen"/>

<h1>Toвaр</h1>

<?
$url_4_goods_img="/main_static/goods/";
$url_4_goods_settings_img="/main_static/goods_settings/";
$uri=$_SERVER['HTTP_HOST'];
$goods_value=$data;
var_dump($goods_value);
?>
  <form id="oneGood" action="/goods/good"  enctype="multipart/form-data" method="POST" class="form-horizontal">
<div class="all_goods">  
        <div class="block1">
        <? // стикер
                if (isset($goods_value["topSales"]) && $goods_value["topSales"]!=0) { 
                    $sticker_im=$url_4_goods_settings_img."topsellbig.png";?>
                    <div class="sticker_img">
                        <img  alt=<?echo "\"".$goods_value["sticker"][1]."\"";?> src=<?echo "\"".$sticker_im."\"";?>>
                    </div>
                <?
                }
                if (isset($goods_value["promo"])&& $goods_value["promo"]!=0)  { 
                    $sticker_im=$url_4_goods_settings_img."sale.png";?>
                    <div class="sticker_img">
                        <img  alt=<?echo "\"".$goods_value["sticker"][1]."\"";?> src=<?echo "\"".$sticker_im."\"";?>>
                    </div>
                <?}
        ?>
         
          <? // основная картинка
        if (isset($goods_value["imgGood"])) {?>
            <div class="good_img">
            <img  src=<?echo "\"".$url_4_goods_img.$goods_value["imgGood"]."\"";?> alt=<?echo "\"".$goods_value["name"]."\"";?>>
            </div>              
        <?}?>
        <p>
        <? // Название-ссылка
        if (isset($goods_value["name"]) ) {?>
            <a href=<?echo $goods_value["nameLink"];?> class="good_title"> <?echo $goods_value["name"]?></a>          
        <?}?>
         <? // Старая цена
        if (isset($goods_value["oldPrice"])) {?>
            <div class="g-oldprice" name="price">
                <div class="g-oldprice-uah">          
                    <strike><?echo $goods_value["oldPrice"]?></strike>
                    <span class="g-oldprice-uah-sign"> грн</span>
                </div>
            </div>            
        <?}?>
        <? // Новая цена
        if (isset($goods_value["price"])) {?>
                <div class="g-price" name="price">
                    <div class="g-price-uah">
                        <?echo $goods_value["price"]?>      
                        <span class="g-price-uah-sign"> грн</span>
                    </div>
                </div>          
        <?}?>
         <? // Кнопочка Купить?>
            <span class="btn-buy">
                <button  type="submit" class="submit" style="" name="button" value=<?echo $goods_value["idGood"];?>>Купить</button>
            </span>
            <br>
        <? // Рейтинг звездочками
          if (isset($goods_value["raiting"])) {?>
            <div class="rate_background">
                <div class="rate_bar" style=<?echo "\"width:".$goods_value["raiting"]."%;\"";?>   >            
                </div>
            </div>
                <?}?>
        <? // Цвета товара
            if (isset($goods_value["goodColors"]) && count($goods_value["goodColors"])>=1) {
            	
                foreach ($goods_value["goodColors"] as $key => $colors) {
                	//var_dump($colors["color"]) ;
                switch ($colors["color"]) {
                    case 'red': $col_img=$url_4_goods_settings_img."red.jpg";break;
                    case 'gold': $col_img=$url_4_goods_settings_img."gold.jpg";break;
                    case 'green': $col_img=$url_4_goods_settings_img."green.jpg";break;
                    case 'black': $col_img=$url_4_goods_settings_img."black.png";break;
                    case 'white': $col_img=$url_4_goods_settings_img."white.png";break;
                    case 'blue': $col_img=$url_4_goods_settings_img."blue.jpg";break;
        
                    default:
                    case 'white': $col_img=$url_4_goods_settings_img."white.jpg";break;
                    break;
                }?>
                <div class="col_img">
                <img  alt=<?echo "\"".$color[0]."\"";?> src=<?echo "\"".$col_img."\"";?> >
                </div>

             <?}
            }?>          
         <? // Описание товара?>
        <p><?echo $goods_value["description"]?></p> 


        </div>

</div>

<form>
