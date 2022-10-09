<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Dashboard</title>
        <script crossorigin="anonymous" src="https://kit.fontawesome.com/f325a34ebe.js"></script>
    </head>
    <body>
        <nav>
            <span></span>
        </nav>
        <main>
            <div class="stats">
                <div><h1>Flipkart</h1></div>
                <div><h1>Amazon</h1></div>
                <div><h1>Myntra</h1></div>
            </div>
            <div class="graphs">
                <script src="chart.js"></script>
            <canvas id="myChart"></canvas>
            <script >
                it = [];
                un = [];
                fetch('new.json')
                .then(response=>response.json())
                .then(data=>{
                    for (let i = 0; i < data.length; i++) {
                        const element = data[i];
                        it[i]=data[i].item ;
                        un[i]=data[i].units;
                    }

                })
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: it,
                datasets: [{
                    data : un,
                    label:"Units Sold",
                }]}})
            </script>
            </div>
        </main>
        <aside>
            <div class="order-card">
                <img src="flipkart.svg">
                <h2>  Name 1</h2> 
                <p class="order-id">OD117216332413925000</p>
                <p class="delivery">Delivery:&nbsp;<span>21 October, 2022</span></p>
            </div>
            <div class="order-card pending-approval">
                <img src="amazon.svg">
                <h2>  Name 2</h2>
                <p class="order-id">OD117216332413925001</p>
                <p class="delivery">Delivery:&nbsp;<span>18 November, 2022</span></p>
                <span  class="approve"><i class="fa fa-check"></i>Approve</span>
                <span onclick=" " class="reject"><i class="fa fa-times"></i>Reject</span>
            </div>
            <div class="order-card">
                <img src="myntra.svg">
                <h2>  Name 3</h2>
                <p onclick="" class="order-id">OD117216332413925002</p>
                <p onclick=" " class="delivery">Delivery:&nbsp;<span>5 December, 2022</span></p>
            </div>
            <div class="order-card pending-approval">
                <img src="flipkart.svg">
                <h2>  Name 4</h2>
                <p class="order-id">OD117216332413925003</p>
                <p class="delivery">Delivery:&nbsp;<span>16 December, 2022</span></p>
                <span onclick="" class="approve"><i class="fa fa-check"></i>Approve</span>
                <span onclick=" " class="reject"><i class="fa fa-times"></i>Reject</span>
            </div>
            <div class="order-card">
                <img src="amazon.svg">
                <h2>  Name 5</h2>
                <p onclick="" class="order-id">OD117216332413925004</p>
                <p onclick=" " class="delivery">Delivery:&nbsp;<span>10 January, 2022</span></p>
            </div>
        </aside>
        <script src="scripts.js"></script>
    </body>
</html>