<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: linear-gradient(to bottom, #FFF8E1, #F5DEB3);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 40px;
        }
        .paper {
            background: white;
            width: 800px;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
            position: relative;
        }
        h1 { text-align: left; text-transform: uppercase; }
        h2 { border-bottom: 2px solid black; margin-top: 30px; }
        ul { list-style: none; padding: 0; }
        .skills-list { list-style: disc; padding-left: 20px; }
        .profile-pic {
            width: 140px; height: 140px; object-fit: cover;
            position: absolute; top: 40px; right: 40px;
            border: 2px solid #ccc;
        }
        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: darkred;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
        .logout-btn:hover { background: crimson; }
    </style>
</head>
<body>

<div class="paper">
    <img src="ID.jpg" alt="Profile Picture" class="profile-pic">

    <?php
    $name = "NICOLE A. RAFOLS"; 
    $address = "0324 Centro-Uno, Brgy. Calitcalit, San Juan, Batangas";
    $mobile = "+639627224651";
    $email = "21-08560@g.batstate-u.edu.ph";

    $personal_data = [
        "Date of Birth" => "May 08, 2002",
        "Place of Birth"=> "San Juan, Batangas",
        "Civil Status"=> "Single",
        "Citizenship"=> "Filipino",
        "Religion"=> "Protestant",
        "Height"=> "5'4 feet",
        "Weight"=> "143 lbs",
    ];

    $education_data = [
        "Primary" => [
            "school"=> "San Juan West Central School (Class 2015)",
            "awards"=> ["Musician of the Year"]
        ],
        "Secondary"=> [
            "school"=> "Joseph Marello Institute, Inc. (Class 2021)",
            "awards"=> [
                "Aerospace Cadets of the Philippines Awardee",
                "Academic Achiever (With Honors)"
            ]
        ],
        "Tertiary"=> [
            "school"=> "Batangas State University - TNEU",
            "program"=> ["Bachelor of Science in Computer Science"]
        ],
    ];

    $skills = [
        "Python for Data Analysis",
        "SQL for Databases",
        "Data Visualization (Matplotlib, Seaborn, Excel)"
    ];
    ?>

    <h1><?= $name; ?></h1>
    <p><?= $address; ?><br>Mobile: <?= $mobile; ?><br>Email: <a href="mailto:<?= $email; ?>"><?= $email; ?></a></p>

    <h2>Personal Data</h2>
    <ul>
        <?php foreach ($personal_data as $label => $value): ?>
            <li><strong><?= $label; ?>:</strong> <?= $value; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Educational Background</h2>
    <ul>
        <?php foreach ($education_data as $level => $info): ?>
            <li>
                <strong><?= $level; ?>:</strong> <?= $info["school"]; ?>
                <?php if (!empty($info["awards"])): ?>
                    <ul>
                        <?php foreach ($info["awards"] as $award): ?>
                            <li><em><?= $award; ?></em></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if (!empty($info["program"])): ?>
                    <ul>
                        <?php foreach ($info["program"] as $program): ?>
                            <li><em><?= $program; ?></em></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Skills</h2>
    <ul class="skills-list">
        <?php foreach ($skills as $skill): ?>
            <li><?= $skill; ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<a href="logout.php" class="logout-btn">Logout</a>

</body>
</html>
