<?php
//splashscreen
$GLOBALS['lang']['splash']['created_by'] = 'Creado por';

//notifications
$GLOBALS['lang']['not']['click_notice'] = 'Haz clic en cualquier lugar de la página para cerrar';
$GLOBALS['lang']['not']['update_notice'] = 'Registros actualizados correctamente';

//home page
$GLOBALS['lang']['ipdata_api_key'] = 'Clave API de ipdata';
$GLOBALS['lang']['cloudflare_global_api_key'] = 'Clave API global de CloudFlare';
$GLOBALS['lang']['cloudflare_zone_id'] = 'ID de zona de CloudFlare';
$GLOBALS['lang']['cloudflare_dns_name'] = 'Nombre DNS A de CloudFlare';
$GLOBALS['lang']['cloudflare_email_address'] = 'Dirección de correo electrónico de CloudFlare';
$GLOBALS['lang']['delete_record'] = 'Eliminar registro';
$GLOBALS['lang']['add_another_record'] = 'Agregar otro registro';
$GLOBALS['lang']['current_ipv4_address'] = 'Dirección IPv4 actual';
if(isset($GLOBALS['lang']['minutes'])){
	$GLOBALS['lang']['minute_check_message'] = '<span class="minute_span">Revisar cada </span><input type="number" class="form_input" id="minutes" value="'.$GLOBALS['lang']['minutes'].'" min="1"><span class="minute_span"> minuto<span id="minute_s"></span></span>';
}
$GLOBALS['lang']['save_settings'] = 'Guardar configuración';
$GLOBALS['lang']['begin_monitoring'] = 'Comenzar a monitorear';

//help page
$GLOBALS['lang']['help']['para_one'] = 'Para usar este software, necesitarás una cuenta de <strong>ipData</strong>.';
$GLOBALS['lang']['help']['li_a_one'] = 'Para comenzar, ve a <a href="https://ipdata.co/" target="_blank">ipdata.co</a>.';
$GLOBALS['lang']['help']['li_a_two'] = 'Haz clic en <strong>Regístrate gratis</strong> en la esquina superior derecha.';
$GLOBALS['lang']['help']['li_a_three'] = 'En la siguiente pantalla, ingresa tu <strong>dirección de correo electrónico</strong> y <strong>contraseña</strong>.';
$GLOBALS['lang']['help']['li_a_four'] = '<strong>Verifica</strong> tu dirección de correo electrónico.';
$GLOBALS['lang']['help']['li_a_five'] = '<strong>Inicia sesión</strong> en tu cuenta de ipdata.';
$GLOBALS['lang']['help']['li_a_six'] = 'En el menú del lado izquierdo del panel de control, haz clic en <strong>API Settings</strong>.';
$GLOBALS['lang']['help']['li_a_seven'] = 'En la siguiente página, se mostrará tu <strong>clave API</strong>; ingrésala en el campo <strong>ipdata API key</strong>.';
$GLOBALS['lang']['help']['li_b_one'] = 'Inicie sesión en su cuenta de <strong>CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_two'] = 'Seleccione el <strong>dominio</strong> en el que desea trabajar.';
$GLOBALS['lang']['help']['li_b_three'] = 'En <strong>Acciones rápidas</strong> en el lado derecho de la pantalla <strong>Resumen</strong>, desplácese hacia abajo hasta <strong>API</strong>. Su <strong>ID de zona</strong> aparecerá allí. Copie eso en el campo de entrada <strong>CloudFlare zone ID</strong>.';
$GLOBALS['lang']['help']['li_b_four'] = 'De vuelta en <strong>CloudFlare</strong>, haga clic en <strong>Get your API token</strong>.';
$GLOBALS['lang']['help']['li_b_five'] = 'En la siguiente página, haga clic en el botón <strong>ver</strong> para <strong>Clave de API global</strong>. Copie la clave en el campo de entrada <strong>CloudFlare global API key</strong>.';
$GLOBALS['lang']['help']['li_b_six'] = 'A continuación, vaya a sus <strong>registros DNS</strong> y copie el campo <strong>nombre</strong> de su <strong>registro A</strong> en el campo de entrada <strong>CloudFlare DNS Name</strong>.';
$GLOBALS['lang']['help']['li_b_seven'] = 'Finalmente, agregue la <strong>dirección de correo electrónico</strong> asociada con la <strong>cuenta de CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_eight'] = 'Si desea agregar <strong>múltiples registros</strong>, haga clic en <strong>Agregar otro registro</strong> y <strong>repita</strong> los pasos anteriores para <strong>cada</strong> registro.';
$GLOBALS['lang']['help']['para_two'] = 'Incluya su <strong>dirección IP actual</strong>. Esto es <strong>opcional</strong>, podría dejarlo <strong>en blanco</strong> y se llenará automáticamente cuando comience el monitoreo.';
$GLOBALS['lang']['help']['para_three'] = 'Establezca el <strong>número de minutos entre comprobaciones</strong>. El valor predeterminado es de 10 minutos, el <strong>mínimo</strong> requerido es de 1 minuto.';
$GLOBALS['lang']['help']['para_four'] = 'Haga clic en <strong>Guardar configuración</strong>. Una vez <strong>guardada</strong>, debería poder hacer clic en <strong>Comenzar monitoreo</strong>.';

//monitor
$GLOBALS['lang']['monitor']['err_one'] = 'Se ha producido un error. Su clave de API de ipData no ha sido establecida. Vuelva atrás e inténtelo de nuevo';
$GLOBALS['lang']['monitor']['err_two'] = 'Se ha producido un error. No hay registros de CloudFlare o el registro proporcionado no está completo';
$GLOBALS['lang']['monitor']['err_three'] = 'Se ha producido un error. La clave de API proporcionada para ipData es probablemente incorrecta. No se pudo obtener su dirección IP actual';
$GLOBALS['lang']['monitor']['last_checked'] = 'Última comprobación: ';
if(isset($GLOBALS['lang']['monitor']['ip_address'])){
	$GLOBALS['lang']['monitor']['msg_one_a'] = 'Tu dirección IP ha sido configurada a '.$GLOBALS['lang']['monitor']['ip_address'];
	$GLOBALS['lang']['monitor']['msg_one_b'] = 'Tu dirección IP es '.$GLOBALS['lang']['monitor']['ip_address'];
}
$GLOBALS['lang']['monitor']['msg_two_a'] = 'Ocurrió un error. Uno o más de tus registros de Cloudflare están equivocados. Por favor, vuelve y revisa de nuevo.';
$GLOBALS['lang']['monitor']['msg_two_b'] = 'Ocurrió un error. Uno o más de tus nombres de Cloudflare no existen. Por favor, vuelve y revisa de nuevo.';
$GLOBALS['lang']['monitor']['msg_two_c'] = 'Nombres de CloudFlare encontrados<p class="monitor_msg_block">Registros de CloudFlare actualizados</p>';
$GLOBALS['lang']['monitor']['msg_two_d'] = 'No es necesaria ninguna actualización.';
if(isset($GLOBALS['lang']['monitor']['seconds'])){
	$GLOBALS['lang']['monitor']['check_msg'] = 'Comprobaré de nuevo en <span id="seconds">'.$GLOBALS['lang']['monitor']['seconds'].'</span> segundo<span id="monitor_seconds_s">s</span>';
}
$GLOBALS['lang']['monitor']['go_back'] = 'Volver';