<?php

	Class extension_maintenance_mode implements iExtension{

		public function about(){
			return (object)array('name' => 'Maintenance Mode',
						 'version' => '1.2',
						 'release-date' => '2010-02-02',
						 'type' => array('Core'),
						 'author' => (object)array('name' => 'Alistair Kearney',
										   'website' => 'http://pointybeard.com',
										   'email' => 'alistair@pointybeard.com')
				 		);
		}
		
		public function getSubscribedDelegates(){
			return array(
						array(
							'page' => '/system/settings/extensions/',
							'delegate' => 'AddSettingsFieldsets',
							'callback' => 'cbAppendPreferences'
						),
						
						array(
							'page' => '/system/settings/extensions/',
							'delegate' => 'CustomSaveActions',
							'callback' => 'cbSavePreferences'
						),
						
						array(
							'page' => '/system/settings/',
							'delegate' => 'CustomActions',
							'callback' => 'cbToggleMaintenanceMode'
						),

						array(
							'page' => '/frontend/',
							'delegate' => 'FrontendPreInitialise',
							'callback' => 'cbCheckForMaintenanceMode'
						),
							
						array(
							'page' => '/frontend/',
							'delegate' => 'FrontendPreRender',
							'callback' => 'cbAddParam'
						),						
						
						array(
							'page' => '/backend/',
							'delegate' => 'AppendPageAlert',
							'callback' => 'cbAppendAlert'
						),				

					);
		}
		
		public function cbToggleMaintenanceMode($context){
			
			if($_REQUEST['action'] == 'toggle-maintenance-mode'){			
				$value = (Symphony::Configuration()->{'maintenance-mode'}()->enabled == 'no' ? 'yes' : 'no');
				Symphony::Configuration()->{'maintenance-mode'}()->enabled = $value;
				Symphony::Configuration()->{'maintenance-mode'}()->save();
				redirect((isset($_REQUEST['redirect']) ? ADMIN_URL . '' . $_REQUEST['redirect'] : Symphony::Parent()->getCurrentPageURL() . '/'));
			}
			
		}
		
		public function cbAppendAlert($context){
			
			//if(!is_null($context['alert'])) return;
			
			if(Symphony::Configuration()->{'maintenance-mode'}()->enabled == 'yes'){
				Administration::instance()->Page->alerts()->append(__('This site is currently in maintenance mode.') . ' <a href="' . ADMIN_URL . '/system/settings/extensions/?action=toggle-maintenance-mode&amp;redirect=' . getCurrentPage() . '">' . __('Restore?') . '</a>', AlertStack::NOTICE);
			}
		}
		
		public function cbAddParam($context){
			$context['parameters']->{'site-mode'} = (Symphony::Configuration()->{'maintenance-mode'}()->enabled == 'yes' ? 'maintenance' : 'live'); 
		}
		
		public function cbCheckForMaintenanceMode($context){
			if(!Symphony::Parent()->isLoggedIn() && Symphony::Configuration()->{'maintenance-mode'}()->enabled == 'yes'){
				$context['view'] = end(View::findFromType('maintenance'));
				if(!($context['view'] instanceof View)){
					throw new FrontendPageNotFoundException;
				}
			}
		}
		
		public function cbSavePreferences($context){
			
			Symphony::Configuration()->{'maintenance-mode'}()->enabled = (isset($_POST['maintenance-mode']['enabled']) && $_POST['maintenance-mode']['enabled'] == 'yes')
				? 'yes'
				: 'no';
				
			Symphony::Configuration()->{'maintenance-mode'}()->save();
		}

		public function cbAppendPreferences($context){

			$group = Administration::instance()->Page->createElement('fieldset');
			$group->setAttribute('class', 'settings');
			$group->appendChild(Administration::instance()->Page->createElement('h3', __('Maintenance Mode'))); 
			
			$label = Widget::Label();
			$input = Widget::Input('maintenance-mode[enabled]', 'yes', 'checkbox');
			if(Symphony::Configuration()->{'maintenance-mode'}()->enabled == 'yes') $input->setAttribute('checked', 'checked');
			$label->appendChild($input);
			$label->appendChild(new DOMText(' ' . __('Enable maintenance mode')));
			$group->appendChild($label);
						
			$group->appendChild(Administration::instance()->Page->createElement(
				'p', 
				__('Maintenance mode will redirect all visitors, other than developers, to the specified maintenance page.'),
				array('class' => 'help')
			));
									
			$context['fieldsets'][] = $group;
						
		}
		
	}
	
	return 'extension_maintenance_mode';