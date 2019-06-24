
<!--Section: Chart-->
<section>

    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-xl-5 col-lg-12 mr-0">

            <!--Card image-->
            <div class="view gradient-card-header light-blue lighten-1">
                <h2 class="h2-responsive mb-0">Sales</h2>
            </div>
            <!--/Card image-->

            <!--Card content-->
            <div class="card-body pb-0">

                <!--Panel data-->
                <div class="row card-body pt-3">

                    <!--First column-->
                    <div class="col-md-6">

                        <!--Date select-->
                        <p class="lead"><span class="badge info-color p-2">Data range</span></p>
                        <select class="mdb-select colorful-select dropdown-info">
                        <option value="" disabled selected>Choose time period</option>
                        <option value="1">Today</option>
                        <option value="2">Yesterday</option>
                        <option value="3">Last 7 days</option>
                        <option value="3">Last 30 days</option>
                        <option value="3">Last week</option>
                        <option value="3">Last month</option>
                    </select>

                        <!--Date pickers-->
                        <p class="lead mt-5"><span class="badge info-color p-2">Custom date</span></p>
                        <br>
                        <div class="md-form">
                            <input placeholder="Selected date" type="text" id="from" class="form-control datepicker">
                            <label for="date-picker-example">From</label>
                        </div>
                        <div class="md-form">
                            <input placeholder="Selected date" type="text" id="to" class="form-control datepicker">
                            <label for="date-picker-example">To</label>
                        </div>

                    </div>
                    <!--/First column-->

                    <!--Second column-->
                    <div class="col-md-6 text-center">

                        <!--Summary-->
                        <p>Total sales: <strong>2000$</strong>
                            <button type="button" class="btn btn-info btn-sm p-2" data-toggle="tooltip" data-placement="top" title="Total sales in the given period"><i class="fa fa-question"></i></button>
                        </p>
                        <p>Average sales: <strong>100$</strong>
                            <button type="button" class="btn btn-info btn-sm p-2" data-toggle="tooltip" data-placement="top" title="Average daily sales in the given period"><i class="fa fa-question"></i></button>
                        </p>

                        <!--Change chart-->
                        <span class="min-chart my-4" id="chart-sales" data-percent="76"><span class="percent"></span></span>
                        <h5>
                            <span class="badge red accent-2 p-2">Change <i class="fa fa-arrow-circle-up ml-1"></i></span>
                            <button type="button" class="btn btn-info btn-sm p-2" data-toggle="tooltip" data-placement="top" title="Percentage change compared to the same period in the past"><i class="fa fa-question"></i>
                        </button>
                        </h5>
                    </div>
                    <!--/Second column-->

                </div>
                <!--/Panel data-->

            </div>
            <!--/.Card content-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-xl-7 col-lg-12 mb-4">

            <!--Card image-->
            <div class="view gradient-card-header blue-gradient">

                <!-- Chart -->
                <canvas id="lineChart" height="175"></canvas>

            </div>
            <!--/Card image-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>
<!--Section: Chart-->