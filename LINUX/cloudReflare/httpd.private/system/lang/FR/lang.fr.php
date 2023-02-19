<?php
//splashscreen
$GLOBALS['lang']['splash']['created_by'] = 'Créé par';

//notifications
$GLOBALS['lang']['not']['click_notice'] = 'Cliquez n\'importe où sur la page pour fermer';
$GLOBALS['lang']['not']['update_notice'] = 'Enregistrements mis à jour avec succès';

//home page
$GLOBALS['lang']['ipdata_api_key'] = 'Clé d\'API ipdata';
$GLOBALS['lang']['cloudflare_global_api_key'] = 'Clé API globale de CloudFlare';
$GLOBALS['lang']['cloudflare_zone_id'] = 'Identifiant de zone CloudFlare';
$GLOBALS['lang']['cloudflare_dns_name'] = 'Nom DNS A de CloudFlare';
$GLOBALS['lang']['cloudflare_email_address'] = 'Adresse e-mail CloudFlare';
$GLOBALS['lang']['delete_record'] = 'Supprimer l\'enregistrement';
$GLOBALS['lang']['add_another_record'] = 'Ajouter un autre enregistrement';
$GLOBALS['lang']['current_ipv4_address'] = 'Adresse IPv4 actuelle';
if(isset($GLOBALS['lang']['minutes'])){
	$GLOBALS['lang']['minute_check_message'] = '<span class="minute_span">Vérifier toutes les </span><input type="number" class="form_input" id="minutes" value="'.$GLOBALS['lang']['minutes'].'" min="1"><span class="minute_span"> minute<span id="minute_s"></span></span>';
}
$GLOBALS['lang']['save_settings'] = 'Enregistrer les paramètres';
$GLOBALS['lang']['begin_monitoring'] = 'Commencer la surveillance';

//help page
$GLOBALS['lang']['help']['para_one'] = 'Pour utiliser ce logiciel, vous aurez besoin d\'un compte <strong>ipData</strong>.';
$GLOBALS['lang']['help']['li_a_one'] = 'Pour commencer, allez sur <a href="https://ipdata.co/" target="_blank">ipdata.co</a>.';
$GLOBALS['lang']['help']['li_a_two'] = 'Cliquez sur <strong>Inscrivez-vous gratuitement</strong> dans le coin supérieur droit.';
$GLOBALS['lang']['help']['li_a_three'] = 'Sur l\'écran suivant, ajoutez votre <strong>adresse e-mail</strong> et votre <strong>mot de passe</strong>.';
$GLOBALS['lang']['help']['li_a_four'] = '<strong>Vérifiez</strong> votre adresse e-mail.';
$GLOBALS['lang']['help']['li_a_five'] = '<strong>Connectez-vous</strong> à votre compte ipdata.';
$GLOBALS['lang']['help']['li_a_six'] = 'Dans le menu à gauche du tableau de bord, cliquez sur <strong>Paramètres API</strong>.';
$GLOBALS['lang']['help']['li_a_seven'] = 'Sur la page suivante, votre <strong>clé API</strong> sera affichée; entrez-la dans le champ <strong>ipdata API key</strong>.';
$GLOBALS['lang']['help']['li_b_one'] = 'Connectez-vous à votre compte <strong>CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_two'] = 'Sélectionnez le <strong>domaine</strong> que vous souhaitez gérer.';
$GLOBALS['lang']['help']['li_b_three'] = 'Dans les <strong>Actions rapides</strong> à droite de l\'écran <strong>Vue d\'ensemble</strong>, faites défiler jusqu\'à <strong>API</strong>. Votre <strong>ID de zone</strong> y sera répertorié. Copiez cela dans le champ de saisie <strong>CloudFlare zone ID</strong>.';
$GLOBALS['lang']['help']['li_b_four'] = 'De retour sur <strong>CloudFlare</strong>, cliquez sur <strong>Obtenir votre jeton d\'API</strong>.';
$GLOBALS['lang']['help']['li_b_five'] = 'Sur la page suivante, cliquez sur le bouton <strong>view</strong> pour <strong>Global API Key</strong>. Copiez la clé dans le champ de saisie <strong>CloudFlare global API key</strong>.';
$GLOBALS['lang']['help']['li_b_six'] = 'Ensuite, accédez à vos <strong>enregistrements DNS</strong> et copiez le champ <strong>nom</strong> de votre <strong>enregistrement A</strong> dans le champ de saisie <strong>CloudFlare DNS Name</strong>.';
$GLOBALS['lang']['help']['li_b_seven'] = 'Enfin, ajoutez l\'<strong>adresse e-mail</strong> associée au <strong>compte CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_eight'] = 'Si vous souhaitez ajouter <strong>plusieurs enregistrements</strong>, cliquez sur <strong>Ajouter un autre enregistrement</strong> et <strong>répétez</strong> les étapes ci-dessus pour <strong>chaque</strong> enregistrement.';
$GLOBALS['lang']['help']['para_two'] = 'Incluez votre <strong>adresse IP actuelle</strong>. Cela est <strong>facultatif</strong>, vous pouvez le laisser <strong>vide</strong> et le remplir automatiquement lorsque vous commencez à surveiller.';
$GLOBALS['lang']['help']['para_three'] = 'Définissez le <strong>nombre de minutes entre chaque vérification</strong>. La valeur par défaut est de 10 minutes, le <strong>minimum</strong> est de 1 minute.';
$GLOBALS['lang']['help']['para_four'] = 'Cliquez sur <strong>Enregistrer les paramètres</strong>. Une fois <strong>enregistré</strong>, vous devriez pouvoir cliquer sur <strong>Démarrer la surveillance</strong>.';

//monitor
$GLOBALS['lang']['monitor']['err_one'] = 'Une erreur s\'est produite. Votre clé API ipData n\'a pas été définie. Revenez en arrière et essayez à nouveau';
$GLOBALS['lang']['monitor']['err_two'] = 'Une erreur s\'est produite. Il n\'y a pas de dossiers CloudFlare ou le dossier fourni n\'est pas complet';
$GLOBALS['lang']['monitor']['err_three'] = 'Une erreur s\'est produite. La clé API fournie pour ipData est probablement incorrecte. Impossible de récupérer votre adresse IP actuelle';
$GLOBALS['lang']['monitor']['last_checked'] = 'Dernière vérification : ';
if(isset($GLOBALS['lang']['monitor']['ip_address'])){
	$GLOBALS['lang']['monitor']['msg_one_a'] = 'votre adresse IP a été définie sur '.$GLOBALS['lang']['monitor']['ip_address'];
	$GLOBALS['lang']['monitor']['msg_one_b'] = 'votre adresse IP est '.$GLOBALS['lang']['monitor']['ip_address'];
}
$GLOBALS['lang']['monitor']['msg_two_a'] = 'Une erreur s\'est produite. Un ou plusieurs de vos enregistrements cloudflare est incorrect. Veuillez revenir en arrière et vérifier à nouveau';
$GLOBALS['lang']['monitor']['msg_two_b'] = 'Une erreur s\'est produite. Un ou plusieurs de vos noms cloudflare n\'existent pas. Veuillez revenir en arrière et vérifier à nouveau';
$GLOBALS['lang']['monitor']['msg_two_c'] = 'Nom(s) cloudFlare trouvé(s)<p class="monitor_msg_block">enregistrement(s) cloudFlare mis à jour</p>';
$GLOBALS['lang']['monitor']['msg_two_d'] = 'Aucune mise à jour nécessaire';
if(isset($GLOBALS['lang']['monitor']['seconds'])){
	$GLOBALS['lang']['monitor']['check_msg'] = 'Vérifier de nouveau dans <span id="seconds">'.$GLOBALS['lang']['monitor']['seconds'].'</span> seconde<span id="monitor_seconds_s">s</span>';
}
$GLOBALS['lang']['monitor']['go_back'] = 'Retour';