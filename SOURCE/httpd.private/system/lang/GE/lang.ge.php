<?php
//notifications
$GLOBALS['lang']['not']['click_notice'] = 'Klicken Sie irgendwo auf der Seite, um sie zu schließen';
$GLOBALS['lang']['not']['update_notice'] = 'Datensätze erfolgreich aktualisiert';

//home page
$GLOBALS['lang']['ipdata_api_key'] = 'ipdata API-Schlüssel';
$GLOBALS['lang']['cloudflare_global_api_key'] = 'CloudFlare-Global-API-Schlüssel';
$GLOBALS['lang']['cloudflare_zone_id'] = 'CloudFlare-Zonen-ID';
$GLOBALS['lang']['cloudflare_dns_name'] = 'CloudFlare-DNS-A-Name';
$GLOBALS['lang']['cloudflare_email_address'] = 'CloudFlare-E-Mail-Adresse';
$GLOBALS['lang']['delete_record'] = 'Datensatz löschen';
$GLOBALS['lang']['add_another_record'] = 'Weiteren Datensatz hinzufügen';
$GLOBALS['lang']['current_ipv4_address'] = 'Aktuelle IPv4-Adresse';
if(isset($GLOBALS['lang']['minutes'])){
	$GLOBALS['lang']['minute_check_message'] = '<span class="minute_span">Überprüfe alle </span><input type="number" class="form_input" id="minutes" value="'.$GLOBALS['lang']['minutes'].'" min="1"><span class="minute_span"> Minute<span id="minute_n">n</span></span>';
}
$GLOBALS['lang']['save_settings'] = 'Einstellungen speichern';
$GLOBALS['lang']['begin_monitoring'] = 'Überwachung beginnen';

//help page
$GLOBALS['lang']['help']['para_one'] = 'Um diese Software zu nutzen, benötigen Sie ein <strong>ipData</strong>-Konto.';
$GLOBALS['lang']['help']['li_a_one'] = 'Gehen Sie zunächst zu <a href="https://ipdata.co/" target="_blank">ipdata.co</a>.';
$GLOBALS['lang']['help']['li_a_two'] = 'Klicken Sie in der oberen rechten Ecke auf <strong>Sign Up For Free</strong>.';
$GLOBALS['lang']['help']['li_a_three'] = 'Geben Sie auf der folgenden Seite Ihre <strong>E-Mail-Adresse</strong> und <strong>Passwort</strong> ein.';
$GLOBALS['lang']['help']['li_a_four'] = 'Bestätigen Sie Ihre E-Mail-Adresse.';
$GLOBALS['lang']['help']['li_a_five'] = '<strong>Melden Sie sich</strong> bei Ihrem ipdata-Konto an.';
$GLOBALS['lang']['help']['li_a_six'] = 'Klicken Sie im Menü auf der linken Seite des Dashboards auf <strong>API Settings</strong>.';
$GLOBALS['lang']['help']['li_a_seven'] = 'Auf der folgenden Seite wird Ihr <strong>API-Schlüssel</strong> angezeigt. Geben Sie diesen in das Feld <strong>ipdata API key</strong> ein.';
$GLOBALS['lang']['help']['li_b_one'] = 'Melden Sie sich in Ihrem <strong>CloudFlare</strong>-Konto an.';
$GLOBALS['lang']['help']['li_b_two'] = 'Wählen Sie die <strong>Domain</strong> aus, an der Sie arbeiten möchten.';
$GLOBALS['lang']['help']['li_b_three'] = 'In den <strong>Schnellaktionen</strong> auf der rechten Seite des <strong>Übersicht</strong>-Bildschirms scrollen Sie zu <strong>API</strong>. Ihre <strong>Zonen-ID</strong> wird dort aufgelistet. Kopieren Sie diese in das Eingabefeld <strong>CloudFlare-Zonen-ID</strong>.';
$GLOBALS['lang']['help']['li_b_four'] = 'Klicken Sie zurück auf <strong>CloudFlare</strong> auf <strong>Holen Sie sich Ihren API-Token</strong>.';
$GLOBALS['lang']['help']['li_b_five'] = 'Klicken Sie auf der folgenden Seite auf die Schaltfläche <strong>Anzeigen</strong> für <strong>Global API Key</strong>. Kopieren Sie den Schlüssel in das Eingabefeld <strong>CloudFlare-Global-API-Schlüssel</strong>.';
$GLOBALS['lang']['help']['li_b_six'] = 'Gehen Sie als Nächstes zu Ihren <strong>DNS-Einträgen</strong> und kopieren Sie das <strong>Name</strong>-Feld Ihres <strong>A-Eintrags</strong> in das Eingabefeld <strong>CloudFlare DNS-Name</strong>.';
$GLOBALS['lang']['help']['li_b_seven'] = 'Geben Sie abschließend die mit dem <strong>CloudFlare-Konto</strong> verknüpfte <strong>E-Mail-Adresse</strong> ein.';
$GLOBALS['lang']['help']['li_b_eight'] = 'Wenn Sie <strong>mehrere Einträge</strong> hinzufügen möchten, klicken Sie auf <strong>weiteren Eintrag hinzufügen</strong> und <strong>wiederholen</strong> Sie die obigen Schritte für <strong>jeden</strong> Eintrag.';
$GLOBALS['lang']['help']['para_two'] = 'Geben Sie Ihre <strong>aktuelle IP-Adresse</strong> an. Dies ist <strong>optional</strong>, Sie könnten es <strong>leer lassen</strong> und es ausfüllen lassen, wenn Sie mit der Überwachung beginnen.';
$GLOBALS['lang']['help']['para_three'] = 'Stellen Sie die <strong>Anzahl der Minuten zwischen den Überprüfungen</strong> ein. Die Standardeinstellung beträgt 10 Minuten, das <strong>Minimum</strong> ist 1 Minute.';
$GLOBALS['lang']['help']['para_four'] = 'Klicken Sie auf <strong>Einstellungen speichern</strong>. Nach dem <strong>Speichern</strong> sollten Sie auf <strong>Überwachung beginnen</strong> klicken können.';

//monitor
$GLOBALS['lang']['monitor']['err_one'] = 'Es ist ein Fehler aufgetreten. Ihr ipData-API-Schlüssel wurde nicht festgelegt. Gehen Sie zurück und versuchen Sie es erneut.';
$GLOBALS['lang']['monitor']['err_two'] = 'Es ist ein Fehler aufgetreten. Es gibt entweder keine CloudFlare-Einträge oder der bereitgestellte Eintrag ist nicht vollständig.';
$GLOBALS['lang']['monitor']['err_three'] = 'Es ist ein Fehler aufgetreten. Der für ipData bereitgestellte API-Schlüssel ist wahrscheinlich falsch. Konnte Ihre aktuelle IP-Adresse nicht abrufen.';
$GLOBALS['lang']['monitor']['last_checked'] = 'Zuletzt überprüft: ';
if(isset($GLOBALS['lang']['monitor']['ip_address'])){
	$GLOBALS['lang']['monitor']['msg_one_a'] = 'Ihre IP-Adresse wurde auf '.$GLOBALS['lang']['monitor']['ip_address'].' festgelegt.';
	$GLOBALS['lang']['monitor']['msg_one_b'] = 'Ihre IP-Adresse ist '.$GLOBALS['lang']['monitor']['ip_address'];
}
$GLOBALS['lang']['monitor']['msg_two_a'] = 'Es ist ein Fehler aufgetreten. Einer oder mehrere Ihrer Cloudflare-Einträge sind falsch. Bitte gehen Sie zurück und überprüfen Sie erneut.';
$GLOBALS['lang']['monitor']['msg_two_b'] = 'Es ist ein Fehler aufgetreten. Einer oder mehrere Ihrer Cloudflare-Namen existieren nicht. Bitte gehen Sie zurück und überprüfen Sie erneut.';
$GLOBALS['lang']['monitor']['msg_two_c'] = 'CloudFlare-Namen gefunden<p class="monitor_msg_block">CloudFlare-Einträge aktualisiert</p>';
$GLOBALS['lang']['monitor']['msg_two_d'] = 'Keine Aktualisierung erforderlich';
if(isset($GLOBALS['lang']['monitor']['seconds'])){
	$GLOBALS['lang']['monitor']['check_msg'] = 'Wird in <span id="seconds">'.$GLOBALS['lang']['monitor']['seconds'].'</span> Sekunde<span id="monitor_seconds_n">n</span>';
}
$GLOBALS['lang']['monitor']['go_back'] = 'Zurück';