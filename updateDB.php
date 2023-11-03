<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('gatepass', "create table if not exists `gatepass` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `entry_time` TIME , `exit_time` TIME , `gate` INT(10) unsigned not null , `purpose_of_visit` TEXT not null , `invited_by` INT(10) , `staff` INT(10) , `individual` INT(10) unsigned , `group` INT(10) unsigned , `vehicle` INT(10) , `luggage` INT(10) unsigned , `date` DATE , `status` VARCHAR(40) , `reason` TEXT ) CHARSET latin1", $silent);
		setupIndexes('gatepass', array('gate','invited_by','staff','individual','group','vehicle','luggage'));
		setupTable('gates', "create table if not exists `gates` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `name` VARCHAR(40) not null ) CHARSET latin1", $silent);
		setupTable('individuals', "create table if not exists `individuals` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `full_name` VARCHAR(40) not null , `national_id` VARCHAR(40) not null , `phone_number` VARCHAR(40) not null , `gender` VARCHAR(40) not null ) CHARSET latin1", $silent);
		setupTable('kikundi', "create table if not exists `kikundi` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `group_name` VARCHAR(40) not null , `members` TEXT ) CHARSET latin1", $silent);
		setupTable('luggage', "create table if not exists `luggage` (   `id` INT(10) unsigned not null auto_increment , primary key (`id`), `type` VARCHAR(40) not null , `name` VARCHAR(40) not null , `owner` VARCHAR(40) ) CHARSET latin1", $silent);
		setupTable('staff', "create table if not exists `staff` (   `id` INT(10) not null auto_increment , primary key (`id`), `full_name` VARCHAR(40) not null , `national_id` VARCHAR(40) not null , `department` VARCHAR(40) , `phone_number` VARCHAR(40) not null , `gender` VARCHAR(40) not null ) CHARSET latin1", $silent);
		setupTable('vehicles', "create table if not exists `vehicles` (   `id` INT(10) not null auto_increment , primary key (`id`), `reg_number` VARCHAR(40) not null ) CHARSET latin1", $silent);


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>