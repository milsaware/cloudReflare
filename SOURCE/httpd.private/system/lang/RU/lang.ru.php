<?php
//notifications
$GLOBALS['lang']['not']['click_notice'] = 'Нажмите где угодно на странице, чтобы закрыть';
$GLOBALS['lang']['not']['update_notice'] = 'Записи успешно обновлены';

//home page
$GLOBALS['lang']['ipdata_api_key'] = 'Ключ API ipdata';
$GLOBALS['lang']['cloudflare_global_api_key'] = 'Глобальный API-ключ CloudFlare';
$GLOBALS['lang']['cloudflare_zone_id'] = 'ID зоны CloudFlare';
$GLOBALS['lang']['cloudflare_dns_name'] = 'DNS-имя A записи CloudFlare';
$GLOBALS['lang']['cloudflare_email_address'] = 'Адрес электронной почты CloudFlare';
$GLOBALS['lang']['delete_record'] = 'Удалить запись';
$GLOBALS['lang']['add_another_record'] = 'Добавить еще одну запись';
$GLOBALS['lang']['current_ipv4_address'] = 'Текущий IPv4-адрес';
if(isset($GLOBALS['lang']['minutes'])){
	$GLOBALS['lang']['minute_check_message'] = '<span class="minute_span">Проверять каждые </span><input type="number" class="form_input" id="minutes" value="'.$GLOBALS['lang']['minutes'].'" min="1"><span class="minute_span"> минут</span>';
}
$GLOBALS['lang']['save_settings'] = 'Сохранить настройки';
$GLOBALS['lang']['begin_monitoring'] = 'Начать мониторинг';

//help page
$GLOBALS['lang']['help']['para_one'] = 'Для использования этого программного обеспечения вам понадобится учетная запись <strong>ipData</strong>.';
$GLOBALS['lang']['help']['li_a_one'] = 'Для начала перейдите на <a href="https://ipdata.co/" target="_blank">ipdata.co</a>.';
$GLOBALS['lang']['help']['li_a_two'] = 'Нажмите <strong>Зарегистрироваться бесплатно</strong> в правом верхнем углу.';
$GLOBALS['lang']['help']['li_a_three'] = 'На следующем экране добавьте свой <strong>адрес электронной почты</strong> и <strong>пароль</strong>.';
$GLOBALS['lang']['help']['li_a_four'] = '<strong>Подтвердите</strong> свой адрес электронной почты.';
$GLOBALS['lang']['help']['li_a_five'] = '<strong>Войдите в</strong> свою учетную запись ipdata.';
$GLOBALS['lang']['help']['li_a_six'] = 'В меню слева на панели инструментов нажмите <strong>API Settings</strong>.';
$GLOBALS['lang']['help']['li_a_seven'] = 'На следующей странице будет отображен ваш <strong>API-ключ</strong>; введите его в поле ввода <strong>ipdata API key</strong>.';
$GLOBALS['lang']['help']['li_b_one'] = 'Войдите в свою учетную запись <strong>CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_two'] = 'Выберите <strong>домен</strong>, над которым вы хотите работать.';
$GLOBALS['lang']['help']['li_b_three'] = 'В <strong>Quick actions</strong> справа на странице <strong>Overview</strong> прокрутите вниз до <strong>API</strong>. Ваш <strong>Zone ID</strong> будет указан там. Скопируйте его в поле ввода <strong>CloudFlare zone ID</strong>.';
$GLOBALS['lang']['help']['li_b_four'] = 'Вернувшись на страницу <strong>CloudFlare</strong>, нажмите <strong>Get your API token</strong>.';
$GLOBALS['lang']['help']['li_b_five'] = 'На следующей странице нажмите кнопку <strong>view</strong> для <strong>Global API Key</strong>. Скопируйте ключ в поле ввода <strong>CloudFlare global API key</strong>.';
$GLOBALS['lang']['help']['li_b_six'] = 'Затем перейдите к вашим <strong>DNS-записям</strong> и скопируйте <strong>имя</strong> поля вашей <strong>A-записи</strong> в поле ввода <strong>CloudFlare DNS Name</strong>.';
$GLOBALS['lang']['help']['li_b_seven'] = 'Наконец, добавьте <strong>адрес электронной почты</strong>, связанный с учетной записью <strong>CloudFlare</strong>.';
$GLOBALS['lang']['help']['li_b_eight'] = 'Если вы хотите добавить <strong>несколько записей</strong>, нажмите на <strong>Add another record</strong> и <strong>повторите</strong> вышеуказанные шаги для <strong>каждой</strong> записи.';
$GLOBALS['lang']['help']['para_two'] = 'Укажите <strong>ваш текущий IP-адрес</strong>. Это <strong>необязательно</strong>, вы можете оставить это <strong>пустым</strong> и заполнить его при начале мониторинга.';
$GLOBALS['lang']['help']['para_three'] = 'Установите <strong>количество минут между проверками</strong>. По умолчанию установлено 10 минут, <strong>минимальное</strong> значение - 1 минута.';
$GLOBALS['lang']['help']['para_four'] = 'Нажмите на <strong>Сохранить настройки</strong>. После сохранения вы сможете нажать на <strong>Начать мониторинг</strong>.';

//monitor
$GLOBALS['lang']['monitor']['err_one'] = 'Произошла ошибка. Ваш API-ключ ipData не был установлен. Вернитесь назад и попробуйте еще раз';
$GLOBALS['lang']['monitor']['err_two'] = 'Произошла ошибка. Нет записей CloudFlare или предоставленная запись неполная';
$GLOBALS['lang']['monitor']['err_three'] = 'Произошла ошибка. API-ключ, предоставленный для ipData, вероятно, неправильный. Невозможно получить ваш текущий IP-адрес';
$GLOBALS['lang']['monitor']['last_checked'] = 'Последняя проверка: ';
if(isset($GLOBALS['lang']['monitor']['ip_address'])){
	$GLOBALS['lang']['monitor']['msg_one_a'] = 'Ваш IP-адрес был установлен как '.$GLOBALS['lang']['monitor']['ip_address'];
	$GLOBALS['lang']['monitor']['msg_one_b'] = 'Ваш текущий IP-адрес - '.$GLOBALS['lang']['monitor']['ip_address'];
}
$GLOBALS['lang']['monitor']['msg_two_a'] = 'Произошла ошибка. Один или несколько ваших записей в Cloudflare неверны. Пожалуйста, вернитесь и проверьте еще раз.';
$GLOBALS['lang']['monitor']['msg_two_b'] = 'Произошла ошибка. Одно или несколько ваших имён Cloudflare не существуют. Пожалуйста, вернитесь и проверьте еще раз.';
$GLOBALS['lang']['monitor']['msg_two_c'] = 'Найдены имена cloudFlare <p class="monitor_msg_block">обновлены записи cloudFlare</p>';
$GLOBALS['lang']['monitor']['msg_two_d'] = 'Обновление не требуется';
if(isset($GLOBALS['lang']['monitor']['seconds'])){
	$GLOBALS['lang']['monitor']['check_msg'] = 'Будет проверено снова через <span id="seconds">'.$GLOBALS['lang']['monitor']['seconds'].'</span> секунд<span id="monitor_seconds_s">ы</span>';
}
$GLOBALS['lang']['monitor']['go_back'] = 'Назад';