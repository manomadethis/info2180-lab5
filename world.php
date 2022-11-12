<style><?php include 'world.css'; ?></style>
<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$mys = 'is ruled by';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");

//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);
$coun = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $coun->fetchAll(PDO::FETCH_ASSOC);

$mycity = $conn->query("SELECT cities.name, cities.district, cities.population
          FROM cities join countries on cities.country_code=countries.code
          WHERE countries.name='$country'");


$city = $mycity->fetchAll(PDO::FETCH_ASSOC);


?>
<!-- <?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?> -->


<?php if(!isset($context)):?>
  <link href="world.css" type="text/css" rel="stylesheet" />
  <table class = "display1">
    <caption><h2>TABLE SHOWING COUNTRIES</h2></caption>
    <thead>
      <tr>
        <th class = "th1">Name</th>
        <th class = "th2">Continent</th>
        <th class = "th3">Independence</th>
        <th class = "th4">Name of State</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $country): ?>
        <tr>
          <td><?php echo $country['name']; ?></td>
          <td><?php echo $country['continent']; ?></td>
          <td><?php echo $country['independence_year']; ?></td>
          <td><?php echo $country['head_of_state']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
<?php if(isset($context)):?>
  <link href="world.css" type="text/css" rel="stylesheet" />
  <table class = "display2">
    <caption><h2>TABLE SHOWING CITIES</h2></caption>
    <thead>
      <tr>
        <th class = "th11">Name</th>
        <th class = "th12">District</th>
        <th class = "th13">Population</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($city as $city): ?>
        <tr>
          <td><?php echo $city['name']; ?></td>
          <td><?php echo $city['district']; ?></td>
          <td><?php echo $city['population']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>