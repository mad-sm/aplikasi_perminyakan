<?php
include "header.php";
?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Selamat Datang di Aplikasi Keekonomian Migas
            <small>Simulasi dan Analisis Keekonomian Lapangan Minyak</small>
          </h1>
        </section>

        <section class="content">
          <div class="box box-primary">
            <div class="box-body">
              <p>
                Aplikasi ini digunakan untuk melakukan perhitungan <strong>keekonomian lapangan minyak dan gas bumi</strong>,
                seperti estimasi produksi, pendapatan, biaya operasional, pajak, hingga net cash flow (NCF) selama umur proyek.
              </p>

              <p>
                Tujuan utama dari aplikasi ini adalah untuk membantu analis atau insinyur perminyakan dalam:
              </p>

              <ul>
                <li>Melakukan simulasi keekonomian berdasarkan input cadangan dan produksi</li>
                <li>Menghitung Net Cash Flow tahunan dan total NCF</li>
                <li>Membantu pengambilan keputusan investasi</li>
                <li>Menyimpan hasil perhitungan dalam format csv</li>
              </ul>

              <p>
                Silakan mulai dengan memilih menu <strong>"Perhitungan"</strong> di sidebar untuk memasukkan data produksi dan biaya.
              </p>

              <div class="callout callout-info">
                <h4>Catatan:</h4>
                <p>Aplikasi ini berjalan secara lokal dan tidak memerlukan koneksi database. Semua hasil perhitungan harap langsung disimpan dalam bentuk csv.</p>
              </div>
            </div>
          </div>
        </section>
      </div><!-- /.content-wrapper -->
<?php
include "footer.php";
?>