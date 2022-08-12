<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/css/bootsrap.css">
    <script src="https://kit.fontawesome.com/e2352fc16a.js" crossorigin="anonymous"></script>
    <title>Ipochan - Tempat Mengadukan Konten Illega!</title>
</head>

<body class="text-montserrat">
    @include('partial.header')
    <div class="wrapper" style="margin-bottom: -50px;">
        <div class="container-fluid">
            <div class="row justify-content-center" style="margin-top:-30px;padding-top:auto;">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12" id="sess-result">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="carouselExampleCaptions" class="carousel slide mb-0" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active"><a href="/public/images/ipochan.jpg" class="image-popup">
                                            <img class="d-block img-fluid" src="/images/ipochan.jpg" style="border-radius:4px 4px 0px 0px;"></a></div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="category-container mt-3">
                        @yield('container')
                    </div>


                </div>
            </div>
            @include('partial.footer')

        </div>
    </div>

    <!-- App js-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>