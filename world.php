<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET["country"];
$cities = $_GET["lookup"];
$country = filter_var($country, FILTER_SANITIZE_STRING);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($cities === 'NA'){
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  countryCall($results);

}elseif($cities === 'cities'){
  $stmt = $conn->query("SELECT c.name, c.district, c.population  FROM cities c join countries cs on c.country_code = cs.code  WHERE cs.name LIKE '%$country%'");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  cityCall($results);
}




?>

<?php function countryCall($results){ ?>
  <table id="cTable">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Continent</th>
      <th scope="col">Independence</th>
      <th scope="col">Head of State</th>
    </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['continent'] ?></td>
      <td><?= $row['independence_year'] ?></td>
      <td><?= $row['head_of_state'] ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php } ?>

<?php function cityCall($results){ ?>
  <table id="citTable">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">District</th>
      <th scope="col">Population</th>
    </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['district'] ?></td>
      <td><?= $row['population'] ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php } ?>