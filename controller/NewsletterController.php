<?php

namespace Combis\Controller;

use \Combis\Model\NewsletterManager;

require_once('model/NewsletterManager.php');

class NewsletterController
{
    public function newsletter()
    {
        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $newsletterManager = new NewsletterManager();
            $email = $newsletterManager->getNewsletter();
            if (!$email) {
                $newsletter = $newsletterManager->insertNewsletter();
                $text = 'Bienvenue à la newsletter';
            } else {
                $text = 'Vous êtes déjà inscrit';
            }
            require('view/frontend/newsletterView.php');
        } else {
            header('Location: home');
            exit;
        }
    }
}
