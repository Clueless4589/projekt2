<?php get_header();?>
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
                <tr>
                    <td>
                        Gitarre
                    </td>
                    <td>
                        Günther
                    </td>
                    <td>
                        Horst
                    </td>
                    <td>
                        4
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php