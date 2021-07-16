<!doctype html>
<html lang="en">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>ATCS</title>
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--====== Font Awesome ======-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--====== Google Font ======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="preload">
        <div class="preload-icon"></div>
    </div>
    <header class="topbar">
        <div class="topbar-logo">
            <img src="assets/images/logo.png">
        </div>
        <div class="topbar-collapse">
            <div class="topbar-collapse-btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
    <sidebar class="navbar">
        <ul class="navbar-menu">
            <li class="navbar-item active">
                <a href="#" onclick="boot()">
                    <i class="fa fa-power-off"></i>
                    <span class="boot-label">Boot System</span>
                </a>
            </li>
            <li class="navbar-item active">
                <a href="#" onclick="dequeue()">
                    <i class="fa fa-plane-departure"></i>
                    Dequeue
                </a>
            </li>
            <li class="navbar-item active">
                <a href="#" onclick="newAircraft()">
                    <i class="fa fa-plane"></i>
                    New Aircraft
                </a>
            </li>
        </ul>
    </sidebar>
    <main class="wrapper">

        <div class="wrapper-container">
        	<h3>Enqueued Aircrafts</h3>
            <div id="queue-list" class="row mt-4"></div>
        </div>
        <div class="wrapper-container mt-4">
        	<h3>Dequeued Aircrafts</h3>
            <div id="aircraft-list" class="row mt-4"></div>
        </div>
    </main>
    <div id="aircraft-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="aircraft-detail">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5>Aircraft Data</h5>
                    <ul class="aircraft-profile">
                        <li>
                            <input type="text" class="form-control px-0 mb-2" name="name" placeholder="Name*" value="">
                        </li>
                        <li>
                        	<select class="form-control px-0 mb-2" name="type">
                        		<option value="">Type</option>
                        		<option value="Emergency">Emergency</option>
                        		<option value="VIP">VIP</option>
                        		<option value="Passenger">Passenger</option>
                        		<option value="Cargo">Cargo</option>
                        	</select>
                        </li>
                        <li class="mb-1">
                        	<select class="form-control px-0 mb-2" name="size">
                        		<option value="">Size</option>
                        		<option value="Small">Small</option>
                        		<option value="Large">Large</option>
                        	</select>
                        </li>
                    </ul>

                    <div class="aircraft-footer mt-3 text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" onclick="deleteAircraft()">Delete</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--====== jquery js ======-->
    <script src="assets/js/jquery.min.js"></script>
    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sweetalert2.js"></script>
    <script src="assets/js/services/aircraft.js"></script>
    <script src="assets/js/services/queue.js"></script>
    <script src="assets/js/services/system.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>