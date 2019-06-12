<?php get_header();?>
    <div class="main">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 col-md-10 col-xl-8">
                    <h1>Aufnahmeantrag</h1>
                    <form action="POST">
                        <div class="row mb-2">
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" name="Name">
                                </div>
                            </div>
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Vorname">VorName</label>
                                    <input type="text" name="Vorname">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Geb">Geb.-Datum</label>
                                    <input type="text" name="Geb">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="PLZ">PLZ</label>
                                    <input type="text" name="PLZ">
                                </div>
                            </div>
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Wohnort">Wohnort</label>
                                    <input type="text" name="Wohnort">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-10 col-md-12">
                                <div class="form-group">
                                    <label for="Straße">Straße</label>
                                    <input type="text" name="Straße">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Telefon">Telefon</label>
                                    <input type="text" name="Telefon">
                                </div>
                            </div>
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" name="Email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Unterricht">Unterrichtsart</label>
                                    <select name="Unterricht" id="Unterricht">
                                        <option value="solo">Solo</option>
                                        <option value="gruppe">Gruppe / Band</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h2>Bankdaten</h2>
                        <div class="row mb-2">
                            <div class="col-10 col-md-12">
                                <div class="form-group">
                                    <label for="Bank">Name der Bank</label>
                                    <input type="text" name="Bank">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="BLZ">BLZ</label>
                                    <input type="text" name="BLZ">
                                </div>
                            </div>
                            <div class="col-10 col-md-6">
                                <div class="form-group">
                                    <label for="Konto">Konto-Nr.</label>
                                    <input type="text" name="Konto">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-10 col-md-6">
                               <button type="submit" class="btn">Senden</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php