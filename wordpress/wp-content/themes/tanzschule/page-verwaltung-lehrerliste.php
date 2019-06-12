<?php get_header();?>
    <div class="main">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-xl-10">
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
                                <th>
                                    Name
                                </th>
                                <th>
                                    Nachname
                                </th>
                                <th>
                                    Instrument
                                </th>
                                <th>
                                    Gehalt
                                </th>
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
            </div>
        </div>
    </div>

<?php