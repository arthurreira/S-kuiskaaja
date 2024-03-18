<style>
    #text {
        margin-top: 200px;
    }
</style>


<section>
    <div id="intro" class="bg-image" style="background-image: url('img/finland_wheater_background_for\ \(4\).jpeg'); height: 100vh;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="container justify-content-center align-items-center text" id="text">
                <div class="row align-items-center">
                    <?php require_once 'Front-end-components/wheater-card.php'; ?>
                </div>
                <div class="container text-white mt-5">
                    <h1 class="display-3">Tervetuloa Sääasemaan</h1>
                    <p class="lead">Tällä sivulla näytetään sääasemalta kerättyjä tietoja. Sääasema mittaa erilaisia ilmakehän parametreja, kuten lämpötilaa, ilmankosteutta ja ilmanpainetta. Saadut tiedot päivittyvät automaattisesti ja ne näytetään alla olevassa osiossa. Voit tarkastella eri antureiden tietoja ja seurata sään kehittymistä reaaliajassa.</p>
                </div>
            </div>
        </div>
    </div>
</section>