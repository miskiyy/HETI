<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Laporan Bulanan</title>

  <!-- Chart.js (untuk grafik) -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    :root{
      --bg-main:#0B0B10;
      --primary:#5B1E5D;
      --secondary:#7A2E4F;
      --accent:#F2A31B;
      --text-main:#F5F3FF;
      --text-muted:#B8AFC7;
      --border-soft:rgba(255,255,255,.14);
      --radius:18px;
      --shadow:0 24px 70px rgba(0,0,0,.55);
      --success:#3BD671;
      --warning:#F2A31B;
      --danger:#FF6A6A;
    }

    *{box-sizing:border-box}

    body{
      margin:0;
      min-height:100vh;
      font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      color:var(--text-main);
      background:
        radial-gradient(900px 520px at 18% 12%, rgba(91,30,93,.48), transparent 62%),
        radial-gradient(900px 520px at 82% 88%, rgba(242,163,27,.35), transparent 62%),
        linear-gradient(180deg,#0B0B10,#0E0E1A);
      padding:24px;
    }

    .container{
      max-width:1100px;
      margin:auto;
    }

    .topbar{
      display:flex;
      justify-content:space-between;
      align-items:flex-start;
      gap:16px;
      margin-bottom:18px;
    }

    .title{
      margin:0;
      font-size:22px;
      font-weight:900;
    }

    .subtitle{
      margin:6px 0 0;
      font-size:13px;
      color:var(--text-muted);
      line-height:1.45;
      max-width:760px;
    }

    .actions{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      align-items:center;
      justify-content:flex-end;
    }

    .pill{
      padding:10px 12px;
      border-radius:999px;
      border:1px solid var(--border-soft);
      background:rgba(0,0,0,.15);
      color:var(--text-main);
      outline:none;
      font-size:12.5px;
    }

    .btn{
      padding:10px 14px;
      border-radius:999px;
      border:none;
      cursor:pointer;
      font-weight:900;
      color:#140615;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
      transition:transform .15s ease;
      font-size:12.5px;
    }
    .btn:hover{ transform:translateY(-1px); }

    .btn.secondary{
      background:transparent;
      color:var(--text-main);
      border:1px solid var(--border-soft);
      font-weight:700;
    }

    .grid{
      display:grid;
      grid-template-columns:repeat(12,1fr);
      gap:18px;
    }

    @media(max-width:900px){
      .topbar{flex-direction:column; align-items:flex-start;}
      .actions{justify-content:flex-start;}
    }

    .card{
      border-radius:var(--radius);
      border:1px solid var(--border-soft);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      box-shadow:var(--shadow);
      padding:18px;
    }

    .kpi{
      grid-column:span 3;
      text-align:left;
      min-height:110px;
      display:flex;
      flex-direction:column;
      justify-content:space-between;
    }

    @media(max-width:900px){
      .kpi{grid-column:span 6;}
    }
    @media(max-width:600px){
      .kpi{grid-column:span 12;}
    }

    .kpi .label{
      font-size:12px;
      color:var(--text-muted);
    }

    .kpi .value{
      font-size:26px;
      font-weight:900;
      color:var(--accent);
      letter-spacing:.2px;
      margin-top:6px;
    }

    .kpi .hint{
      font-size:12px;
      color:rgba(184,175,199,.9);
      line-height:1.35;
      margin-top:6px;
    }

    .block{
      grid-column:span 6;
      min-height:260px;
    }

    @media(max-width:900px){
      .block{grid-column:span 12;}
    }

    .card-title{
      margin:0 0 10px;
      font-size:15.5px;
      font-weight:900;
      display:flex;
      align-items:center;
      gap:8px;
    }

    .muted{
      color:var(--text-muted);
      font-size:12.5px;
      margin:0 0 10px;
      line-height:1.45;
    }

    /* Table */
    table{
      width:100%;
      border-collapse:separate;
      border-spacing:0 10px;
      margin-top:10px;
      font-size:12.5px;
    }

    thead th{
      text-align:left;
      font-size:11.5px;
      color:rgba(184,175,199,.9);
      font-weight:800;
      padding:0 8px 6px;
    }

    tbody tr{
      background:rgba(0,0,0,.18);
      border:1px solid rgba(255,255,255,.1);
    }

    tbody td{
      padding:12px 8px;
      border-top:1px solid rgba(255,255,255,.08);
      border-bottom:1px solid rgba(255,255,255,.08);
    }

    tbody tr td:first-child{
      border-left:1px solid rgba(255,255,255,.08);
      border-radius:14px 0 0 14px;
    }
    tbody tr td:last-child{
      border-right:1px solid rgba(255,255,255,.08);
      border-radius:0 14px 14px 0;
    }

    .badge{
      display:inline-block;
      padding:6px 10px;
      border-radius:999px;
      font-size:11.5px;
      font-weight:900;
      border:1px solid rgba(255,255,255,.12);
      background:rgba(0,0,0,.18);
    }
    .b-success{ color:var(--success); background:rgba(59,214,113,.12); }
    .b-warning{ color:var(--warning); background:rgba(242,163,27,.14); }
    .b-danger{ color:var(--danger); background:rgba(255,106,106,.14); }

    /* Canvas wrapper biar chart nggak gepeng/ketarik */
    .chart-wrap{
      height:170px; /* tinggi chart di card */
      border-top:1px solid rgba(255,255,255,.08);
      padding-top:14px;
      margin-top:12px;
    }
    .chart-wrap canvas{
      width:100% !important;
      height:100% !important;
    }

    .footer{
      margin-top:22px;
      text-align:center;
      font-size:11.5px;
      color:rgba(184,175,199,.85);
    }
  </style>
</head>

<body>
  <div class="container">

    <!-- TOPBAR -->
    <div class="topbar">
      <div>
        <p class="title">Laporan Bulanan</p>
        <p class="subtitle">
          Ringkasan tren perilaku dan kondisi fisiologis anak berdasarkan data wearable & catatan kejadian,
          untuk mendukung evaluasi dan pengambilan keputusan.
        </p>
      </div>

      <div class="actions">
        <select class="pill" id="monthSelect">
          <option value="feb">Februari 2026</option>
          <option value="jan">Januari 2026</option>
          <option value="des">Desember 2025</option>
        </select>

        <select class="pill">
          <option>Profil: Anak A</option>
          <option>Profil: Anak B</option>
        </select>

        <button class="btn" onclick="alert('Fitur unduh PDF: bisa dihubungkan ke backend nanti.')">Unduh PDF</button>
        <button class="btn secondary" onclick="history.back()">Kembali</button>
      </div>
    </div>

    <!-- KPI + CONTENT -->
    <div class="grid">

      <!-- KPI -->
      <div class="card kpi">
        <div>
          <div class="label">Total Kejadian Tantrum</div>
          <div class="value" id="kpiTotal">12</div>
        </div>
        <div class="hint" id="kpiHint1">Turun 2 kejadian dibanding bulan sebelumnya.</div>
      </div>

      <div class="card kpi">
        <div>
          <div class="label">Durasi Rata-rata</div>
          <div class="value" id="kpiDurasi">3.4 m</div>
        </div>
        <div class="hint">Mayoritas terjadi pada jam 09.00–11.00.</div>
      </div>

      <div class="card kpi">
        <div>
          <div class="label">Pemicu Dominan</div>
          <div class="value" id="kpiPemicu">Bising</div>
        </div>
        <div class="hint">Teridentifikasi dari pola vokalisasi & lingkungan.</div>
      </div>

      <div class="card kpi">
        <div>
          <div class="label">Kondisi Fisiologis</div>
          <div class="value" id="kpiFisio">GSR ↑</div>
        </div>
        <div class="hint">Peningkatan stres sering muncul 3–5 menit sebelum kejadian.</div>
      </div>

      <!-- CHART: Tren kejadian per minggu -->
      <div class="card block">
        <p class="card-title">📊 Tren Kejadian per Minggu</p>
        <p class="muted">Jumlah kejadian tantrum per minggu (ringkasan visual).</p>

        <div class="chart-wrap">
          <canvas id="tantrumChart"></canvas>
        </div>
      </div>

      <!-- TABLE: Ringkasan indikator fisiologis -->
      <div class="card block">
        <p class="card-title">❤️ Ringkasan Indikator Fisiologis</p>
        <p class="muted">Perubahan indikator yang paling sering muncul menjelang tantrum.</p>

        <table>
          <thead>
            <tr>
              <th>Indikator</th>
              <th>Frekuensi</th>
              <th>Interpretasi</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>GSR meningkat</td>
              <td id="fGsr">9×</td>
              <td>Peningkatan stres / arousal</td>
              <td><span class="badge b-warning">Perlu Perhatian</span></td>
            </tr>
            <tr>
              <td>Gerak repetitif</td>
              <td id="fGerak">7×</td>
              <td>Potensi eskalasi perilaku</td>
              <td><span class="badge b-warning">Perlu Perhatian</span></td>
            </tr>
            <tr>
              <td>Vokalisasi tinggi</td>
              <td id="fAudio">5×</td>
              <td>Stimulasi berlebih / distress</td>
              <td><span class="badge b-success">Terkendali</span></td>
            </tr>
            <tr>
              <td>Kondisi abnormal</td>
              <td id="fAbnormal">1×</td>
              <td>Butuh evaluasi lanjutan</td>
              <td><span class="badge b-danger">Prioritas</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- INSIGHT -->
      <div class="card" style="grid-column:span 12;">
        <p class="card-title">🧠 Insight Bulanan (Ringkas)</p>
        <p class="muted" id="insightText">
          Bulan ini kejadian tantrum paling sering muncul pada rentang pagi (09.00–11.00) dengan pemicu dominan berupa
          lingkungan bising. Pola data menunjukkan indikator stres (GSR ↑) cenderung meningkat beberapa menit sebelum kejadian,
          sehingga intervensi pencegahan dapat difokuskan pada pengurangan stimulasi suara, jeda aktivitas, dan teknik regulasi sensorik.
        </p>
      </div>

    </div>

    <div class="footer">© 2026 DEKAP — Ringkasan laporan untuk pemantauan, bukan diagnosis medis</div>

  </div>

  <script>
    // ===== Data contoh (bisa diganti dari backend nanti) =====
    const reportData = {
      feb: {
        total: 12,
        hint1: "Turun 2 kejadian dibanding bulan sebelumnya.",
        durasi: "3.4 m",
        pemicu: "Bising",
        fisio: "GSR ↑",
        weekly: [3, 5, 4, 2],
        freq: { gsr: "9×", gerak: "7×", audio: "5×", abnormal: "1×" },
        insight: "Bulan ini kejadian tantrum paling sering muncul pada rentang pagi (09.00–11.00) dengan pemicu dominan berupa lingkungan bising. Pola data menunjukkan indikator stres (GSR ↑) cenderung meningkat beberapa menit sebelum kejadian, sehingga intervensi pencegahan dapat difokuskan pada pengurangan stimulasi suara, jeda aktivitas, dan teknik regulasi sensorik."
      },
      jan: {
        total: 14,
        hint1: "Naik 1 kejadian dibanding bulan sebelumnya.",
        durasi: "3.8 m",
        pemicu: "Transisi Aktivitas",
        fisio: "Gerak ↑",
        weekly: [4, 4, 3, 3],
        freq: { gsr: "8×", gerak: "9×", audio: "4×", abnormal: "2×" },
        insight: "Pada bulan ini pola kejadian relatif merata tiap minggu dengan pemicu dominan transisi aktivitas. Indikator gerak repetitif meningkat sebelum kejadian, sehingga strategi yang disarankan adalah pemberian jeda transisi, penguatan jadwal visual, dan pendekatan sensorik ringan."
      },
      des: {
        total: 11,
        hint1: "Stabil dibanding bulan sebelumnya.",
        durasi: "3.1 m",
        pemicu: "Keramaian",
        fisio: "Audio ↑",
        weekly: [2, 3, 3, 3],
        freq: { gsr: "6×", gerak: "5×", audio: "7×", abnormal: "1×" },
        insight: "Bulan ini kejadian cenderung meningkat pada minggu akhir, dengan pemicu dominan keramaian. Pola vokalisasi tinggi muncul menjelang kejadian, sehingga pengurangan stimulus lingkungan, penggunaan headphone/ruang tenang, dan latihan regulasi napas dapat diprioritaskan."
      }
    };

    // ===== Buat Chart =====
    const ctx = document.getElementById('tantrumChart').getContext('2d');

    const tantrumChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
        datasets: [{
          label: 'Jumlah Kejadian',
          data: reportData.feb.weekly,
          borderColor: '#F2A31B',
          backgroundColor: 'rgba(242,163,27,0.12)',
          tension: 0.42,
          fill: true,
          pointRadius: 5,
          pointHoverRadius: 6,
          pointBackgroundColor: '#F2A31B',
          pointBorderColor: 'rgba(245,243,255,.65)',
          pointBorderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: '#F5F3FF',
              font: { size: 12, weight: '700' }
            }
          },
          tooltip: {
            callbacks: {
              label: (ctx) => ` ${ctx.dataset.label}: ${ctx.parsed.y} kejadian`
            }
          }
        },
        scales: {
          x: {
            ticks: { color: '#B8AFC7' },
            grid: { color: 'rgba(255,255,255,0.05)' }
          },
          y: {
            beginAtZero: true,
            ticks: { color: '#B8AFC7', stepSize: 1 },
            grid: { color: 'rgba(255,255,255,0.05)' }
          }
        }
      }
    });

    // ===== Update halaman saat bulan diganti =====
    const monthSelect = document.getElementById('monthSelect');

    function applyReport(key){
      const d = reportData[key];

      document.getElementById('kpiTotal').innerText = d.total;
      document.getElementById('kpiHint1').innerText = d.hint1;
      document.getElementById('kpiDurasi').innerText = d.durasi;
      document.getElementById('kpiPemicu').innerText = d.pemicu;
      document.getElementById('kpiFisio').innerText = d.fisio;

      document.getElementById('fGsr').innerText = d.freq.gsr;
      document.getElementById('fGerak').innerText = d.freq.gerak;
      document.getElementById('fAudio').innerText = d.freq.audio;
      document.getElementById('fAbnormal').innerText = d.freq.abnormal;

      document.getElementById('insightText').innerText = d.insight;

      tantrumChart.data.datasets[0].data = d.weekly;
      tantrumChart.update();
    }

    monthSelect.addEventListener('change', (e) => applyReport(e.target.value));
    applyReport('feb');
  </script>
</body>
</html>
