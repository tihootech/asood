<?php


include 'db.php';
include 'functions.php';

if (isset($_GET['type'])) {

    $type = $_GET['type'];
    $ip = clientIP();

    if ($type == 'clear') {
        $query = "DELETE FROM `people` WHERE `ip`='$ip'";
        $result = mysqli_query($conn, $query);
        echo $result;
    }

    if ($type == 'kashf') {

        // چک کردن اینکه شخصی با این آیپی تو 24ساعت گذشته کشف آسود کرده یا نه
        $query = "SELECT * FROM `people` WHERE `ip`='$ip' AND `date` >= NOW() - INTERVAL 1 DAY";
        $result = mysqli_query($conn, $query);
        $person = mysqli_fetch_assoc($result);


        if ($person) { // اگر یدا شد یعنی این شخص تو 24 ساعت گذشته ثبت نام کرده
            $output = [
                'result' => 0 // صفر یعنی این شخص تو 24 ساعت گذشته ثبت نام کرده
            ];
        }else {
            // اگر پیدا نشد یعنی اجازه قرعه کشی دارد و نتیجه رو تو دیتابیس ثبت میکنیم
            $code = rand(10000000, 99999999); // تولید یک کد رندم
            $planets = planets();
            $planet = $planets[array_rand($planets)]; // انتخاب یک سیاره رندم
            $query = "INSERT INTO people(ip,code,planet) VALUES('$ip', '$code', '$planet');";
            mysqli_query($conn, $query);
            $output = [
                'result' => 1, // یک یعنی موفقیت آمیز بود
                'code' => $code,
                'planet' => $planet,
            ];
        }

        echo json_encode($output);
    }

}



if (isset($result)) {
    mysqli_free_result($result);
}
if (isset($conn)) {
    mysqli_close($conn);
}
