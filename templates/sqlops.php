<?php

//include db
require_once('../database/db.php');

$name = $surname = $dep_name = $salary = $messages = $cust_names = [];
$noOfCustomers = 0;
//views
$view = "CREATE VIEW Personel_Salary_Less_Than_20000 AS SELECT c.name, c.surname, d.name as dname, d.salary FROM personel as c JOIN
        departments as d ON d.id = c.department_id WHERE d.salary < 20000";

$data = mysqli_query($conn, $view);
$getData = mysqli_query($conn, "SELECT * FROM Personel_Salary_Less_Than_20000") or trigger_error("Error");

if(mysqli_num_rows($getData) > 0){
  while($all_data = mysqli_fetch_assoc($getData)){
    $name [] = $all_data['name'];
    $surname [] = $all_data['surname'];
    $dep_name [] = $all_data['dname'];
    $salary [] = $all_data['salary'];

  }


}

//triggers
$create_trigger = "CREATE TRIGGER before_customer_insert BEFORE INSERT ON customers FOR EACH ROW SET NEW.full_name = CONCAT(NEW.name, ' ', NEW.surname)";
$drop_trigger = "DROP TRIGGER before_customer_insert";

if(isset($_POST['trigger'])){

  //query
  if(mysqli_query($conn, $create_trigger)){
    array_push($messages, "Trigger Created");
  }
  else{
    array_push($messages, "Trigger not created");
  }
}

if(isset($_POST['untrigger'])){
  $messages = [];
  if(mysqli_query($conn, $drop_trigger)){

    array_push($messages, "Trigger Dropped");

  }else{

    array_push($messages, "Trigger not dropped");

  }
}

//stored procedures
//set delimiter
if(isset($_POST['storedPro'])){
  if(mysqli_query($conn, "DELIMITER $$")){

    //create variable for stored procedure
    $str_pro = "CREATE PROCEDURE count_customers()";
    $str_pro .= "BEGIN SELECT id, name FROM customers; END $$";

    //execute query
    if(mysqli_query($conn, $str_pro)){

      //call procedure and get data
      //change delimiter
      if(mysqli_query($conn, "DELIMITER ;")){
        $customers = mysqli_query($conn, "CALL count_customers()");
        $noOfCustomers = mysqli_num_rows($customers);

        if($noOfCustomers > 0){
          while($cust_data = mysqli_fetch_assoc($customers)){
            $cust_names [] = $cust_data['name'];
          }
        }
      }

    }
  }
}


$title = "SQL Operations";
//include layout
include_once('layout.php');

?>

<style>
#sqlops-section .sqlops-inner{
  padding-top: 80px;
}
</style>

<section id="sqlops-section">
  <div class="sqlops-inner container">
    <div class="card">
      <div class="card-body">
        <div class="row">
        <div class="col-md-4">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#views" data-toggle="tab">Views</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#storedProcedures" data-toggle="tab">Stored Procedures</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#functions" data-toggle="tab">Functions</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#triggers" data-toggle="tab">Triggers</a>
            </li>
          </ul>
        </div>

        <div class="col-md-8">
          <div class="tab-content">
            <div class="tab-pane container active text-center" id="views">
              <h3 class="display-4 border-bottom py-2 my-3">Views</h3>
              <p class="lead py-2 my-2">
                SQL View to get the details of personel who earn a salary less than $20000
              </p>
              <?php if(count($name) > 0):?>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Department</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($name as $key=>$value):?>
                        <tr>
                          <td class="text-capitalize"><?php echo $value;?></td>
                          <td class="text-capitalize"><?php echo $surname[$key];?></td>
                          <td class="text-capitalize"><?php echo $dep_name[$key];?></td>
                          <td>$<?php echo $salary[$key];?></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              <?php endif;?>
            </div>
            <div class="tab-pane container fade" id="triggers">
              <h3 class="display-4 border-bottom py-2 my-3">Triggers</h3>
              <p class="lead py-2 my-2">
                Triggers input of customer full name after every insert statement
              </p>
              <div>
                <form action="#" method="post" class="mb-2">
                  <input class="btn btn-success" id="trigger" name="trigger" type="submit" value="Create Trigger">
                </form>
                <form action="#" method="post">
                  <input class="btn btn-danger" id="untrigger" name="untrigger" type="submit" value="Drop Trigger">
                </form>
              </div>
              <div class="d-block text-danger">
                <?php if(count($messages) > 0):?>
                  <?php foreach($messages as $message):?>
                    <?php echo $message;?>
                  <?php endforeach;?>
                <?php endif;?>
              </div>
            </div>
            <div class="tab-pane container fade" id="storedProcedures">
              <h3 class="display-4 border-bottom py-2 my-3">Stored Procedure</h3>
              <p class="lead py-2 my-2">
                Stored Procedure to count number of customers in the table
              </p>
              <div>
                <form class="mb-2" action="" method="post">
                  <input class="btn btn-primary" type="submit" value="setProcedure" id="storedPro" name="storedPro">
                </form>
                <p>
                  <?php if($noOfCustomers > 0):?>
                    Customer Names: <?php if(count($cust_names) > 0): foreach($cust_names as $value): echo $value;endforeach;endif;?>
                    No Of Customer:<?php echo $noOfCustomers;?>
                  <?php endif;?>
                  <?php

                  if(mysqli_query($conn, "CREATE PROCEDURE customersData() BEGIN SELECT id, name FROM customers; END $$")){

                    //CALL PROCEDURE
                    $cust_data = mysqli_query($conn, "CALL customersData()");
                    if($cust_data){

                      //count
                      $cust_count = mysqli_num_rows($cust_data);

                      if($cust_count > 0){
                        echo "<table><thead><tr><th>Name</th></thead><tbody>";
                        while($cust_all = mysqli_fetch_assoc($cust_data)){
                          echo "<tr><td>".$cust_all['name']."</td></tr>";
                        }
                        echo "</tbody></table>";
                        echo "<b>Cust Count: </b>".$cust_count;
                      }
                    }
                  }


                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  </div>
</section>

<script>

  $(document).ready(function(){

    })
  });
</script>
