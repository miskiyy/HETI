<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Nova Capital — Sarana Edukasi</title>
  <style>
    :root{
      --bg0:#050a16; --bg1:#071027;
      --text:#eaf1ff; --muted:#9fb2d6; --muted2:#7f93bc;
      --green:#20d37a; --green2:#16b864; --red:#ff4d6d; --yellow:#ffd166; --blue:#4ea1ff;
      --shadow:0 18px 60px rgba(0,0,0,.45);
      --radius:18px; --radius2:14px;
      --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
      --stroke: rgba(255,255,255,.10);
      --panel: linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.03));
      --panel2: rgba(0,0,0,.22);
    }
    *{box-sizing:border-box}
    body{
      margin:0; font-family:var(--font); color:var(--text); min-height:100vh;
      background:
        radial-gradient(900px 600px at 22% 18%, #0f2d6d35 0%, transparent 55%),
        radial-gradient(900px 600px at 80% 20%, #0f7a5a25 0%, transparent 55%),
        linear-gradient(180deg, var(--bg0), var(--bg1));
    }
    .wrap{max-width:1260px;margin:0 auto;padding:18px 16px 40px}
    .top{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;padding:10px 6px 16px}
    .brand{display:flex;align-items:center;gap:12px}
    .logo{
      width:42px;height:42px;border-radius:12px;
      background:linear-gradient(135deg,#0f4cff,#19d38a);
      display:grid;place-items:center; box-shadow:0 10px 30px rgba(0,0,0,.35)
    }
    .brand h1{margin:0;font-size:18px}
    .brand p{margin:2px 0 0;color:var(--muted);font-size:12.5px}
    .pill{
      display:inline-flex;align-items:center;gap:8px;padding:10px 12px;border-radius:999px;
      background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.10);
      color:var(--muted);font-size:13px
    }
    .pill .dot{width:8px;height:8px;border-radius:50%;background:var(--green);box-shadow:0 0 0 6px rgba(32,211,122,.12)}

    .grid{display:grid;grid-template-columns: 420px 1fr; gap:16px; align-items:start}
    @media (max-width:1000px){.grid{grid-template-columns:1fr}}
    .panel{
      border-radius:var(--radius);
      background:var(--panel);
      border:1px solid rgba(255,255,255,.08);
      box-shadow:var(--shadow);
      backdrop-filter: blur(12px);
      overflow:hidden;
    }
    .hd{padding:14px 16px;border-bottom:1px solid rgba(255,255,255,.07);display:flex;justify-content:space-between;align-items:center;gap:10px}
    .hd h2{margin:0;font-size:14px}
    .hd span{font-size:12px;color:var(--muted)}
    .bd{padding:16px}

    .kpi{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
    @media (max-width:520px){.kpi{grid-template-columns:1fr}}
    .card{
      background:var(--panel2);
      border:1px solid rgba(255,255,255,.08);
      border-radius:16px;
      padding:12px;
      min-height:86px;
    }
    .k{font-size:12px;color:var(--muted);margin-bottom:8px}
    .v{font-size:18px;font-weight:900}

    .tracks{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
    @media (max-width:900px){.tracks{grid-template-columns:1fr}}
    .track{
      background:var(--panel2);
      border:1px solid rgba(255,255,255,.08);
      border-radius:16px;
      padding:14px;
      cursor:pointer;
      transition:.15s transform ease;
    }
    .track:hover{transform: translateY(-2px)}
    .tag{
      display:inline-flex;align-items:center;gap:8px;
      font-size:11px;padding:4px 8px;border-radius:999px;
      border:1px solid rgba(255,255,255,.10);
      background:rgba(255,255,255,.06);color:var(--muted);
    }
    .tag.good{border-color:rgba(32,211,122,.35);background:rgba(32,211,122,.14);color:var(--text)}
    .tag.warn{border-color:rgba(255,209,102,.35);background:rgba(255,209,102,.10);color:var(--text)}
    .title{font-weight:900;margin:8px 0 6px}
    .desc{font-size:12px;color:var(--muted2);line-height:1.45}
    .line{height:1px;background:rgba(255,255,255,.07);margin:12px 0}

    .viewer{
      display:grid;
      grid-template-rows:auto auto 1fr;
      gap:12px;
    }
    .viewerTop{
      display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;align-items:center
    }
    .viewerTop .h{font-size:18px;font-weight:900}
    .viewerTop .s{font-size:12px;color:var(--muted)}
    .actions{display:flex;gap:8px;flex-wrap:wrap}
    .btn{
      padding:10px 12px;border-radius:999px;border:1px solid rgba(255,255,255,.10);
      background:rgba(255,255,255,.06);color:var(--text);cursor:pointer;font-weight:800;font-size:12px
    }
    .btn.primary{
      background:linear-gradient(180deg,var(--green),var(--green2));
      border:none;color:#062015; box-shadow:0 14px 40px rgba(32,211,122,.25)
    }

    .contentBox{
      background:var(--panel2);
      border:1px solid rgba(255,255,255,.08);
      border-radius:16px;
      padding:14px;
    }
    .sectionTitle{font-size:13px;font-weight:900;margin:0 0 10px}
    .list{display:grid;gap:10px}
    .item{
      display:flex;gap:10px;align-items:flex-start;
      padding:10px;border-radius:14px;
      background:rgba(255,255,255,.04);
      border:1px solid rgba(255,255,255,.08);
    }
    .cb{width:18px;height:18px;border-radius:5px;border:1px solid rgba(255,255,255,.25);margin-top:2px;display:grid;place-items:center}
    .cb.checked{background:rgba(32,211,122,.18);border-color:rgba(32,211,122,.45)}
    .small{font-size:12px;color:var(--muted2);line-height:1.45}
    .q{
      margin-top:10px;
      padding:12px;border-radius:14px;
      border:1px solid rgba(255,255,255,.08);
      background:rgba(0,0,0,.18);
    }
    .q h4{margin:0 0 8px;font-size:13px}
    .opt{display:block;margin:8px 0;font-size:12px;color:var(--text)}
    .iframeWrap{
      position:relative;
      width:100%;
      aspect-ratio: 16 / 9;
      border-radius:16px;
      overflow:hidden;
      border:1px solid rgba(255,255,255,.08);
      background:rgba(0,0,0,.25);
    }
    iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
    .foot{font-size:11px;color:var(--muted2);text-align:center;padding:10px 16px 14px}
  </style>
</head>
<body>
<div class="wrap">
  <div class="top">
    <div class="brand">
      <div class="logo" aria-hidden="true">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
          <path d="M4 17V7" stroke="white" stroke-width="2" stroke-linecap="round"/>
          <path d="M4 17H20" stroke="white" stroke-width="2" stroke-linecap="round"/>
          <path d="M7 13l3-3 3 3 5-6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <div>
        <h1>Nova Capital</h1>
        <p>Learning Hub — Modul pembelajaran investasi: chart, fundamental, teknikal, bandar, dan money management</p>
      </div>
    </div>
    <div class="pill"><span class="dot"></span><b>Sarana Edukasi</b></div>
  </div>

  <div class="grid">
    <!-- LEFT: Tracks -->
    <div class="panel">
      <div class="hd"><h2>Kurikulum</h2><span>Terstruktur & bertahap</span></div>
      <div class="bd">
        <div class="kpi">
          <div class="card"><div class="k">Progress</div><div class="v" id="kProgress">0%</div></div>
          <div class="card"><div class="k">Modul Selesai</div><div class="v" id="kDone">0/6</div></div>
          <div class="card"><div class="k">Level</div><div class="v" id="kLevel">Pemula</div></div>
        </div>

        <div class="line"></div>

        <div class="tracks" id="tracks"></div>

        <div class="line"></div>
        <div class="small">
          Catatan: ini <b>modul pembelajaran</b> (bukan sekadar konten). Ada checklist, latihan, quiz, dan rencana belajar.
        </div>
      </div>
    </div>

    <!-- RIGHT: Viewer -->
    <div class="panel">
      <div class="hd"><h2>Detail Modul</h2><span>Belajar → latihan → uji pemahaman</span></div>
      <div class="bd viewer">
        <div class="viewerTop">
          <div>
            <div class="h" id="modTitle">Pilih modul di kiri</div>
            <div class="s" id="modSub">—</div>
          </div>
          <div class="actions">
            <button class="btn" id="btnMark">Tandai selesai</button>
            <button class="btn primary" id="btnNext">Lanjut modul</button>
          </div>
        </div>

        <div class="contentBox">
          <p class="sectionTitle">Video / Materi Utama</p>
          <div id="videoArea" class="small">Pilih modul untuk melihat materi.</div>
        </div>

        <div class="contentBox">
          <p class="sectionTitle">Checklist Belajar</p>
          <div class="list" id="checklist"></div>

          <div class="q" id="quiz" style="display:none"></div>
        </div>
      </div>

      <div class="foot">
        *Materi edukasi ini adalah bantuan belajar, bukan rekomendasi investasi.
      </div>
    </div>
  </div>
</div>

<script>
  const modules = [
    {
      id:"m0",
      badge:["Wajib","good"],
      title:"Onboarding: Mulai dari Nol",
      sub:"Tujuan, mindset, aturan risiko, dan checklist siap investasi",
      video:{
        label:"Video wajib: Belajar Saham I #DariNol (Theo Derick)",
        // embed link
        embed:"https://www.youtube.com/embed/S07CBlGcJZE"
      },
      checklist:[
        "Bedakan investor vs trader (timeframe & tujuan).",
        "Tentukan uang dingin & batas risiko per transaksi (0,5–2%).",
        "Pahami dua sumber cuan: capital gain & dividen.",
        "Buat aturan: cut loss itu wajib, bukan opsi."
      ],
      quiz:{
        q:"Untuk pemula, mana yang paling benar?",
        options:[
          "Masuk saham tanpa stop loss biar nggak rugi",
          "Tetapkan batas rugi per transaksi sebelum entry",
          "All-in supaya cepat cuan",
          "Ganti strategi tiap hari"
        ],
        answer:1,
        explain:"Money management dimulai dari batas rugi. Tanpa itu, keputusan jadi emosional."
      }
    },
    {
      id:"m1",
      badge:["Chart","warn"],
      title:"Pengenalan Chart",
      sub:"Baca candlestick, trend, support/resistance, dan volume",
      video:null,
      checklist:[
        "Kenali candlestick: open-high-low-close & maknanya.",
        "Tentukan trend: uptrend/downtrend/sideways.",
        "Tarik support/resistance (level yang dilihat banyak orang).",
        "Gunakan volume sebagai konfirmasi (bukan tebak)."
      ],
      quiz:{
        q:"Support itu artinya…",
        options:[
          "Area harga yang sering menahan penurunan",
          "Area harga yang pasti naik",
          "Harga tertinggi harian",
          "Tempat beli tanpa risiko"
        ],
        answer:0,
        explain:"Support adalah area permintaan, tapi tetap bisa jebol (makanya perlu SL)."
      }
    },
    {
      id:"m2",
      badge:["Fundamental","warn"],
      title:"Fundamental Dasar",
      sub:"Baca bisnis: revenue, laba, rasio, valuasi sederhana",
      video:null,
      checklist:[
        "Baca 3 angka inti: revenue, laba bersih, margin.",
        "Pahami rasio: PER, PBV, ROE, DER, EPS.",
        "Nilai pertumbuhan: growth revenue & growth laba.",
        "Pahami konteks sektor (bank ≠ commodity)."
      ],
      quiz:{
        q:"ROE tinggi umumnya menunjukkan…",
        options:[
          "Perusahaan rugi",
          "Efisiensi menghasilkan laba dari modal",
          "Harga pasti naik minggu ini",
          "Saham tanpa risiko"
        ],
        answer:1,
        explain:"ROE membantu menilai kualitas profitabilitas terhadap ekuitas."
      }
    },
    {
      id:"m3",
      badge:["Teknikal","warn"],
      title:"Teknikal Dasar",
      sub:"Setup entry + indikator (MA/RSI/MACD) + konfirmasi",
      video:null,
      checklist:[
        "Pilih setup: breakout atau pullback (1 saja dulu).",
        "Gunakan MA untuk trend, RSI/MACD untuk momentum.",
        "Konfirmasi: jangan entry cuma karena 1 indikator.",
        "Definisikan invalidasi: kapan plan batal?"
      ],
      quiz:{
        q:"Kenapa butuh ‘invalidasi’?",
        options:[
          "Supaya bisa tahan rugi lama",
          "Supaya tahu kapan harus keluar saat plan gagal",
          "Supaya selalu untung",
          "Supaya bisa entry tanpa SL"
        ],
        answer:1,
        explain:"Invalidasi = aturan objektif kapan keluar ketika skenario tidak berjalan."
      }
    },
    {
      id:"m4",
      badge:["Bandar","warn"],
      title:"Bandar & Orderbook",
      sub:"Bid/ask, wall, imbalance, absorption, dan spoof risk",
      video:null,
      checklist:[
        "Pahami orderbook: bid vs ask, lot, freq, value.",
        "Cari imbalance: bid dominan atau ask dominan?",
        "Deteksi wall: bid wall/ask wall dekat harga.",
        "Waspada spoof: order besar muncul-hilang (fake wall)."
      ],
      quiz:{
        q:"Ask wall biasanya mengindikasikan…",
        options:[
          "Hambatan supply di atas harga",
          "Harga pasti naik",
          "Tidak ada yang jual",
          "Sinyal pasti bandar masuk"
        ],
        answer:0,
        explain:"Ask wall bisa jadi hambatan, tapi tetap perlu validasi (apakah wall real atau spoof)."
      }
    },
    {
      id:"m5",
      badge:["Money","good"],
      title:"Money Management",
      sub:"Sizing lot, SL/TP, R:R, aturan partial TP, proteksi drawdown",
      video:null,
      checklist:[
        "Tetapkan risk per trade (0,5–2%) dari dana.",
        "Hitung lot berdasarkan jarak entry–SL (risk-based sizing).",
        "Pastikan R:R masuk akal (minimal 1:1,2 — ideal 1:2).",
        "Aturan: partial TP + move SL ke BE setelah TP1."
      ],
      quiz:{
        q:"Kalau dana Rp10.000.000 dan risk 1%, maka batas rugi per transaksi adalah…",
        options:[
          "Rp10.000",
          "Rp100.000",
          "Rp1.000.000",
          "Rp10.000.000"
        ],
        answer:1,
        explain:"1% dari 10 juta = 100 ribu. Ini yang membatasi ukuran lot & SL."
      }
    },
  ];

  const state = {
    done: new Set(), // completed module ids
    current: "m0"
  };

  const elTracks = document.getElementById("tracks");
  const elTitle = document.getElementById("modTitle");
  const elSub = document.getElementById("modSub");
  const elVideo = document.getElementById("videoArea");
  const elChecklist = document.getElementById("checklist");
  const elQuiz = document.getElementById("quiz");

  const kProgress = document.getElementById("kProgress");
  const kDone = document.getElementById("kDone");
  const kLevel = document.getElementById("kLevel");

  function calcKPI(){
    const done = state.done.size;
    const total = modules.length;
    const pct = Math.round((done/total)*100);
    kProgress.textContent = pct + "%";
    kDone.textContent = `${done}/${total}`;
    kLevel.textContent = pct < 34 ? "Pemula" : (pct < 67 ? "Intermediate" : "Advance");
  }

  function renderTracks(){
    elTracks.innerHTML = "";
    modules.forEach(m=>{
      const div = document.createElement("div");
      div.className = "track";
      div.onclick = ()=>openModule(m.id);
      const isDone = state.done.has(m.id);
      div.innerHTML = `
        <div style="display:flex;justify-content:space-between;gap:10px;align-items:center;flex-wrap:wrap">
          <span class="tag ${m.badge[1]}">${m.badge[0]}</span>
          <span class="tag ${isDone ? "good" : ""}">${isDone ? "Selesai" : "Belum"}</span>
        </div>
        <div class="title">${m.title}</div>
        <div class="desc">${m.sub}</div>
      `;
      elTracks.appendChild(div);
    });
  }

  function openModule(id){
    state.current = id;
    const m = modules.find(x=>x.id===id);
    if(!m) return;

    elTitle.textContent = m.title;
    elSub.textContent = m.sub;

    // video area
    if(m.video){
      elVideo.innerHTML = `
        <div class="small" style="margin-bottom:10px"><b>${m.video.label}</b></div>
        <div class="iframeWrap">
          <iframe
            src="${m.video.embed}"
            title="YouTube video"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
        <div class="small" style="margin-top:10px">
          Setelah nonton, lanjut checklist & quiz untuk mengunci pemahaman.
        </div>
      `;
    } else {
      elVideo.innerHTML = `
        <div class="small">
          Materi modul ini bisa diisi dengan: ringkasan 5 menit, contoh chart, dan studi kasus (diintegrasikan dari fitur analisis Nova Capital).
        </div>
      `;
    }

    // checklist
    elChecklist.innerHTML = "";
    m.checklist.forEach((t, idx)=>{
      const item = document.createElement("div");
      item.className = "item";
      const key = `${m.id}-${idx}`;
      const checked = localStorage.getItem(key)==="1";
      item.innerHTML = `
        <div class="cb ${checked ? "checked":""}" data-key="${key}">${checked ? "✓" : ""}</div>
        <div>
          <div style="font-weight:800;font-size:13px">${t}</div>
          <div class="small">Klik kotaknya untuk menandai selesai.</div>
        </div>
      `;
      item.querySelector(".cb").onclick = (e)=>{
        const k = e.currentTarget.dataset.key;
        const now = localStorage.getItem(k)==="1" ? "0":"1";
        localStorage.setItem(k, now);
        openModule(m.id);
      };
      elChecklist.appendChild(item);
    });

    // quiz
    elQuiz.style.display = "block";
    elQuiz.innerHTML = `
      <h4>Quiz (1 menit)</h4>
      <div class="small" style="margin-bottom:10px">${m.quiz.q}</div>
      ${m.quiz.options.map((o,i)=>`
        <label class="opt">
          <input type="radio" name="q" value="${i}"/> ${o}
        </label>
      `).join("")}
      <button class="btn primary" id="btnCheck" style="margin-top:10px">Cek Jawaban</button>
      <div id="quizResult" class="small" style="margin-top:10px"></div>
    `;
    document.getElementById("btnCheck").onclick = ()=>{
      const sel = elQuiz.querySelector('input[name="q"]:checked');
      const out = document.getElementById("quizResult");
      if(!sel){ out.innerHTML = `<span style="color:var(--yellow)">Pilih jawaban dulu.</span>`; return; }
      const v = Number(sel.value);
      if(v===m.quiz.answer){
        out.innerHTML = `<span style="color:var(--green)"><b>Benar ✅</b></span><br/>${m.quiz.explain}`;
      } else {
        out.innerHTML = `<span style="color:var(--red)"><b>Belum tepat ❌</b></span><br/>${m.quiz.explain}`;
      }
    };

    calcKPI();
  }

  document.getElementById("btnMark").onclick = ()=>{
    state.done.add(state.current);
    renderTracks();
    calcKPI();
  };

  document.getElementById("btnNext").onclick = ()=>{
    const idx = modules.findIndex(x=>x.id===state.current);
    const next = modules[Math.min(idx+1, modules.length-1)];
    openModule(next.id);
  };

  // init
  calcKPI();
  renderTracks();
  openModule(state.current);
</script>
</body>
</html>
