<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Nova Capital — Chatbot</title>
  <style>
    :root{
      --bg0:#050a16; --bg1:#071027;
      --text:#eaf1ff; --muted:#9fb2d6; --muted2:#7f93bc;
      --panel: rgba(255,255,255,.06);
      --panel2: rgba(0,0,0,.22);
      --stroke: rgba(255,255,255,.10);
      --green:#20d37a; --green2:#16b864; --red:#ff4d6d; --yellow:#ffd166; --blue:#4ea1ff;
      --shadow:0 18px 60px rgba(0,0,0,.45);
      --radius:18px; --radius2:14px;
      --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
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
    .top{
      display:flex;justify-content:space-between;align-items:center;gap:12px;
      padding:10px 6px 16px; flex-wrap:wrap;
    }
    .brand{display:flex;align-items:center;gap:12px}
    .logo{
      width:42px;height:42px;border-radius:12px;
      background: linear-gradient(135deg,#0f4cff,#19d38a);
      display:grid;place-items:center; box-shadow:0 10px 30px rgba(0,0,0,.35);
    }
    .brand h1{margin:0;font-size:18px}
    .brand p{margin:2px 0 0;color:var(--muted);font-size:12.5px}
    .pill{
      display:inline-flex;align-items:center;gap:8px;
      padding:10px 12px;border-radius:999px;
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.10);
      color:var(--muted);font-size:13px;
    }
    .pill .dot{width:8px;height:8px;border-radius:50%;background:var(--green);box-shadow:0 0 0 6px rgba(32,211,122,.12)}
    .grid{display:grid;grid-template-columns: 360px 1fr; gap:16px; align-items:stretch}
    @media (max-width: 1000px){.grid{grid-template-columns:1fr}}
    .panel{
      border-radius:var(--radius);
      background:linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.03));
      border:1px solid rgba(255,255,255,.08);
      box-shadow:var(--shadow);
      backdrop-filter: blur(12px);
      overflow:hidden;
    }
    .hd{padding:14px 16px;border-bottom:1px solid rgba(255,255,255,.07);display:flex;justify-content:space-between;align-items:center;gap:10px}
    .hd h2{margin:0;font-size:14px}
    .hd span{font-size:12px;color:var(--muted)}
    .bd{padding:16px}

    /* sidebar controls */
    label{display:block;font-size:12px;color:var(--muted);margin-bottom:6px}
    .field{
      width:100%; padding:10px 12px; border-radius:14px;
      background:rgba(0,0,0,.20); border:1px solid rgba(255,255,255,.08);
      color:var(--text); outline:none;
    }
    .row{display:grid;grid-template-columns:1fr 1fr; gap:10px}
    .chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:10px}
    .chip{
      font-size:12px; padding:8px 10px; border-radius:999px;
      border:1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      color:var(--muted); cursor:pointer; user-select:none;
    }
    .chip.active{border-color: rgba(32,211,122,.35); background: rgba(32,211,122,.14); color: var(--text); font-weight:800}
    .help{font-size:12px;color:var(--muted2);line-height:1.45}
    .line{height:1px;background:rgba(255,255,255,.07);margin:12px 0}

    /* chat area */
    .chatWrap{display:grid; grid-template-rows: auto 1fr auto; min-height: 620px}
    .chatHeader{padding:14px 16px;border-bottom:1px solid rgba(255,255,255,.07);display:flex;justify-content:space-between;align-items:center;gap:10px}
    .chatHeader .left{display:flex;flex-direction:column;gap:4px}
    .chatHeader .title{font-weight:900}
    .chatHeader .sub{font-size:12px;color:var(--muted)}
    .chatHeader .right{display:flex;gap:8px;flex-wrap:wrap;justify-content:flex-end}
    .tag{
      font-size:11px;padding:4px 8px;border-radius:999px;
      border:1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      color: var(--muted);
    }
    .tag.good{border-color: rgba(32,211,122,.35); background: rgba(32,211,122,.14); color: var(--text)}
    .tag.warn{border-color: rgba(255,209,102,.35); background: rgba(255,209,102,.10); color: var(--text)}

    .chat{
      padding:16px; overflow:auto;
      display:flex; flex-direction:column; gap:10px;
    }
    .bubble{
      max-width: 78%;
      padding:12px 12px;
      border-radius: 16px;
      border:1px solid rgba(255,255,255,.08);
      background: rgba(0,0,0,.20);
      line-height:1.45;
      font-size:13px;
    }
    .bubble.user{
      align-self:flex-end;
      background: rgba(78,161,255,.10);
      border-color: rgba(78,161,255,.18);
    }
    .bubble.bot{
      align-self:flex-start;
      background: rgba(255,255,255,.05);
    }
    .meta{
      font-size:11px;color:var(--muted2);
      margin-top:6px;
      display:flex;gap:8px;flex-wrap:wrap;align-items:center;
    }
    .typing{
      display:none;
      align-self:flex-start;
      padding:10px 12px;
      border-radius:16px;
      background: rgba(255,255,255,.05);
      border:1px solid rgba(255,255,255,.08);
      width: 120px;
    }
    .dots{display:flex;gap:6px}
    .dots span{
      width:6px;height:6px;border-radius:50%;
      background: rgba(255,255,255,.55);
      animation: bounce 1s infinite ease-in-out;
    }
    .dots span:nth-child(2){animation-delay:.15s}
    .dots span:nth-child(3){animation-delay:.3s}
    @keyframes bounce{
      0%,80%,100%{transform:translateY(0);opacity:.5}
      40%{transform:translateY(-6px);opacity:1}
    }

    .quick{
      display:flex; flex-wrap:wrap; gap:8px;
      padding: 0 16px 12px;
    }
    .qbtn{
      font-size:12px; padding:8px 10px; border-radius:999px;
      border:1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      color: var(--text); cursor:pointer;
    }

    .composer{
      padding:14px 16px;
      border-top:1px solid rgba(255,255,255,.07);
      display:flex; gap:10px; align-items:center;
    }
    .input{
      flex:1;
      padding:12px 12px;
      border-radius: 14px;
      background: rgba(0,0,0,.20);
      border: 1px solid rgba(255,255,255,.08);
      color: var(--text); outline:none;
    }
    .send{
      padding:12px 14px;border-radius:999px;
      background: linear-gradient(180deg,var(--green),var(--green2));
      border:none;color:#062015;font-weight:900;cursor:pointer;
      box-shadow: 0 14px 40px rgba(32,211,122,.25);
    }

    /* plan card */
    .plan{
      margin-top:8px;
      background: rgba(0,0,0,.22);
      border:1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 12px;
    }
    .plan h4{margin:0 0 10px;font-size:13px}
    .planRow{display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap;font-size:12px;color:var(--muted)}
    .planRow b{color:var(--text)}
    .disclaimer{
      font-size:11px;color:var(--muted2);
      padding:10px 16px 14px;
      text-align:center;
    }
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
        <p>Chatbot 24/7 — tanya, minta rencana, jelaskan sinyal, sampai belajar modul</p>
      </div>
    </div>
    <div class="pill"><span class="dot"></span><b>Chatbot</b></div>
  </div>

  <div class="grid">
    <!-- Sidebar -->
    <div class="panel">
      <div class="hd"><h2>Context</h2><span>Setting percakapan</span></div>
      <div class="bd">
        <label>Mode</label>
        <div class="chips" id="modes">
          <div class="chip active" data-mode="qa">Ask Anything</div>
          <div class="chip" data-mode="signal">Signal Explainer</div>
          <div class="chip" data-mode="mm">Portfolio Coach</div>
          <div class="chip" data-mode="bandar">Bandar Analyst</div>
          <div class="chip" data-mode="tutor">Learning Tutor</div>
        </div>

        <div class="line"></div>

        <div class="row">
          <div>
            <label>Saham aktif</label>
            <input class="field" id="ticker" value="BBCA"/>
          </div>
          <div>
            <label>Timeframe</label>
            <select class="field" id="tf">
              <option>Intraday</option>
              <option selected>Swing (D1)</option>
              <option>Position (W1)</option>
            </select>
          </div>
        </div>

        <div class="row" style="margin-top:10px">
          <div>
            <label>Profil risiko</label>
            <select class="field" id="risk">
              <option>Conservative</option>
              <option selected>Balanced</option>
              <option>Aggressive</option>
            </select>
          </div>
          <div>
            <label>Goal</label>
            <select class="field" id="goal">
              <option selected>Belajar & disiplin</option>
              <option>Entry plan</option>
              <option>Review posisi</option>
            </select>
          </div>
        </div>

        <div class="line"></div>

        <label>Quick Actions</label>
        <div class="chips">
          <div class="chip" id="actPlan">Buat rencana entry</div>
          <div class="chip" id="actExplain">Jelaskan sinyal</div>
          <div class="chip" id="actBandar">Cek orderbook</div>
          <div class="chip" id="actLearn">Mulai modul</div>
        </div>

        <div class="line"></div>
        <div class="help">
          Chatbot akan pakai context ini agar jawabannya fokus, ringkas, dan relevan.
        </div>
      </div>
    </div>

    <!-- Chat -->
    <div class="panel chatWrap">
      <div class="chatHeader">
        <div class="left">
          <div class="title">Nova Assistant</div>
          <div class="sub" id="subtitle">Mode: Ask Anything • Saham: BBCA • Swing (D1)</div>
        </div>
        <div class="right">
          <span class="tag good" id="conf">Confidence: Medium</span>
          <span class="tag warn">Guardrail ON</span>
        </div>
      </div>

      <div class="chat" id="chat">
        <div class="bubble bot">
          Hai! Aku Nova Assistant 👋<br/>
          Mau bahas <b>BBCA</b> atau saham lain? Kamu bisa:
          <div class="meta">• Minta rencana entry • Minta jelaskan sinyal • Tanya istilah • Belajar modul</div>
        </div>
        <div class="typing" id="typing"><div class="dots"><span></span><span></span><span></span></div></div>
      </div>

      <div class="quick">
        <button class="qbtn" data-q="BBCA bagus gak untuk swing?">BBCA bagus gak?</button>
        <button class="qbtn" data-q="Jelasin RSI dan MACD singkat">Jelasin RSI & MACD</button>
        <button class="qbtn" data-q="Bikinin rencana entry: dana 10 juta">Buat rencana entry</button>
        <button class="qbtn" data-q="Apa itu bid wall & ask wall?">Bid wall itu apa?</button>
      </div>

      <div class="composer">
        <input id="msg" class="input" placeholder="Tulis pertanyaan… (contoh: bikinin plan BBCA dana 10 juta, risiko 1%)"/>
        <button id="send" class="send">Kirim</button>
      </div>

      <div class="disclaimer">
        *Nova Assistant adalah alat bantu analisis, bukan rekomendasi investasi. Keputusan tetap di pengguna.
      </div>
    </div>
  </div>
</div>

<script>
  const chat = document.getElementById("chat");
  const typing = document.getElementById("typing");
  const subtitle = document.getElementById("subtitle");
  const conf = document.getElementById("conf");

  const modes = document.getElementById("modes");
  let mode = "qa";

  function esc(s){return s.replace(/[&<>"']/g, m=>({ "&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;" }[m]));}

  function addBubble(text, who="bot"){
    const div = document.createElement("div");
    div.className = "bubble " + who;
    div.innerHTML = text;
    chat.insertBefore(div, typing);
    chat.scrollTop = chat.scrollHeight;
  }

  function setSubtitle(){
    const t = document.getElementById("ticker").value.toUpperCase().trim() || "—";
    const tf = document.getElementById("tf").value;
    const mlabel = ({
      qa:"Ask Anything",
      signal:"Signal Explainer",
      mm:"Portfolio Coach",
      bandar:"Bandar Analyst",
      tutor:"Learning Tutor"
    })[mode];
    subtitle.textContent = `Mode: ${mlabel} • Saham: ${t} • ${tf}`;
  }

  function showTyping(on){
    typing.style.display = on ? "block" : "none";
    chat.scrollTop = chat.scrollHeight;
  }

  function setConfidence(level){
    conf.textContent = `Confidence: ${level}`;
    conf.className = "tag " + (level==="High" ? "good" : level==="Low" ? "warn" : "good");
    if(level==="Low"){ conf.className = "tag warn"; }
  }

  // Demo brain (replace with API/LLM later)
  function botReply(userText){
    const t = document.getElementById("ticker").value.toUpperCase().trim() || "BBCA";
    const risk = document.getElementById("risk").value;
    const tf = document.getElementById("tf").value;

    // simple intent
    const txt = userText.toLowerCase();

    // Money management intent
    if(mode==="mm" || txt.includes("rencana") || txt.includes("plan") || txt.includes("dana")){
      setConfidence("Medium");
      const danaMatch = txt.match(/(\d+)\s*(juta|jt|m)/);
      let dana = 10000000;
      if(danaMatch){
        const n = Number(danaMatch[1]);
        dana = n * 1000000;
      }
      const riskPct = risk==="Conservative" ? 0.005 : risk==="Aggressive" ? 0.02 : 0.01;

      // dummy plan numbers
      const entry = 8025, sl = 7800, tp1 = 8250;
      const maxRisk = dana * riskPct;
      const riskPerLot = (entry - sl) * 100;
      const lots = Math.max(0, Math.floor(maxRisk / riskPerLot));
      const posValue = lots * entry * 100;
      const rr = ((tp1-entry)/(entry-sl)).toFixed(2);

      return `
        Oke, aku bikinin <b>rencana entry ${t}</b> untuk <b>${tf}</b> (profil: <b>${risk}</b>).<br/><br/>
        <div class="plan">
          <h4>Rencana Eksekusi (demo)</h4>
          <div class="planRow"><span>Modal</span><b>Rp ${dana.toLocaleString("id-ID")}</b></div>
          <div class="planRow"><span>Maks risiko/transaksi</span><b>Rp ${Math.round(maxRisk).toLocaleString("id-ID")}</b></div>
          <div class="planRow"><span>Entry</span><b>${entry.toLocaleString("id-ID")}</b></div>
          <div class="planRow"><span>Stop Loss</span><b style="color:var(--red)">${sl.toLocaleString("id-ID")}</b></div>
          <div class="planRow"><span>TP1</span><b style="color:var(--green)">${tp1.toLocaleString("id-ID")}</b></div>
          <div class="planRow"><span>Lot disarankan</span><b>${lots.toLocaleString("id-ID")} lot</b></div>
          <div class="planRow"><span>Nilai posisi</span><b>Rp ${posValue.toLocaleString("id-ID")}</b></div>
          <div class="planRow"><span>Risk/Reward</span><b>${rr}</b></div>
        </div>
        <div class="meta">Catatan: angka demo. Untuk real, aku perlu support/resistance/ATR atau data teknikal kamu.</div>
      `;
    }

    // Signal explainer intent
    if(mode==="signal" || txt.includes("jelasin") || txt.includes("sinyal")){
      setConfidence("Low");
      return `
        Aku bisa jelasin sinyal dengan benar kalau aku punya input indikator (mis: RSI, MACD, MA, volume) + timeframe.<br/><br/>
        Untuk demo: sinyal biasanya dijelaskan dalam 3 bagian:
        <div class="plan">
          <h4>Kenapa muncul sinyal? (template)</h4>
          <div class="planRow"><span>Trend</span><b>MA20 &gt; MA50 (uptrend)</b></div>
          <div class="planRow"><span>Momentum</span><b>RSI naik dari area netral</b></div>
          <div class="planRow"><span>Konfirmasi</span><b>Break resistance + volume</b></div>
        </div>
        <div class="meta">Kirim indikator yang kamu pakai (atau screenshot), aku jelaskan step-by-step.</div>
      `;
    }

    // Bandar intent
    if(mode==="bandar" || txt.includes("orderbook") || txt.includes("bid") || txt.includes("ask") || txt.includes("bandar")){
      setConfidence("Medium");
      return `
        Siap. Untuk <b>Bandar/Orderbook</b>, aku baca 4 hal:
        <div class="plan">
          <h4>Checklist Orderbook</h4>
          <div class="planRow"><span>Imbalance</span><b>Bid vs Ask dominan?</b></div>
          <div class="planRow"><span>Wall</span><b>Bid wall/Ask wall dekat harga?</b></div>
          <div class="planRow"><span>Absorption</span><b>Sell besar tapi harga tahan?</b></div>
          <div class="planRow"><span>Spoof risk</span><b>Order besar sering hilang?</b></div>
        </div>
        Kirim snapshot orderbook / tape, nanti aku rangkum indikasinya.
      `;
    }

    // Tutor intent
    if(mode==="tutor" || txt.includes("modul") || txt.includes("belajar") || txt.includes("quiz")){
      setConfidence("High");
      return `
        Oke, kita mulai <b>modul belajar</b> (bukan sekadar konten). Kamu pilih:
        <div class="plan">
          <h4>Pilihan Modul</h4>
          <div class="planRow"><span>1) Fundamental dasar</span><b>20 menit</b></div>
          <div class="planRow"><span>2) Teknikal (trend & support)</span><b>25 menit</b></div>
          <div class="planRow"><span>3) Money management</span><b>20 menit</b></div>
          <div class="planRow"><span>4) Psikologi trading</span><b>15 menit</b></div>
        </div>
        Mau mulai dari nomor berapa? Aku bisa kasih latihan & quiz singkat juga.
      `;
    }

    // Default Q&A
    setConfidence("Medium");
    return `
      Aku tangkap kamu lagi bahas <b>${t}</b> (${tf}).<br/><br/>
      Biar jawabanku tepat, kamu mau fokus ke:
      <div class="plan">
        <h4>Pilih arah</h4>
        <div class="planRow"><span>• Minta rencana entry</span><b>(lot, SL, TP)</b></div>
        <div class="planRow"><span>• Minta jelaskan sinyal</span><b>(kenapa & validasi)</b></div>
        <div class="planRow"><span>• Review posisi</span><b>(tahan/tambah/keluar)</b></div>
      </div>
      <div class="meta">Tulis: “bikin plan dana 10 juta risiko 1%” atau “jelasin sinyal RSI+MACD”.</div>
    `;
  }

  function sendMessage(text){
    const msg = text.trim();
    if(!msg) return;

    addBubble(esc(msg), "user");
    showTyping(true);

    setTimeout(()=>{
      showTyping(false);
      addBubble(botReply(msg), "bot");
    }, 700);
  }

  // UI bindings
  document.getElementById("send").addEventListener("click", ()=>sendMessage(document.getElementById("msg").value));
  document.getElementById("msg").addEventListener("keydown", (e)=>{
    if(e.key==="Enter"){ e.preventDefault(); sendMessage(e.target.value); e.target.value=""; }
  });

  document.querySelectorAll(".qbtn").forEach(b=>{
    b.addEventListener("click", ()=>sendMessage(b.dataset.q));
  });

  // mode chips
  modes.querySelectorAll(".chip").forEach(c=>{
    c.addEventListener("click", ()=>{
      modes.querySelectorAll(".chip").forEach(x=>x.classList.remove("active"));
      c.classList.add("active");
      mode = c.dataset.mode;
      setSubtitle();
      addBubble(`Mode diganti ke <b>${c.textContent}</b>. Silakan tanya sesuai kebutuhan.`, "bot");
    });
  });

  // sidebar quick actions
  document.getElementById("actPlan").addEventListener("click", ()=>sendMessage("Bikinin rencana entry: dana 10 juta"));
  document.getElementById("actExplain").addEventListener("click", ()=>sendMessage("Jelaskan sinyal indikator yang kamu pakai"));
  document.getElementById("actBandar").addEventListener("click", ()=>sendMessage("Cek orderbook: jelasin bid wall, ask wall, imbalance"));
  document.getElementById("actLearn").addEventListener("click", ()=>sendMessage("Mulai modul money management"));

  ["ticker","tf","risk","goal"].forEach(id=>{
    document.getElementById(id).addEventListener("change", setSubtitle);
    document.getElementById(id).addEventListener("input", setSubtitle);
  });

  setSubtitle();
</script>
</body>
</html>
