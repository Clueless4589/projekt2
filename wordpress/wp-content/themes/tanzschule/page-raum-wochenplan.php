<?php get_header();
$instrumente = getAllInstrumente();
$raum= getAllRaum();

?>
    <div class="main">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-xl-10">
                    <h1>Raum Wocheplan</h1>





























                    <div class="row">
                        <div class="button-group filters-button-group">
                            <button class="button is-checked" value="Alle Verhütungsmethoden" data-filter="*">
                                <span>Alle</span>
                            </button>

                            <?php

                            foreach ($instrumente as $instrument) {
                                $bzg = $instrument->Bezeichnung;
                                ?>
                                <button class="button" data-filter=".<?php echo $bzg?>" value="<?php echo $bzg?>">
                                    <span><?php echo $bzg?></span></button>
                                <?php
                            }?>
                        </div>
                    </div>
                    <div class="row grid justify-content-center">

                        <?php
                        foreach ($raum as $raumitem) {
                            $id= $raumitem->RaumId;
                            $raumname= $raumitem->Bezeichnung;
                            $rauminstrumente= getRaumInstrumente($id);
                            ?>
                            <div class="col-lg-3 col-sm-4 col-6 element-item <?php foreach ($rauminstrumente as $rauminstrument) {
                                $instrument= $rauminstrument->Instrument;
                                echo $instrument.' ';
                            }?>" data-category="transition">
                                <div class="element-item-container">
                                    <h2>
                                        <?php echo $raumname?>
                                    </h2>
                                </div>
                            </div>


                        <?php  }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php