<?php
ob_start();
//---------------------------------
session_start();
/*--------------------------------------------------------------------------------*/
define('DB_HOST','localhost');
define('DB_NAME','MNqD8JNM');
define('DB_USER','8xG4Wv4C');
define('DB_PASS','SrhqY02eGwE0hKEi');
//define('DB_USER','root');
//define('DB_PASS','password');
//---------------------------------
// Create connection
$ndbconn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$ndbconn) {
    die("Connection failed: " . mysqli_connect_error());
} 
//---------------------------------
//---------------------------------

/*--------------------------------------------------------------------------------

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
*/
/*--------------------------------------------------------------------------------*/
print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/

//$schid = base64_decode($_GET['id']);	
$schid = trim($_GET['id']);	
$carid = trim($_GET['carid']);	
$regnum = trim($_GET['regnum']);	

$ptanum = [100027, 100551, 706379, 100199];
$ptoeno = [102798, 102799, 102803];

$brndno = [114, 226, 214, 293, 292, 234, 4607, 161, 30, 377]; //added Bosch 2 on 16-12-2021 
$brnd_sp = [226, 214, 293, 292, 234, 30, 377]; //added Bosch 2
$brnd_rhd = [226, 4607, 214, 161, 30, 377]; //added Bosch 2

$brnd_dpi = [30, 66, 83, 89, 393, 479, 4739, 292];
// Bosch 30,  Denso  66,  Continental/VDO  83,  Delphi  89,  Cevam  393,  Alanko  479,  Vege  4739,  Lizarte  292

$stagenum = '4';
$dateposted = date("Y-m-d H:i:s");

$ids = array();

/*--------------------------------------------------------------------------------*/
	$selectMchd = "SELECT * FROM tbl_rsa_app_matched_articles where sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' ";
	$sqlMchd = mysqli_query($ndbconn, $selectMchd); // Run the query.
	$numMchd = mysqli_num_rows($sqlMchd);

	if ($numMchd != 0) {
		$updSQLMchd = "UPDATE tbl_rsa_app_matched_articles SET status = '0', brandopt = '0', acptd = '0' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' ";
		$resultupMchd = mysqli_query($ndbconn, $updSQLMchd); // Run the query
		echo $updSQLMchd."<br>";
	}
/*--------------------------------------------------------------------------------*/

	$selectArt = "SELECT DISTINCT ta.groupNodeId, ta.articleNo, ta.artBrandName, ta.brandNo, ta.oeNumber, tg.part_type_opt FROM tbl_rsa_app_td_articles ta, tbl_rsa_app_techdoc_groups tg WHERE ta.groupNodeId = tg.grpNodeId AND ta.sch_id = '".addslashes($schid)."' AND ta.carId = '".addslashes($carid)."' AND tg.isReqrd = '1' ORDER BY ta.groupNodeId";

	$sqlArt = mysqli_query($ndbconn, $selectArt); // Run the query.
	$numArt = mysqli_num_rows($sqlArt);
	echo "<br>====================<br>". $selectArt . "<br>";
	echo "<br>====================<br>Feed Count=". $numArt . "<br>";

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
					////$ids[] = $rowqry2['id'];

					$addSQLrs2 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($carid)."', '".$rowqry2['id']."','".$rowqry2['part_type']."', '".$rowqry2['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs2."<br>";
					////$resultqr2 = mysqli_query($ndbconn, $addSQLrs2); // Run the query.
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
					////$ids[] = $rowqry4['id'];

					$addSQLrs3 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($carid)."', '".$rowqry4['id']."','".$rowqry4['part_type']."', '".$rowqry4['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					//echo $addSQLrs3."<br>";
					////$resultqr3 = mysqli_query($ndbconn, $addSQLrs3); // Run the query.
				}
				}
			}

			if (($rowArt['groupNodeId'] == 100551) && ($rowArt['brandNo'] == 226)) {
echo $rowArt['groupNodeId']."--".$rowArt['brandNo']."<br>";
				// 100551	EGR Valves   Elstock
				// query commented to replace matching condition
				//$my_qry4  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				//$my_qry4 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				//$my_qry4 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.part_type = 9 ";
				//$my_qry4 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				$my_qry41  = "SELECT DISTINCT id,rsac,part_type FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' "; 
				$my_qry41 .= " AND rsac = '". $rowArt['articleNo'] ."' AND part_type = 9 ";
				echo $my_qry41."<br>";


				$my_qry4  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry4 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry4 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND cr.custid = '8' AND pt.status = '1' AND pt.part_type = 9 ";
				$my_qry4 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				echo $my_qry4."<br>";

				$sqlqry4 = mysqli_query($ndbconn, $my_qry4); // Run the query
				//$rowqry4 = mysqli_fetch_array($sqlqry4);
				while ($rowqry4 = mysqli_fetch_array($sqlqry4)){
				if (isset($rowqry4['id'])) {
					$ids[] = $rowqry4['id'];

					$addSQLrs4 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($carid)."', '".$rowqry4['id']."','".$rowqry4['part_type']."', '".$rowqry4['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
					echo $addSQLrs4."<br>";
					////$resultqr4 = mysqli_query($ndbconn, $addSQLrs4); // Run the query.
				}
				}
			}

			//if ($rowArt['groupNodeId'] == 706379) {
				// 706379	Driveshafts (brand not mentioned)
			//}

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
						////$ids[] = $rowqry5['id'];

						$addSQLrs5 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($carid)."', '".$rowqry5['id']."','".$rowqry5['part_type']."', '".$rowqry5['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
						//echo $addSQLrs5."<br>";
						////$resultqr5 = mysqli_query($ndbconn, $addSQLrs5); // Run the query.
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
						////$ids[] = $rowqry6['id'];

						$addSQLrs6 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($carid)."', '".$rowqry6['id']."','".$rowqry6['part_type']."', '".$rowqry6['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
						//echo $addSQLrs6."<br>";
						////$resultqr6 = mysqli_query($ndbconn, $addSQLrs6); // Run the query.
					}
					}
				}

			}

		} 

		if (in_array($rowArt['groupNodeId'], $ptoeno) && in_array($rowArt['brandNo'], $brnd_dpi)) {
				// 102798 102803  Diesel Pumps,   102799  Diesel Injectors
				// Bosch 55,  Denso  60,  Continental/VDO  59,  Delphi  58,  --Cevam  45,  Alanko  61,  Vege  38,  --Lizarte  13
				// Bosch 30,  DENSO  66,  CONTINENTAL/VDO  83,  DELPHI  89,  --CEVAM  393,  ALANKO  479,  VEGE  4739	--Lizarte 292
				//updated on 12-01-2022 
				$my_qry7  = "SELECT DISTINCT cr.partid as id, pt.rsac as rsac, pt.part_type as part_type FROM tbl_rsa_parts_customerref cr ";
				$my_qry7 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry7 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND pt.status = '1' AND (pt.part_type = 10 OR pt.part_type = 11) ";
				$my_qry7 .= " AND (cr.custid = '38' OR cr.custid = '55' OR cr.custid = '58' OR cr.custid = '59' OR cr.custid = '60' OR cr.custid = '61') "; 
				$my_qry7 .= " AND (FIND_IN_SET('". addslashes($rowArt['articleNo']) ."',cr.crdata) OR FIND_IN_SET(' ". addslashes($rowArt['articleNo']) ."',cr.crdata)) ";
				//echo $my_qry7."<br>";

				$sqlqry7 = mysqli_query($ndbconn, $my_qry7); // Run the query
				//$rowqry7 = mysqli_fetch_array($sqlqry7);
				while ($rowqry7 = mysqli_fetch_array($sqlqry7)){
					if (isset($rowqry7['id'])) {
						////$ids[] = $rowqry7['id'];

						$addSQLrs7 = "INSERT INTO tbl_rsa_app_matched_articles (sch_id, carid, partid, part_type, rsac, articleno, brandno, postdate, status, acptd) VALUES('".addslashes($schid)."', '".addslashes($carid)."', '".$rowqry7['id']."','".$rowqry7['part_type']."', '".$rowqry7['rsac']."', '".addslashes($rowArt['articleNo'])."', '".addslashes($rowArt['brandNo'])."', '".$dateposted."', '1', '0')";
						//echo $addSQLrs7."<br>";
						////$resultqr7 = mysqli_query($ndbconn, $addSQLrs7); // Run the query.
					}
				}
		}

		
	}

//---------------------------------------------------------------------------------------------------------------
	echo "<br>====================<br>Matched Count=". count($ids) . "<br>";
	//$idss = implode(',',$ids);
	//$idss = rtrim($idss,',');
	echo $idss;

//---------------------------------------------------------------------------------------------------------------

	$selectBrnd = "SELECT partid, part_type, rsac, GROUP_CONCAT(brandno) as brand FROM tbl_rsa_app_matched_articles where sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND status = '1' GROUP by partid ORDER by part_type,partid ";
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
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(292, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 292 ";
			} else if (in_array(234, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 234 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			//} else if (in_array(377, $arrBrnd)) {
			//	$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 377 ";
			} 
		}

		if ($rowBrnd['part_type']==2) {
			// Brake Calipers	Budweg 114	Elstock 226
			//echo $rowBrnd['brand']."====Brake Calipers<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(114, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 114 ";
			} else if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} 
		}

		// ------------------------------------------------------------------------
		//if (($rowBrnd['part_type']==5) || ($rowBrnd['part_type']==6) || ($rowBrnd['part_type']==7)) {
			// RHD	Elstock 226	Shaftec 4607	Remy 214	TRW 161	Bosch 30
			//echo $rowBrnd['brand']."====RHD<br>";
			// sequence updated, divided into 3 conditions on 16-12-2021
		// ------------------------------------------------------------------------

		if ($rowBrnd['part_type']==5) {
			// 5 RHD Power	Elstock 226	Shaftec 4607	Remy 214	TRW 161	Bosch 30	Bosch 2 377
			
			//echo $rowBrnd['brand']."====RHD Power<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(4607, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4607 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(161, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 161 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			//} else if (in_array(377, $arrBrnd)) {
			//	$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 377 ";
			} 
		}

		if ($rowBrnd['part_type']==6) {
			// 6 RHD Manual	Elstock 226	Shaftec 4607	Remy 214	TRW 161	Bosch 30	Bosch 2 377
			
			//echo $rowBrnd['brand']."====RHD Manual<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(4607, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4607 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(161, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 161 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			//} else if (in_array(377, $arrBrnd)) {
			//	$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 377 ";
			} 
		}

		if ($rowBrnd['part_type']==7) {
			// 7 RHD EPS 	Elstock 226	Bosch 30	Bosch 2 377	Shaftec 4607	Remy 214	TRW 161
			
			//echo $rowBrnd['brand']."====RHD EPS<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} else if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			//} else if (in_array(377, $arrBrnd)) {
			//	$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 377 ";
			} else if (in_array(4607, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4607 ";
			} else if (in_array(214, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 214 ";
			} else if (in_array(161, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 161 ";
			} 
		}

		if ($rowBrnd['part_type']==9) {
			// EGR Vlaves	Elstock	226
			//echo $rowBrnd['brand']."====EGR Vlaves<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(226, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 226 ";
			} 
		}

		//if (($rowBrnd['part_type']==10) || ($rowBrnd['part_type']==11)) {
		if ($rowBrnd['part_type']==10) {
			// Diesel Injectors	Bosch 30	DENSO  66,  CONTINENTAL/VDO  83,  DELPHI  89,  --CEVAM  393,  ALANKO  479,  VEGE  4739	--Lizarte 292
			//echo $rowBrnd['brand']."====Diesel Injectors<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} else if (in_array(66, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 66 ";
			} else if (in_array(83, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 83 ";
			} else if (in_array(89, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 89 ";
			} else if (in_array(479, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 479 ";
			} else if (in_array(4739, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4739 ";
			} 
		}

		if ($rowBrnd['part_type']==11) {
			// Diesel Pumps    	Bosch 30	DENSO  66,  CONTINENTAL/VDO  83,  DELPHI  89,  --CEVAM  393,  ALANKO  479,  VEGE  4739	--Lizarte 292
			//echo $rowBrnd['brand']."==== Diesel Pumps<br>";
			$arrBrnd = explode(',',$rowBrnd['brand']);

			if (in_array(30, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 30 ";
			} else if (in_array(66, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 66 ";
			} else if (in_array(83, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 83 ";
			} else if (in_array(89, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 89 ";
			} else if (in_array(479, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 479 ";
			} else if (in_array(4739, $arrBrnd)) {
				$updSQLb = "UPDATE tbl_rsa_app_matched_articles SET brandopt = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND partid = '".addslashes($rowBrnd['partid'])."' AND status = '1' AND brandno = 4739 ";
			} 
		}

		if ($updSQLb != "") {
		////$resultupb = mysqli_query($ndbconn, $updSQLb); // Run the query
		echo $updSQLb."<br>";
		}

	}
/*
*/
//---------------------------------------------------------------------------------------------------------------

echo('Location: matched_results.php?id='.$schid.'&carid='.$carid);
//header('Location: matched_results.php?id='.$schid.'&carid='.$carid);
die;
?>