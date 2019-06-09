<?php get_header();
?>
<div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
    <h1> Dashboard</h1>
    <div class="row">
        <div class="col-12 col-lg-6">
            <a href="<?php echo get_template_directory_uri()?>/lehrer-liste">
                <div class="dashboard-button">Lehrer</div>
            </a>
        </div>
        <div class="col-12 col-lg-6">
            <a href="<?php echo get_template_directory_uri()?>/verwalter-uebersicht">
                <div class="dashboard-button">Verwalter</div>
            </a>
        </div>
    </div>

</div>