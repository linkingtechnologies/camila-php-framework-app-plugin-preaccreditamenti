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
			$camilaUI->insertTitle('Preaccreditamento', 'survey');
			$camilaUI->insertButton('cf_worktable'.$eSheet.'.php?camila_update=' . urlencode(serialize($arr)) . '&camila_token=' . camila_token(serialize($arr)), 'Preaccreditamento volontari, mezzi e materiali', 'plus');
			break;
		case 1:
			$arr = [];
			$arr['camilakey_id'] = $_GET['id'];
			$camilaUI->insertTitle('Modulistica', 'article');
			$camilaUI->insertButton('cf_worktable'.$eSheet.'.php?camila_update=' . urlencode(serialize($arr)) . '&camila_token=' . camila_token(serialize($arr)) . '&camila_xml2pdf', 'Modulo accreditamento', 'plus');
			break;
	}
});
$camilaUI->closeBox();
?>