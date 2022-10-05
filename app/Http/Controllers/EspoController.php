<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Document;
use App\Models\Formation;
use App\Models\Organization;
use Illuminate\Http\Request;

class EspoController extends Controller
{
    // ajouter l'argument $datas
    public function webhookCreateModule()
    {
        $modules = Module::All();
        $datas = [
            '{
                "id": "633bea573e1ed0086",
                "name": "base HTML",
                "deleted": false,
                "description": "initiation aux bases du html",
                "createdAt": "2022-10-04 08:09:59",
                "modifiedAt": "2022-10-04 08:09:59",
                "program": "<div>Programme :</div><ul><li>Quels outils utiliser</li><li>Qu\'est-ce que le HTML?</li><li>Le langage et ses bases</li></ul>",
                "durationHours": 50,
                "durationDays": 8,
                "domain": "informatique",
                "reference": "HTML2022BASE",
                "createdById": "63218e8081c141491",
                "assignedUserId": "632836db1b7252184"
            }'  
        ];
        
        if ($datas && gettype($datas) == 'array') {        

            foreach ($datas as $data) {
                $data = json_decode($data);

                foreach ($modules as $module) {
                    
                    if (($module -> name == $data -> name) && ($module -> reference == $data -> reference)) {
                        // modifier le champ description par id_crm
                        $module -> description = $data -> id;

                        $module -> save();
                    }
                }
            }
        }
    }

    // ajouter l'argument $datas
    public function webhookCreateFormation()
    {
        $formations = Formation::All();
        $datas = [
            '{
                "id": "633bf8c460ba7406d",
                "name": "tpwebdev2022",
                "deleted": false,
                "description": "les bases du web",
                "createdAt": "2022-10-04 09:11:32",
                "modifiedAt": "2022-10-04 09:11:32",
                "trainingprogram": "[\"12\",\"17\",\"16\"]",
                "evalModality": "None.",
                "financialSolution": "None.",
                "time": "1 heure.",
                "dateAndLocation": "un jour peut-être",
                "prerequisite": "aucun lol",
                "concernedPublic": "je ne sais pas",
                "objective": "on verra sur le moment",
                "durationHours": 187,
                "durationDays": 27,
                "reference": "WEB2022DEV",
                "createdById": "63218e8081c141491",
                "assignedUserId": "632836db1b7252184",
                "assignedUserName": "Anthony MERLIER"
            }'  
        ];
        
        if ($datas && gettype($datas) == 'array') {        

            foreach ($datas as $data) {
                $data = json_decode($data);

                foreach ($formations as $formation) {

                    if (($formation -> name == $data -> name) && ($formation -> reference == $data -> reference)) {
                        $formation -> id_crm = $data -> id;

                        $formation -> save();
                    }
                }
            }
        }
    }

    // ajouter l'argument $datas
    public function webhookCreateOrganization()
    {
        $organizations = Organization::All();
        $datas = [];
        
        if ($datas && gettype($datas) == 'array') {        

            foreach ($datas as $data) {
                $data = json_decode($data);

                foreach ($organizations as $organization) {
                    
                    if (($organization -> name == $data -> name) && ($organization -> reference == $data -> reference)) {
                        $organization -> id_crm = $data -> id;

                        $organization -> save();
                    }
                }
            }
        }
    }

    // ajouter l'argument $datas
    public function webhookCreateUser()
    {
        $users = User::All();
        $datas = [];
        
        if ($datas && gettype($datas) == 'array') {        

            foreach ($datas as $data) {
                $data = json_decode($data);

                foreach ($users as $user) {
                    
                    if (($user -> name == $data -> name) && ($user -> reference == $data -> reference)) {
                        $user -> id_crm = $data -> id;

                        $user -> save();
                    }
                }
            }
        }
    }

    // ajouter l'argument $datas
    public function webhookCreateDocument()
    {
        $documents = Document::All();
        $datas = [];
        
        if ($datas && gettype($datas) == 'array') {        

            foreach ($datas as $data) {
                $data = json_decode($data);

                foreach ($documents as $document) {
                    
                    if (($document -> name == $data -> name) && ($document -> reference == $data -> reference)) {
                        $document -> id_crm = $data -> id;

                        $document -> save();
                    }
                }
            }
        }
    }
}
