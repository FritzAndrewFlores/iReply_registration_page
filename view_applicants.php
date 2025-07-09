<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "ireply");

// Fetch applicants
$result = $conn->query("SELECT * FROM applicants");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Applicants</title>
  <link rel="stylesheet" href="style.css"> <!-- Uses your existing style -->
  <style>
    .admin-header {
      background-color: #1f253a;
      padding: 15px 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .admin-header img {
      height: 50px;
    }

    .admin-buttons {
      margin: 20px auto;
      display: flex;
      justify-content: center;
      gap: 30px;
    }

    .admin-buttons button {
      padding: 10px 25px;
      border-radius: 8px;
      background-color: #a0a0a0;
      border: none;
      font-weight: 500;
      cursor: pointer;
    }

    .applicants-container {
      padding: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    table thead {
      background-color: #444;
      color: white;
    }

    table thead th {
      padding: 12px;
      text-align: left;
      font-size: 14px;
    }

    table tbody td {
      padding: 10px 12px;
      background-color: #e0e0e0;
      border-bottom: 1px solid #ccc;
    }

    .thead-id {
      background-color: #00b894 !important;
      color: white !important;
    }
  </style>
</head>
<body>

  <header class="admin-header">
    <img src="logo.png" alt="iReply Logo">
  </header>

  <div class="admin-buttons">
    <button>Administration</button>
    <button>Users</button>
    <button>Settings</button>
  </div>

  <div class="applicants-container">
    <h2>Applicants</h2>
    <table>
      <thead>
        <tr>
          <th class="thead-id">ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Attachments</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row["id"] ?></td>
          <td><?= $row["first_name"] ?></td>
          <td><?= $row["last_name"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["phone"] ?></td>
          <td><a href="<?= $row["resume_path"] ?>" target="_blank">View Resume</a></td>
          <td>Applicant</td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</body>
</html>

