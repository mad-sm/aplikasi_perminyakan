$('#formHitung').submit(function(e) {
    e.preventDefault();
  
    $.ajax({
      url: 'pages/perhitungan/api.php',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(res) {
        if (res.status) {
          renderTabel(res.data);
        } else {
          alert("Gagal menghitung.");
        }
      }
    });
  });
  
  function renderTabel(data) {
    let html = `<table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Tahun</th><th>Produksi</th><th>Income</th>
          <th>Opex</th><th>Depresiasi</th><th>Taxable</th><th>Tax</th><th>NCF</th>
        </tr>
      </thead><tbody>`;
  
    data.forEach(row => {
      html += `<tr>
        <td>${row.tahun}</td>
        <td>${row.produksi}</td>
        <td>${row.income}</td>
        <td>${row.opex}</td>
        <td>${row.depresiasi}</td>
        <td>${row.taxable_income}</td>
        <td>${row.tax}</td>
        <td><b>${row.ncf}</b></td>
      </tr>`;
    });
  
    html += `</tbody></table>`;
    $('#hasilPerhitungan').html(html);
  }
  