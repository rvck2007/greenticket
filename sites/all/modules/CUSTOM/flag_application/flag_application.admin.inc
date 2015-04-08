<?php

/**
* @file
* Flag Application administration
*/

function flag_application_form($form, $form_state) {

	$form = array();

	// Création de la variable $header, qui contient l'entête du tableau
	
	$header = array(
		'title' => t('Flagged Content'),
		'name' => t('Username'),
		'entity_id' => t('Node ID'),
		'uid' => t('User ID'),
		'flagging_id' => t('Flag ID'),
		'status' => t('Status'),
	);
	
	$sql = db_select('flag_application', 'fa')->extend('PagerDefault');
	
	$sql->join('flagging', 'f', 'f.flagging_id = fa.flagging_id');
	$sql->join('node', 'n', 'f.entity_id = n.nid');
	$sql->join('users', 'u', 'f.uid = u.uid');


	$sql
		->fields('fa', array('status'))
		->fields('f', array('entity_id', 'timestamp', 'flagging_id'))
		->fields('n', array('title'))
		->fields('u', array('name', 'uid'))
		->orderBy('timestamp', 'DESC')
		->limit(25);

	// Exécuter la requête :

	$results = $sql->execute();


	// Récupération du résultat de la requête dans le tableau $rows

	/*
	
	$txt = '';

	foreach ($results as $result) {
		$txt .= ' ' . $result->title;
		$txt .= ' ' . $result->name;
		$txt .= ' ' . $result->entity_id;
		$txt .= ' ' . $result->uid;
		$txt .= ' ' . $result->flagging_id;
		$txt .= ' ' . $result->status;
		$txt .= '<br />';
	}


	$form['txt']['#markup'] = $txt;
	*/

	$rows = array();

	
	foreach ($results as $result) {
		switch ($result->status) {
			case 0:
				$status = 'Pending';
				break;
			case 1:
				$status = 'Approved';
				break;
			case 2:
				$status = 'Denied';
				break;
		} // fin switch
	
		$rows[] = array(
			'title' => l($result->title, 'node/'.$result->entity_id),
			'name' => l($result->name, 'user/'.$result->uid),
			'entity_id' => $result->entity_id,
			'uid' => $result->uid,
			'flagging_id' => $result->flagging_id,
			'status' => $status,
			'#attributes' => array('class' => array('application-row')),
			);
	
	} // fin foreach


	$form['flag_application_status']['approvedeny'] = array(
		'#type' => 'select',
		'#title' => 'Actions',
		'#options' => array(
			1 => t('Approve'),
			2 => t('Deny'),
			),
		);

	$form['flag_application_table'] = array(
		'#type' => 'tableselect',
		'#header' => $header,
		'#options' => $rows,
		'#empty' => t('No applications found.'),
		'#attributes' => array('class' => array('applications')),
		);
	
	$form['pager'] = array('#markup' => theme('pager'));
	

	$form['submit'] = array(
		'#type' => 'submit',
		'#value' => t('Submit'),
		);
	
	

	return $form;
}



function flag_application_form_submit($form, $form_state) {

	$action = $form_state['values']['approvedeny'];
	
	$values = array();

	foreach ($form_state['values']['flag_application_table'] as $key => $value) {
		if (is_string($value) == TRUE) {
			$values[] = $form_state['complete form']['flag_application_table']['#options'][$value];
		}
	}

	flag_application_administration($action, $values);
}


function flag_application_form_validate($form, $form_state) {
	 
	if($form_state['values']['approvedeny'] != 1 && $form_state['values']['approvedeny'] != 2) {
		form_set_error('approvedeny', "You have provided an incorrect value");
	}
}


function flag_application_administration($action, $values) {
	
	$status = ($action == 1) ? 'Approved' : 'Denied';

	foreach($values as $key => $value) {
		$num_updated = db_update('flag_application')
			->fields(array('status' => $action))
			->condition('flagging_id', $value['flagging_id'])
			->execute();


		watchdog('flag_application', t("!name's application for !node was !status",
			array('!name' => $value['name'], '!node' => $value['title'], '!status'=>$status)));
	}
}

