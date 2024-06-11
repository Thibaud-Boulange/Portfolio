<?php

class Controller_login extends Controller
{

    /**
     * @inheritDoc
     */
    public function action_default()
    {
        $this->action_login_form();
    }

    public function action_login_form()
    {   
        session_unset(); 
        $this->render("login");
    }

    /**sonne)
);
CREATE TABLE
saes4=# INSERT INTO MOT_DE_PASSE (id_personne, mdp)
SELECT id_personne, mdp FROM PERSONNE;
INSERT 0 11
saes4=# ALTER TABLE PERSONNE DROP COLUMN mdp;
ALTER TABLE
saes4=# -- Étape 1: Créer une nouvelle table pour les mots de passe
CREATE TABLE MOT_DE_PASSE (
    id_personne SERIAL PRIMARY KEY,
    mdp VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_personne) REFERENCES PERSONNE(id_personne)
);

-- Étape 2: Insérer les mots de passe de la table PERSONNE vers la nouvelle table
INSERT INTO MOT_DE_PASSE (id_personne, mdp)
SELECT id_personne, mdp FROM PERSONNE;

-- Étape 3: Supprimer la colonne mdp de la table PERSONNE (optionnel)
ALTER TABLE PERSONNE DROP COLUMN mdp;
     * Vérifie que le mot de passe correspond au mail
     * @return void
     */
    public function action_check_pswd()
    {
        
        $db = Model::getModel();
        if (isset($_POST['mail']) && isset($_POST['password'])) {
            if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST['mail'])) {
                $msg = "Ce n'est pas un email correcte !";
            } else {
                $msg = "L'identifiant ou le mot de passe est incorrect !";
                
                if ($db->checkMailPassword(e($_POST['mail']), e($_POST['password']))) {
                    
                    $role = $db->hasSeveralRoles();
                    if (isset($role['roles'])) {
                        $msg = $role;
                    } else {
                        $_SESSION['role'] = $role;
                        header("Location: index.php?controller=".$_SESSION['role']."&action=default");
                        return;
                    }
                }
            }

            $data = ['response' => $msg];
            $this->render('login', $data);

        }
    }

    public function action_role_choice(){
        
        $db = Model::getModel();
        $role = $db->hasSeveralRoles();
        if (isset($_GET['choice']) && isset($role['roles']) && in_array($_GET['choice'], $role['roles'])){
            $_SESSION['role'] = $_GET['choice'];
            header("Location: index.php?controller=".$_SESSION['role']."&action=default");
            return;
        }
        else {
            $this->action_default();
        }
    }


    /**
     * Cette fonction va être appelée eu fur et à mesure que l'utilisateur tape son email afin de lui indiquer si son email existe
     * Elle vérifie si l'email existe dans la base de donnée, renvoie true si oui, false sinon
     * @return bool
     */
    public function action_check_mail()
    {
        $mailExisting = false;

        if (isset($_POST['mail'])) {
            $mail = e($_POST['mail']);
            //à chiffrer
            $bd = Model::getModel();
            $mailExisting = $bd->mailExists($mail);
        }

        return $mailExisting;
    }


}

