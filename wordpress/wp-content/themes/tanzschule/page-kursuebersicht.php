<?php get_header();
$kurse = getAllKurse();
?>
    <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
        <h1>Kursübersicht</h1>
        <div class="row">
            <div class="col-12 col-lg-4">
                <lable for="raum"></lable>
                <input type="text" id="raum" name="raum" placeholder="Raum suchen...">
            </div>
            <div class="col-12 col-lg-4">
                <lable for="lehrer"></lable>
                <input type="text" id="lehrer" name="lehrer" placeholder="Lehrer suchen...">
            </div>
            <div class="col-12 col-lg-4">
                <lable for="shueler"></lable>
                <input type="text" id="schueler" name="schueler" placeholder="Schüler suchen...">
            </div>
        </div>
        <div class="col-12">
            <table>
                <thead>
                <tr>
                    <td>
                        Kurs
                    </td>
                    <td>
                        Lehrer
                    </td>
                    <td>
                        Schüler
                    </td>
                    <td>
                        Raum
                    </td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($kurse as $kurs) { ?>
                    <tr>
                        <td>
                            <a href="<?php  echo get_home_url() . "/kurs-detail?id=" . $kurs->LehrerId ?>"><?php echo $kurs->Instrument ?></a>
                        </td>
                        <td>
                            <a href="<?php  echo get_home_url() . "/lehrer-detail?id=" . $kurs->LehrerId ?>"><?php echo $kurs->LehrerVorname ." " .$kurs->LehrerNachname ?></a>
                        </td>
                        <td>
                            <?php $schueler = getKursSchueler($kurs->UnterrichtId); //TODO: in funktion auslagern
                            $result = "";
                            foreach ($schueler as $item){
                                $result .= $item->Vorname ." " .$item->Nachname .", ";
                            }
                            $result = rtrim($result,", ");
                            ?>
                            <p><?php echo $result ?></p>
                        </td>
                        <td>
                            <a href="<?php  echo get_home_url() . "/raum-detail?id=" . $kurs->LehrerId ?>"><?php echo $kurs->RaumBezeichnung ?></a>
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php