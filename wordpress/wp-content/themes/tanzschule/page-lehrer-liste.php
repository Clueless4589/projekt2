<?php get_header(); ?>
   <div class="main">
       <div class="container-fluid">
           <div class="row justify-content-center">
               <div class="col-10 col-md-10 col-xl-10">
                   <h1> Lehrerliste</h1>
                   <div class="row">
                       <div class="col-10 col-md-4">
                          <div class="form-group">
                              <label for="Name">Name</label>
                              <input type="text" name="Name" placeholder="Name suchen..." class="search-field">
                          </div>

                       </div>
                       <div class="col-10 col-md-4">
                           <div class="form-group">
                               <label for="Vorname">Vorname</label>
                               <input type="text" name="Vorname" placeholder="Vorname suchen..." class="search-field">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row justify-content-center">
               <div class="col-10 col-md-10 col-xl-10">

                   <?php $liste = getLehrerliste() ?>
                   <table>
                       <thead>
                       <tr>
                           <th>Name</th>
                           <th>Nachname</th>
                           <th>Instrument</th>
                           <th></th>
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
                               <td><?php
                                   if(empty($instrumente)){
                                       echo '-';
                                   }
                                   echo $instrumente;

                                   ?></td>
                               <td><a href="<?php echo get_template_directory_uri() ?>/lehrer-wochenplan?id=<?php echo $item->LehrerId ?>">Zur Lehrerseite</a></td>
                           </tr>
                       <?php } ?>
                   </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
<?php