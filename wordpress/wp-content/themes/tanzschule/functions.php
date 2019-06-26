<?php

/**
 * enquing scripts and Stylesheets using wordpress functions
 */
function enquiIt()
{
    wp_register_style('style', get_template_directory_uri() . '/dist/css/main.min.css');
    wp_enqueue_style('style');

    wp_register_script('main', get_template_directory_uri() . '/dist/js/main.min.js');
    wp_enqueue_script('main');

    wp_register_script('script', get_template_directory_uri() . '/js/scripts.js');
    wp_enqueue_script('script');


}
/**
 * Wordpress function to bind actions
 */
add_action( 'wp_enqueue_scripts', 'enquiIt' );

/**
 * Get data of all teachers for a List
 *
 * @return object
 */
function getLehrerliste(){
    global $wpdb;
    $query = "SELECT ms_lehrer.LehrerId, ms_lehrer.Vorname,ms_lehrer.Nachname FROM ms_lehrer";

    $result = $wpdb->get_results( $query);
    return $result;
}

/**
 * Get data of one teacher
 *
 * @return object
 */
function getLehrer(){
    global $wpdb;
    $query = "SELECT ms_lehrer.Vorname, ms_lehrer.Nachname, ms_lehrer.Stundensatz, ms_instrumente.Bezeichnung FROM ms_lehrer
JOIN ms_instrumentlehrer ON ms_lehrer.LehrerId = ms_instrumentlehrer.LehrerId
JOIN ms_instrumente ON ms_instrumentlehrer.InstrumentId = ms_instrumente.InstrumentId
WHERE ms_lehrer.LehrerId =" .$_GET['id'];

    $result = $wpdb->get_results( $query);
    return $result;
}
/*Für Lehrerliste*/
/**
 * Get data of all Instruments played by one teacher
 *
 * @param $id
 * @return object
 */
function getInstrumente($id){
    global $wpdb;
    $query = "SELECT ms_instrumente.Bezeichnung FROM ms_instrumente JOIN ms_instrumentlehrer on  ms_instrumentlehrer.InstrumentId = ms_instrumente.InstrumentId WHERE ms_instrumentlehrer.LehrerId = " . $id;
    $result = $wpdb->get_results( $query);
    return $result;
}

/**
 * Get all students of one teacher
 *
 * @return object
 */
function getSchuelerLehrer(){

    global $wpdb;
    $query = "SELECT ms_schueler.Vorname, ms_schueler.Nachname FROM ms_unterricht
JOIN ms_schuelerunterricht ON ms_unterricht.UnterrichtId = ms_schuelerunterricht.UnterrichtId
JOIN ms_schueler ON ms_schuelerunterricht.SchuelerId = ms_schueler.SchuelerId
WHERE ms_unterricht.LehrerId = " . $_GET['id'];

    $result = $wpdb->get_results( $query);
    return $result;
}
/**
 * Get all classes of one teacher
 *
 * @return object
 */
function getKurseLehrer(){
    global $wpdb;
    $query = "SELECT ms_unterricht.UnterrichtId, ms_unterricht.Tag FROM ms_unterricht WHERE ms_unterricht.LehrerId =" . $_GET['id'];

    $result = $wpdb->get_results( $query);
    return $result;
}
/**
 * Get data for a weeklyplan of one teacher
 *
 * @return object
 */
function getLehrerWochenplan(){
    global $wpdb;
    $query = "SELECT ms_lehrer.Vorname, ms_lehrer.Nachname, ms_unterricht.UnterrichtId, ms_instrumente.Bezeichnung, ms_unterricht.Uhrzeit, ms_unterricht.Tag FROM ms_lehrer 
JOIN ms_unterricht ON ms_lehrer.LehrerId = ms_unterricht.LehrerId 
JOIN ms_instrumente ON ms_unterricht.InstrumentId = ms_instrumente.InstrumentId
WHERE ms_lehrer.LehrerId = " . $_GET['id'];

    $result =$wpdb->get_results( $query);
    return $result;
}

function getLehrerDetail(){
    global $wpdb;
    $query = "" . $_GET['id'];
    $result =$wpdb->get_results( $query);
    return $result;
}
/**
 * Get data for all course details
 *
 * @return object
 */
function getKursDetail(){
    global $wpdb;
    $query = "SELECT ms_instrumente.Bezeichnung, ms_lehrer.Nachname, ms_lehrer.Vorname, ms_unterricht.Tag, ms_unterricht.Uhrzeit, ms_vertraege.Startdatum, ms_pakete.Laufzeit From ms_unterricht
JOIN ms_lehrer ON ms_unterricht.LehrerId = ms_lehrer.LehrerId 
JOIN ms_schuelerunterricht On ms_unterricht.UnterrichtId = ms_schuelerunterricht.UnterrichtId 
JOIN ms_schueler on ms_schuelerunterricht.SchuelerId = ms_schueler.SchuelerId 
JOIN ms_instrumente ON ms_unterricht.InstrumentId = ms_instrumente.InstrumentId 
JOIN ms_vertraege ON ms_vertraege.SchuelerId = ms_schueler.SchuelerId 
JOIN ms_pakete ON ms_vertraege.PaketId = ms_pakete.PaketId 
WHERE ms_unterricht.UnterrichtId = " . $_GET['id'];

    $result =$wpdb->get_results( $query);
    return $result;
}
/**
 * Get data for all cources from a specific student
 *
 * @return object
 */
function getKursSchueler($id = false) {
    global $wpdb;
    $kursId = $id ? $id : $_GET['id'];
    $query = "SELECT ms_schueler.Vorname, ms_schueler.Nachname FROM ms_schueler 
JOIN ms_schuelerunterricht on ms_schueler.SchuelerId = ms_schuelerunterricht.SchuelerId
WHERE ms_schuelerunterricht.UnterrichtId = " .$kursId;

    $result =$wpdb->get_results( $query);
    return $result;
}
/**
 * Get data for a specific class entity
 *
 * @return object
 */
function getUnterrichtsEinheiten(){
    global $wpdb;
    $query = "SELECT ms_unterrichtseinheit.UnterrichtseinheitId, ms_unterrichtseinheit.Inhalt, ms_unterrichtseinheit.Datum, ms_unterrichtseinheit.Inhalt FROM ms_unterrichtseinheit
WHERE ms_unterrichtseinheit.UnterrichtId = " .$_GET['id'];

    $result =$wpdb->get_results( $query);
    return $result;
}
/**
 * Get data for all courses
 *
 * @return object
 */
function getAllKurse(){
    global $wpdb;
    $query = "SELECT ms_unterricht.UnterrichtId, ms_unterricht.Tag, ms_unterricht.LehrerId, ms_unterricht.RaumId, ms_lehrer.Vorname as LehrerVorname, ms_lehrer.Nachname as LehrerNachname, ms_instrumente.Bezeichnung as Instrument, ms_raeume.Bezeichnung as RaumBezeichnung FROM ms_unterricht
JOIN ms_lehrer ON ms_unterricht.LehrerId = ms_lehrer.LehrerId
JOIN ms_instrumente ON ms_unterricht.InstrumentId = ms_instrumente.InstrumentId
JOIN ms_raeume on ms_unterricht.RaumId = ms_raeume.RaumId";

        $result =$wpdb->get_results( $query);
    return $result;
}
/**
 * Get data for all cources of a room
 *
 * @return object
 */
function getRaumKurse($id){
    global $wpdb;
    $query = "SELECT ms_unterricht.UnterrichtId, ms_unterricht.Tag, ms_unterricht.Uhrzeit FROM ms_unterricht WHERE ms_unterricht.RaumId = " . $_POST['id'];

    $result =$wpdb->get_results( $query);
    echo json_encode($result);
    die();
}

/**
 * Wordpress function to bind actions
 */
add_action( 'wp_ajax_getRaumKurse', 'getRaumKurse' );
/**
 * Wordpress function to bind actions
 */