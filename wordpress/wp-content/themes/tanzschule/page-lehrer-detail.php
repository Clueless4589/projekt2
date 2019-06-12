<?php get_header();
$lehrer = getLehrer();
$schuelerLehrer = getSchuelerLehrer();
$schuelercount = 0;
foreach ($schuelerLehrer as $item) {
    $schueler .= $item->Vorname . " " . $item->Nachname . ", ";
    $schuelercount++;
}
$schueler = rtrim($schueler, ", ");
?>
<div class="main">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 col-md-10 col-xl-10">
                <div class="row lehrer-info">
                    <div class="col-12 col-md-6">
                        <h1>Lehrer</h1>
                        <h2><?php echo $lehrer[0]->Vorname . " " . $lehrer[0]->Nachname ?></h2>
                    </div>
                    <div class="col-12 col-md-6">
                        <?php foreach ($lehrer as $item) {
                            $result .= $item->Bezeichnung . ", ";
                        }
                        $result = rtrim($result, ", ");
                        ?>
                        <p>
                            <?php echo $result ?><br>
                            <?php echo $lehrer[0]->Stundensatz ?>
                        </p>

                    </div>
                </div>
                <hr>
                <div class="row lehrer-schueler">
                    <div class="col-12">
                        <h2>Schüler</h2>
                        <p>Insgesamt: <?php echo $schuelercount?></p>

                        <p><?php echo $schueler ?></p>
                    </div>
                </div>
                <hr>

                <div class="row lehrer-kurse">
                    <div class="col-12">
                        <h2>Kurse</h2>
                        <!--foreach !!-->

                        <p>Kurs,Kurs,Kurs,Kurs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php