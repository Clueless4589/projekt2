<?php get_header();
$zeiten = array("9:00","9:30","10:00","10:30", "11:00", "11.30","12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"); //TODO: schöner machen was besseres einfallen lassen
$tage = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag");

?>
    <div id="raumdetail" class="main">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-xl-10">
                    <h1>Raum</h1>
                    <div class="row">
                        <div class="col-12">
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        Uhrzeit
                                    </th>
                                    <th>
                                        Mo
                                    </th>
                                    <th>
                                        Di
                                    </th>
                                    <th>
                                        Mi
                                    </th>
                                    <th>
                                        Do
                                    </th>
                                    <th>
                                        Fr
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                foreach ($zeiten as $zeit){
                                    echo "<tr data-time='" . $zeit . "'>";
                                    echo "<td>" . $zeit . "</td>";
                                    foreach ($tage as $tag){
                                        echo"<td class='" . $tag . "'></td>";
                                    }
                                    echo"</tr>";
                                }
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