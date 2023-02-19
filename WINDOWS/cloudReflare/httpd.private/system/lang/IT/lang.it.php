<?php
//splashscreen
$GLOBALS['lang']['splash']['created_by'] = 'Creato da';

//notifications
$GLOBALS['lang']['not']['click_notice'] = 'Fare clic ovunque sulla pagina per chiudere';
$GLOBALS['lang']['not']['update_notice'] = 'Record aggiornati con successo';

//home page
$GLOBALS['lang']['ipdata_api_key'] = 'Chiave API ipdata';
$GLOBALS['lang']['cloudflare_global_api_key'] = 'Chiave API globale CloudFlare';
$GLOBALS['lang']['cloudflare_zone_id'] = 'ID zona CloudFlare';
$GLOBALS['lang']['cloudflare_dns_name'] = 'Nome A DNS CloudFlare';
$GLOBALS['lang']['cloudflare_email_address'] = 'Indirizzo email CloudFlare';
$GLOBALS['lang']['delete_record'] = 'Elimina record';
$GLOBALS['lang']['add_another_record'] = 'Aggiungi un altro record';
$GLOBALS['lang']['current_ipv4_address'] = 'Indirizzo IPv4 corrente';
if(isset($GLOBALS['lang']['minutes'])){
	$GLOBALS['lang']['minute_check_message'] = '<span class="minute_span">Controlla ogni </span><input type="number" class="form_input" id="minutes" value="'.$GLOBALS['lang']['minutes'].'" min="1"><span class="minute_span"> minut<span id="minute_io">i</span></span>';
}
$GLOBALS['lang']['save_settings'] = 'Salva le impostazioni';
$GLOBALS['lang']['begin_monitoring'] = 'Inizia il monitoraggio';

//help page
$GLOBALS['lang']['help']['para_one'] = 'Per utilizzare questo software, avrai bisogno di un account <strong>ipData</strong>.';
$GLOBALS['lang']['help']['li_a_one'] = 'Per iniziare, vai su <a href="https://ipdata.co/" target="_blank">ipdata.co</a>.';
$GLOBALS['lang']['help']['li_a_two'] = 'Fai clic su <strong>Iscriviti gratuitamente</strong> nell\'angolo in alto a destra.';
$GLOBALS['lang']['help']['li_a_three'] = 'Nella schermata seguente, aggiungi il tuo <strong>indirizzo email</strong> e la <strong>password</strong>.';
$GLOBALS['lang']['help']['li_a_four'] = '<strong>Verifica</strong> il tuo indirizzo email.';
$GLOBALS['lang']['help']['li_a_five'] = '<strong>Accedi</strong> al tuo account ipdata.';
$GLOBALS['lang']['help']['li_a_six'] = 'Nel menu sulla sinistra della dashboard, fai clic su <strong>API Settings</strong>.';
$GLOBALS['lang']['help']['li_a_seven'] = 'Nella pagina successiva, verrà visualizzata la tua <strong>API key</strong>; inseriscila nell\'input <strong>ipdata API key</strong>.';


$GLOBALS['lang']['help']['li_b_one'] = 'Accedi al tuo account <strong>CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_two'] = 'Seleziona il <strong>dominio</strong> su cui desideri lavorare.';
$GLOBALS['lang']['help']['li_b_three'] = 'In <strong>Quick actions</strong> sulla destra della schermata <strong>Overview</strong>, scorri verso il basso fino a <strong>API</strong>. Il tuo <strong>Zone ID</strong> verrà elencato lì. Copia quello nell\'input <strong>CloudFlare zone ID</strong>.';
$GLOBALS['lang']['help']['li_b_four'] = 'Torna su <strong>CloudFlare</strong>, clicca su <strong>Ottieni il tuo token API</strong>.';
$GLOBALS['lang']['help']['li_b_five'] = 'Nella pagina seguente, clicca il pulsante <strong>view</strong> per <strong>Global API Key</strong>. Copia la chiave nell\'input <strong>CloudFlare global API key</strong>.';
$GLOBALS['lang']['help']['li_b_six'] = 'Successivamente, vai alle tue <strong>registrazioni DNS</strong> e copia il campo <strong>name</strong> del tuo <strong>record A</strong> nell\'input <strong>CloudFlare DNS Name</strong>.';
$GLOBALS['lang']['help']['li_b_seven'] = 'Infine, aggiungi l\'<strong>indirizzo email</strong> associato all\'<strong>account CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_eight'] = 'Se vuoi aggiungere <strong>record multipli</strong>, clicca su <strong>Aggiungi un altro record</strong> e <strong>ripeti</strong> i passaggi precedenti per <strong>ogni</strong> record.';


$GLOBALS['lang']['help']['para_two'] = 'Includi il tuo <strong>indirizzo IP corrente</strong>. Questo è <strong>opzionale</strong>, potresti lasciarlo <strong>vuoto</strong> e farlo compilare quando inizi a monitorare.';
$GLOBALS['lang']['help']['para_three'] = 'Imposta il <strong>numero di minuti tra i controlli</strong>. Il valore predefinito è di 10 minuti, il <strong>minimo</strong> richiesto è di 1 minuto.';
$GLOBALS['lang']['help']['para_four'] = 'Fai clic su <strong>Salva impostazioni</strong>. Una volta <strong>salvate</strong>, dovresti essere in grado di fare clic su <strong>Inizia monitoraggio</strong>.';

//monitor
$GLOBALS['lang']['monitor']['err_one'] = 'Si è verificato un errore. La chiave API di ipData non è stata impostata. Torna indietro e riprova.';
$GLOBALS['lang']['monitor']['err_two'] = 'Si è verificato un errore. Non ci sono record CloudFlare o il record fornito non è completo.';
$GLOBALS['lang']['monitor']['err_three'] = 'Si è verificato un errore. La chiave API fornita per ipData è probabilmente errata. Impossibile recuperare il tuo indirizzo IP corrente.';
$GLOBALS['lang']['monitor']['last_checked'] = 'Ultimo controllo: ';
if(isset($GLOBALS['lang']['monitor']['ip_address'])){
	$GLOBALS['lang']['monitor']['msg_one_a'] = 'Il tuo indirizzo IP è stato impostato su '.$GLOBALS['lang']['monitor']['ip_address'];
	$GLOBALS['lang']['monitor']['msg_one_b'] = 'Il tuo indirizzo IP è '.$GLOBALS['lang']['monitor']['ip_address'];
}
$GLOBALS['lang']['monitor']['msg_two_a'] = 'Si è verificato un errore. Uno o più dei tuoi record cloudflare sono errati. Per favore, torna indietro e controlla nuovamente';
$GLOBALS['lang']['monitor']['msg_two_b'] = 'Si è verificato un errore. Uno o più dei tuoi nomi cloudflare non esistono. Per favore, torna indietro e controlla nuovamente';
$GLOBALS['lang']['monitor']['msg_two_c'] = 'Nomi cloudFlare trovati<p class="monitor_msg_block">Record cloudFlare aggiornati</p>';
$GLOBALS['lang']['monitor']['msg_two_d'] = 'Nessun aggiornamento necessario';
if(isset($GLOBALS['lang']['monitor']['seconds'])){
	$GLOBALS['lang']['monitor']['check_msg'] = 'Controllerà nuovamente tra <span id="seconds">'.$GLOBALS['lang']['monitor']['seconds'].'</span> second<span id="monitor_seconds_io">i</span>';
}
$GLOBALS['lang']['monitor']['go_back'] = 'Torna indietro';