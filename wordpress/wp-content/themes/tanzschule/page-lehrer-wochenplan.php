<?php get_header();
$kurse = getLehrerWochenplan();
?>
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <h1>Lehrer Wochenplan</h1>
                <p class="infotxt">Hallo <?php echo $kurse[0]->Vorname." ".$kurse[0]->Nachname ?></p>

                <!--foreach !!-->

                <?php

                $result = array();
                foreach ($kurse as $kurs) {
                    $tag = $kurs->Tag;
                    if (!isset($result[$tag])) {
                        $result[$tag][0] = $kurs;
                    } else {
                        array_push($result[$tag], $kurs);
                    }
                }
                foreach ($result as $tag) {
                    //TODO: Link refactor
                    ?>
                    <h3><?php echo $tag['0']->Tag ?></h3>
                    <div class="row">
                        <?php foreach ($tag as $unterricht) { ?>
                            <div class="col-12 col-lg-4">
                                <a class="teaser__kurs-link" href="<?php echo get_home_url() . '/kurs-detail?id='.$unterricht->UnterrichtId ?>">
                                    <div class="teaser__kurs">
                                        <img src="<?php echo get_template_directory_uri() ?>/img/test.png" alt="">
                                        <div>
                                            <h4>Kurs: <?php echo $unterricht->UnterrichtId ?> <?php echo $unterricht->Bezeichnung ?></h4>
                                            <p>
                                                Uhrzeit: <?php echo $unterricht->Uhrzeit ?> <br>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php