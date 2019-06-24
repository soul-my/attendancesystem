@section("styles")
  <style type="text/css">
      /* Necessary for full page carousel*/
      html,
      body,
      .view {
        height: 100%;
      }

      /* Carousel*/
      .carousel,
      .carousel-item,
      .carousel-item.active {
        height: 100%;
      }
      .carousel-inner {
        height: 100%;
      }
      .carousel .carousel-item video {
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
    </style>

@append

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">
            <!--Mask-->
            <div class="view">
              <!--Video source-->
              <video autoplay loop playsinline>
                  <source src="{{asset('assets/video/Ultra_Sunset.mp4')}}" type="video/mp4" />
              </video>
              <!-- Carousel content -->
              <div class="full-bg-img flex-center mask rgba-indigo-light white-text">

                <div class="white-text text-center wow fadeInUp">
                  <h3 class="display-3 font-weight-bold">SyzygySys Pltd</h3>
                  <h5 class="mb-5">Startup based in Kuala Lumpur</h5>
                  <a class="btn btn-outline-white btn-rounded wow fadeInUp" data-wow-delay="0.2s" href="#about" data-offset="100"> <span>EXPLORE MORE</span> </a>
                </div>


                {{-- <ul class="animated fadeInUp col-md-12 list-unstyled list-inline">
                  <li>
                    <h1 class="font-weight-bold ">CreativeSys Pltd.</h1>
                  </li>
                  <li>
                    <p class="font-weight-bold py-4">- Est. since 2012 -</p>
                  </li>
                  <li class="list-inline-item">
                    <a class="btn btn-outline-white btn-rounded wow fadeInUp waves-effect waves-light" data-wow-delay="0.2s" href="#about" data-offset="100" style="visibility: visible; animation-name: fadeInUp; animation-delay: 0.2s;"> <span>Explore More!</span> </a>
                  </li>
                </ul> --}}
              </div>
            </div>
            <!--/Mask-->
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <!--Video source-->
                <video autoplay loop playsinline>
                    <source src="{{asset('assets/video/Pesach.mp4')}}" type="video/mp4" />
                </video>
                <!-- Carousel content -->
                <div class="full-bg-img flex-center mask rgba-purple-light white-text">
                  <ul class="animated fadeInDown col-md-12 list-unstyled">
                    <li>
                      <h1 class="font-weight-bold text-uppercase">Who we are ?</h1>
                    </li>
                    <li>
                      <p class="font-weight-bold py-4">New startup specialize in website creation</p>
                    </li>
                    <li>
                      <a target="_blank" href="" class="btn btn-pink btn-rounded btn-lg">Contact Us!</a>
                    </li>
                  </ul>
                </div>
            </div>
            <!--/Mask color-->
        </div>
        <!--/Second slide-->

        <!--Third slide-->
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <!--Video source-->
                <video autoplay loop playsinline>
                    <source src="{{asset('assets/video/Cloud_Surf.mp4')}}" type="video/mp4" />
                </video>
                <!-- Carousel content -->
                <div class="full-bg-img flex-center mask rgba-blue-light white-text">
                  <ul class="animated fadeInRight col-md-12 list-unstyled">
                    <li>
                      <h1 class="font-weight-bold text-uppercase">Our Mission</h1></li>
                    <li>
                      <p class="font-weight-bold py-4">Build the best product, use business to inspire and bring joys to clients and employees</p>
                    </li>
                    <li>
                      <a target="_blank" href="" class="btn btn-lg btn-indigo btn-rounded">Our work culture</a>
                    </li>
                  </ul>
                </div>
            </div>
            <!--/Mask color-->
        </div>
        <!--/Third slide-->
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
