import './bootstrap';
import './libs/trix';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

if (document.getElementById('createFormation') || document.getElementById('editFormation')) {

    const addModules = document.getElementsByClassName('addModule');
    const up = document.getElementsByClassName('up');
    const down = document.getElementsByClassName('down');
    const deleteModule = document.getElementsByClassName('deleteModule');
    const closeModal = document.getElementsByClassName('closeModal');

    if (document.getElementsByClassName('formationModule')) {
        var count = document.getElementsByClassName('formationModule').length;
    }

    const affectedModules = document.getElementById('affectedModules');
    const activeModule = document.getElementById('activeModule');
    const modules = document.getElementById('modules');
    const searchModule = document.getElementById('searchModule');

    for (let i = 0; i < addModules.length; i++) {
        addModules[i].addEventListener('click', function () {
            insertModule(this);
        })
    }

    // on affiche la liste des modules en cliquant sur le bouton "ajouter"
    activeModule.addEventListener('click', function () {
        modules.classList.toggle('hidden')
    })

    // la barre de recherche
    searchModule.addEventListener('input', function () {
        for (let i = 0; i < addModules.length; i++) {
            
            if (addModules[i].getAttribute('data-name').toLowerCase().includes(searchModule.value)) {
                addModules[i].parentElement.classList.remove('hidden');
            } else {
                addModules[i].parentElement.classList.add('hidden');
            }
        }
    })

    // ajout d'élément lors d'un click sur "+"
    function insertModule(element) {
        
        // on ajout un élément à la formation (côté gauche) à chaque fois qu'on appuie sur le "+" à côté d'un module
        affectedModules.innerHTML += `<li data-order="${count}" data-module-id='${element.getAttribute('data-id')}' data-hours='${element.getAttribute('data-hours')}' data-days='${element.getAttribute('data-days')}' class='formationModule px-2 duration-1000 flex w-full justify-between'>` + element.getAttribute('data-name') + '<input type="hidden" value="'+element.getAttribute('data-id')+'" name="module_id[]"><div class="flex items-center"><span class="up cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg></span><span class="down cursor-pointer my-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/></svg></span><span class="checkedShowModuleInfo"><label for="'+element.getAttribute('data-ref')+'"><svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></label><input class="hidden" type="radio" name="showModule" id="'+element.getAttribute('data-ref')+'"><div class="moduleInfo z-10 shadow-md bg-slate-50 px-2 py-1 w-[calc(25vw-0.75rem)] absolute top-0 right-0"><h2>'+element.getAttribute('data-name')+' - ' + element.getAttribute('data-ref')+'</h2><div>'+element.getAttribute('data-program')+'</div><span class="closeModal cursor-pointer font-bold">Fermer</span></div></span><span class="deleteModule text-xl ml-2">X</span></div></li>';
        count++;

        // active de manière dynamique les listener de up down et delete
        activateListener();

        // on efface les flèches inutile (celle de up quand on est en haut et celle de down quand on est tout en bas)
        removeArrowUpDown();

        // on recalcule la durée totale de la formation avec l'ajout du module
        calcTotalDuration();

        // on remet tout les input radio à false par défaut 
        closeModalInfoModule();
    }

    // monter un element dans la liste
    function elementUp(element,newOrderElement,newOrderFormationModule) {
        const formationModule = document.getElementsByClassName('formationModule');

        if (element.parentElement.parentElement.getAttribute('data-order') != 0 && newOrderElement == -1 || element.parentElement.parentElement.getAttribute('data-order') != (formationModule.length - 1) && newOrderElement == 1) {
            for (let i = 0; i < formationModule.length; i++) {

                if (formationModule[i].getAttribute('data-order') == (parseInt(element.parentElement.parentElement.getAttribute('data-order')) + parseInt(newOrderElement))) {

                    formationModule[i].setAttribute('data-order', parseInt(formationModule[i].getAttribute('data-order')) + parseInt(newOrderFormationModule));

                    if (newOrderElement == -1) {
                        formationModule[i].insertAdjacentElement('beforeBegin',element.parentElement.parentElement);
                        element.parentElement.parentElement.classList.remove('bg-blue-100');
                        element.parentElement.parentElement.classList.add('bg-green-100');

                    } else {
                        formationModule[i].insertAdjacentElement('afterEnd',element.parentElement.parentElement);
                        element.parentElement.parentElement.classList.remove('bg-green-100');
                        element.parentElement.parentElement.classList.add('bg-blue-100');
                    }
                    break;
                }
            }
            element.parentElement.parentElement.setAttribute('data-order', parseInt(element.parentElement.parentElement.getAttribute('data-order')) + parseInt(newOrderElement));
        }
        console.log(element.parentElement.parentElement.getAttribute('data-order'));
        removeArrowUpDown();
    }

    activateListener();
    removeArrowUpDown();

    // descendre un élément dans la liste
    function removeArrowUpDown() {
        for (let i = 0; i < up.length; i++) {
            up[i].classList.remove('hidden')
        }
        
        for (let i = 0; i < up.length; i++) {
            down[i].classList.remove('hidden')
        }
    
        up[0].classList.add('hidden')
        down[down.length - 1].classList.add('hidden')
    }
   
    // on active l'écouteur d'évènement 
    function activateListener() {
        for (let i = 0; i < up.length; i++) {
            up[i].addEventListener('click', function () {
                elementUp(this,-1,1);
            })
        }    
    
        for (let i = 0; i < down.length; i++) {
            down[i].addEventListener('click', function () {
                elementUp(this,1,-1);
            })
        }
    
        for (let i = 0; i < deleteModule.length; i++) {
            deleteModule[i].addEventListener('click', function () {
                removeModule(this);
            })
        }

        for (let i = 0; i < closeModal.length; i++) {
            closeModal[i].addEventListener('click', function () {
                closeModalInfoModule();
            })
        }        
    }

    // supprimer un module de la formation
    function removeModule(element) {
        element.parentElement.parentElement.remove();
        calcTotalDuration();
        closeModalInfoModule();
    }

    // on calcul le temps total en heures et jours de tout les modules sélectionnés 
    function calcTotalDuration() {
        const formationModule = document.getElementsByClassName('formationModule');
        let totalHours = 0;
        let totalDays = 0;
        for (let i = 0; i < formationModule.length; i++) {
           totalDays += parseInt(formationModule[i].getAttribute('data-days'));
           totalHours += parseInt(formationModule[i].getAttribute('data-hours'));
        }
        // on met la valeur du resultat dans l'input hidden dédié
        document.getElementById('resultDurationHours').setAttribute('value',totalHours)
        document.getElementById('resultDurationDays').setAttribute('value',totalDays)
        // on affiche le resultat dans 2 div
        document.getElementById('duration_hours').innerHTML = totalHours
        document.getElementById('duration_days').innerHTML = totalDays
    }

    function closeModalInfoModule() {
        const inputRadio = document.querySelectorAll('input[type=radio]');

        for (let i = 0; i < closeModal.length; i++) {
            console.log(inputRadio[i]);
            inputRadio[i].checked = false
        }
    }
}

Alpine.start();
