<?php get_header();
$kurse = getLehrerWochenplan();
?>
    <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
        <h1>Lehrer Wochenplan</h1>
        <p>Hallo <?php echo $kurse[0]->Vorname." ".$kurse[0]->Nachname ?></p>

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
            <h2><?php echo $tag['0']->Tag ?></h2>
            <div class="row">
                <?php foreach ($tag as $unterricht) { ?>
                    <div class="col-12 col-lg-4">
                        <a href="<?php echo get_home_url() . '/kurs-detail?id='.$unterricht->UnterrichtId ?>">
                        <div class="kurs-teaser">
                            <img src="<?php echo get_template_directory_uri() ?>/img/test.png" alt="">
                            <div class="row">
                                <div class="col-12">
                                    <h3>Kurs ID: <?php echo $unterricht->UnterrichtId ?> <?php echo $unterricht->Bezeichnung ?></h3>
                                    <p>
                                        Uhrzeit: <?php echo $unterricht->Uhrzeit ?> <br>
                                    </p>
                                </div>
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
<?php