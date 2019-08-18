<?php
     include("config.php");
    require  'src/Medoo.php';
    use Medoo\Medoo;

    $pdo = new PDO("mysql:dbname=$dbDatabase;host=$dbServer", $dbUsername, $dbPassword);

    $database = new Medoo([
	// Initialized and connected PDO object
	'pdo' => $pdo,
 
	// [optional] Medoo will have different handle method according to different database type
	'database_type' => 'mysql'
    ]);
    // $table='membership_groups';
    // $name="fuck";
    // $description="this is a test";
    

    if(isset($_POST['table'])){
        $table=$_POST['table'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['description'])){
        $description=$_POST['description'];
    }
    
    switch($table){
        case 'membership_groups':
        $grp=$database->select("membership_groups","name",["name" => $name]);

        if($grp[0]== $name){break;}

        $datas=$database->insert("membership_groups",[
            "name"=>$name,
            "description"=>"$description",
            "allowSignup"=>1,
            "needsApproval"=>1
        ]);
        break;
    }

    $grp=$database->select("membership_groups","*",["name" => $name]);
            
    echo json_encode($grp);

?>