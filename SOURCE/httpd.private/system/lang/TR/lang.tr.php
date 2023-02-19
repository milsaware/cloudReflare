<?php
//notifications
$GLOBALS['lang']['not']['click_notice'] = 'Sayfanın herhangi bir yerine tıklayarak kapatın';
$GLOBALS['lang']['not']['update_notice'] = 'Kayıtlar başarıyla güncellendi';

//home page
$GLOBALS['lang']['ipdata_api_key'] = 'ipdata API anahtarı';
$GLOBALS['lang']['cloudflare_global_api_key'] = 'CloudFlare global API anahtarı';
$GLOBALS['lang']['cloudflare_zone_id'] = 'CloudFlare bölge kimliği';
$GLOBALS['lang']['cloudflare_dns_name'] = 'CloudFlare DNS A adı';
$GLOBALS['lang']['cloudflare_email_address'] = 'CloudFlare e-posta adresi';
$GLOBALS['lang']['delete_record'] = 'Kaydı sil';
$GLOBALS['lang']['add_another_record'] = 'Başka bir kayıt ekle';
$GLOBALS['lang']['current_ipv4_address'] = 'Mevcut IPv4 adresi';
if(isset($GLOBALS['lang']['minutes'])){
	$GLOBALS['lang']['minute_check_message'] = '<span class="minute_span">Her </span><input type="number" class="form_input" id="minutes" value="'.$GLOBALS['lang']['minutes'].'" min="1"><span class="minute_span"> dakikada bir kontrol et</span>';
}
$GLOBALS['lang']['save_settings'] = 'Ayarları kaydet';
$GLOBALS['lang']['begin_monitoring'] = 'İzlemeye başla';

//help page
$GLOBALS['lang']['help']['para_one'] = 'Bu yazılımı kullanmak için bir <strong>ipData</strong> hesabına ihtiyacınız olacak.';
$GLOBALS['lang']['help']['li_a_one'] = 'Başlamak için <a href="https://ipdata.co/" target="_blank">ipdata.co</a> adresine gidin.';
$GLOBALS['lang']['help']['li_a_two'] = 'Üst sağ köşedeki seçeneğe tıklayın: <strong>Sign Up For Free</strong>.';
$GLOBALS['lang']['help']['li_a_three'] = 'Sonraki ekranda, <strong>e-posta adresinizi</strong> ve <strong>parolanızı</strong> girin.';
$GLOBALS['lang']['help']['li_a_four'] = 'E-posta adresinizi <strong>doğrulayın</strong>.';
$GLOBALS['lang']['help']['li_a_five'] = 'ipdata hesabınıza <strong>giriş yapın</strong>.';
$GLOBALS['lang']['help']['li_a_six'] = 'Gösterge panelinin sol tarafındaki menüde, <strong>API Settings</strong>\'na tıklayın.';
$GLOBALS['lang']['help']['li_a_seven'] = 'Aşağıdaki sayfada, <strong>API anahtarınız</strong> görüntülenecektir; bu anahtarı <strong>ipdata API anahtarı</strong> girdisine girin.';
$GLOBALS['lang']['help']['li_b_one'] = '<strong>CloudFlare</strong> hesabınıza giriş yapın.';
$GLOBALS['lang']['help']['li_b_two'] = 'Seçmek istediğiniz <strong>alan adını</strong> seçin.';
$GLOBALS['lang']['help']['li_b_three'] = 'Sağ taraftaki <strong>Quick actions</strong> ekranında <strong>Overview</strong> bölümünde, <strong>API</strong> seçeneğine kaydırın. Orada <strong>Bölge Kimliğiniz</strong> listelenir. Onu <strong>CloudFlare bölge kimliği</strong> girdi alanına kopyalayın.';
$GLOBALS['lang']['help']['li_b_four'] = 'CloudFlare\'da, <strong>API token\'ınızı alın</strong> butonuna tıklayın.';
$GLOBALS['lang']['help']['li_b_five'] = 'Aşağıdaki sayfada, <strong>Global API Anahtarı</strong> için <strong>görüntüle</strong> düğmesine tıklayın. Anahtarı kopyalayın ve <strong>CloudFlare Global API anahtar</strong>ı girişine yapıştırın.';
$GLOBALS['lang']['help']['li_b_six'] = 'Sonraki adımda, DNS kayıtlarına gidin ve A kaydının ad alanını <strong>CloudFlare DNS Name</strong> girişine kopyalayın.';
$GLOBALS['lang']['help']['li_b_seven'] = 'Son olarak, <strong>CloudFlare hesabınıza ilişkin e-posta adresini</strong> ekleyin.';
$GLOBALS['lang']['help']['li_b_eight'] = 'Birden fazla kayıt eklemek istiyorsanız, <strong>Başka bir kayıt ekle</strong> düğmesine tıklayın ve yukarıdaki adımları <strong>her bir</strong> kayıt için tekrarlayın.';
$GLOBALS['lang']['help']['para_two'] = 'Mevcut <strong>IP adresinizi</strong> dahil edin. Bu <strong>isteğe bağlıdır</strong>, izlemeye başladığınızda otomatik olarak doldurulmasına izin verebilir ve <strong>boş</strong> bırakabilirsiniz.';
$GLOBALS['lang']['help']['para_three'] = '<strong>Kontroller arasındaki dakika sayısını</strong> ayarlayın. Varsayılan değer 10 dakikadır, <strong>minimum</strong> gereklilik 1 dakikadır.';
$GLOBALS['lang']['help']['para_four'] = '<strong>Ayarları kaydet</strong> butonuna tıklayın. Kaydedildikten sonra, <strong>İzlemeye başla</strong> düğmesine tıklayabilirsiniz.';

//monitor
$GLOBALS['lang']['monitor']['err_one'] = 'Hata oluştu. ipData API anahtarınız ayarlanmadı. Lütfen geri gidin ve tekrar deneyin.';
$GLOBALS['lang']['monitor']['err_two'] = 'Bir hata oluştu. Ya hiç CloudFlare kaydı yok ya da sağlanan kayıt eksik.';
$GLOBALS['lang']['monitor']['err_three'] = 'Bir hata oluştu. ipData için sağlanan API anahtarı muhtemelen yanlış. Geçerli IP adresinizi alınamadı.';
$GLOBALS['lang']['monitor']['last_checked'] = 'Son kontrol edildi: ';
if(isset($GLOBALS['lang']['monitor']['ip_address'])){
	$GLOBALS['lang']['monitor']['msg_one_a'] = 'Dikkat: IP adresiniz '.$GLOBALS['lang']['monitor']['ip_address'].' olarak değiştirildi.';
	$GLOBALS['lang']['monitor']['msg_one_b'] = 'IP adresiniz '.$GLOBALS['lang']['monitor']['ip_address'];
}
$GLOBALS['lang']['monitor']['msg_two_a'] = 'Bir hata oluştu. Cloudflare kayıtlarınızdan bir veya daha fazlası yanlış. Lütfen geri dönüp tekrar kontrol edin.';
$GLOBALS['lang']['monitor']['msg_two_b'] = 'Bir hata oluştu. Bir veya daha fazla Cloudflare kaydı yanlış. Lütfen geri gidip tekrar kontrol edin.';
$GLOBALS['lang']['monitor']['msg_two_c'] = 'cloudFlare isim(ler)i bulundu <p class="monitor_msg_block">cloudFlare kaydı(ları) güncellendi</p>';
$GLOBALS['lang']['monitor']['msg_two_d'] = 'No güncelleme gerekli';
if(isset($GLOBALS['lang']['monitor']['seconds'])){
	$GLOBALS['lang']['monitor']['check_msg'] = '<span id="seconds">'.$GLOBALS['lang']['monitor']['seconds'].'</span> saniye içinde tekrar kontrol edeceğim';
}
$GLOBALS['lang']['monitor']['go_back'] = 'Geri git';