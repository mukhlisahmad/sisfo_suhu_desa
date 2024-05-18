<section class="content-header">

    <ol class="breadcrumb">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <b>Wellcome</b>
            </a>
        </li>
    </ol>
</section>
<section class="content-header">
    <h1>Tim Kami</h1>
</section>
<style>
    .team {
    border: 2px solid #ddd;
    padding: 20px;
    text-align: center;
}

.team img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-bottom: 20px;
}

.team h4 {
    font-size: 20px;
    margin-bottom: 15px;
}

.team a {
    color: #555;
    margin-right: 10px;
    font-size: 24px;
    transition: color 0.3s;
}

.team a:hover {
    color: #007bff;
}

</style>
<section class="content">
        <div class="card card-primary">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-body">
                        <div style="border-radius:20px;padding:20px;" class="team">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#panicModal">
                                <img src="dist/img/tombol.png" alt="tombol danger" style="width: 100%; height: auto;">
                            </a>
                        <h3 class="card-title"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
 <div class="modal fade" id="panicModal" tabindex="-1" aria-labelledby="panicModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="panicModalLabel">Informasi Bahaya dan Lokasi Wilayah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                
                        <p>Jika Anda menemukan diri Anda dalam situasi darurat atau bahaya, harap segera menghubungi pihak berwenang atau layanan darurat setempat.</p>
                        <p>Pilih Lokasi Wilayah</p>
                        <center>
            
                        <table>
                            <tr>
                                <td>
                                    <a target="_blank"type="button" class="btn btn-primary btn-lg"href=" ">Wilayah Selatan</a>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <a target="_blank"type="button" class="btn btn-primary btn-lg"href=" ">Wilayah Utara</a>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <a target="_blank"type="button" class="btn btn-primary btn-lg"href=" ">Wilayah Timur</a>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <a target="_blank"type="button" class="btn btn-primary btn-lg"href=" ">Wilayah Barat</a>
                                </td>
                            </tr>
                
                         </table>
                         </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
