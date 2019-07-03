<?php get_header();
$instrumente = getAllInstrumente();
$raum= getAllRaum();

?>
    <div class="main">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-xl-10">
                    <h1>Raum Wocheplan</h1>
                    <hr>
                    <div class="row">
                        <div class="col-10">
                            <div id="filters" class="button-group">
                                <button class="btn is-checked" data-filter="*">show all</button>
                                <?php

                                foreach ($instrumente as $instrument) {
                                    $bzg = $instrument->Bezeichnung;
                                    ?>
                                    <button class="btn" data-filter=".<?php echo $bzg?>">
                                        <span><?php echo $bzg?></span></button>
                                    <?php
                                }?>
                            </div>
                        </div>
                    </div>

                    <div class="row grid mt-5">
                        <?php
                        foreach ($raum as $raumitem) {
                            $id= $raumitem->RaumId;
                            $raumname= $raumitem->Bezeichnung;
                            $rauminstrumente= getRaumInstrumente($id);
                            ?>
                            <div class="col-lg-2 col-sm-3 col-5 element-item <?php foreach ($rauminstrumente as $rauminstrument) {
                                $instrument= $rauminstrument->Instrument;
                                echo $instrument.' ';
                            }?>">
                                <a href="<?php echo get_template_directory_uri() ?>/raum-detail?id=<?php echo $id ?>">
                                <div class="element-item-container">

                                    <p>Raum:</p>
                                    <p><?php echo $raumname?></p>

                                </div>
                                </a>
                            </div>


                        <?php  }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php