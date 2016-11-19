<header>

  <a href="http://" title="PROpolski" rel="home">
   <img src="/web/static/img/logo_n.png" alt="PROpolski">
 </a>

 <!--div id="header-text" -->
 <table>
   <tr>
     <td>
      <div id="pol_h">
        <h2 >PROpolski
          <!-- <a href="http://" title="PROpolski" rel="home">PROpolski</a> -->
        </h2> 
      </div>

      <p id="site-description">Блог о польском языке и Польше</p>
    </td>
    <td>
   
      <?
        if ($_SESSION["auth"]==true && isset($_COOKIE['login'])){
        echo "<a  href=\"profile.".$config["prefix"]."\">Вы вошли как ".$_COOKIE['login']."</a>";
      } else {
        echo "<a  href=\"login.".$config["prefix"]."\">Вход\Регистрация</a>";
      }
      ?>

    </td>
  </tr>
</table>


<!-- </div> -->


<!-- Карусель -->
<div id="myCarousel" class="carousel slide" data-interval="6000" data-ride="carousel">
  <!-- Индикаторы для карусели -->
  <ol class="carousel-indicators">
    <!-- Перейти к 0 слайду карусели с помощью соответствующего индекса data-slide-to="0" -->
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <!-- Перейти к 1 слайду карусели с помощью соответствующего индекса data-slide-to="1" -->
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <!-- Перейти к 2 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <!-- Перейти к 3 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>   
  <!-- Слайды карусели -->
  <div class="carousel-inner">
    <!-- Слайды создаются с помощью контейнера с классом item, внутри которого помещается содержимое слайда -->
    <div class="active item">
      <img src="/web/static/img/slider/11.jpg" alt="...">
      <!--h2>Слайд №1</h2-->
      <div class="carousel-caption polski-carousel">
        <h3>Чтение на польском языке по методу Ильи Франка</h3>
        <p>Гарри Поттер и философский камень</p>
      </div>
    </div>
    <!-- Слайд №2 -->
    <div class="item">
    	<img src="/web/static/img/slider/12.jpg" alt="...">
      <h2>Slide 2</h2>
      <div class="carousel-caption polski-carousel">
        <h3>Волшебный замок Мальборк</h3>
        <p>Один день в Средневековье</p>
      </div>
    </div>
    <!-- Слайд №3 Топ-1000 слов: польский язык -->
    <div class="item">
      <img src="/web/static/img/slider/13.jpg" alt="...">
      <h2>Slide 3</h2>
      <div class="carousel-caption polski-carousel">
        <h3>Вроцлавский зоопарк</h3>
        <p>И пусть Вас тоже укусит верблюд!</p>
      </div>
    </div>
    <!-- Слайд №4  -->
    <div class="item">
      <img src="/web/static/img/slider/14.jpg" alt="...">
      <h2>Slide 3</h2>
      <div class="carousel-caption polski-carousel">
        <h3>Топ-1000 слов: польский язык</h3>
        <p>Самые популярные слова польского языка</p>
      </div>
    </div>
  </div>
  <!-- Навигация для карусели -->
  <!-- Кнопка, осуществляющая переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <!-- Кнопка, осуществляющая переход на следующий слайд с помощью атрибута data-slide="next" -->
  <a class="carousel-control right" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>


</header>