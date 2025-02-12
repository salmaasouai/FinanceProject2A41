src="https://cdn.jsdelivr.net/npm/sweetalert2@11"

document.addEventListener("DOMContentLoaded", function() {
  
    var alertButtons = document.querySelectorAll('.alert-me-btn');

    alertButtons.forEach(alertButton => {
        alertButton.addEventListener('click', function() {
            var emailInput = alertButton.nextElementSibling;
            var emailInputContainer = emailInput.parentElement;
            emailInput.style.display = 'block';
            alertButton.querySelector('.btn-text').textContent = 'Send';
            emailInputContainer.style.display = 'block';

            alertButton.removeEventListener('click', arguments.callee);

            alertButton.addEventListener('click', function() {
                var userEmail = emailInput.value;
                var eventName = alertButton.dataset.eventName; // Récupérer le nom de l'événement depuis l'attribut data-event-name du bouton
               // var NbParticipants = alertButton.parentElement.querySelector('.NbParticipants').textContent.trim(); // Récupérer NbParticipants depuis le contenu de la balise avec la classe NbParticipants
               var NbParticipants = alertButton.dataset.eventNbparticipants; // Utilisez "eventNbparticipants" au lieu de "eventNbpaticipants"
               var Date = alertButton.dataset.eventDate; // Utilisez "eventNbparticipants" au lieu de "eventNbpaticipants"
               var Time = alertButton.dataset.eventTime; // Utilisez "eventNbparticipants" au lieu de "eventNbpaticipants"
      var Idevent=alertButton.dataset.eventIdevent;
           //  var Date = alertButton.parentElement.querySelector('.Date').textContent.trim(); // Récupérer Date depuis le contenu de la balise avec la classe Date
             //   var Time = alertButton.parentElement.querySelector('.Time').textContent.trim(); // Récupérer Time depuis le contenu de la balise avec la classe Time
                
                console.log('Email entered:', userEmail);
                console.log('Event name:', eventName);
                console.log('Number of Participants:', NbParticipants);
                console.log('Date:', Date);
                console.log('Time:', Time);
                console.log('Idevent:', Idevent);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "sendEmail.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'error') {
                            // Afficher un dialogue d'erreur
                            showDialogue('error', response.message);
                        } else if (response.status === 'success') {
                            // Afficher un dialogue de succès
                            showDialogue('success', response.message);
                        } else if (response.status === 'email_error') {
                            // Afficher un dialogue d'erreur lié à l'e-mail
                            showDialogue('error', response.message);
                        }
                    }
                };
                xhr.send("userEmail=" + encodeURIComponent(userEmail) + 
                         "&eventName=" + encodeURIComponent(eventName) + 
                         "&NbParticipants=" + encodeURIComponent(NbParticipants) + 
                         "&Date=" + encodeURIComponent(Date) + 
                         "&Time=" + encodeURIComponent(Time) +
                         "&Idevent=" + encodeURIComponent(Idevent)); // Envoyer // Envoyer également le nom de l'événement

            });
        });
    });
    function showDialogue(icon, message) {
        var dialogueContainer = document.getElementById('dialogue-container');
        dialogueContainer.innerHTML = '';
        Swal.fire({
            icon: icon,
            title: icon === 'error' ? 'Erreur!' : 'Success!',
            text: message
        }).then((result) => {
            // Rafraîchir la page après avoir fermé le dialogue
            location.reload();
        });
    }
});







  







document.addEventListener("DOMContentLoaded", function() 
{
    // Sélectionnez tous les boutons "Alert me!"
    var alertButtons = document.querySelectorAll('.alert-me-btn');

    // Parcourez chaque bouton "Alert me!"
    alertButtons.forEach(alertButton => 
        {
        // Ajoutez un écouteur d'événement pour le clic sur le bouton "Alert me!"
        alertButton.addEventListener('click', function() 
        {

        });
    });
});


document.addEventListener("DOMContentLoaded", function() 
      {
           
        // Fonctions pour ajouter et supprimer des classes CSS
            function addClass(el, className) 
            {
                if (typeof el.length == "number") {
                    Array.prototype.forEach.call(el, function(e, i) {
                        addClass(e, className);
                    });
                    return;
                }
                if (el.classList) el.classList.add(className);
                else el.className += " " + className;
            }


            function removeClass(el, className) 
            {
                if (typeof el.length == "number") {
                    Array.prototype.forEach.call(el, function(e, i) {
                        removeClass(e, className);
                    });
                    return;
                }
                if (el.classList) el.classList.remove(className);
                else if (el.className)
                    el.className = el.className.replace(
                        new RegExp("(^|\\b)" + className.split(" ").join("|") + "(\\b|$)", "gi"),
                        " "
                    );
            }
            

            // Sélectionnez toutes les div.rating-stars
            
            var ratingStars = document.querySelectorAll(".rating-stars");
            var eventRatings = {}; // Un objet pour stocker les ratings des événements


            ratingStars.forEach(function(ratingContainer) 
            {


                // Récupérez l'ID de l'événement à partir de l'attribut data-event-id
                var eventId = ratingContainer.dataset.eventId;

                // Sélectionnez toutes les étoiles à l'intérieur de ce conteneur de rating
                var stars = ratingContainer.querySelectorAll("a");

                var averageRating = parseFloat(ratingContainer.dataset.averageRating);
              
                stars.forEach(function(star) {
                    // Ajoutez la classe "colored" si la note moyenne est supérieure à la position de l'étoile dans la boucle
                    if (parseFloat(star.getAttribute("data-rating")) <= averageRating) {
                        addClass(star, "selected");
                    }
                });

                // Ajoutez le code pour colorer les étoiles lorsqu'elles sont survolées
                Array.prototype.forEach.call(stars, function(el, i) 
                {


                  //mettre en surbrillance les étoiles jusqu'à celle sur laquelle l'utilisateur a placé la souris.
                   el.addEventListener("mouseover", function(evt) 
                    {
                        removeClass(stars, "selected");

                        var to = parseInt(evt.target.getAttribute("data-rating"));

                        Array.prototype.forEach.call(stars, function(star, i) 
                        {
                          // kena l star l indice mt3 star li wselha <= indice ekhr star mwjouda 3leha souris
                            if (parseInt(star.getAttribute("data-rating")) <= to) 
                            {
                                addClass(star, "hover");
                            }
                        });
                    });

          //Lorsque la souris quitte une étoile de notation, cette fonction est déclenchée. Cela garantit que la notation revient à son état initial si l'utilisateur n'a pas sélectionné d'étoile.
                    el.addEventListener("mouseout", function(evt) 
                    {
                        removeClass(stars, "hover");
                        if (!evt.target.classList.contains("selected")) 
                        {
                            removeClass(stars, "selected");
                        }
                    });



                    el.addEventListener("click", function(evt) 
                    {

                        var eventId = ratingContainer.dataset.eventId;

                      //Elle récupère la valeur de notation attribuée à l'étoile sur laquelle l'utilisateur a cliqué.
                        selectedRating = parseInt(evt.target.getAttribute("data-rating"));
                        //supprime la classe "hover" de toutes les étoiles pour désactiver la surbrillance.
                        removeClass(stars, "hover");
                        //elle ajoute la classe "selected" à toutes les étoiles jusqu'à celle sur laquelle l'utilisateur a cliqué
                        Array.prototype.forEach.call(stars, function(star, i) 
                        {
                            if (parseInt(star.getAttribute("data-rating")) <= selectedRating) 
                            {
                                addClass(star, "selected");
                            }
                        });
                        
                        //eventRatings[eventId] = selectedRating;

                       
                        var data = {
                            rating: selectedRating,
                            IdEv: eventId
                        };
                    
                    
                        // Créer une requête XMLHttpRequest
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "addRating.php", true);
                        xhr.setRequestHeader("Content-Type", "application/json");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                console.log(xhr.responseText);
                            }
                        };
                    
                        // Envoyer les données sous forme de chaîne JSON
                        xhr.send(JSON.stringify(data));

                        console.log("Envoi de eventRatings vers addRating.php : ", data);


                        //évite le comportement par défaut du navigateur 
                        //associé au clic sur un lien (<a>), ce qui empêche la page de se recharger ou de naviguer vers une autre URL.
                        evt.preventDefault();
                    }); 


                });
              
                // Enregistrez le rating de chaque événement dans l'objet eventRatings
                stars.forEach(function(star) 
                {
                    star.addEventListener("click", function(event) 
                    {
                        event.preventDefault();
                        
                        var eventId = ratingContainer.dataset.eventId;

                        var rating = parseInt(star.getAttribute("data-rating"));

                        eventRatings[eventId] = rating;

                        // Ajoutez le commentaire lorsque seule une étoile est sélectionnée
                        if (rating === 1) 
                        {
                            var commentDiv = ratingContainer.nextElementSibling;
                            commentDiv.innerHTML = "I don't like it 😕";
                        } 
                        else if (rating === 2) 
                        {
                            var commentDiv = ratingContainer.nextElementSibling;
                            commentDiv.innerHTML = "It's okay 🙂";
                        } 
                        else if (rating === 3) 
                        {
                            var commentDiv = ratingContainer.nextElementSibling;
                            commentDiv.innerHTML = "I like it 😊";
                        } 
                        else if (rating === 4) 
                        {
                            var commentDiv = ratingContainer.nextElementSibling;
                            commentDiv.innerHTML = "I really like it 😍";
                        } 
                        else 
                        {
                            var commentDiv = ratingContainer.nextElementSibling;
                            commentDiv.innerHTML = "";
                        }

                    
                    });
                });  
            });
           
 });


        /* --------------------BOUTON LIEE AU SPONSORS --------------------->*/

         // Ajoute un gestionnaire d'événements click à tous les boutons "Sponsor this event"
    document.querySelectorAll('.sponsor-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Récupère l'identifiant de l'événement associé au bouton
            const eventId = this.getAttribute('data-event-id');
            // Redirige l'utilisateur vers la page addSponsor avec l'identifiant de l'événement dans l'URL
            window.location.href = `AddS.php?eventId=${eventId}`;
        });
    });



    // Ajoute un gestionnaire d'événements click à tous les boutons "see sponsors of this event"
    document.querySelectorAll('.afficherS-btn').forEach(btn => 
   {
        btn.addEventListener('click', function() {
            // Récupère l'identifiant de l'événement associé au bouton
            const eventId = this.getAttribute('data-event-id');
            // Redirige l'utilisateur vers la page addSponsor avec l'identifiant de l'événement dans l'URL
            window.location.href = `getSponsors.php?eventId=${eventId}`;
        });
    });
    
        /* --------------------BOUTON LIEE AU SPONSORS --------------------->*/


       // Ajoute un gestionnaire d'événements click à tous les boutons "Sponsor this event"
       document.querySelectorAll('.details-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Récupère l'identifiant de l'événement associé au bouton
            const eventId = this.getAttribute('data-event-id');
            // Redirige l'utilisateur vers la page addSponsor avec l'identifiant de l'événement dans l'URL
            window.location.href = `afficherdialogueEv.php?eventId=${eventId}`;
        });
    });


       