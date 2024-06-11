document.addEventListener('DOMContentLoaded', function() {
    const boutons = document.getElementsByClassName('image');
    const popup = document.getElementById('popup');
    const popupMessage = document.getElementById('popupMessage');
    const closePopup = document.getElementById('closePopup');

    if (boutons.length > 0) {
        for (let i = 0; i < boutons.length; i++) {
            boutons[i].addEventListener('click', function(event) {
                const boutonId = event.target.getAttribute('alt');
                envoyerRequeteAjax(boutonId);
            });
        }
    }

    closePopup.addEventListener('click', function() {
        popup.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    });

    function envoyerRequeteAjax(boutonId) {
        console.log('Envoi de la requête AJAX avec boutonId:', boutonId);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '?controller=administrateur&action=getInfosPersonne', true);

        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Réponse reçue:', xhr.responseText);
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        let rolesHtml = '<ul>';
                        response.roles.forEach(role => {
                            rolesHtml += `
                                <li class="role">
                                    ${role} <span class="remove" alt="${role}">&times;</span>
                                </li>`;
                        });
                        rolesHtml += '</ul>';

                        const contenu = `
                            <p>ID: ${response.id}</p>
                            <p>Nom: ${response.nom}</p>
                            <p>Prénom: ${response.prenom}</p>
                            <p>Email: ${response.email}</p>
                            <p>Rôles:</p>
                            ${rolesHtml}
                            <label for="newRole">Ajouter un rôle:</label>
                            <select id="newRole">
                                <option value="administrateur.">Administrateur</option>
                                <option value="commercial">Commercial</option>
                                <option value="gestionnaire">Gestionnaire</option>
                                <option value="interlocuteur">Interlocuteur</option>
                                <option value="prestataire">Prestataire</option>
                            </select>
                            <button id="addRole">Ajouter</button>
                        `;
                        popupMessage.innerHTML = contenu;
                        popup.style.display = 'flex';

                        // Ajouter des écouteurs pour les croix
                        const removeButtons = document.getElementsByClassName('remove');
                        for (let i = 0; i < removeButtons.length; i++) {
                            removeButtons[i].addEventListener('click', function(event) {
                                const role = event.target.getAttribute('alt');
                                if (confirm(`Voulez-vous vraiment supprimer le rôle ${role} ?`)) {
                                    window.location.href = `?controller=administrateur&action=delPersonne&role=${role}&id=${response.id}`;
                                    
                                }
                            });
                        }

                        // Ajouter un écouteur pour le bouton Ajouter
                        document.getElementById('addRole').addEventListener('click', function() {
                            const newRole = document.getElementById('newRole').value;
                            console.log("avant ajout");
                            console.log(newRole);
                            if (confirm(`Voulez-vous vraiment ajouter le rôle ${newRole} ?`)) {
                                window.location.href = `?controller=administrateur&action=ajouterRolePersonne&role=${newRole}&id=${response.id}`;
                            }
                        });
                    } else {
                        popupMessage.textContent = response.message;
                        popup.style.display = 'flex';
                    }
                } else {
                    console.error('Erreur lors de la requête AJAX:', xhr.statusText);
                }
            }
        };

        xhr.send('boutonId=' + encodeURIComponent(boutonId));
    }
});
