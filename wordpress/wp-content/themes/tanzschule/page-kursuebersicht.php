<?php get_header();
$kurse = getAllKurse();
?>
    <div class="main">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-xl-10">
                    <h1>Kursübersicht</h1>
                    <div class="row">
                        <div class="col-10 col-md-4">
                            <div class="form-group">
                                <label for="raum"></label>
                                <input type="text" id="raum" name="raum" placeholder="Raum suchen...">
                            </div>
                        </div>
                        <div class="col-10 col-md-4">
                            <div class="form-group">
                                <label for="lehrer"></label>
                                <input type="text" id="lehrer" name="lehrer" placeholder="Lehrer suchen...">r="Raum suchen...">
                            </div>
                        </div>
                        <div class="col-10 col-md-4">
                            <div class="form-group">
                                <label for="schueler"></label>
                                <input type="text" id="schueler" name="schueler" placeholder="Schüler suchen...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        Kurs
                                    </th>
                                    <th>
                                        Lehrer
                                    </th>
                                    <th>
                                        Schüler
                                    </th>
                                    <th>
                                        Raum
                                    </th>
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

                </div>
            </div>
        </div>
    </div>
<?php