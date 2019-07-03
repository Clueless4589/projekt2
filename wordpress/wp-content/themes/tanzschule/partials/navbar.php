
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10">
           <nav class="navbar navbar-expand-lg">
               <a class="navbar-brand" href="<?php echo home_url()?>">Ready4Stage</a>
               <button class="navbar-toggler leftNavbarToggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                       aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                   <ul class="nav navbar-nav nav-flex-icons">
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Lehrer
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                               <a class="dropdown-item" href="<?php echo get_home_url()?>/lehrer-liste">Lehrerliste</a>
                               <a class="dropdown-item" href="<?php echo get_home_url()?>/raum-wochenplan">Raumplan</a>
                           </div>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Verwaltung
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                               <a class="dropdown-item" href="<?php echo get_home_url()?>/verwaltung-lehrerliste">Lehrerliste</a>
                               <a class="dropdown-item" href="<?php echo get_home_url()?>/aufnahmeantrag">Aufnahmeantrag</a>
                               <a class="dropdown-item" href="<?php echo get_home_url()?>/statistiken">Statistiken</a>
                               <a class="dropdown-item" href="<?php echo get_home_url()?>/raum-wochenplan">Raumplan</a>
                           </div>
                       </li>
                   </ul>
                   <!--  <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
               </div>
           </nav>
        </div>
    </div>
</div>
