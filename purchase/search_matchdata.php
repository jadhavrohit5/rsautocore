<?php
ob_start();
//---------------------------------
session_start();
/*--------------------------------------------------------------------------------*/
include('includes/msconnect.php');
include('includes/sessions.php');
/*--------------------------------------------------------------------------------*/

$user_loggedin = isset($_SESSION['user_idd']) ? $_SESSION['user_idd'] : "";
$user_idd = pobe_session_register('user_idd', '');
$adminusr = pobe_session_register('adminusr', '');
$admintpy = pobe_session_register('admintpy', '');
$useracntn = pobe_session_register('useracnt', '');
$global_loggedin = pobe_session_register('global_loggedin', '');
$vendorid = pobe_session_register('vendorid', '');
$usrtoken = pobe_session_register('usrtoken', '');

//$wuserid=base64_decode($user_idd);
$wuserid=base64_decode($_SESSION['user_idd']);
/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/

//$schid = base64_decode($_GET['id']);	
$schid = trim($_POST['schid']);	
$ktypno = trim($_POST['carid']);	
$regnum = trim($_POST['regnum']);	

//$ptanum = [100027, 100551, 706379, 100199];
$ptanum = [100027, 100551, 100199, 706379, 100354, 100350, 100359, 706373]; //updated on 17-09-2022 
$ptoeno = [102798, 102799, 102803];

$brndno = [114, 226, 214, 293, 292, 234, 4607, 161, 30, 377, 1, 4381]; //updated on 17-09-2022 - added SPIDAN 1, Airstal 4381 
$brnd_sp = [226, 214, 293, 292, 234, 30, 377]; 
$brnd_rhd = [226, 4607, 214, 161, 30, 377];    

// Bosch 30,  Denso  66,  Continental/VDO  83,  Delphi  89,  Cevam  393,  Alanko  479,  Vege  4739,  Lizarte  292, Buchli 4742, Wilmink Group 4832
$brnd_dpi = [30, 66, 83, 89, 393, 479, 4739, 292, 4742, 4832]; //added Buchli & Wilmink on 26-04-2022 

$stagenum = '4';
$dateposted = date("Y-m-d H:i:s");

$ids = array();

/*--------------------------------------------------------------------------------*/
	$selectMchd = "SELECT * FROM tbl_rsa_app_matched_articles where sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' ";
	$sqlMchd = mysqli_query($ndbconn, $selectMchd); // Run the query.
	$numMchd = mysqli_num_rows($sqlMchd);

	if ($numMchd != 0) {
		$updSQLMchd = "UPDATE tbl_rsa_app_matched_articles SET status = '0', brandopt = '0', acptd = '0' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' ";
		$resultupMchd = mysqli_query($ndbconn, $updSQLMchd); // Run the query
		//echo $updSQLMchd."<br>";
	}
/*--------------------------------------------------------------------------------*/

	$selectArt = "SELECT DISTINCT ta.groupNodeId, ta.articleNo, ta.artBrandName, ta.brandNo, ta.oeNumber, tg.part_type_opt FROM tbl_rsa_app_td_articles ta, tbl_rsa_app_techdoc_groups tg WHERE ta.groupNodeId = tg.grpNodeId AND ta.sch_id = '".addslashes($schid)."' AND ta.carId = '".addslashes($ktypno)."' AND tg.isReqrd = '1' ORDER BY ta.groupNodeId";

	$sqlArt = mysqli_query($ndbconn, $selectArt); // Run the query.
	$numArt = mysqli_num_rows($sqlArt);
	//echo "<br>====================<br>Feed Count=". $numArt . "<br>";

/*--------------------------------------------------------------------------------*/
	while ($rowArt = mysqli_fetch_array($sqlArt)){

		if (in_array($rowArt['groupNodeId'], $ptanum) && in_array($rowArt['brandNo'], $brndno)) {

			if (($rowArt['groupNodeId'] == 100027) && ($rowArt['brandNo'] == 114)) {
				// 100027	Brake Calipers   BUDWEG CALIPER

				$my_qry2  = "SELECT DISTINCT id,rsac,part_type FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' "; 
				$my_qry2 .= " AND rsac = '". $rowArt['articleNo'] ."' AND part_type = 2 ";
				//echo $my_qry2."<br>";

				$sqlqry2 = mysqli_query($ndbconn, $my_qry2); // Run the query
				//$rowqry2 = mysqli_fetch_array($sqlqry2);
				while ($rowqry2 = mysqli_fetch_array($sqlqry2)){
				if (isset($rowqry2['id'])) {
					$ids[] = $rowqry2['id'];

					$addSQLrs2 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry2['id']."','".$rowqry2['part_type']."', '".$rowqry2['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs2."<br>";
					$resultqr2 = mysqli_query($ndbconn, $addSQLrs2); // Run the query.
				}
				}
			}

			if (($rowArt['groupNodeId'] == 100027) && ($rowArt['brandNo'] == 226)) {
				// 100027	Brake Calipers  Elstock
				//updated on 12-01-2022 
				$my_qry4  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry4 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry4 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.status = '1' AND pt.part_type = 2 ";
				//$my_qry4 .= " AND cr.custid = '8' AND cr.crdata LIKE '%". $rowArt['articleNo'] ."%' AND pt.part_type = 2 ";
				$my_qry4 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";

				//echo $my_qry4."<br>";

				$sqlqry4 = mysqli_query($ndbconn, $my_qry4); // Run the query
				//$rowqry4 = mysqli_fetch_array($sqlqry4);
				while ($rowqry4 = mysqli_fetch_array($sqlqry4)){
				if (isset($rowqry4['id'])) {
					$ids[] = $rowqry4['id'];

					$addSQLrs3 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry4['id']."','".$rowqry4['part_type']."', '".$rowqry4['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs3."<br>";
					$resultqr3 = mysqli_query($ndbconn, $addSQLrs3); // Run the query.
				}
				}
			}

			if (($rowArt['groupNodeId'] == 100551) && ($rowArt['brandNo'] == 226)) {
				// 100551	EGR Valves   Elstock
				//updated on 15-04-2022 to replace matching condition 
				$my_qry4  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry4 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry4 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.status = '1' AND pt.part_type = 9 ";
				$my_qry4 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry4."<br>";

				$sqlqry4 = mysqli_query($ndbconn, $my_qry4); // Run the query
				//$rowqry4 = mysqli_fetch_array($sqlqry4);
				while ($rowqry4 = mysqli_fetch_array($sqlqry4)){
				if (isset($rowqry4['id'])) {
					$ids[] = $rowqry4['id'];

					$addSQLrs4 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry4['id']."','".$rowqry4['part_type']."', '".$rowqry4['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs4."<br>";
					$resultqr4 = mysqli_query($ndbconn, $addSQLrs4); // Run the query.
				}
				}
			}

			if ($rowArt['groupNodeId'] == 100199) {
				// 100199	LHD Manual/ LHD Power/ LHD Electric/ RHD Manual/ RHD Power/ RHD Electric/ Steering Pumps

				if (in_array($rowArt['brandNo'], $brnd_sp)) {
					// Steering Pumps	Elstock	8 Remy 6	--Lenco 12	Lizarte 13	ERA 9	++Bosch 55	++Bosch 2 56
					//updated on 12-01-2022 
					$my_qry5  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
					$my_qry5 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
					$my_qry5 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND pt.status = '1' AND pt.part_type = 1 ";
					$my_qry5 .= " AND (cr.custid = '6' OR cr.custid = '8' OR cr.custid = '9' OR cr.custid = '13' OR cr.custid = '55' OR cr.custid = '56') ";
					$my_qry5 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
					//echo $my_qry5."<br>";

					$sqlqry5 = mysqli_query($ndbconn, $my_qry5); // Run the query
					//$rowqry5 = mysqli_fetch_array($sqlqry5);
					while ($rowqry5 = mysqli_fetch_array($sqlqry5)){
					if (isset($rowqry5['id'])) {
						$ids[] = $rowqry5['id'];

						$addSQLrs5 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry5['id']."','".$rowqry5['part_type']."', '".$rowqry5['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
						//echo $addSQLrs5."<br>";
						$resultqr5 = mysqli_query($ndbconn, $addSQLrs5); // Run the query.
					}
					}
				}

				if (in_array($rowArt['brandNo'], $brnd_rhd)) {
					// RHD	Elstock	8  Shaftec 18	Remy 6	TRW 20	Bosch 55	++Bosch 2 56
					// RHD Power   	Elstock	8  Shaftec 18	Remy 6	TRW 20	Bosch 55
					// RHD Manual  	Elstock	Shaftec	Remy	TRW	Bosch
					// RHD EPS     	Elstock	Shaftec	Remy	TRW	Bosch
					//updated on 12-01-2022 
					$my_qry6  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
					$my_qry6 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
					$my_qry6 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND pt.status = '1' AND (pt.part_type = 5 OR pt.part_type = 6 OR pt.part_type = 7) ";
					$my_qry6 .= " AND (cr.custid = '6' OR cr.custid = '8' OR cr.custid = '18' OR cr.custid = '20' OR cr.custid = '55' OR cr.custid = '56') ";
					$my_qry6 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
					//echo $my_qry6."<br>";

					$sqlqry6 = mysqli_query($ndbconn, $my_qry6); // Run the query
					//$rowqry6 = mysqli_fetch_array($sqlqry6);
					while ($rowqry6 = mysqli_fetch_array($sqlqry6)){
					if (isset($rowqry6['id'])) {
						$ids[] = $rowqry6['id'];

						$addSQLrs6 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry6['id']."','".$rowqry6['part_type']."', '".$rowqry6['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
						//echo $addSQLrs6."<br>";
						$resultqr6 = mysqli_query($ndbconn, $addSQLrs6); // Run the query.
					}
					}
				}

			}

		//=======================================================================================//
		// added on 17-09-2022  Driveshafts , Turbochargers , AC Compressors , Alternators , Starter motors
		//=======================================================================================//

			// added on 17-09-2022 
			if (($rowArt['groupNodeId'] == 706379) && ($rowArt['brandNo'] == 4607)) {
				// 706379	Driveshafts - Shaftec 4607
				$my_qry2a  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry2a .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry2a .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '18' AND pt.status = '1' AND pt.part_type = 13 ";
				$my_qry2a .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry2a."<br>";

				$sqlqry2a = mysqli_query($ndbconn, $my_qry2a); // Run the query
				while ($rowqry2a = mysqli_fetch_array($sqlqry2a)){
				if (isset($rowqry2a['id'])) {
					$ids[] = $rowqry2a['id'];

					$addSQLrs2a = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry2a['id']."','".$rowqry2a['part_type']."', '".$rowqry2a['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs2a."<br>";
					$resultqr2a = mysqli_query($ndbconn, $addSQLrs2a); // Run the query.
				}
				}
			}

			// added on 17-09-2022 
			if (($rowArt['groupNodeId'] == 706379) && ($rowArt['brandNo'] == 1)) {
				// 706379	Driveshafts - Spidan 1
				$my_qry2b  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry2b .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry2b .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '71' AND pt.status = '1' AND pt.part_type = 13 ";
				$my_qry2b .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry2b."<br>";

				$sqlqry2b = mysqli_query($ndbconn, $my_qry2b); // Run the query
				while ($rowqry2b = mysqli_fetch_array($sqlqry2b)){
				if (isset($rowqry2b['id'])) {
					$ids[] = $rowqry2b['id'];

					$addSQLrs2b = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry2b['id']."','".$rowqry2b['part_type']."', '".$rowqry2b['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs2b."<br>";
					$resultqr2b = mysqli_query($ndbconn, $addSQLrs2b); // Run the query.
				}
				}
			}

			// added on 17-09-2022  
			if (($rowArt['groupNodeId'] == 100354) && ($rowArt['brandNo'] == 226)) {
				// 100354	AC Compressors - Elstock 226
				// updated on 07-02-2023
				$my_qry3a  = "SELECT DISTINCT cr.partid as id, pt.group_rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry3a .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry3a .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.status = '1' AND pt.is_main = '1' AND pt.part_type = 15 ";
				$my_qry3a .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry3a."<br>";

				$sqlqry3a = mysqli_query($ndbconn, $my_qry3a); // Run the query
				while ($rowqry3a = mysqli_fetch_array($sqlqry3a)){
				if (isset($rowqry3a['id'])) {
					$ids[] = $rowqry3a['id'];

					$addSQLrs3a = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry3a['id']."','".$rowqry3a['part_type']."', '".$rowqry3a['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs3a."<br>";
					$resultqr3a = mysqli_query($ndbconn, $addSQLrs3a); // Run the query.
				}
				}
			}

			// added on 17-09-2022 
			if (($rowArt['groupNodeId'] == 100354) && ($rowArt['brandNo'] == 4381)) {
				// 100354	AC Compressors - Airstal 4381
				// updated on 07-02-2023
				$my_qry3b  = "SELECT DISTINCT cr.partid as id, pt.group_rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry3b .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry3b .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '69' AND pt.status = '1' AND pt.is_main = '1' AND pt.part_type = 15 ";
				$my_qry3b .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry3b."<br>";

				$sqlqry3b = mysqli_query($ndbconn, $my_qry3b); // Run the query
				while ($rowqry3b = mysqli_fetch_array($sqlqry3b)){
				if (isset($rowqry3b['id'])) {
					$ids[] = $rowqry3b['id'];

					$addSQLrs3b = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry3b['id']."','".$rowqry3b['part_type']."', '".$rowqry3b['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs3b."<br>";
					$resultqr3b = mysqli_query($ndbconn, $addSQLrs3b); // Run the query.
				}
				}
			}

			// added on 17-09-2022 
			if (($rowArt['groupNodeId'] == 100350) && ($rowArt['brandNo'] == 226)) {
				// 100350	Alternators - Elstock 226
				// updated on 07-02-2023
				$my_qry4a  = "SELECT DISTINCT cr.partid as id, pt.group_rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry4a .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry4a .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.status = '1' AND pt.is_main = '1' AND pt.part_type = 16 ";
				$my_qry4a .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry4a."<br>";

				$sqlqry4a = mysqli_query($ndbconn, $my_qry4a); // Run the query
				while ($rowqry4a = mysqli_fetch_array($sqlqry4a)){
				if (isset($rowqry4a['id'])) {
					$ids[] = $rowqry4a['id'];

					$addSQLrs4a = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry4a['id']."','".$rowqry4a['part_type']."', '".$rowqry4a['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs4a."<br>";
					$resultqr4a = mysqli_query($ndbconn, $addSQLrs4a); // Run the query.
				}
				}
			}

			// added on 17-09-2022 
			if (($rowArt['groupNodeId'] == 100359) && ($rowArt['brandNo'] == 226)) {
				// 100359	Starter Motors - Elstock 226
				// updated on 07-02-2023
				$my_qry5a  = "SELECT DISTINCT cr.partid as id, pt.group_rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry5a .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry5a .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.status = '1' AND pt.is_main = '1' AND pt.part_type = 17 ";
				$my_qry5a .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry5a."<br>";

				$sqlqry5a = mysqli_query($ndbconn, $my_qry5a); // Run the query
				while ($rowqry5a = mysqli_fetch_array($sqlqry5a)){
				if (isset($rowqry5a['id'])) {
					$ids[] = $rowqry5a['id'];

					$addSQLrs5a = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry5a['id']."','".$rowqry5a['part_type']."', '".$rowqry5a['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs5a."<br>";
					$resultqr5a = mysqli_query($ndbconn, $addSQLrs5a); // Run the query.
				}
				}
			}

			// added on 17-09-2022 
			if (($rowArt['groupNodeId'] == 706373) && ($rowArt['brandNo'] == 226)) {
				// 706373	Turbochargers - Elstock 226
				// updated on 07-02-2023
				$my_qry6a  = "SELECT DISTINCT cr.partid as id, pt.group_rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry6a .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry6a .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.status = '1' AND pt.is_main = '1' AND pt.part_type = 14 ";
				$my_qry6a .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry6a."<br>"; 

				$sqlqry6a = mysqli_query($ndbconn, $my_qry6a); // Run the query
				while ($rowqry6a = mysqli_fetch_array($sqlqry6a)){
				if (isset($rowqry6a['id'])) {
					$ids[] = $rowqry6a['id'];

					$addSQLrs6a = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry6a['id']."','".$rowqry6a['part_type']."', '".$rowqry6a['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs6a."<br>";
					$resultqr6a = mysqli_query($ndbconn, $addSQLrs6a); // Run the query.
				}
				}
			}

		} 

		//=======================================================================================//
		//=======================================================================================//

		if (in_array($rowArt['groupNodeId'], $ptoeno) && in_array($rowArt['brandNo'], $brnd_dpi)) {
				// 102798 102803  Diesel Pumps,   102799  Diesel Injectors
				// Bosch 55,  Denso  60,  Continental/VDO  59,  Delphi  58,  --Cevam  45,  Alanko  61,  Vege  38,  --Lizarte  13
				// Bosch 30,  DENSO  66,  CONTINENTAL/VDO  83,  DELPHI  89,  --CEVAM  393,  ALANKO  479,  VEGE  4739	--Lizarte 292
				// BUCHLI 4742,  WILMINK GROUP 4832 - added on 25-04-2022 
				$my_qry7  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry7 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry7 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND pt.status = '1' AND (pt.part_type = 10 OR pt.part_type = 11) ";
				$my_qry7 .= " AND (cr.custid = '38' OR cr.custid = '55' OR cr.custid = '58' OR cr.custid = '59' OR cr.custid = '60' OR cr.custid = '61' OR cr.custid = '63' OR cr.custid = '64') "; 
				$my_qry7 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry7."<br>";

				$sqlqry7 = mysqli_query($ndbconn, $my_qry7); // Run the query
				//$rowqry7 = mysqli_fetch_array($sqlqry7);
				while ($rowqry7 = mysqli_fetch_array($sqlqry7)){
					if (isset($rowqry7['id'])) {
						$ids[] = $rowqry7['id'];

						$addSQLrs7 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".$rowqry7['id']."','".$rowqry7['part_type']."', '".$rowqry7['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
						//echo $addSQLrs7."<br>";
						$resultqr7 = mysqli_query($ndbconn, $addSQLrs7); // Run the query.
					}
				}
		}
		
	}

//---------------------------------------------------------------------------------------------------------------
	//echo "<br>====================<br>Matched Count=". count($ids) . "<br>";
	//$idss = implode(',',$ids);
	//$idss = rtrim($idss,',');
	//echo $idss;

//---------------------------------------------------------------------------------------------------------------

	$selectBrnd = "SELECT partid, part_type, rsac, GROUP_CONCAT(brandno) as brand FROM tbl_rsa_app_matched_articles where sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND status = '1' GROUP by partid ORDER by part_type,partid ";
	//echo $selectBrnd."<br>";

	$sqlBrnd = mysqli_query($ndbconn, $selectBrnd); // Run the query.

	while ($rowBrnd = mysqli_fetch_array($sqlBrnd)){

		$updSQLb = "";
		if ($rowBrnd['part_type']==1) {
			// Steering Pumps	Elstock 226	Remy 214	--Lenco 293	Lizarte 292	ERA 234 
			// sequence updated on 16-12-2021 
			// ------------------------------------------------------------------------
			// Steering Pumps	Elstock 226	Remy 214	Lizarte 292	ERA 234	Bosch 30	Bosch 2 377
			//echo $rowBrnd['brand']."====Steering Pumps<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(292, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 292 ";
			} else if (in_array(234, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 234 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} 
		}

		if ($rowBrnd['part_type']==2) {
			// Brake Calipers	Budweg 114	Elstock 226
			//echo $rowBrnd['brand']."====Brake Calipers<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(114, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 114 ";
			} else if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} 
		}

		// ------------------------------------------------------------------------
		//if (($rowBrnd['part_type']==5) || ($rowBrnd['part_type']==6) || ($rowBrnd['part_type']==7)) {
		// sequence updated, divided into 3 conditions on 16-12-2021
		// ------------------------------------------------------------------------

		if ($rowBrnd['part_type']==5) {
			// 5 RHD Power	Elstock 226	Shaftec 4607	Remy 214	TRW 161	Bosch 30	Bosch 2 377
			
			//echo $rowBrnd['brand']."====RHD Power<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(4607, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4607 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(161, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 161 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} 
		}

		if ($rowBrnd['part_type']==6) {
			// 6 RHD Manual	Elstock 226	Shaftec 4607	Remy 214	TRW 161	Bosch 30	Bosch 2 377
			
			//echo $rowBrnd['brand']."====RHD Manual<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(4607, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4607 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(161, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 161 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} 
		}

		if ($rowBrnd['part_type']==7) {
			// 7 RHD EPS 	Elstock 226	Bosch 30	Bosch 2 377	Shaftec 4607	Remy 214	TRW 161
			
			//echo $rowBrnd['brand']."====RHD EPS<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} else if (in_array(4607, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4607 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(161, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 161 ";
			} 
		}

		if ($rowBrnd['part_type']==9) {
			// EGR Vlaves	Elstock	226
			//echo $rowBrnd['brand']."====EGR Vlaves<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} 
		}

		if ($rowBrnd['part_type']==10) {
			// Diesel Injectors	Bosch 30	DENSO  66,  CONTINENTAL/VDO  83,  DELPHI  89,  --CEVAM  393,  ALANKO  479,  VEGE  4739	--Lizarte 292
			//echo $rowBrnd['brand']."====Diesel Injectors<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} else if (in_array(66, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 66 ";
			} else if (in_array(83, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 83 ";
			} else if (in_array(89, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 89 ";
			} else if (in_array(479, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 479 ";
			} else if (in_array(4739, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4739 ";
			} else if (in_array(4739, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4742 ";
			} else if (in_array(4739, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4832 ";
			} 
		}

		if ($rowBrnd['part_type']==11) {
			// Diesel Pumps    	Bosch 30	DENSO  66,  CONTINENTAL/VDO  83,  DELPHI  89,  --CEVAM  393,  ALANKO  479,  VEGE  4739	--Lizarte 292
			//echo $rowBrnd['brand']."==== Diesel Pumps<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} else if (in_array(66, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 66 ";
			} else if (in_array(83, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 83 ";
			} else if (in_array(89, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 89 ";
			} else if (in_array(479, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 479 ";
			} else if (in_array(4739, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4742 ";
			} else if (in_array(4739, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4832 ";
			} 
		}

		//=======================================================================================//
		// added on 17-09-2022 Driveshafts , Turbochargers , AC Compressors , Alternators , Starter motors
		//=======================================================================================//

		if ($rowBrnd['part_type']==13) {
			// Driveshafts - Shaftec 4607 Spidan 1
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(4607, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4607 ";
			} else if (in_array(1, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 1 ";
			} 
		}

		if ($rowBrnd['part_type']==14) {
			// Turbochargers - Elstock 226
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} 
		}

		if ($rowBrnd['part_type']==15) {
			// AC Compressors - Elstock 226, Airstal 4381
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(4381, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4381 ";
			} 
		}

		if ($rowBrnd['part_type']==16) {
			// Alternators - Elstock 226
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} 
		}

		if ($rowBrnd['part_type']==17) {
			// Starter Motors - Elstock 226
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($ktypno)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} 
		}

		//=======================================================================================//
		//=======================================================================================//

		if ($updSQLb != "") {
		$resultupb = mysqli_query($ndbconn, $updSQLb); // Run the query
		//echo $updSQLb."<br>";
		}

	}
/*
*/
//---------------------------------------------------------------------------------------------------------------

//echo('Location: matched_results.php?id='.$schid.'&carid='.$ktypno);
header('Location: matched_results.php?id='.$schid.'&carid='.$ktypno);
die;
?>