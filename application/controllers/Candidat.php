<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Candidat extends CI_Controller
{
    //La fonction qui affiche la vue candidat
    public function index()
    {
        $this->load->view('front/candidat/inscription');
    }

    // la fonction qui réupere les donnees du formulaire
    public function traitement_enregistrement()
    {
        // On récupère les infos du formulaire
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $sexe = $this->input->post('sexe');
        $date_n = $this->input->post('date');
        $email = $this->input->post('email');
        $num_tel = $this->input->post('telephone');
        $num_what = $this->input->post('numero-whatsapp');
        $horaire = $this->input->post('horaire');
        $domaine_act = $this->input->post('domaine');
        $type_serv = $this->input->post('service');
        $attentes = $this->input->post('attentes');

        // On valide les informations
        $this->form_validation->set_rules($nom, 'Nom', 'required|max_length[250]');
		$this->form_validation->set_rules($prenom, 'Prenom', 'required');
		$this->form_validation->set_rules($num_tel, 'Telephone', 'required');
		$this->form_validation->set_rules($num_what, 'Numero-whatsapp', 'required');
		$this->form_validation->set_rules($email, 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
		$this->form_validation->set_rules($sexe, 'Sexe', 'required');
		$this->form_validation->set_rules($date_n, 'Date', 'required');
		$this->form_validation->set_rules($domaine_act, 'Domaine', 'required');
		$this->form_validation->set_rules($type_serv, 'Service', 'required');
		$this->form_validation->set_rules($attentes, 'Attentes', 'required');
		$this->form_validation->set_rules($horaire, 'Horaire', 'required');

        // On crée un candidat
        $candidat = new Candidat_model();

        $candidat->nom_prenom = $nom.' '.$prenom;
        $candidat->num_tel = $num_tel;
        $candidat->num_what = $num_what;
        $candidat->email = $email;
        $candidat->sexe = $sexe;
        $candidat->date_n = $date_n;
        $candidat->domaine_act = $domaine_act;
        $candidat->type_serv = $type_serv;
        $candidat->attentes = $attentes;
        $candidat->horaire = $horaire;

        // On enregistre le candidat dans la base de données
        $succes = $candidat->s_enregistrer();

        // On le redirige en fonction du résultat de la requete
        if ($succes) {
            $message = 'Bonjour '.($sexe = 'M' ? 'M.' : 'Mme.').' '.$candidat->nom_prenom.", \n\nNous avons bien recu votre inscrion au programme de formation Ecole 241 Business destiné aux commerçants et artisants.
            \n\nCi-dessous, les informations que vous avez fourni lors de votre enregistrement.\n\nMerci pour la confiance accordée, nous vous disons à bientôt.\n\n L'équipe Ecole 241 Business.";

            // On envoie un mail au candidat
            mail($email, 'Ecole 241 Business - Inscription', $message);

            redirect('candidat/inscription_reussi');
        } else {
            redirect('candidat');
        }
    }

    public function inscription_reussi()
    {
        $this->load->view('front/candidat/message_inscription');
    }
}
