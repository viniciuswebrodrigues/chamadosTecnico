<?php
include '../conexao.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (id LIKE :id or 
        ide LIKE :ide OR 
        terminal LIKE :terminal or
        modelo LIKE :modelo or 
        ultima_venda LIKE :ultima_venda or
        sonda LIKE :sonda or 
        status LIKE :status)";
   $searchArray = array( 
        'id'=>"%$searchValue%", 
        'ide'=>"%$searchValue%",
        'terminal'=>"%$searchValue%",
        'modelo'=>"%$searchValue%",
        'ultima_venda'=>"%$searchValue%",
        'sonda'=>"%$searchValue%",
        'status'=>"%$searchValue%"
   );
}

## Total number of records without filtering

$stmt = $conexao->prepare("SELECT COUNT(*) AS allcount FROM `metroatm` WHERE STATUS IS null");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $conexao->prepare("SELECT COUNT(*) AS allcount FROM metroatm WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $conexao->prepare("SELECT * FROM metroatm WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
   $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach($empRecords as $row){
   $data[] = array(
      "id"=>$row['id'],
      "ide"=>$row['ide'],
      "terminal"=>$row['terminal'],
      "modelo"=>$row['modelo'],
      "ultima_venda"=>$row['ultima_venda'],
      "sonda"=>$row['sonda'],
      "status"=>$row['status'],
      "fit"=>'<a href="fit.php?id='.$row['id'].'"class="btn btn-secondary btn-sm fit" role="button">Fit</a>'
   );
}

## Response
$response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
);

echo json_encode($response);