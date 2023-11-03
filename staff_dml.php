<?php

// Data functions (insert, update, delete, form) for table staff

// This script and data application were generated by AppGini 5.70
// Download AppGini for free from https://bigprof.com/appgini/download/

function staff_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('staff');
	if(!$arrPerm[1]){
		return false;
	}

	$data['full_name'] = makeSafe($_REQUEST['full_name']);
		if($data['full_name'] == empty_lookup_value){ $data['full_name'] = ''; }
	$data['national_id'] = makeSafe($_REQUEST['national_id']);
		if($data['national_id'] == empty_lookup_value){ $data['national_id'] = ''; }
	$data['department'] = makeSafe($_REQUEST['department']);
		if($data['department'] == empty_lookup_value){ $data['department'] = ''; }
	$data['phone_number'] = makeSafe($_REQUEST['phone_number']);
		if($data['phone_number'] == empty_lookup_value){ $data['phone_number'] = ''; }
	$data['gender'] = makeSafe($_REQUEST['gender']);
		if($data['gender'] == empty_lookup_value){ $data['gender'] = ''; }
	if($data['full_name']== ''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">" . $Translation['error:'] . " 'FullName': " . $Translation['field not null'] . '<br><br>';
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}
	if($data['national_id']== ''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">" . $Translation['error:'] . " 'National_ID': " . $Translation['field not null'] . '<br><br>';
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}
	if($data['phone_number']== ''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">" . $Translation['error:'] . " 'Phone_Number': " . $Translation['field not null'] . '<br><br>';
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}
	if($data['gender']== ''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">" . $Translation['error:'] . " 'Gender': " . $Translation['field not null'] . '<br><br>';
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}

	// hook: staff_before_insert
	if(function_exists('staff_before_insert')){
		$args=array();
		if(!staff_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o = array('silentErrors' => true);
	sql('insert into `staff` set       `full_name`=' . (($data['full_name'] !== '' && $data['full_name'] !== NULL) ? "'{$data['full_name']}'" : 'NULL') . ', `national_id`=' . (($data['national_id'] !== '' && $data['national_id'] !== NULL) ? "'{$data['national_id']}'" : 'NULL') . ', `department`=' . (($data['department'] !== '' && $data['department'] !== NULL) ? "'{$data['department']}'" : 'NULL') . ', `phone_number`=' . (($data['phone_number'] !== '' && $data['phone_number'] !== NULL) ? "'{$data['phone_number']}'" : 'NULL') . ', `gender`=' . (($data['gender'] !== '' && $data['gender'] !== NULL) ? "'{$data['gender']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"staff_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = db_insert_id(db_link());

	// hook: staff_after_insert
	if(function_exists('staff_after_insert')){
		$res = sql("select * from `staff` where `id`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!staff_after_insert($data, getMemberInfo(), $args)){ return $recID; }
	}

	// mm: save ownership data
	set_record_owner('staff', $recID, getLoggedMemberID());

	return $recID;
}

function staff_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('staff');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='staff' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='staff' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: staff_before_delete
	if(function_exists('staff_before_delete')){
		$args=array();
		if(!staff_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	// child table: gatepass
	$res = sql("select `id` from `staff` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `gatepass` where `invited_by`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "gatepass", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "gatepass", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='staff_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='staff_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	// child table: gatepass
	$res = sql("select `id` from `staff` where `id`='$selected_id'", $eo);
	$id = db_fetch_row($res);
	$rires = sql("select count(1) from `gatepass` where `staff`='".addslashes($id[0])."'", $eo);
	$rirow = db_fetch_row($rires);
	if($rirow[0] && !$AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["couldn't delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "gatepass", $RetMsg);
		return $RetMsg;
	}elseif($rirow[0] && $AllowDeleteOfParents && !$skipChecks){
		$RetMsg = $Translation["confirm delete"];
		$RetMsg = str_replace("<RelatedRecords>", $rirow[0], $RetMsg);
		$RetMsg = str_replace("<TableName>", "gatepass", $RetMsg);
		$RetMsg = str_replace("<Delete>", "<input type=\"button\" class=\"button\" value=\"".$Translation['yes']."\" onClick=\"window.location='staff_view.php?SelectedID=".urlencode($selected_id)."&delete_x=1&confirmed=1';\">", $RetMsg);
		$RetMsg = str_replace("<Cancel>", "<input type=\"button\" class=\"button\" value=\"".$Translation['no']."\" onClick=\"window.location='staff_view.php?SelectedID=".urlencode($selected_id)."';\">", $RetMsg);
		return $RetMsg;
	}

	sql("delete from `staff` where `id`='$selected_id'", $eo);

	// hook: staff_after_delete
	if(function_exists('staff_after_delete')){
		$args=array();
		staff_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='staff' and pkValue='$selected_id'", $eo);
}

function staff_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('staff');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='staff' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='staff' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['full_name'] = makeSafe($_REQUEST['full_name']);
		if($data['full_name'] == empty_lookup_value){ $data['full_name'] = ''; }
	if($data['full_name']==''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">{$Translation['error:']} 'FullName': {$Translation['field not null']}<br><br>";
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}
	$data['national_id'] = makeSafe($_REQUEST['national_id']);
		if($data['national_id'] == empty_lookup_value){ $data['national_id'] = ''; }
	if($data['national_id']==''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">{$Translation['error:']} 'National_ID': {$Translation['field not null']}<br><br>";
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}
	$data['department'] = makeSafe($_REQUEST['department']);
		if($data['department'] == empty_lookup_value){ $data['department'] = ''; }
	$data['phone_number'] = makeSafe($_REQUEST['phone_number']);
		if($data['phone_number'] == empty_lookup_value){ $data['phone_number'] = ''; }
	if($data['phone_number']==''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">{$Translation['error:']} 'Phone_Number': {$Translation['field not null']}<br><br>";
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}
	$data['gender'] = makeSafe($_REQUEST['gender']);
		if($data['gender'] == empty_lookup_value){ $data['gender'] = ''; }
	if($data['gender']==''){
		echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">{$Translation['error:']} 'Gender': {$Translation['field not null']}<br><br>";
		echo '<a href="" onclick="history.go(-1); return false;">'.$Translation['< back'].'</a></div>';
		exit;
	}
	$data['selectedID']=makeSafe($selected_id);

	// hook: staff_before_update
	if(function_exists('staff_before_update')){
		$args=array();
		if(!staff_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `staff` set       `full_name`=' . (($data['full_name'] !== '' && $data['full_name'] !== NULL) ? "'{$data['full_name']}'" : 'NULL') . ', `national_id`=' . (($data['national_id'] !== '' && $data['national_id'] !== NULL) ? "'{$data['national_id']}'" : 'NULL') . ', `department`=' . (($data['department'] !== '' && $data['department'] !== NULL) ? "'{$data['department']}'" : 'NULL') . ', `phone_number`=' . (($data['phone_number'] !== '' && $data['phone_number'] !== NULL) ? "'{$data['phone_number']}'" : 'NULL') . ', `gender`=' . (($data['gender'] !== '' && $data['gender'] !== NULL) ? "'{$data['gender']}'" : 'NULL') . " where `id`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="staff_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: staff_after_update
	if(function_exists('staff_after_update')){
		$res = sql("SELECT * FROM `staff` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['id'];
		$args = array();
		if(!staff_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."' where tableName='staff' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function staff_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = ''){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('staff');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}


	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: gender
	$combo_gender = new Combo;
	$combo_gender->ListType = 0;
	$combo_gender->MultipleSeparator = ', ';
	$combo_gender->ListBoxHeight = 10;
	$combo_gender->RadiosPerLine = 1;
	if(is_file(dirname(__FILE__).'/hooks/staff.gender.csv')){
		$gender_data = addslashes(implode('', @file(dirname(__FILE__).'/hooks/staff.gender.csv')));
		$combo_gender->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions($gender_data)));
		$combo_gender->ListData = $combo_gender->ListItem;
	}else{
		$combo_gender->ListItem = explode('||', entitiesToUTF8(convertLegacyOptions("Male;;Female")));
		$combo_gender->ListData = $combo_gender->ListItem;
	}
	$combo_gender->SelectName = 'gender';
	$combo_gender->AllowNull = false;

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='staff' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='staff' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID){
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID){
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("select * from `staff` where `id`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found'], 'staff_view.php', false);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_gender->SelectedData = $row['gender'];
	}else{
		$combo_gender->SelectedText = ( $_REQUEST['FilterField'][1]=='6' && $_REQUEST['FilterOperator'][1]=='<=>' ? (get_magic_quotes_gpc() ? stripslashes($_REQUEST['FilterValue'][1]) : $_REQUEST['FilterValue'][1]) : "");
	}
	$combo_gender->Render();

	ob_start();
	?>

	<script>
		// initial lookup values

		jQuery(function() {
			setTimeout(function(){
			}, 10); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	if($dvprint){
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/staff_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	}else{
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/staff_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detail View', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert){
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return staff_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return staff_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']){
		$backAction = 'AppGini.closeParentModal(); return false;';
	}else{
		$backAction = '$j(\'form\').eq(0).attr(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id){
		if(!$_REQUEST['Embedded']) $templateCode = str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$$(\'form\')[0].writeAttribute(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;" title="' . html_attr($Translation['Print Preview']) . '"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate){
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return staff_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');" title="' . html_attr($Translation['Delete']) . '"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)){
		$jsReadOnly .= "\tjQuery('#full_name').replaceWith('<div class=\"form-control-static\" id=\"full_name\">' + (jQuery('#full_name').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#national_id').replaceWith('<div class=\"form-control-static\" id=\"national_id\">' + (jQuery('#national_id').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#department').replaceWith('<div class=\"form-control-static\" id=\"department\">' + (jQuery('#department').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#phone_number').replaceWith('<div class=\"form-control-static\" id=\"phone_number\">' + (jQuery('#phone_number').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#gender').replaceWith('<div class=\"form-control-static\" id=\"gender\">' + (jQuery('#gender').val() || '') + '</div>'); jQuery('#gender-multi-selection-help').hide();\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif($AllowInsert){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(gender)%%>', $combo_gender->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(gender)%%>', $combo_gender->SelectedData, $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array();
	foreach($lookup_fields as $luf => $ptfc){
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']){
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-md" id="' . $ptfc[0] . '_view_parent" title="' . html_attr($Translation['View'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']){
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent hspacer-md" id="' . $ptfc[0] . '_add_new" title="' . html_attr($Translation['Add New'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode = str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(full_name)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(national_id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(department)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(phone_number)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(gender)%%>', '', $templateCode);

	// process values
	if($selected_id){
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(full_name)%%>', safe_html($urow['full_name']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(full_name)%%>', html_attr($row['full_name']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(full_name)%%>', urlencode($urow['full_name']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(national_id)%%>', safe_html($urow['national_id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(national_id)%%>', html_attr($row['national_id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(national_id)%%>', urlencode($urow['national_id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(department)%%>', safe_html($urow['department']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(department)%%>', html_attr($row['department']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(department)%%>', urlencode($urow['department']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(phone_number)%%>', safe_html($urow['phone_number']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(phone_number)%%>', html_attr($row['phone_number']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(phone_number)%%>', urlencode($urow['phone_number']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(gender)%%>', safe_html($urow['gender']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(gender)%%>', html_attr($row['gender']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(gender)%%>', urlencode($urow['gender']), $templateCode);
	}else{
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(full_name)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(full_name)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(national_id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(national_id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(department)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(department)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(phone_number)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(phone_number)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(gender)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(gender)%%>', urlencode(''), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans){
		$templateCode = str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode = str_replace('<%%', '<!-- ', $templateCode);
	$templateCode = str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == ''){
		$templateCode .= "\n\n<script>\$j(function(){\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption){
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id){
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	/* default field values */
	$rdata = $jdata = get_defaults('staff');
	if($selected_id){
		$jdata = get_joined_record('staff', $selected_id);
		if($jdata === false) $jdata = get_defaults('staff');
		$rdata = $row;
	}
	$cache_data = array(
		'rdata' => array_map('nl2br', array_map('addslashes', $rdata)),
		'jdata' => array_map('nl2br', array_map('addslashes', $jdata))
	);
	$templateCode .= loadView('staff-ajax-cache', $cache_data);

	// hook: staff_dv
	if(function_exists('staff_dv')){
		$args=array();
		staff_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>