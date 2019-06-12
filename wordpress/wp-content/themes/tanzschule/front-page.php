<?php get_header();
?>
<div class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-10 col-xl-10">
                <h1> Dashboard</h1>
                <div class="row">
                    <div class="col-12 col-lg-6">
                       <a href="<?php echo get_template_directory_uri()?>/lehrer-liste">
                           <div class="teaser lehrer">
                             <p>Lehrer</p>
                           </div>
                       </a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <a href="<?php echo get_template_directory_uri()?>/verwalter-uebersicht">
                            <div class="teaser manager">
                                <p>Verwalter</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>