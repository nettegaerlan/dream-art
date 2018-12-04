<?php
  $carouselItems = [
    [
      "img-name" => "carousel-1",
      "name" => "Super Mario Party",
      "description" => "..."
    ],
    [
      "img-name" => "carousel-2",
      "name" => "Diablo 3",
      "description" => "..."
    ],
    [
      "img-name" => "carousel-3",
      "name" => "Super Smash Bros. Ultimate",
      "description" => "..."
    ]
  ];
?>

<div id="echoGamesCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#echoGamesCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#echoGamesCarousel" data-slide-to="1"></li>
    <li data-target="#echoGamesCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <?php for($i = 0; $i < count($carouselItems); $i++): ?>
      <div class="carousel-item <?php if($i == 0) { echo "active"; } ?> <?php echo $carouselItems[$i]["img-name"] ?>">
        <img class="d-block w-80 mx-auto" src="../assets/images/<?php echo $carouselItems[$i]["img-name"] ?>.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $carouselItems[$i]["name"] ?></h5>
          <p><?php echo $carouselItems[$i]["description"] ?></p>
        </div>
      </div>
    <?php endfor; ?>
  </div>
  <a class="carousel-control-prev" href="#echoGamesCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#echoGamesCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>