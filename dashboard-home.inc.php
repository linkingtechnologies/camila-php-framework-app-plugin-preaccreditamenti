<?php
$camilaWT  = new CamilaWorkTable();
$camilaWT->db = $_CAMILA['db'];

$eSheet = $camilaWT->getWorktableSheetId('EVENTI');

$camilaUI->openBox();

$query = 'SELECT Id, ${Eventi.Nome}, ${Eventi.Data Inizio}, ${Eventi.Data Fine}, ${Eventi.Descrizione} FROM ${Eventi} WHERE ${Eventi.Stato Preaccreditamento}=\'Aperto\' ORDER BY ${Eventi.Data Inizio} DESC';
$result = $camilaWT->startExecuteQuery($query);
$events = [];
while (!$result->EOF) {
	$f = $result->fields;

	$events[] =	[
		'start' => (new DateTime($f[2]))->format(camila_get_locale_date_adodb_format()),
		'end' => (new DateTime($f[3]))->format(camila_get_locale_date_adodb_format()),
		'label' => $f[1],
		'description' => $f[4],
		'buttons' => [
			['label' => 'Preaccreditamento', 'url' => '?dashboard=event&id='.$f[0], 'class' => 'is-small is-primary']
		]
	];

	$result->MoveNext();
}

$camilaUI->addTimelineSection($events, 'ri-calendar-check-line');

$camilaUI->closeBox();
?>