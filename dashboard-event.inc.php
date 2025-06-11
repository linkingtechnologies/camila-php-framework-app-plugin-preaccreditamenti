<?php
$camilaWT  = new CamilaWorkTable();
$camilaWT->db = $_CAMILA['db'];

$eSheet = $camilaWT->getWorktableSheetId('EVENTI');

$camilaUI->openBox();
$camilaUI->addGridSection(2, function ($colIndex) use ($camilaUI, $eSheet) {
	switch ($colIndex) {
		case 0:
			$arr = [];
			$arr['camilakey_id'] = $_GET['id'];
			$camilaUI->insertTitle('Preaccreditamento', 'user');
			$camilaUI->insertButton('cf_worktable'.$eSheet.'.php?camila_update=' . urlencode(serialize($arr)) . '&camila_token=' . camila_token(serialize($arr)), 'Registrazione volontario', 'plus');
			break;
		case 1:
			$arr = [];
			$arr['camilakey_id'] = $_GET['id'];
			$camilaUI->insertTitle('Modulistica', 'user');
			$camilaUI->insertButton('cf_worktable'.$eSheet.'.php?camila_update=' . urlencode(serialize($arr)) . '&camila_token=' . camila_token(serialize($arr)) . '&camila_xml2pdf', 'Modulo', 'plus');
			break;
	}
});
$camilaUI->closeBox();
?>