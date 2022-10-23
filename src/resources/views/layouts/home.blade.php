<!DOCTYPE html>
<html lang="ja">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->

    <!-- font awesome, calender -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- stylesheet -->
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/style.css')}}">
    <title>@yield('title')</title>

    <!-- graph -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- json用 -->
    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<head>

<header class="header inner">
        <h1>
            <img src="{{asset('/posse_logo.jpeg')}}" alt="POSSE">
        </h1>
        <p class="unit">@yield('week') week</p>
        <div id="header_button" class="button" onclick="open_modal()">
            <p>記録・投稿</p>
        </div>
    </header>

    <div class="container">
        <section class="first_section">
            <section class="first_top">
                <div class="card period">
                    Today
                    <p class="number">
                        <?php 
                            // foreach ($hours_par_day as $hour_par_day) {
                            // echo $hour_par_day['hours'];
                            echo 'とりま';
                            // };
                        ?>
                    </p>
                    <p class="unit">hour</p>
                </div>

                <div class="card period">
                    Month
                    <p class="number">
                        <?php 
                        // foreach ($hours_par_month as $hour_par_month) {
                        //     echo $hour_par_month['total'];
                        // }; 
                        echo 'とりま2';
                        ?>
                    </p>
                    <p class="unit">hour</p>
                </div>

                <div class="card period">
                    Total
                    <p class="number">
                        <?php 
                        // foreach ($hours_total as $hour_total) {
                        // echo $hour_total['total2'];
                        // }; 
                        echo 'とりま3';
                        ?>
                    </p>
                    <p class="unit">hour</p>
                </div>
            </section>
            <!-- 棒グラフ -->
            <section class="first_bottom">
                <div class="card graph">
                    <div id="columnchart" style="width: 100%;"></div>
                </div>
            </section>
        </section>

        <section class="second_section">
            <!-- 円グラフ -->
            <div class="card title">学習時間
                <div id="donutchart" style="width: 100%;"></div>
            </div>
            <div class="card title">学習コンテンツ
                <div id="donutchart2" style="width: 100%;"></div>
            </div>
        </section>
    </div>
    <section class="for_mobile">
        <div>
            <i class="fas fa-chevron-left blue"></i>
            <p>2020年 10月</p>
            <i class="fas fa-chevron-right blue"></i>
        </div>
    </section>
    
    <footer class="footer">
        <div class="button2" onclick="open_modal()">
            <p>記録・投稿</p>
        </div>
    </footer>
</html>
