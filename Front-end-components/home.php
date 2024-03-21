<?php
require_once 'dbh.inc.mbe280.php'; // Include your database connection file
require_once 'wheater-model.php'; // Include the file containing your getLatestSensorData function

// Get the latest sensor data using the function
$sensorDatabme280 = getLatestSensorData($conn); // Assuming $pdo is your PDO connection object
?>



<section class="vh-100 mb-5" style="background-image: url('img/finland_wheater_background_for\ \(4\).jpeg'); background-size: cover;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="container vh-100  d-flex justify-content-center align-items-center h-100">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="col-md-6">
                        <?php require_once 'Front-end-components/wheater-card.php'; ?>
                    </div>
                    <div class="col-md-6">
                        <?php require_once 'Front-end-components/wheater-card_dht11.php'; ?>
                    </div>
                    <div class="container text-white m-auto d-none d-sm-block">
                        <h1 class="display-3 text-primary fw-bold">Tervetuloa Sääasemaan</h1>
                        <p class="lead fs-3">Tällä sivulla näytetään sääasemalta kerättyjä tietoja. Sääasema mittaa erilaisia ilmakehän parametreja, kuten lämpötilaa, ilmankosteutta ja ilmanpainetta. Saadut tiedot päivittyvät automaattisesti ja ne näytetään alla olevassa osiossa. Voit tarkastella eri antureiden tietoja ja seurata sään kehittymistä reaaliajassa.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row gx-2 overflow-auto mt-5" >
                        <!-- BME280 Sensor Data Card -->
                        <div class="col m-1">
                            <div class="card bg-black-50 text-center h-100 ">
                                <div class="card-header bg-black h-100">
                                    <h5 class="mb-1 fw-bolder text-white"><span class="text-primary">OLOHUONE</span> BME280 Sensor Data</h5>
                                </div>
                                <div class="card-body shadow-5 h-100">
                                    <div class="p-4">
                                        <p class="mb-2">Current temperature: <strong class="text-success"><?= $sensorDatabme280['lampo'] ?>°C</strong></p>
                                        <p class="mb-0 text-success">Good weather here</p>
                                        <i class="fas fa-cloud fa-3x text-primary"></i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-dark bnt-sm btn-rounded" data-mdb-toggle="modal" data-mdb-target="#exampleModal" data-mdb-ripple-color="#ffffff">
                                        Data 
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- DHT11 Sensor Data Card -->
                        <div class="col m-1">
                            <div class="card bg-black-50 text-center h-100">
                                <div class="card-header bg-black h-100">
                                    <h5 class="mb-1 fw-bolder text-white"><span class="text-primary">MÖKKI</span> DHT11 Sensor Data</h5>
                                </div>
                                <div class="card-body shadow-5-strong h-100">
                                    <div class="p-4">
                                        <p class="mb-2">Current temperature: <strong class="text-success"><?= $sensorDatadh11['lampo'] ?>°C</strong></p>
                                        <p class="mb-0 text-success">Good weather here</p>
                                        <i class="fas fa-cloud fa-3x text-primary"></i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-dark btn-sm btn-rounded" data-mdb-toggle="modal" data-mdb-target="#exampleModal2" data-mdb-ripple-color="#ffffff">
                                        Data 
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>