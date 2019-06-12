<?php get_header();?>
    <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
        <h1>Aufnahmeantrag</h1>
        <form action="POST">
            <label for="Name">Name</label>
            <input type="text" name="Name">
            <label for="Vorname">VorName</label>
            <input type="text" name="Vorname">
            <label for="Geb">Geb.-Datum</label>
            <input type="text" name="Geb">
            <label for="PLZ">PLZ</label>
            <input type="text" name="PLZ">
            <label for="Wohnort">Wohnort</label>
            <input type="text" name="Wohnort">
            <label for="Straße">Straße</label>
            <input type="text" name="Straße">
            <label for="Telefon">Telefon</label>
            <input type="text" name="Telefon">
            <label for="Email">Email</label>
            <input type="text" name="Email">
            <label for="Unterricht">Unterrichtsart</label>
            <select name="Unterricht" id="Unterricht">
                <option value="solo">Solo</option>
                <option value="gruppe">Gruppe / Band</option>
            </select>
            <h2>Bankdaten</h2>
            <label for="Bank">Name der Bank</label>
            <input type="text" name="Bank">
            <label for="BLZ">BLZ</label>
            <input type="text" name="BLZ">
            <label for="Konto">Konto-Nr.</label>
            <input type="text" name="Konto">
        </form>
    </div>
<?php