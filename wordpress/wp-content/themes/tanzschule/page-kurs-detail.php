<?php get_header();
$content = getKursDetail()[0];
$schueler = getKursSchueler();
$unterrichtsEinheiten = getUnterrichtsEinheiten();
?>
<div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
    <h1>Kurs <?php echo $content->Bezeichnung ?></h1>
    <div class="row">
        <div class="col-12 col-lg-6">
            <table>
                <tr>
                    <td>Instrument</td>
                    <td><?php echo $content->Bezeichnung ?></td>
                </tr>
                <tr>
                    <td>Lehrer</td>
                    <td><?php echo $content->Vorname ." " . $content->Nachname ?></td>
                </tr>
                <tr>
                    <td>Tag</td>
                    <td><?php echo $content->Tag ?></td>
                </tr>
                <tr>
                    <td>Uhrzeit</td>
                    <td><?php echo $content->Uhrzeit ?> Uhr</td>
                </tr>
            </table>
        </div>
        <div class="col-12 col-lg-6">
            <table>
                <tr>
                    <td>Startzeit</td>
                    <td><?php echo $content->Startdatum ?></td>
                </tr>
                <tr>
                    <td>Laufzeit</td>
                    <td><?php echo $content->Laufzeit ?> Monate</td>
                </tr>
                <tr>
                    <td>Unterrichtsart</td>
                    <td><?php echo $content->Bezeichnung ?> Überlegen</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h3>Schüler</h3>
            <p>Insgesamt</p>

            <?php foreach ($schueler as $item){
                $result .= $item->Vorname ." " .$item->Nachname .", ";
            }
            $result = rtrim($result,", ");
            ?>
            <p><?php echo $result ?></p>
        </div>
    </div>

    <div class="row">
        <?php foreach ($unterrichtsEinheiten as $item){?>
           <div class="col-4">
            <h4>Kurs - <?php echo $item->Datum;  ?></h4>
            <textarea placeholder="" id="<?php $item->UnterrichtseinheitId ?>"><?php echo $item->Inhalt ?></textarea>
        </div>
        <?php }
        ?>
    </div>
</div>
