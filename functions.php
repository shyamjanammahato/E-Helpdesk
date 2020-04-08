<?php
  //User Defined Functions start...
    function redirect($filename) { //Function for redirect URL
        if (!headers_sent())
            header('Location: '.$filename);
        else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$filename.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
            echo '</noscript>';
        }
    }


    function generate_emp_id() //Function for generate employee id
    {
      include 'connect-db.php';
      $n = 0;
      $result = mysqli_query($conn,"SELECT * FROM emp_dtls");
      $num_rows = mysqli_num_rows($result);
      $cy=date('Y');
      $l = "EMP".$cy;
      if ($n == 9999) {
        $n = 0;
        $l++;
      }
      $id = $l . sprintf("%04d", $num_rows+1);
      return $id;
    }

    function generate_package_id() //Function for generate employee id
    {
      include 'connect-db.php';
      $n = 0;
      $result = mysqli_query($conn,"SELECT * FROM package_tbl");
      $num_rows = mysqli_num_rows($result);
      $cdmy=date('d-m-Y');
      $l = "AMK/".$cdmy."/";
      if ($n == 999999) {
        $n = 0;
        $l++;
      }
      $id = $l . sprintf("%06d", $num_rows+1);
      return $id;
    }

    //insert function
    function insert($tbl,$data)
    {
    	include 'connect-db.php';
    	$fld = "";
    	$insert_suc = "";
    	$c=0;
    	$get_ins = mysqli_query($conn,"SHOW COLUMNS FROM $tbl");
    	while($row_ins = mysqli_fetch_array($get_ins))
    	{
    		$c++;
    		$f=$row_ins['Field'];
    		if($c!=1)
    		{
    			$fld.="$f,";
    		}
    	}

    	$fld=rtrim($fld,",");

    	$query_ins = "INSERT INTO $tbl($fld) VALUES ($data)";
    	$result_ins = mysqli_query($conn,$query_ins);
    	return $insert_suc;
    }
    //User Defined Functions stop...

    //update function
    function update($tbl,$data,$unique_fld,$sl)
    {
    		$query_update = "UPDATE $tbl SET $data WHERE $unique_fld='$sl'";
    		$result_update = mysqli_query($conn,$query_update);
    		return $update1;
    }

    //Menu Create functions
    function display_children($parent_menu, $level) {
      include 'connect-db.php';
        $result = mysqli_query($conn,"SELECT a.sl, a.menu_nm,a.menu_icon, a.menu_link, Deriv1.Count FROM `admin_menu_tbl` a LEFT OUTER JOIN (SELECT parent_menu, COUNT(*) AS Count FROM `admin_menu_tbl` GROUP BY parent_menu) Deriv1 ON a.sl = Deriv1.parent_menu WHERE a.parent_menu='".$parent_menu."' Order by menu_rank asc");

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Count'] > 0) {
              ?>
              <li>
                <a href="<?php echo $row['menu_link'];?>" class="waves-effect">
                  <i data-icon="&#xe008;" class="fa fa-fw <?php echo $row['menu_icon'];?>"></i>
                  <span class="hide-menu"><?php echo $row['menu_nm'];?>
                    <span class="fa arrow"></span>
                    <span class="label label-rouded label-purple pull-right"><?php echo $row['Count'];?></span>
                  </span>
                </a>
                <ul class="nav nav-second-level">
                <?php
                $result1=mysqli_query($conn,"SELECT b.sl, b.menu_nm,b.menu_icon, b.menu_link,b.parent_menu FROM `admin_menu_tbl` b WHERE b.parent_menu='".$row['sl']."' order by menu_rank asc");
                while ($row1 = mysqli_fetch_assoc($result1))
                {
                ?>
                   <li>
                     <a href="<?php echo $row1['menu_link'];?>"><?php echo $row1['menu_nm'];?></a>
                   </li>
                <?php
                }
                ?>
                </ul>
              </li>
              <?php
            }
            elseif ($row['Count']==0) {
                echo "<li><a href='".$row['menu_link']."' class=waves-effect><i data-icon=&#xe008 class='fa fa-fw " . $row['menu_icon'] . "'></i> <span class=hide-menu>".$row['menu_nm']."</a></li>";
            } else;
        }

    }
?>
