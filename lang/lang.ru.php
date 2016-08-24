<?php

	$about = array(
		'name' => 'Русский',
		'author' => array(
			'name' => 'Александр Бирюков',
			'email' => 'info@alexbirukov.ru',
			'website' => 'http://alexbirukov.ru'
		),
		'release-date' => '2016-08-24'
	);

	/**
	 * Maintenance Mode
	 */
	$dictionary = array(

		'Enable maintenance mode' => 
		'Включить режим обслуживания',

		'Maintenance Mode' => 
		'Режим обслуживания',

		'Maintenance mode will redirect all visitors, other than developers, to the specified maintenance page. To specify a maintenance page, give a page a type of <code>maintenance</code>' => 
		'В режиме обслуживания все посетители сайта будут перенаправлены на специальную страницу. Для установки страницы обсуживания, установите для необходимой страницы тип <code>maintenance</code>',

		'Restore?' => 
		'Восстановить?',

		'This site is currently in maintenance mode.' => 
		'В настойщий момент сайт находится на реконструкции.',

		'This site is currently in maintenance. Please check back at a later date.' => 
		'Сайт находится на реконструкции. Пожалуйста, попробуйте зайти позже.',

		'Website Offline' => 
		'Веб сайт в режиме офлайн',

		'IP Whitelist' => 
		'Белый список IP адресов',

		'Any user that has an IP listed above will be granted access. This eliminates the need to allow a user backend access. Separate each with a space.' => 
		'Любому пользователю, чей IP адрес находится в данном списке, будет предоставлен полный доступ. Это избавляет от необходимости назначения пользователей для доступа к backend. Адреса следует разделить пробелами.',

		'Useragent Whitelist' => 
		'Белый список Useragent',

		'Any useragent that listed above will be granted access. This eliminates the need to allow a user backend access, useful when third party services need to access your site prior to launch. Insert in json array format eg ["useragent1","useragent2"].' => 
		'Любому useragent, указанному в списке, будет предоставлен полный доступ. Это избавляет от необходимости указания данных  пользователей для сторонних сервисов, которым необходимо предоставить доступ к сайту. Список необходимо указывать в формате массива json, пример: ["useragent1","useragent2"]',

	);
