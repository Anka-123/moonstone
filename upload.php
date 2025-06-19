<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.O.O.N.S.T.O.N.E</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/download (7).jpg" class="icon">
</head>
<body>
    <?php
    include 'header.php';
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "unknow_user";
}    
    ?>
    <main>
        <div class="done">
            <h1>
            <?php
            if ($_FILES['myFile'] && isset($_SESSION['user'])) {
                $uploadBaseDir = 'uploads/';
                $username = $_SESSION['user']; // მომხმარებლის სახელი

                // 1. მომხმარებლის საქაღალდე
                $userFolder = $uploadBaseDir . $username . '/';

                // 2. საქაღალდის შექმნა, თუ არ არსებობს
                if (!file_exists($userFolder)) {
                    mkdir($userFolder, 0777, true);
                }

                // 3. ფაილის სახელი და გაფართოება
                $originalName = pathinfo($_FILES['myFile']['name'], PATHINFO_FILENAME);
                $extension = pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION);

                // 4. უნიკალური სახელი (გადაწერის თავიდან ასაცილებლად)
                $uniqueId = uniqid('_', true);
                $newFileName = $originalName . $uniqueId . '.' . $extension;

                // 5. სრული ბილიკი
                $targetFile = $userFolder . $newFileName;

                // 6. ატვირთვა
                if (move_uploaded_file($_FILES['myFile']['tmp_name'], $targetFile)) {
                    echo "ფაილი წარმატებით აიტვირთა საქაღალდეში: <strong>$username</strong>";
                } else {
                    echo "ფაილის ატვირთვისას მოხდა შეცდომა.";
                }
            } else {
                echo "ფაილი ან მომხმარებელი არ არის მითითებული.";
            }
            ?>
            </h1>
            <div>
                <form action="index.php" method="post">
                    <input type="submit" value="მთავარ გვერდზე დაბრუნება">
                </form>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
