<?php
include "../../header.php";
?>
<div class="content-wrapper">
<section class="content">
<div class="container mt-5">
    <h2 class="mb-4">Model Keekonomian Lapangan Migas</h2>

    <form id="inputForm">
        <div class="form-group">
            <label>Harga Minyak ($/bbl):</label>
            <input type="number" id="hargaMinyak" class="form-control" value="32">
        </div>
        <div class="form-group">
            <label>Capital ($M):</label>
            <input type="number" id="capital" class="form-control" value="13000">
        </div>
        <div class="form-group">
            <label>Non-Capital ($M):</label>
            <input type="number" id="nonCapital" class="form-control" value="8000">
        </div>
        <div class="form-group">
            <label>Opex Tahun 1-3 ($M):</label>
            <input type="number" id="opexAwal" class="form-control" value="180">
        </div>
        <div class="form-group">
            <label>Penurunan Produksi (% per tahun mulai tahun ke-5):</label>
            <input type="number" id="declineRate" class="form-control" value="3">
        </div>
        <div class="form-group">
            <label>Pajak (%):</label>
            <input type="number" id="taxRate" class="form-control" value="51">
        </div>
        <div class="form-group">
            <label>Produksi Tahun 1-4 (Mbbl, pisahkan dengan koma):</label>
            <input type="text" id="produksiInput" class="form-control" value="175,201,217,198">
        </div>
        <button type="button" class="btn btn-primary" onclick="hitung()">Hitung</button>
        <button type="button" class="btn btn-success" onclick="exportCSV()">Unduh Hasil (CSV)</button>
    </form>

    <hr>
    <div id="hasil" class="table-responsive"></div>
    <canvas id="grafikNCF" height="100" class="my-4"></canvas>
</div>
</section>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let data = [];

function hitung() {
    data = [];

    const hargaMinyak = parseFloat(document.getElementById("hargaMinyak").value);
    const capital = parseFloat(document.getElementById("capital").value);
    const nonCapital = parseFloat(document.getElementById("nonCapital").value);
    const opexAwal = parseFloat(document.getElementById("opexAwal").value);
    const declineRate = parseFloat(document.getElementById("declineRate").value) / 100;
    const taxRate = parseFloat(document.getElementById("taxRate").value) / 100;
    const produksiInput = document.getElementById("produksiInput").value.split(',').map(p => parseFloat(p.trim()));
    const totalTahun = 10;
    const depresiasiPerTahun = capital / totalTahun;

    let hasilHTML = "";
    let totalNCF = 0;

    for (let tahun = 0; tahun <= totalTahun; tahun++) {
        let produksi = 0, income = 0, opex = 0, di = 0, taxableIncome = 0, tax = 0, ncf = 0;

        if (tahun >= 1 && tahun <= 4) {
            produksi = produksiInput[tahun - 1] || 0;
        } else if (tahun >= 5) {
            produksi = data[tahun - 1].produksi * (1 - declineRate);
        }

        income = produksi * hargaMinyak;

        if (tahun === 1 || tahun === 2 || tahun === 3) {
            opex = opexAwal;
        } else if (tahun >= 4) {
            opex = data[tahun - 1].opex * (1 + 0.025);
        }

        di = (tahun === 0) ? 0 : depresiasiPerTahun;
        taxableIncome = income - opex - di;
        tax = taxableIncome > 0 ? taxableIncome * taxRate : 0;

        if (tahun === 0) {
            ncf = -(capital + nonCapital);
        } else {
            ncf = income - opex - tax;
        }

        totalNCF += ncf;

        data.push({
            tahun,
            produksi,
            income,
            investasi: tahun === 0 ? (capital + nonCapital) : 0,
            opex,
            depresiasi: di,
            taxableIncome,
            tax,
            ncf
        });
    }

    hasilHTML += "<h4>Hasil Perhitungan NCF</h4><table class='table table-bordered'><thead><tr><th>Tahun</th><th>Produksi</th><th>Income</th><th>Investasi</th><th>Opex</th><th>Depresiasi</th><th>Taxable Income</th><th>Tax</th><th>NCF</th></tr></thead><tbody>";

    data.forEach(d => {
        hasilHTML += `<tr>
            <td>${d.tahun}</td>
            <td>${d.produksi.toFixed(2)}</td>
            <td>${d.income.toFixed(2)}</td>
            <td>${d.investasi > 0 ? d.investasi.toFixed(2) : ""}</td>
            <td>${d.opex.toFixed(2)}</td>
            <td>${d.depresiasi.toFixed(2)}</td>
            <td>${d.taxableIncome.toFixed(2)}</td>
            <td>${d.tax.toFixed(2)}</td>
            <td>${d.ncf.toFixed(2)}</td>
        </tr>`;
    });

    hasilHTML += "</tbody></table>";
    hasilHTML += `<p><strong>Total NCF (10 tahun): $${totalNCF.toFixed(2)} M</strong></p>`;
    document.getElementById("hasil").innerHTML = hasilHTML;

    // ====== Grafik Akumulasi NCF ======
const labels = data.map(d => "Tahun " + d.tahun);

    let cumulativeNCF = 0;
    const ncfData = data.map(d => {
        cumulativeNCF += d.ncf;
        return cumulativeNCF.toFixed(2);
    });

    if (window.ncfChart) {
        window.ncfChart.destroy();
    }

    const ctx = document.getElementById("grafikNCF").getContext("2d");
    window.ncfChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [{
                label: "Cumulative Net Cash Flow",
                data: ncfData,
                borderColor: "rgba(54, 162, 235, 1)",
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                fill: true,
                tension: 0.3,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Grafik Akumulasi Net Cash Flow (NCF)"
                },
                tooltip: {
                    mode: "index",
                    intersect: false
                }
            },
            interaction: {
                mode: "nearest",
                axis: "x",
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: "Total Akumulasi NCF ($M)"
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: "Tahun"
                    }
                }
            }
        }
    });


    const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.setAttribute("href", url);
    link.setAttribute("download", "hasil-keekonomian-migas.csv");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>

<?php 
include "../../footer.php";
?>
