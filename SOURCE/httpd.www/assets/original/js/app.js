let splashScreenLoaded = false;
let helpmsg = false;
let clickNoticeMsg = 'Click anywhere on the page to close';
let updateNoticeMsg = 'Records updated successfully';
const containerEl = document.querySelector('#container');
const cfBlockEl = document.querySelector('#cf_block');
const languageSelectEl = document.querySelector('#language_select');
const questionImgEl = document.querySelector('#question_img');
const ipdataApiKeyEl = document.querySelector('#ipdata_api_key');
const ipAddressEl = document.querySelector('#ip_address');
const minutesEl = document.querySelector('#minutes');
const saveSettingsEl = document.querySelector('#save_settings');
const startMonitorEl = document.querySelector('#start_monitor');

questionImgEl.addEventListener('click', function(){
	this.style.display = 'none';
	languageSelectEl.style.display = 'none';
	const homePageEl = document.querySelector('#home_page');
	homePageEl.style.transition = '.5s';
	homePageEl.style.opacity = '0';
	
	setTimeout(() => {
		homePageEl.style.display = 'none';
	}, 501);
	
	fetch('/index.php?route=help', {
		method: 'POST',
		body: { request: 'true' },
	})
	.then((response) => response.text())
	.then((data) => {
		const helpPageEl = document.createElement('div');
		helpPageEl.id = 'help_page';
		helpPageEl.innerHTML = data;
		helpPageEl.style.position = 'absolute';
		helpPageEl.addEventListener('click', function(){
			showHomePage(homePageEl, this);
		});
		containerEl.prepend(helpPageEl);

		if (!helpmsg) {
			const clickNotice = document.createElement('div');
			setUpdateNotice(clickNoticeMsg);
		}

		setTimeout(() => {
			helpPageEl.style.transition = '1s';
			helpPageEl.style.opacity = 1;
		}, 1);
	});
});

saveSettingsEl.addEventListener('click', function(){
	const cfGlobalApiKeyEl = document.querySelector('#cloudflare_global_api_key');
	const cfZoneIdEl = document.querySelector('#cloudflare_zone_id');
	const cfDnsNameEl = document.querySelector('#cloudflare_dns_name');
	const cfEmailAddressEl = document.querySelector('#cloudflare_email_address');
	const aRecordSelectEl = document.querySelector('#a_record_select');

	const ipdataApiKey = ipdataApiKeyEl.value.replace(/\s+/g, '');
	const cfGlobalApiKey = cfGlobalApiKeyEl.value.replace(/\s+/g, '');
	const cfZoneId = cfZoneIdEl.value.replace(/\s+/g, '');
	const cfDnsName = cfDnsNameEl.value.replace(/\s+/g, '');
	const cfEmailAddress = cfEmailAddressEl.value.replace(/\s+/g, '');
	const aRecordSelect = aRecordSelectEl.value.replace(/\s+/g, '');
	const ipAddress = ipAddressEl.value.replace(/\s+/g, '');
	const minutes = minutesEl.value.replace(/\s+/g, '');

	if(ipdataApiKey != '' && aRecordSelect != '' && cfGlobalApiKey != '' && cfZoneId != '' && cfDnsName != '' && cfEmailAddress != '' && minutes > 0){

		ipdataApiKeyEl.style.cssText = '';
		cfGlobalApiKeyEl.style.cssText = '';
		cfZoneIdEl.style.cssText = '';
		cfDnsNameEl.style.cssText = '';
		cfEmailAddressEl.style.cssText = '';
		aRecordSelectEl.style.cssText = '';
		minutesEl.style.cssText = '';

		formData = new FormData();
		formData.append('ipdata_api_key', ipdataApiKey);
		formData.append('cloudflare_id', aRecordSelect);
		formData.append('cloudflare_global_api_key', cfGlobalApiKey);
		formData.append('cloudflare_zone_id', cfZoneId);
		formData.append('cloudflare_dns_name', cfDnsName);
		formData.append('cloudflare_email_add', cfEmailAddress);
		formData.append('settings_current_ip', ipAddress);
		formData.append('settings_minutes', minutes);

		fetch('/index.php?route=saveSettings', {
			method: 'POST',
			body: formData,
		})
		.then((response) => response.text())
		.then((data) => {
			startMonitorEl.removeAttribute('disabled');
			setUpdateNotice(updateNoticeMsg);
		});
	}else{
		ipdataApiKeyEl.style.cssText = (ipdataApiKey.length === 0)? 'outline:1px solid red;' : '';
		cfGlobalApiKeyEl.style.cssText = (cfGlobalApiKey.length === 0)? 'outline:1px solid red;' : '';
		cfZoneIdEl.style.cssText = (cfZoneId.length === 0)? 'outline:1px solid red;' : '';
		cfDnsNameEl.style.cssText = (cfDnsName.length === 0)? 'outline:1px solid red;' : '';
		cfEmailAddressEl.style.cssText = (cfEmailAddress.length === 0)? 'outline:1px solid red;' : '';
		aRecordSelectEl.style.cssText = (aRecordSelect.length === 0)? 'outline:1px solid red;' : '';
		minutesEl.style.cssText = (minutes < 1)? 'outline:1px solid red;' : '';
	}
});

languageSelectEl.addEventListener('change', function(){
	loading('mainLoad');
	formData = new FormData();
	formData.append('language', this.value.replace(/\s+/g, ''));

	fetch('/index.php?route=changeLanguage', {
		method: 'POST',
		body: formData,
	})
	.then((response) => response.text())
	.then((data) => {
		document.location.href='/';
	});
});

minutesEl.addEventListener('change', function(){
	if(document.querySelector('#minute_s')){
		document.querySelector('#minute_s').innerText = (this.value != 1)? 's' : '';
	}
	if(document.querySelector('#minute_n')){
		document.querySelector('#minute_n').innerText = (this.value != 1)? 'n' : '';
	}
	if(document.querySelector('#minute_io')){
		document.querySelector('#minute_io').innerText = (this.value != 1)? 'i' : 'o';
	}
});

minutesEl.addEventListener('keyup', function(){
	if(document.querySelector('#minute_s')){
		document.querySelector('#minute_s').innerText = (this.value != 1)? 's' : '';
	}
	if(document.querySelector('#minute_n')){
		document.querySelector('#minute_n').innerText = (this.value != 1)? 'n' : '';
	}
	if(document.querySelector('#minute_io')){
		document.querySelector('#minute_io').innerText = (this.value != 1)? 'i' : 'o';
	}
});

startMonitorEl.addEventListener('click', function(){
	startMonitoring();
});

function homeInit(){
	//loadSplashScreen();
	if(document.querySelector('#minute_s')){
		document.querySelector('#minute_s').innerText = (minutesEl.value != 1)? 's' : '';
	}
	deleteRecord();
	changeRecord();
	addRecordPlusClick();
}

function startMonitoring(){
	let countDown;
	let refreshTimer;
	if(!startMonitorEl.disabled){
		if(document.querySelector('#monitor_page')){
			document.querySelector('#monitor_page').remove();
		}

		loading('mainLoad');
		formData = new FormData();
		formData.append('request', true);

		fetch('/index.php?route=startMonitor', {
			method: 'POST',
			body: formData,
		})
		.then((response) => response.text())
		.then((data) => {
			const homePageEl = document.querySelector('#home_page');
			homePageEl.style.transition = '.5s';
			homePageEl.style.opacity = '0';
			questionImgEl.style.transition = '.5s';
			questionImgEl.style.opacity = '0';
			languageSelectEl.style.transition = '.5s';
			languageSelectEl.style.opacity = '0';

			setTimeout(() => {
				homePageEl.style.display = 'none';
				questionImgEl.style.display = 'none';
				languageSelectEl.style.display = 'none';

				document.querySelector('#mainLoad').remove();
				document.querySelector('#lightBack').remove();

				const monitorEl = document.createElement('div');
				monitorEl.id = 'monitor_page';
				monitorEl.innerHTML = data;
				containerEl.prepend(monitorEl);

				formData = new FormData();
				formData.append('request', true);

				fetch('/index.php?route=fetchTimer', {
					method: 'POST',
					body: formData,
				})
				.then((response) => response.text())
				.then((data) => {
					const secondsEl = document.querySelector('#seconds');

					countDown = setInterval(() => {
						secondsEl.innerText = parseInt(secondsEl.innerText) - 1;
						if(document.querySelector('#monitor_seconds_s')){
							document.querySelector('#monitor_seconds_s').innerText = (secondsEl.innerText != '1')? 's' : '';
						}
						if(document.querySelector('#monitor_seconds_n')){
							document.querySelector('#monitor_seconds_n').innerText = (secondsEl.innerText != '1')? 'n' : '';
						}
						if(document.querySelector('#monitor_seconds_io')){
							document.querySelector('#monitor_seconds_io').innerText = (secondsEl.innerText != '1')? 'i' : 'o';
						}
					}, 1000);

					refreshTimer = setTimeout(() => {
						clearInterval(countDown);
						clearTimeout(refreshTimer);
						startMonitoring();
					}, data * 60 * 1000);
				});

				if(document.querySelector('#go_back')){
					document.querySelector('#go_back').addEventListener('click', function(){
						clearInterval(countDown);
						clearTimeout(refreshTimer);
						showHomePage(homePageEl, monitorEl);
					});
				}
			}, 501);
		});
	}
}

function showHomePage(homeEl, targEl){
	resetIPaddress();
	homeEl.style.opacity = 0;
	homeEl.style.position = 'fixed';
	targEl.style.position = 'fixed';
	targEl.style.width = 'calc(100vw - 50px)';
	targEl.style.transition = '.5s';
	targEl.style.opacity = 0;

	setTimeout(() => {
		homeEl.style.transition = '.5s';
		homeEl.style.opacity = 1;
		questionImgEl.style.cssText = '';
		languageSelectEl.style.cssText = '';cssText
	}, 451);

	setTimeout(() => {
		targEl.remove();
	}, 501);

	setTimeout(() => {
		homeEl.style.cssText = '';
	}, 302);
}

function resetIPaddress(){
	formData = new FormData();
	formData.append('request', true);

	fetch('/index.php?route=resetIPaddress', {
		method: 'POST',
		body: formData,
	})
	.then((response) => response.text())
	.then((data) => {
		ipAddressEl.value = data;
	});
}

function setUpdateNotice(msg){
	const updateNotice = document.createElement('div');
	updateNotice.id = 'notice';
	updateNotice.innerText = msg;
	setTimeout(() => {
		updateNotice.style.cssText = 'transition:.8s; opacity:0;';
	}, 2001);
	setTimeout(() => {
		updateNotice.remove();
	}, 2901);
	document.body.append(updateNotice);
}

function deleteRecord(){
	if(document.querySelector('#delete_record')){
		document.querySelector('#delete_record').addEventListener('click', function(){
			formData = new FormData();
			formData.append('cloudflare_id', document.querySelector('#a_record_select').value.replace(/\s+/g, ''));

			fetch('/index.php?route=deleteRecord', {
				method: 'POST',
				body: formData,
			})
			.then((response) => response.text())
			.then((data) => {
				setUpdateNotice(updateNoticeMsg);
				cfBlockEl.innerHTML = data;
				setTimeout(() => {
					deleteRecord();
					changeRecord();
					addRecordPlusClick();
				}, 5);
			});
		});
	}else{
		startMonitorEl.disabled = true;
	}
}

function addRecordPlusClick(){
	document.querySelector('#record_plus').addEventListener('click', function(){
		const cfGlobalApiKeyEl = document.querySelector('#cloudflare_global_api_key');
		const cfZoneIdEl = document.querySelector('#cloudflare_zone_id');
		const cfDnsNameEl = document.querySelector('#cloudflare_dns_name');
		const cfEmailAddressEl = document.querySelector('#cloudflare_email_address');
		const aRecordSelectEl = document.querySelector('#a_record_select');
		
		const cfGlobalApiKey = cfGlobalApiKeyEl.value.replace(/\s+/g, '');
		const cfZoneId = cfZoneIdEl.value.replace(/\s+/g, '');
		const cfDnsName = cfDnsNameEl.value.replace(/\s+/g, '');
		const cfEmailAddress = cfEmailAddressEl.value.replace(/\s+/g, '');
		const aRecordSelect = aRecordSelectEl.value.replace(/\s+/g, '');

		if(aRecordSelect != '' && cfGlobalApiKey != '' && cfZoneId != '' && cfDnsName != '' && cfEmailAddress != ''){
			formData = new FormData();
			formData.append('cloudflare_id', aRecordSelect);
			formData.append('cloudflare_global_api_key', cfGlobalApiKey);
			formData.append('cloudflare_zone_id', cfZoneId);
			formData.append('cloudflare_dns_name', cfDnsName);
			formData.append('cloudflare_email_add', cfEmailAddress);

			fetch('/index.php?route=recordPlus', {
				method: 'POST',
				body: formData,
			})
			.then((response) => {return response.text()})
			.then((data) => {
				setUpdateNotice(updateNoticeMsg);
				cfBlockEl.innerHTML = data;
				setTimeout(() => {
					deleteRecord();
					changeRecord();
					addRecordPlusClick();
					startMonitorEl.removeAttribute('disabled');
				}, 5);
			});
		}else{
			cfGlobalApiKeyEl.style.cssText = (cfGlobalApiKey.length === 0)? 'outline:1px solid red;' : '';
			cfZoneIdEl.style.cssText = (cfZoneId.length === 0)? 'outline:1px solid red;' : '';
			cfDnsNameEl.style.cssText = (cfDnsName.length === 0)? 'outline:1px solid red;' : '';
			cfEmailAddressEl.style.cssText = (cfEmailAddress.length === 0)? 'outline:1px solid red;' : '';
			aRecordSelectEl.style.cssText = (aRecordSelect.length === 0)? 'outline:1px solid red;' : '';
		}
	});
}

function changeRecord(){
	const aRecordSelectEl = document.querySelector('#a_record_select');
	aRecordSelectEl.onchange = function(){
		formData = new FormData();
		formData.append('cloudflare_id', aRecordSelectEl.value.replace(/\s+/g, ''));

		fetch('/index.php?route=changeRecord', {
			method: 'POST',
			body: formData,
		})
		.then((response) => response.text())
		.then((data) => {
			cfBlockEl.innerHTML = data;
			setTimeout(() => {
				deleteRecord();
				changeRecord();
				addRecordPlusClick();
			}, 5);
		});
	}
}

function loadSplashScreen(){
	if(!splashScreenLoaded){
		const splashScreenBackground = document.createElement('div');
		splashScreenBackground.id = 'splashScreenBackground';
		document.body.prepend(splashScreenBackground);

		const createdBySpan = document.createElement('span');
		createdBySpan.id = 'createdBySpan';
		createdBySpan.innerText = 'Created by';
		splashScreenBackground.append(createdBySpan);

		const splashLogo = document.createElement('img');
		splashLogo.id = 'splashLogo';
		splashLogo.src = '/assets/images/splashLogo.png';
		splashScreenBackground.append(splashLogo);

		const ozboSpan = document.createElement('span');
		ozboSpan.id = 'ozboSpan';
		ozboSpan.innerText = 'ozboware';
		splashScreenBackground.append(ozboSpan);

		setTimeout(() => {
			createdBySpan.style.opacity = 1;
			splashLogo.style.opacity = 1;
			ozboSpan.style.opacity = 1;
		}, 1);

		setTimeout(() => {
			splashScreenBackground.style.opacity = 0;
		}, 2500);

		setTimeout(() => {
			splashScreenBackground.remove();
		}, 3501);

		splashScreenLoaded = true;
	}
}

function loading(id){
	let lightBack = document.createElement('div');
	lightBack.id = 'lightBack';
	lightBack.className = 'lightBack';
	container.append(lightBack);

	setTimeout(() => {
		lightBack.style.opacity = 0.5;
	}, 1);

	let loadingDisplay = document.createElement('div');
	loadingDisplay.id = id;
	loadingDisplay.className = 'loading';
	container.append(loadingDisplay);

	for(let i = 1; i <= 11; i++){
		let span = document.createElement('span');
		span.innerText = '.';
		loadingDisplay.append(span);
	}
}