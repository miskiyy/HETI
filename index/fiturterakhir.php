<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Notifikasi Realtime</title>

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
      --info:#6AA8FF;
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
      max-width:780px;
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

    .status-card{
      grid-column:span 12;
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:14px;
      flex-wrap:wrap;
    }

    .status-left{
      display:flex;
      align-items:center;
      gap:12px;
    }

    .pulse{
      width:14px;
      height:14px;
      border-radius:50%;
      background:var(--success);
      box-shadow:0 0 0 0 rgba(59,214,113,.65);
      animation:pulse 1.6s infinite;
    }

    @keyframes pulse{
      0% { box-shadow:0 0 0 0 rgba(59,214,113,.55); }
      70%{ box-shadow:0 0 0 14px rgba(59,214,113,0); }
      100%{ box-shadow:0 0 0 0 rgba(59,214,113,0); }
    }

    .status-title{
      margin:0;
      font-size:14px;
      font-weight:900;
    }

    .status-desc{
      margin:4px 0 0;
      font-size:12.5px;
      color:var(--text-muted);
      line-height:1.4;
    }

    .kpis{
      grid-column:span 12;
      display:grid;
      grid-template-columns:repeat(4,1fr);
      gap:18px;
    }

    @media(max-width:900px){
      .kpis{grid-template-columns:repeat(2,1fr)}
    }
    @media(max-width:600px){
      .kpis{grid-template-columns:1fr}
    }

    .kpi .label{
      font-size:12px;
      color:var(--text-muted);
    }
    .kpi .value{
      font-size:24px;
      font-weight:900;
      color:var(--accent);
      margin-top:6px;
    }
    .kpi .hint{
      margin-top:6px;
      font-size:12px;
      color:rgba(184,175,199,.9);
      line-height:1.35;
    }

    .two-col{
      grid-column:span 12;
      display:grid;
      grid-template-columns:repeat(12,1fr);
      gap:18px;
    }
    .left{
      grid-column:span 7;
    }
    .right{
      grid-column:span 5;
    }
    @media(max-width:900px){
      .left,.right{grid-column:span 12;}
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
      margin:0 0 12px;
      line-height:1.45;
    }

    /* Alert list */
    .alert-list{
      display:flex;
      flex-direction:column;
      gap:12px;
    }

    .alert{
      padding:14px 14px;
      border-radius:16px;
      border:1px solid rgba(255,255,255,.12);
      background:rgba(0,0,0,.18);
      display:grid;
      grid-template-columns:38px 1fr auto;
      gap:12px;
      align-items:center;
    }

    .a-icon{
      width:38px;
      height:38px;
      border-radius:14px;
      display:flex;
      align-items:center;
      justify-content:center;
      font-weight:900;
      color:#140615;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
    }

    .a-title{
      margin:0;
      font-size:13.5px;
      font-weight:900;
    }
    .a-desc{
      margin:4px 0 0;
      font-size:12.5px;
      color:var(--text-muted);
      line-height:1.4;
    }

    .a-meta{
      text-align:right;
      font-size:12px;
      color:rgba(184,175,199,.9);
      min-width:90px;
    }

    .badge{
      display:inline-block;
      margin-top:6px;
      padding:6px 10px;
      border-radius:999px;
      font-size:11.5px;
      font-weight:900;
      border:1px solid rgba(255,255,255,.12);
      background:rgba(0,0,0,.18);
      white-space:nowrap;
    }
    .b-success{ color:var(--success); background:rgba(59,214,113,.12); }
    .b-warning{ color:var(--warning); background:rgba(242,163,27,.14); }
    .b-danger{ color:var(--danger); background:rgba(255,106,106,.14); }
    .b-info{ color:var(--info); background:rgba(106,168,255,.12); }

    /* Quick actions */
    .quick{
      display:flex;
      flex-direction:column;
      gap:12px;
    }

    .qbtn{
      padding:12px 14px;
      border-radius:16px;
      border:1px solid rgba(255,255,255,.12);
      background:rgba(0,0,0,.18);
      color:var(--text-main);
      cursor:pointer;
      text-align:left;
      transition:transform .15s ease, border-color .15s ease;
    }
    .qbtn:hover{
      transform:translateY(-2px);
      border-color:rgba(242,163,27,.35);
    }
    .qbtn strong{
      display:block;
      font-size:13.5px;
      margin-bottom:4px;
    }
    .qbtn span{
      display:block;
      font-size:12.5px;
      color:var(--text-muted);
      line-height:1.4;
    }

    .footer{
      margin-top:22px;
      text-align:center;
      font-size:11.5px;
      color:rgba(184,175,199,.85);
    }

    /* Toast */
    .toast{
      position:fixed;
      right:18px;
      bottom:18px;
      width:min(420px, calc(100% - 36px));
      padding:14px 14px;
      border-radius:16px;
      border:1px solid rgba(255,255,255,.14);
      background:linear-gradient(180deg,rgba(20,20,39,.98),rgba(14,14,26,.98));
      box-shadow:0 30px 90px rgba(0,0,0,.7);
      display:none;
      gap:12px;
      align-items:flex-start;
      z-index:50;
    }

    .toast .ticon{
      width:38px;
      height:38px;
      border-radius:14px;
      display:flex;
      align-items:center;
      justify-content:center;
      font-weight:900;
      color:#140615;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
      flex:0 0 auto;
    }

    .toast .tmain{
      flex:1;
    }

    .toast .ttitle{
      margin:0;
      font-weight:900;
      font-size:13.5px;
    }

    .toast .tdesc{
      margin:4px 0 0;
      font-size:12.5px;
      color:var(--text-muted);
      line-height:1.4;
    }

    .toast .tclose{
      background:transparent;
      border:1px solid rgba(255,255,255,.14);
      color:var(--text-main);
      border-radius:12px;
      padding:8px 10px;
      cursor:pointer;
      font-weight:700;
      flex:0 0 auto;
    }
  </style>
</head>

<body>
  <div class="container">

    <!-- TOPBAR -->
    <div class="topbar">
      <div>
        <p class="title">Notifikasi Realtime</p>
        <p class="subtitle">
          Memberikan peringatan dini kepada caregiver ketika terdeteksi potensi tantrum atau kondisi abnormal berdasarkan
          pola data wearable (misalnya GSR, gerak, dan audio) serta tren kejadian sebelumnya.
        </p>
      </div>

      <div class="actions">
        <select class="pill">
          <option>Profil: Anak A</option>
          <option>Profil: Anak B</option>
        </select>

        <select class="pill" id="modeSelect">
          <option value="normal">Mode: Normal</option>
          <option value="sensitif">Mode: Sensitif</option>
          <option value="tenang">Mode: Tenang</option>
        </select>

        <button class="btn" id="btnSimulate">Simulasikan Peringatan</button>
        <button class="btn secondary" onclick="history.back()">Kembali</button>
      </div>
    </div>

    <div class="grid">

      <!-- STATUS -->
      <div class="card status-card">
        <div class="status-left">
          <div class="pulse" id="pulseDot"></div>
          <div>
            <p class="status-title" id="statusTitle">Status: Aman</p>
            <p class="status-desc" id="statusDesc">Tidak ada sinyal eskalasi yang terdeteksi dalam 5 menit terakhir.</p>
          </div>
        </div>

        <div class="actions" style="justify-content:flex-end;">
          <span class="pill" id="wearStatus">Wearable: Terhubung</span>
          <span class="pill" id="lastSync">Sinkron: 10 detik lalu</span>
        </div>
      </div>

      <!-- KPIs -->
      <div class="kpis">
        <div class="card kpi">
          <div class="label">Risiko Saat Ini</div>
          <div class="value" id="kpiRisk">Rendah</div>
          <div class="hint">Perhitungan berdasarkan 3 indikator terakhir.</div>
        </div>

        <div class="card kpi">
          <div class="label">Indikator Dominan</div>
          <div class="value" id="kpiIndikator">Stabil</div>
          <div class="hint">GSR, gerak, dan audio dalam batas normal.</div>
        </div>

        <div class="card kpi">
          <div class="label">Estimasi Waktu Eskalasi</div>
          <div class="value" id="kpiEta">—</div>
          <div class="hint">Akan muncul jika risiko meningkat.</div>
        </div>

        <div class="card kpi">
          <div class="label">Alert Hari Ini</div>
          <div class="value" id="kpiAlerts">1</div>
          <div class="hint">Total notifikasi yang dikirim ke caregiver.</div>
        </div>
      </div>

      <!-- CONTENT -->
      <div class="two-col">

        <!-- LEFT: ALERT STREAM -->
        <div class="card left">
          <p class="card-title">🔔 Stream Notifikasi</p>
          <p class="muted">
            Daftar peringatan terbaru (real-time). Klik “Simulasikan Peringatan” untuk demo alur notifikasi.
          </p>

          <div class="alert-list" id="alertList">
            <div class="alert">
              <div class="a-icon">ℹ️</div>
              <div>
                <p class="a-title">Info: Aktivitas Normal</p>
                <p class="a-desc">Data wearable stabil; tidak ada indikasi eskalasi.</p>
                <span class="badge b-info">Info</span>
              </div>
              <div class="a-meta">Hari ini<br>08:12</div>
            </div>
          </div>
        </div>

        <!-- RIGHT: QUICK ACTIONS -->
        <div class="card right">
          <p class="card-title">🧭 Tindakan Cepat</p>
          <p class="muted">
            Aksi yang bisa dilakukan caregiver ketika ada peringatan.
          </p>

          <div class="quick">
            <button class="qbtn" onclick="alert('Checklist disimpan (dummy).')">
              <strong>Aktifkan Mode Tenang</strong>
              <span>Kurangi stimulasi: pindahkan ke area tenang, minim suara, dan beri jeda aktivitas.</span>
            </button>

            <button class="qbtn" onclick="alert('Intervensi dicatat (dummy).')">
              <strong>Catat Intervensi</strong>
              <span>Rekam tindakan yang dilakukan agar evaluasi pola dan rekomendasi makin akurat.</span>
            </button>

            <button class="qbtn" onclick="location.href='rekomendasi-penanganan.html'">
              <strong>Lihat Rekomendasi Penanganan</strong>
              <span>Buka saran intervensi berbasis pola data dan kondisi terkini anak.</span>
            </button>

            <button class="qbtn" onclick="location.href='riwayat-tantrum.html'">
              <strong>Buka Riwayat Tantrum</strong>
              <span>Lihat kronologi kejadian sebelumnya untuk evaluasi jangka panjang.</span>
            </button>
          </div>
        </div>

      </div>
    </div>

    <div class="footer">© 2026 DEKAP — Notifikasi bersifat pendukung, bukan diagnosis medis</div>
  </div>

  <!-- TOAST -->
  <div class="toast" id="toast">
    <div class="ticon">⚠️</div>
    <div class="tmain">
      <p class="ttitle" id="toastTitle">Peringatan Dini</p>
      <p class="tdesc" id="toastDesc">Terindikasi peningkatan risiko tantrum. Lakukan intervensi awal.</p>
    </div>
    <button class="tclose" onclick="closeToast()">Tutup</button>
  </div>

  <script>
    // Simulasi update "last sync"
    let sec = 10;
    setInterval(() => {
      sec++;
      document.getElementById('lastSync').innerText = `Sinkron: ${sec} detik lalu`;
    }, 1000);

    // Data dummy notifikasi
    const alertTemplates = [
      {
        icon: "⚠️",
        title: "Peringatan Dini: Potensi Tantrum",
        desc: "Peningkatan GSR dan gerak repetitif terdeteksi. Disarankan pindahkan anak ke area lebih tenang.",
        badge: "Peringatan",
        badgeClass: "b-warning",
        statusTitle: "Status: Waspada",
        statusDesc: "Terindikasi eskalasi perilaku. Lakukan intervensi awal untuk mencegah tantrum.",
        risk: "Sedang",
        indikator: "GSR ↑ / Gerak ↑",
        eta: "3–5 menit"
      },
      {
        icon: "🚨",
        title: "Kondisi Abnormal: Risiko Tinggi",
        desc: "Sinyal stres meningkat cepat dan berulang. Pertimbangkan meminta bantuan pendamping tambahan.",
        badge: "Prioritas",
        badgeClass: "b-danger",
        statusTitle: "Status: Prioritas",
        statusDesc: "Kondisi abnormal terdeteksi. Pastikan keamanan anak dan lakukan langkah penanganan segera.",
        risk: "Tinggi",
        indikator: "GSR ↑↑ / Audio ↑",
        eta: "≤ 2 menit"
      },
      {
        icon: "✅",
        title: "Status Pulih: Kondisi Stabil",
        desc: "Indikator kembali normal. Lanjutkan pemantauan dan catat kondisi pemicu jika ada.",
        badge: "Stabil",
        badgeClass: "b-success",
        statusTitle: "Status: Aman",
        statusDesc: "Tidak ada sinyal eskalasi yang terdeteksi dalam 5 menit terakhir.",
        risk: "Rendah",
        indikator: "Stabil",
        eta: "—"
      }
    ];

    const alertList = document.getElementById('alertList');
    const btnSimulate = document.getElementById('btnSimulate');
    const modeSelect = document.getElementById('modeSelect');

    let idx = 0;
    let alertCount = 1;

    function nowTime(){
      const d = new Date();
      const hh = String(d.getHours()).padStart(2,'0');
      const mm = String(d.getMinutes()).padStart(2,'0');
      return `${hh}:${mm}`;
    }

    function setPulse(color){
      const dot = document.getElementById('pulseDot');
      dot.style.background = color;
      dot.style.animation = 'pulse 1.6s infinite';
    }

    function applyStatus(t){
      document.getElementById('statusTitle').innerText = t.statusTitle;
      document.getElementById('statusDesc').innerText = t.statusDesc;

      document.getElementById('kpiRisk').innerText = t.risk;
      document.getElementById('kpiIndikator').innerText = t.indikator;
      document.getElementById('kpiEta').innerText = t.eta;

      // warna pulse sesuai level
      if(t.badgeClass === 'b-danger') setPulse('var(--danger)');
      else if(t.badgeClass === 'b-warning') setPulse('var(--warning)');
      else setPulse('var(--success)');
    }

    function addAlert(t){
      const time = nowTime();
      const el = document.createElement('div');
      el.className = 'alert';
      el.innerHTML = `
        <div class="a-icon">${t.icon}</div>
        <div>
          <p class="a-title">${t.title}</p>
          <p class="a-desc">${t.desc}</p>
          <span class="badge ${t.badgeClass}">${t.badge}</span>
        </div>
        <div class="a-meta">Hari ini<br>${time}</div>
      `;
      alertList.prepend(el);
    }

    function showToast(title, desc){
      document.getElementById('toastTitle').innerText = title;
      document.getElementById('toastDesc').innerText = desc;
      const toast = document.getElementById('toast');
      toast.style.display = 'flex';
      clearTimeout(window.__toastTimer);
      window.__toastTimer = setTimeout(() => closeToast(), 5000);
    }

    function closeToast(){
      document.getElementById('toast').style.display = 'none';
    }

    btnSimulate.addEventListener('click', () => {
      // Mode mempengaruhi urutan simulasi (sensitif lebih sering warning/danger)
      const mode = modeSelect.value;

      let pick;
      if(mode === 'sensitif'){
        pick = (idx % 2 === 0) ? alertTemplates[1] : alertTemplates[0];
      } else if(mode === 'tenang'){
        pick = (idx % 2 === 0) ? alertTemplates[2] : alertTemplates[0];
      } else {
        pick = alertTemplates[idx % alertTemplates.length];
      }

      addAlert(pick);
      applyStatus(pick);

      alertCount++;
      document.getElementById('kpiAlerts').innerText = alertCount;

      if(pick.badgeClass === 'b-warning' || pick.badgeClass === 'b-danger'){
        showToast(pick.title, pick.desc);
      }

      idx++;
    });
  </script>
</body>
</html>
