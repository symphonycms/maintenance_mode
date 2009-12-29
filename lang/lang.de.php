<?php

	$about = array(
		'name' => 'Deutsch',
		'author' => array(
			'name' => 'Nils Hörrmann',
			'email' => 'post@nilshoerrmann.de'
		),
		'release-date' => '2009-12-29'
	);
	
	
	/*
	 * EXTENSION: Maintenance Mode
	 * Localisation strings
	 */

	$dictionary += array(
	
		'Maintenance Mode' => 
		'Wartungsmodus',

		'Enable maintenance mode' => 
		'Wartungsmodus aktivieren',

		'Maintenance mode will redirect all visitors, other than developers, to the specified maintenance page.' => 
		'Der Wartungsmodus leitet alle Besucher, die nicht als Entwickler registriert sind, auf eine festgelegte Wartungsseite um (Seitentyp: <code>maintenance</code>).',

		'This site is currently in maintenance mode. <a href="%s/symphony/system/preferences/?action=toggle-maintenance-mode&amp;redirect=%s">Restore?</a>' => 
		'Diese Seite ist derzeit im Wartungsmodus. <a href="%s/symphony/system/preferences/?action=toggle-maintenance-mode&amp;redirect=%s">Seite freischalten?</a>',

		'Website Offline' => 
		'Webseite offline',

		'This site is currently in maintenance. Please check back at a later date.' => 
		'Diese Seite ist derzeit im Wartungsmodus. Bitte versuchen Sie es später noch einmal.'

	);
