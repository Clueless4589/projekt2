<?php get_header();?>
    <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
        <h1>Kursübersicht</h1>
        <div class="row">
            <div class="col-12 col-lg-4">
                <label for="name"> Name</label>
                <input type="text" id="name" name="name" placeholder="Name suchen...">
            </div>
            <div class="col-12 col-lg-4">
                <label for="vorname">Vorname</label>
                <input type="text" id="vorname" name="vorname" placeholder="Vorname suchen...">
            </div>
            <div class="col-12 col-lg-4">
                <label for="instrument">Instrument</label>
                <input type="text" id="instrument" name="instrument" placeholder="Instrument suchen...">
            </div>
        </div>
        <div class="col-12">
            <table>
                <thead>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Nachname
                    </td>
                    <td>
                        Instrument
                    </td>
                    <td>
                        Gehalt
                    </td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Jauch
                    </td>
                    <td>
                        Günther
                    </td>
                    <td>
                        Klavier
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