<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>

<style>
    .carousel-img{
        height: 656px;
        filter: brightness(0.4);
        }

    .caption{
        margin-top: 250px;
    }
</style>

<body>
    <?php include('config/navbar.php')?>
    <section id="home">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/carousel-item1.jpg" class="d-block w-100 carousel-img" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/carousel-item2.jpg" class="d-block w-100 carousel-img" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/carousel-item3.jpg" class="d-block w-100 carousel-img" alt="...">
    </div>
  </div>
  <div class="carousel-caption top-0 caption">
        <h1>Welcome to PERPUSANS</h1>
        <p>Where you can read books just by clicking <button type="button" class="btn btn-primary">Download</button></p>
      </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </section>

    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/assets/fontawesome/js/all.min.js"></script>
</body>
</html>