$(function() {

  // La vidéo étant lancée automatiquement, le bouton est masqué
   $('#play_pause').hide();

   // Assignation de l'élément <video>
   la_video = $('#video').get(0);

   // Le clic Bouton lance la lecture...
   $('#play_pause').click(function() {
   // ...si le bouton est visible (donc vidéo en pause)
       if ($(this).is(':visible')) {
           $(this).fadeOut("normal", function() {
               // Au masquage du bouton, on enlève la class qui affiche l'image Pause
               $(this).removeClass('pause');
           });
          la_video.play();
       }
   });

   // Clic sur vidéo = Pause + affichage du bouton
       $('#video').click(function() {
           la_video.pause();
           // on ajoute la class qui affiche l'image Pause
           $('#play_pause').addClass('pause').fadeIn("slow");
       });

   // En fin de lecture, on affiche le bouton en image Lecture
   // pour pouvoir relancer la lecture
   la_video.onended = function() {
       $('#play_pause').fadeIn("slow");
   }
});
