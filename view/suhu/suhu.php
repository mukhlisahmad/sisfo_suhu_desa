<?php
include 'koneksi.php';

$query = "SELECT tanggal, DATE_FORMAT(tanggal, '%W') AS hari, waktu, pelanggan, suhu FROM logs ORDER BY tanggal DESC, waktu ASC";
$result = mysqli_query($koneksi, $query);
$suhuData = array();

while ($row = mysqli_fetch_assoc($result)) {
    $suhuData[] = $row;
}
?>
<section class="content">
    <div class="card card-primary">
    <div class="card-body">
        <center>
            <h4>Reload Browser Untuk Menampilkan Data Suhu Terbaru</h4>
        </center>
    </div>
    </div>
</section>
<div class="container-xxl flex-grow-1 container-p-y">
<?php $latestData = end($suhuData);?>

<section class="content">
    <div class="card card-primary">
    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                        <h4>Suhu & Kelembapan sekarang di Desa</h4>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">Tanggal</h3>
                            <p class="text-success mb-0"> ( <?php echo $latestData['tanggal']; ?> )</p>
                          </div>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">Hari</h3>
                            <p class="text-success mb-0">( <?php echo $latestData['hari']; ?> )</p>
                          </div>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">Waktu</h3>
                            <p class="text-danger mb-0">( <?php echo $latestData['waktu']; ?> )</p>
                          </div>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">Suhu</h3>
                            <p class="text-success mb-0">( <?php echo $latestData['suhu']; ?>°C )</p>
                          </div>


                        </div>
                        <span class="badge bg-label-success rounded p-2">
                          <i class="ti ti-user-check ti-sm"></i>
                        </span>
                      </div>


              </div>

            </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<hr>
<style>
    #suhuChartLabels {

}

</style>
<section class="content">
    <div class="card card-primary">

            <p class="mb-4">Monitoring Suhu Harian setiap 25 menit</p>
            <canvas id="suhuChart"></canvas>

    </div>
</section>
<hr>
<section class="content">
    <div class="card card-primary">
        <div class="card-body">
            <p class="mb-4">Monitoring Suhu Harian per 10 detik</p>

            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>

                                <th>TANGGAL</th>
                                <th>HARI</th>
                                <th>WAKTU</th>
                                <th>SUHU</th>

                            </tr>
                        </thead>
                        <tbody id="suhu-data">
    <?php foreach (array_reverse($suhuData) as $data): ?>
        <tr>
            <td><?php echo $data['tanggal'] ?></td>
            <td><?php echo $data['hari'] ?></td>
            <td><?php echo $data['waktu'] ?></td>
            <td><?php echo $data['suhu'] ?>°C</td>

        </tr>
    <?php endforeach;?>
</tbody>



                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){

    drawChart(<?php echo json_encode($suhuData); ?>);
});
function drawChart() {
    var labels = [];
    var suhuData = [];
    var interval = 200;
    var intervalCount = 0;
    var lastHour = null;

    $('#suhu-data tr').each(function () {
        var $row = $(this);
        var waktu = $row.find('td:eq(2)').text();

        var hour = parseInt(waktu.split(':')[0]);

        if (hour !== lastHour || intervalCount === interval) {
            var hari = $row.find('td:eq(1)').text();
            labels.push(hari + ' ' + waktu);
            suhuData.push(parseFloat($row.find('td:eq(4)').text()));
            intervalCount = 0;
            lastHour = hour;
        }

        intervalCount++;
    });

    var ctx = document.getElementById('suhuChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Suhu Harian',
                data: suhuData,
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 3,
                borderDash: [5, 5],
                }]
        },
        options: {
    scales: {
        x: {
            display: false
        },
        y: {
            beginAtZero: false
        }
    }
}

    });
}
</script>