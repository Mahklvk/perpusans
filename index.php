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
        height: 650px;
        filter: brightness(0.4);
        }

    .caption{
        margin-top: 250px;
    }

    #about {
            background-color: #1a1a1a;
        }

        #about h2, #faq h2 {
            color: #0d6efd;
        }

        #faq {
            background-color: #111;
            color: #fff;
        }

        .accordion-button {
            background-color: #0d6efd;
            color: #fff;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: #0b5ed7;
        }

        .accordion-body {
            background-color: #222;
        }

        @media (max-width: 768px) {
            #about img {
                margin-top: 20px;
            }
        }
</style>

<body>
    <?php include('config/navbar.php')?>
    <main>
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
        <button type="button"class="btn btn-primary col-12">Books</button>
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
    <section id="about" class="bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h2 class="text-primary">About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    <p>Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero.</p>
                </div>
                <div class="col-md-6">
                    <img src="assets/images/about-image.jpg" alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-5">
        <div class="container">
            <h2 class="text-primary text-center mb-5">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                            What is PERPUSANS?
                        </button>
                    </h2>
                    <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                            How do I download books?
                        </button>
                    </h2>
                    <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-white">
                            Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                            Is it free to use?
                        </button>
                    </h2>
                    <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-white">
                            Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>

    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/assets/fontawesome/js/all.min.js"></script>
</body>
</html>