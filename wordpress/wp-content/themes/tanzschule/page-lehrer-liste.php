<?php get_header(); ?>
    <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
        <h1> Lehrerliste</h1>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="Name">Name</label>
                <input type="text" name="Name" placeholder="Name suchen..." class="search-field">

                <label for="Vorname">Vorname</label>
                <input type="text" name="Vorname" placeholder="Vorname suchen..." class="search-field">


            </div>

            <div class="col-12">

                <?php $liste = getLehrerliste() ?>
                <table>
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Nachname</td>
                        <td>Instrument</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <!--foreach !!-->
                    <?php foreach ($liste as $item) {
                        $instrumente = "";
                        foreach ($bezeichnungen = getInstrumente($item->LehrerId) as $bezeichnung) {
                            $instrumente .= $bezeichnung->Bezeichnung . ", ";
                        }
                        $instrumente = rtrim($instrumente, ", ");
                        ?>

                        <tr>
                            <td><?php echo $item->Vorname ?></td>
                            <td><?php echo $item->Nachname ?></td>
                            <td><?php echo $instrumente ?></td>
                            <td><a href="<?php echo get_template_directory_uri() ?>/lehrer-wochenplan?id=<?php echo $item->LehrerId ?>">Details</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php