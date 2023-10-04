<?php
    $teamName = "A";
    $members = [
        "Иванов Иван",
        "Васильев Василий",
        "Кириллов Кирилл",
        "Антонов Антон",
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Участники команды "<?=$teamName?>"</title>
</head>
<body>
    <h2>Список участников команды "<?=$teamName?>"</h2>
    <?php
        function printTeamMembers(array $members): void
        {
            echo "<ol>";
                foreach ($members as $member) {
                    echo "<li>$member</li>";
                }
            echo "</ol>";
        }
    ?>
    <?php printTeamMembers($members);?>
</body>
</html>
