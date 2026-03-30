<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2n.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="2NCORPORATE - Support Technique">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Support Technique — 2NCORPORATE</title>
    <style>
        :root{--primary:#0a1c3a;--gold:#e0b83f;--accent:#ff6b35;--light:#f4f6fb;--white:#fff;--text:#2c2c2c;--muted:#6c757d;--border:#e3e8f0;--success:#19a974;--radius:10px}
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Figtree',sans-serif;color:var(--text);background:var(--white);overflow-x:hidden}
        a{text-decoration:none;color:inherit}

        /* HERO */
        .support-hero{background:linear-gradient(135deg,var(--primary) 0%,#112550 60%,#1a3468 100%);padding:70px 20px 80px;text-align:center;position:relative;overflow:hidden}
        .support-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 600px 300px at 10% 50%,rgba(224,184,63,.08) 0%,transparent 70%),radial-gradient(ellipse 400px 400px at 90% 20%,rgba(255,107,53,.06) 0%,transparent 70%)}
        .badge-label{display:inline-flex;align-items:center;gap:7px;background:rgba(224,184,63,.15);border:1px solid rgba(224,184,63,.35);color:var(--gold);font-size:.78rem;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;padding:5px 14px;border-radius:30px;margin-bottom:20px}
        .support-hero h1{color:var(--white);font-size:clamp(1.9rem,4vw,3rem);font-weight:800;line-height:1.2;margin-bottom:14px}
        .support-hero h1 span{color:var(--gold)}
        .support-hero>p{color:rgba(255,255,255,.7);font-size:1.05rem;max-width:560px;margin:0 auto 32px}
        .hero-search{max-width:580px;margin:0 auto;position:relative;z-index:2}
        .hero-search input{width:100%;padding:16px 60px 16px 22px;border-radius:50px;border:2px solid rgba(224,184,63,.4);background:rgba(255,255,255,.07);color:var(--white);font-size:1rem;font-family:'Figtree',sans-serif;outline:none;transition:border .25s,background .25s}
        .hero-search input::placeholder{color:rgba(255,255,255,.4)}
        .hero-search input:focus{border-color:var(--gold);background:rgba(255,255,255,.12)}
        .hero-search button{position:absolute;right:6px;top:50%;transform:translateY(-50%);background:var(--gold);color:var(--primary);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;font-size:1rem;transition:background .2s,transform .2s;display:flex;align-items:center;justify-content:center}
        .hero-search button:hover{background:#f0ca55;transform:translateY(-50%) scale(1.08)}
        .hero-tags{margin-top:16px;display:flex;flex-wrap:wrap;justify-content:center;gap:8px}
        .hero-tags span{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);color:rgba(255,255,255,.7);font-size:.78rem;padding:4px 12px;border-radius:20px;cursor:pointer;transition:all .2s}
        .hero-tags span:hover{background:rgba(224,184,63,.2);border-color:var(--gold);color:var(--gold)}

        /* STATS */
        .stats-bar{background:var(--primary);border-bottom:3px solid var(--gold)}
        .stats-bar .inner{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr)}
        .stat-item{padding:20px 15px;border-right:1px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;gap:14px}
        .stat-item:last-child{border-right:none}
        .stat-icon{width:42px;height:42px;background:rgba(224,184,63,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1.1rem;flex-shrink:0}
        .stat-text .num{color:var(--white);font-size:1.35rem;font-weight:800;line-height:1}
        .stat-text .lbl{color:rgba(255,255,255,.55);font-size:.72rem;text-transform:uppercase;letter-spacing:.8px;margin-top:2px}

        /* CONTACT */
        .quick-contact{background:var(--light);padding:55px 20px}
        .section-title{font-size:1.5rem;font-weight:800;color:var(--primary);margin-bottom:6px}
        .section-sub{color:var(--muted);font-size:.92rem;margin-bottom:35px}
        .contact-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;max-width:1100px;margin:0 auto}
        .contact-card{background:var(--white);border-radius:var(--radius);padding:30px 24px;text-align:center;border:1.5px solid var(--border);transition:all .3s;position:relative;overflow:hidden}
        .contact-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gold);transform:scaleX(0);transition:transform .3s}
        .contact-card:hover{border-color:var(--gold);box-shadow:0 8px 30px rgba(10,28,58,.1);transform:translateY(-4px)}
        .contact-card:hover::before{transform:scaleX(1)}
        .icon-wrap{width:60px;height:60px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin:0 auto 16px}
        .ic-phone{background:#e8f5e9;color:#2e7d32}.ic-wa{background:#e8f5e9;color:#25d366}.ic-email{background:#e3f2fd;color:#1565c0}.ic-ticket{background:#f3e5f5;color:#7b1fa2}
        .contact-card h4{font-size:1rem;font-weight:700;color:var(--primary);margin-bottom:6px}
        .contact-card p{font-size:.83rem;color:var(--muted);line-height:1.5;margin-bottom:18px}
        .avail{display:inline-block;font-size:.72rem;font-weight:700;padding:3px 10px;border-radius:20px;margin-bottom:14px}
        .avail-green{background:#e8f5e9;color:#2e7d32}.avail-blue{background:#e3f2fd;color:#1565c0}.avail-gray{background:#f0f0f0;color:#555}
        .btn-contact{display:inline-flex;align-items:center;gap:7px;padding:9px 20px;border-radius:8px;font-size:.85rem;font-weight:700;transition:all .2s;border:none;cursor:pointer;text-decoration:none}
        .btn-primary-c{background:var(--primary);color:var(--white)}.btn-primary-c:hover{background:#112550;color:var(--white)}
        .btn-gold{background:var(--gold);color:var(--primary)}.btn-gold:hover{background:#f0ca55}

        /* FAQ */
        .faq-section{padding:60px 20px;background:var(--white)}
        .faq-layout{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:220px 1fr;gap:40px;align-items:start}
        .faq-categories{position:sticky;top:20px}
        .faq-cat-title{font-size:.7rem;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--muted);margin-bottom:12px}
        .faq-cat-btn{display:flex;align-items:center;gap:10px;width:100%;padding:10px 14px;border-radius:8px;border:none;background:transparent;font-family:'Figtree',sans-serif;font-size:.88rem;font-weight:600;color:var(--muted);cursor:pointer;transition:all .2s;text-align:left;margin-bottom:4px}
        .faq-cat-btn i{width:16px;text-align:center}
        .faq-cat-btn:hover,.faq-cat-btn.active{background:#f0f4ff;color:var(--primary)}
        .faq-cat-btn.active{font-weight:700}
        .faq-cat-btn .count{margin-left:auto;background:var(--border);color:var(--muted);font-size:.7rem;padding:1px 7px;border-radius:20px}
        .faq-cat-btn.active .count{background:var(--gold);color:var(--primary)}
        .faq-list{display:flex;flex-direction:column;gap:10px}
        .faq-item{border:1.5px solid var(--border);border-radius:var(--radius);overflow:hidden;transition:border-color .2s}
        .faq-item.open{border-color:var(--gold)}
        .faq-question{display:flex;align-items:center;justify-content:space-between;padding:18px 20px;cursor:pointer;gap:15px;background:var(--white);transition:background .2s}
        .faq-question:hover{background:#fafbff}
        .faq-item.open .faq-question{background:#fffdf4}
        .faq-q-left{display:flex;align-items:center;gap:14px}
        .faq-q-icon{width:34px;height:34px;border-radius:8px;background:var(--light);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:.85rem;flex-shrink:0}
        .faq-item.open .faq-q-icon{background:rgba(224,184,63,.15);color:var(--gold)}
        .faq-question span{font-weight:600;font-size:.95rem;color:var(--primary)}
        .faq-chevron{color:var(--muted);transition:transform .3s;flex-shrink:0}
        .faq-item.open .faq-chevron{transform:rotate(180deg);color:var(--gold)}
        .faq-answer{max-height:0;overflow:hidden;transition:max-height .4s ease}
        .faq-item.open .faq-answer{max-height:500px}
        .faq-answer-inner{padding:0 20px 20px 68px;color:var(--muted);font-size:.9rem;line-height:1.7}
        .faq-answer-inner a{color:var(--primary);font-weight:600;text-decoration:underline}

        /* TRACKING */
        .tracking-section{background:var(--light);padding:60px 20px}
        .tracking-box{max-width:680px;margin:0 auto;background:var(--white);border-radius:16px;padding:40px;box-shadow:0 10px 40px rgba(10,28,58,.08);border:1.5px solid var(--border)}
        .track-icon{width:64px;height:64px;background:linear-gradient(135deg,var(--primary),#1a3468);border-radius:16px;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1.6rem;margin:0 auto 20px}
        .track-input-row{display:flex;gap:10px;margin-top:20px}
        .track-input-row input{flex:1;padding:13px 18px;border-radius:8px;border:1.5px solid var(--border);font-family:'Figtree',sans-serif;font-size:.95rem;outline:none;transition:border .2s}
        .track-input-row input:focus{border-color:var(--primary)}
        .track-input-row button{padding:13px 22px;background:var(--primary);color:var(--white);border:none;border-radius:8px;font-family:'Figtree',sans-serif;font-size:.92rem;font-weight:700;cursor:pointer;transition:background .2s;white-space:nowrap}
        .track-input-row button:hover{background:#112550}
        .track-steps{display:flex;justify-content:space-between;margin-top:30px;position:relative}
        .track-steps::before{content:'';position:absolute;top:18px;left:10%;right:10%;height:2px;background:var(--border)}
        .track-step{display:flex;flex-direction:column;align-items:center;gap:8px;position:relative;z-index:1;flex:1}
        .step-dot{width:36px;height:36px;border-radius:50%;background:var(--border);display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:.85rem;border:2px solid var(--white)}
        .step-dot.done{background:var(--success);color:var(--white)}
        .step-dot.current{background:var(--gold);color:var(--primary);box-shadow:0 0 0 4px rgba(224,184,63,.25)}
        .track-step span{font-size:.72rem;font-weight:600;color:var(--muted);text-align:center}
        .track-step.done span,.track-step.current span{color:var(--primary)}

        /* TICKET */
        .ticket-section{padding:60px 20px;background:var(--white)}
        .ticket-layout{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1fr 380px;gap:40px;align-items:start}
        .ticket-form-box{background:var(--white);border:1.5px solid var(--border);border-radius:16px;padding:36px}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
        .form-group{margin-bottom:18px}
        .form-group label{display:block;font-size:.83rem;font-weight:700;color:var(--primary);margin-bottom:6px}
        .form-group label .req{color:var(--accent);margin-left:3px}
        .form-group input,.form-group select,.form-group textarea{width:100%;padding:11px 14px;border:1.5px solid var(--border);border-radius:8px;font-family:'Figtree',sans-serif;font-size:.9rem;color:var(--text);outline:none;transition:border .2s,box-shadow .2s;background:var(--white)}
        .form-group input:focus,.form-group select:focus,.form-group textarea:focus{border-color:var(--primary);box-shadow:0 0 0 3px rgba(10,28,58,.07)}
        .form-group textarea{resize:vertical;min-height:120px}
        .priority-pills{display:flex;gap:8px;flex-wrap:wrap}
        .priority-pill{padding:7px 16px;border-radius:20px;border:1.5px solid var(--border);font-size:.82rem;font-weight:600;cursor:pointer;transition:all .2s;background:var(--white)}
        .priority-pill:hover{border-color:var(--primary);color:var(--primary)}
        .priority-pill.selected-low{background:#e8f5e9;border-color:#2e7d32;color:#2e7d32}
        .priority-pill.selected-medium{background:#fff8e1;border-color:#f9a825;color:#f9a825}
        .priority-pill.selected-high{background:#fce4ec;border-color:#c62828;color:#c62828}
        .upload-zone{border:2px dashed var(--border);border-radius:8px;padding:28px;text-align:center;cursor:pointer;transition:all .2s}
        .upload-zone:hover{border-color:var(--primary);background:#fafbff}
        .upload-zone i{font-size:1.8rem;color:var(--muted);display:block;margin-bottom:8px}
        .upload-zone p{font-size:.83rem;color:var(--muted);margin:0}
        .upload-zone strong{color:var(--primary)}
        .btn-submit{width:100%;padding:14px;background:var(--primary);color:var(--white);border:none;border-radius:10px;font-family:'Figtree',sans-serif;font-size:1rem;font-weight:700;cursor:pointer;transition:background .2s,transform .15s;display:flex;align-items:center;justify-content:center;gap:10px}
        .btn-submit:hover{background:#112550;transform:translateY(-1px)}
        .ticket-info-sidebar{display:flex;flex-direction:column;gap:18px}
        .info-card{background:var(--light);border-radius:var(--radius);padding:22px;border:1.5px solid var(--border)}
        .info-card h5{font-size:.9rem;font-weight:800;color:var(--primary);margin-bottom:14px;display:flex;align-items:center;gap:8px}
        .info-card h5 i{color:var(--gold)}
        .info-row{display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px solid var(--border);font-size:.83rem}
        .info-row:last-child{border-bottom:none;padding-bottom:0}
        .info-row .lbl{color:var(--muted)}.info-row .val{font-weight:700;color:var(--primary)}
        .badge-status{display:inline-flex;align-items:center;gap:5px;padding:3px 10px;border-radius:20px;font-size:.72rem;font-weight:700}
        .badge-open{background:#e3f2fd;color:#1565c0}.badge-inprog{background:#fff8e1;color:#e65100}.badge-closed{background:#e8f5e9;color:#2e7d32}

        /* RESSOURCES */
        .resources-section{background:var(--light);padding:60px 20px}
        .resources-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:20px;max-width:1100px;margin:0 auto}
        .resource-card{background:var(--white);border-radius:var(--radius);padding:28px 24px;border:1.5px solid var(--border);transition:all .3s;display:flex;flex-direction:column;gap:12px}
        .resource-card:hover{border-color:var(--gold);box-shadow:0 6px 24px rgba(10,28,58,.08);transform:translateY(-3px)}
        .res-icon{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem}
        .res-pdf{background:#fce4ec;color:#c62828}.res-video{background:#e3f2fd;color:#1565c0}.res-guide{background:#e8f5e9;color:#2e7d32}.res-tool{background:#fff3e0;color:var(--accent)}
        .resource-card h5{font-size:.95rem;font-weight:700;color:var(--primary);margin:0}
        .resource-card p{font-size:.82rem;color:var(--muted);margin:0;line-height:1.5}
        .resource-card a{display:inline-flex;align-items:center;gap:6px;font-size:.82rem;font-weight:700;color:var(--primary);margin-top:auto;transition:color .2s}
        .resource-card a:hover{color:var(--gold)}

        /* FOOTER */
        .support-footer-bar{background:var(--primary);padding:30px 20px;text-align:center}
        .support-footer-bar p{color:rgba(255,255,255,.6);font-size:.85rem;margin:0}
        .support-footer-bar a{color:var(--gold);font-weight:600}

        /* TOAST */
        .toast-msg{position:fixed;bottom:30px;right:30px;background:var(--primary);color:var(--white);padding:14px 22px;border-radius:10px;font-size:.9rem;font-weight:600;border-left:4px solid var(--gold);box-shadow:0 8px 30px rgba(0,0,0,.2);transform:translateY(20px);opacity:0;transition:all .35s;z-index:9999;pointer-events:none}
        .toast-msg.show{transform:translateY(0);opacity:1}

        @media(max-width:900px){
            .faq-layout{grid-template-columns:1fr}
            .faq-categories{position:static;display:flex;flex-wrap:wrap;gap:6px}
            .faq-cat-title{display:none}
            .faq-cat-btn{width:auto;padding:7px 14px;font-size:.8rem}
            .ticket-layout{grid-template-columns:1fr}
            .stats-bar .inner{grid-template-columns:repeat(2,1fr)}
            .stat-item{border-bottom:1px solid rgba(255,255,255,.1)}
            .form-row{grid-template-columns:1fr}
        }
        @media(max-width:600px){
            .support-hero{padding:50px 16px 60px}
            .tracking-box{padding:24px 18px}
            .ticket-form-box{padding:22px 16px}
            .track-input-row{flex-direction:column}
            .contact-cards{grid-template-columns:1fr}
            .stats-bar .inner{grid-template-columns:1fr 1fr}
            .track-step span{font-size:.65rem}
        }
    </style>
</head>
<body>
    @include('header', ['souscategories' => $souscategories])

    <!-- HERO -->
    <section class="support-hero">
        <div class="badge-label"><i class="fas fa-headset"></i> Centre d'Assistance</div>
        <h1>Comment pouvons-nous<br><span>vous aider ?</span></h1>
        <p>Notre équipe technique est disponible pour répondre à toutes vos questions sur vos équipements électriques professionnels.</p>
        <div class="hero-search">
            <input type="text" id="heroSearch" placeholder="Rechercher une question, un produit, un problème…" autocomplete="off">
            <button onclick="handleSearch()"><i class="fas fa-search"></i></button>
        </div>
        <div class="hero-tags">
            <span onclick="scrollToFaq('livraison')">Livraison</span>
            <span onclick="scrollToFaq('garantie')">Garantie</span>
            <span onclick="scrollToFaq('installation')">Installation</span>
            <span onclick="scrollToFaq('retour')">Retour produit</span>
            <span onclick="scrollToFaq('paiement')">Paiement</span>
            <span onclick="scrollToFaq('panne')">Panne / Réparation</span>
        </div>
    </section>

    <!-- STATS -->
    <div class="stats-bar">
        <div class="inner">
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-clock"></i></div>
                <div class="stat-text"><div class="num">&lt; 2h</div><div class="lbl">Temps de réponse moyen</div></div>
            </div>
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-star"></i></div>
                <div class="stat-text"><div class="num">98%</div><div class="lbl">Satisfaction client</div></div>
            </div>
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-tools"></i></div>
                <div class="stat-text"><div class="num">+500</div><div class="lbl">Tickets résolus / mois</div></div>
            </div>
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                <div class="stat-text"><div class="num">6j/7</div><div class="lbl">Disponibilité support</div></div>
            </div>
        </div>
    </div>

    <!-- CONTACT -->
    <section class="quick-contact" id="contact">
        <div style="max-width:1100px;margin:0 auto;text-align:center;">
            <div class="section-title">Contactez-nous directement</div>
            <div class="section-sub">Choisissez le canal qui vous convient le mieux</div>
        </div>
        <div class="contact-cards">
            <div class="contact-card">
                <div class="icon-wrap ic-phone"><i class="fas fa-phone-alt"></i></div>
                <span class="avail avail-green"> Disponible Lun–Sam 8h–18h</span>
                <h4>Appel téléphonique</h4>
                <p>Parlez directement à un technicien pour une assistance immédiate.</p>
                <a href="tel:+237690720568" class="btn-contact btn-primary-c"><i class="fas fa-phone"></i> 690 72 05 68</a>
            </div>
            <div class="contact-card">
                <div class="icon-wrap ic-wa"><i class="fab fa-whatsapp"></i></div>
                <span class="avail avail-green"> Réponse rapide</span>
                <h4>WhatsApp</h4>
                <p>Envoyez vos photos de panne ou posez vos questions via WhatsApp.</p>
                <a href="https://wa.me/237690720568" target="_blank" class="btn-contact btn-gold"><i class="fab fa-whatsapp"></i> Ouvrir WhatsApp</a>
            </div>
            <div class="contact-card">
                <div class="icon-wrap ic-email"><i class="fas fa-envelope"></i></div>
                <span class="avail avail-blue"> Réponse sous 24h</span>
                <h4>Email</h4>
                <p>Pour toute demande formelle, devis ou suivi de dossier technique.</p>
                <a href="mailto:support@2ncorporate.cm" class="btn-contact btn-primary-c"><i class="fas fa-envelope"></i> Envoyer un email</a>
            </div>
            <div class="contact-card">
                <div class="icon-wrap ic-ticket"><i class="fas fa-ticket-alt"></i></div>
                <span class="avail avail-gray"> Suivi en ligne</span>
                <h4>Ouvrir un ticket</h4>
                <p>Créez un ticket de support pour suivre l'avancement de votre demande.</p>
                <a href="#ticket" class="btn-contact btn-primary-c"><i class="fas fa-plus"></i> Nouveau ticket</a>
            </div>
        </div>
    </section>

    <!-- SUIVI -->
    <section class="tracking-section" id="suivi">
        <div style="max-width:1100px;margin:0 auto 35px;text-align:center;">
            <div class="section-title">Suivre ma commande</div>
            <div class="section-sub">Entrez votre numéro de commande pour voir l'état de votre livraison</div>
        </div>
        <div class="tracking-box">
            <div class="track-icon"><i class="fas fa-truck"></i></div>
            <div style="text-align:center;">
                <h4 style="color:var(--primary);font-weight:800;margin-bottom:6px;">Où est ma commande ?</h4>
                <p style="color:var(--muted);font-size:.88rem;">Saisissez votre numéro de commande reçu par SMS ou email</p>
            </div>
            <div class="track-input-row">
                <input type="text" id="trackInput" placeholder="Ex : 2N-2024-00123">
                <button onclick="trackOrder()"><i class="fas fa-search" style="margin-right:6px;"></i>Suivre</button>
            </div>
            <div class="track-steps" id="trackSteps" style="display:none;">
                <div class="track-step done"><div class="step-dot done"><i class="fas fa-check"></i></div><span>Commande<br>confirmée</span></div>
                <div class="track-step done"><div class="step-dot done"><i class="fas fa-box"></i></div><span>En cours de<br>préparation</span></div>
                <div class="track-step current"><div class="step-dot current"><i class="fas fa-truck"></i></div><span>En cours de<br>livraison</span></div>
                <div class="track-step"><div class="step-dot"><i class="fas fa-home"></i></div><span>Livré</span></div>
            </div>
            <div id="trackMsg" style="display:none;margin-top:20px;padding:14px 18px;background:#e8f5e9;border-radius:8px;color:#2e7d32;font-size:.9rem;font-weight:600;text-align:center;">
                <i class="fas fa-check-circle" style="margin-right:8px;"></i>Commande <strong id="trackNum"></strong> — En transit vers Douala · Livraison estimée : demain avant 18h
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section" id="faq">
        <div style="max-width:1100px;margin:0 auto 30px;text-align:center;">
            <div class="section-title">Questions fréquentes</div>
            <div class="section-sub">Trouvez rapidement la réponse à votre question</div>
        </div>
        <div class="faq-layout">
            <div class="faq-categories">
                <div class="faq-cat-title">Catégories</div>
                <button class="faq-cat-btn active" data-cat="all" onclick="filterFaq('all',this)"><i class="fas fa-th"></i> Toutes <span class="count">12</span></button>
                <button class="faq-cat-btn" data-cat="livraison" onclick="filterFaq('livraison',this)"><i class="fas fa-truck"></i> Livraison <span class="count">3</span></button>
                <button class="faq-cat-btn" data-cat="garantie" onclick="filterFaq('garantie',this)"><i class="fas fa-shield-alt"></i> Garantie <span class="count">2</span></button>
                <button class="faq-cat-btn" data-cat="installation" onclick="filterFaq('installation',this)"><i class="fas fa-tools"></i> Installation <span class="count">2</span></button>
                <button class="faq-cat-btn" data-cat="retour" onclick="filterFaq('retour',this)"><i class="fas fa-undo"></i> Retour <span class="count">2</span></button>
                <button class="faq-cat-btn" data-cat="paiement" onclick="filterFaq('paiement',this)"><i class="fas fa-credit-card"></i> Paiement <span class="count">2</span></button>
                <button class="faq-cat-btn" data-cat="panne" onclick="filterFaq('panne',this)"><i class="fas fa-wrench"></i> Panne / SAV <span class="count">1</span></button>
            </div>
            <div class="faq-list" id="faqList">
                <div class="faq-item" data-cat="livraison">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-truck"></i></div><span>Quels sont les délais de livraison ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Pour Douala et Yaoundé, la livraison est effectuée sous <strong>24 à 48h</strong> ouvrables après confirmation. Pour les autres villes, comptez <strong>3 à 5 jours ouvrables</strong>. Un SMS de confirmation vous sera envoyé dès la prise en charge.</div></div>
                </div>
                <div class="faq-item" data-cat="livraison">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-map-marker-alt"></i></div><span>Livrez-vous partout au Cameroun ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Oui, nous livrons dans toutes les grandes villes : Douala, Yaoundé, Bafoussam, Bamenda, Garoua, Maroua, Ngaoundéré et bien d'autres. Pour les zones éloignées, contactez-nous pour un devis personnalisé.</div></div>
                </div>
                <div class="faq-item" data-cat="livraison">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-money-bill-wave"></i></div><span>La livraison est-elle payante ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">La livraison est <strong>offerte à Douala</strong> pour toute commande supérieure à 50 000 FCFA. Pour les autres zones, les frais varient selon le poids et la destination. Ajoutez vos produits au panier pour voir les frais exacts.</div></div>
                </div>
                <div class="faq-item" data-cat="garantie">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-shield-alt"></i></div><span>Quelle est la durée de garantie des produits ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Tous nos équipements bénéficient de la <strong>garantie constructeur</strong> : 1 an pour les outillages, 2 ans pour les équipements électriques, jusqu'à 3 ans pour les groupes électrogènes. La garantie couvre les défauts de fabrication.</div></div>
                </div>
                <div class="faq-item" data-cat="garantie">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-file-alt"></i></div><span>Comment activer ma garantie ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Conservez votre <strong>facture d'achat</strong> et la carte de garantie fournie. En cas de problème, contactez notre SAV ou ouvrez un ticket. Nos techniciens organiseront la réparation ou le remplacement selon les conditions.</div></div>
                </div>
                <div class="faq-item" data-cat="installation">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-tools"></i></div><span>Proposez-vous un service d'installation ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Oui ! Nous proposons l'installation professionnelle pour les groupes électrogènes, systèmes PABX, pompes submersibles, etc. Ce service est disponible à Douala et ses environs. Contactez-nous pour un devis.</div></div>
                </div>
                <div class="faq-item" data-cat="installation">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-graduation-cap"></i></div><span>Formez-vous à l'utilisation des équipements ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Oui, pour les équipements complexes (PABX, vidéosurveillance…), nous proposons une formation à la prise en main, incluse ou en option. Demandez-le lors de votre commande ou contactez notre équipe technique.</div></div>
                </div>
                <div class="faq-item" data-cat="retour">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-undo"></i></div><span>Comment retourner un produit ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Vous disposez de <strong>7 jours</strong> après réception pour retourner un produit non utilisé dans son emballage d'origine. Ouvrez un ticket de retour ou contactez notre service client. Le remboursement est effectué sous 5 jours ouvrables après vérification.</div></div>
                </div>
                <div class="faq-item" data-cat="retour">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-exchange-alt"></i></div><span>Puis-je échanger un produit contre un autre modèle ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">L'échange est possible dans les <strong>7 jours</strong> suivant la livraison, si le produit est dans son état d'origine. Si le nouveau produit est plus cher, vous payez la différence. S'il est moins cher, un avoir est remis sur votre compte.</div></div>
                </div>
                <div class="faq-item" data-cat="paiement">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-mobile-alt"></i></div><span>Quels modes de paiement acceptez-vous ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Nous acceptons : <strong>Orange Money, MTN Mobile Money</strong>, virement bancaire et paiement à la livraison (Douala uniquement). Pour les entreprises, nous proposons la facturation avec paiement différé sur justificatif.</div></div>
                </div>
                <div class="faq-item" data-cat="paiement">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-receipt"></i></div><span>Comment obtenir une facture officielle ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Une facture est automatiquement générée et envoyée par email à chaque commande. Pour une facture avec mentions légales spécifiques (TVA, RCCM…) pour votre entreprise, précisez-le lors de la commande.</div></div>
                </div>
                <div class="faq-item" data-cat="panne">
                    <div class="faq-question" onclick="toggleFaq(this)"><div class="faq-q-left"><div class="faq-q-icon"><i class="fas fa-wrench"></i></div><span>Mon équipement est en panne, que faire ?</span></div><i class="fas fa-chevron-down faq-chevron"></i></div>
                    <div class="faq-answer"><div class="faq-answer-inner">Consultez d'abord notre <a href="#ressources">guide de dépannage</a>. Si le problème persiste, ouvrez un <strong>ticket SAV</strong> avec description et photo de la panne. Un technicien vous contactera sous 2h pour organiser la prise en charge.</div></div>
                </div>
            </div>
        </div>
    </section>

    <!-- TICKET -->
    <section class="ticket-section" id="ticket">
        <div style="max-width:1100px;margin:0 auto 30px;text-align:center;">
            <div class="section-title">Ouvrir un ticket de support</div>
            <div class="section-sub">Décrivez votre problème, notre équipe vous répond sous 2h</div>
        </div>
        <div class="ticket-layout">
            <div class="ticket-form-box">
                <h5 style="font-size:1.1rem;font-weight:800;color:var(--primary);margin-bottom:22px;"><i class="fas fa-plus-circle" style="color:var(--gold);margin-right:8px;"></i>Nouveau ticket</h5>
                <div class="form-row">
                    <div class="form-group"><label>Nom complet <span class="req">*</span></label><input type="text" id="f_name" placeholder="Jean Dupont"></div>
                    <div class="form-group"><label>Email <span class="req">*</span></label><input type="email" id="f_email" placeholder="jean@example.cm"></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Téléphone</label><input type="tel" id="f_phone" placeholder="+237 6XX XXX XXX"></div>
                    <div class="form-group"><label>N° de commande</label><input type="text" id="f_order" placeholder="2N-2024-XXXXX (optionnel)"></div>
                </div>
                <div class="form-group">
                    <label>Type de demande <span class="req">*</span></label>
                    <select id="f_type">
                        <option value="">— Choisissez une catégorie —</option>
                        <option>Panne / Dysfonctionnement</option>
                        <option>Demande de garantie</option>
                        <option>Retour produit</option>
                        <option>Question sur une commande</option>
                        <option>Demande d'installation</option>
                        <option>Demande de devis</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div class="form-group"><label>Produit concerné</label><input type="text" id="f_product" placeholder="Ex : Groupe électrogène 7.5KVA…"></div>
                <div class="form-group">
                    <label>Priorité</label>
                    <div class="priority-pills">
                        <button class="priority-pill" onclick="selectPriority(this,'selected-low')">ðÂÂ¢ Basse</button>
                        <button class="priority-pill selected-medium" onclick="selectPriority(this,'selected-medium')">ðÂÂ¡ Moyenne</button>
                        <button class="priority-pill" onclick="selectPriority(this,'selected-high')">ðÂÂ´ Urgente</button>
                    </div>
                </div>
                <div class="form-group"><label>Description du problème <span class="req">*</span></label><textarea id="f_desc" placeholder="Décrivez le problème en détail : symptômes, conditions d'apparition, ce que vous avez déjà essayé…"></textarea></div>
                <div class="form-group">
                    <label>Pièces jointes</label>
                    <div class="upload-zone" onclick="document.getElementById('fileInput').click()">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p><strong>Cliquez pour ajouter</strong> ou glissez vos fichiers ici</p>
                        <p style="margin-top:4px;font-size:.75rem;">Photos, vidéos, documents — max 10 Mo</p>
                        <input type="file" id="fileInput" style="display:none;" multiple accept="image/*,video/*,.pdf,.doc,.docx">
                    </div>
                </div>
                <button class="btn-submit" onclick="submitTicket()"><i class="fas fa-paper-plane"></i> Envoyer le ticket</button>
            </div>
            <div class="ticket-info-sidebar">
                <div class="info-card">
                    <h5><i class="fas fa-clock"></i> Délais de traitement</h5>
                    <div class="info-row"><span class="lbl">Priorité Basse</span><span class="val">48h max</span></div>
                    <div class="info-row"><span class="lbl">Priorité Moyenne</span><span class="val">24h max</span></div>
                    <div class="info-row"><span class="lbl">Priorité Urgente</span><span class="val">&lt; 2h</span></div>
                    <div class="info-row"><span class="lbl">Disponibilité</span><span class="val">Lun–Sam 8h–18h</span></div>
                </div>
                <div class="info-card">
                    <h5><i class="fas fa-list-alt"></i> Tickets récents</h5>
                    <div class="info-row"><span class="lbl">#TK-2341</span><span class="badge-status badge-closed"><i class="fas fa-check"></i> Résolu</span></div>
                    <div class="info-row"><span class="lbl">#TK-2298</span><span class="badge-status badge-inprog"><i class="fas fa-spinner"></i> En cours</span></div>
                    <div class="info-row"><span class="lbl">#TK-2187</span><span class="badge-status badge-closed"><i class="fas fa-check"></i> Résolu</span></div>
                    <div style="margin-top:12px;text-align:center;"><a href="#" style="font-size:.82rem;color:var(--primary);font-weight:700;text-decoration:underline;">Voir tous mes tickets →</a></div>
                </div>
                <div class="info-card" style="background:linear-gradient(135deg,var(--primary),#1a3468);border-color:transparent;">
                    <h5 style="color:white;"><i class="fas fa-phone-alt"></i> Urgence technique</h5>
                    <p style="color:rgba(255,255,255,.7);font-size:.83rem;line-height:1.6;margin-bottom:16px;">Pour une panne critique sur chantier ou une urgence industrielle, appelez notre ligne directe disponible 24h/24.</p>
                    <a href="tel:+237600000000" class="btn-contact btn-gold" style="width:100%;justify-content:center;"><i class="fas fa-phone"></i> Ligne urgence</a>
                </div>
            </div>
        </div>
    </section>

   @include('footer1')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleFaq(el){const item=el.closest('.faq-item');const isOpen=item.classList.contains('open');document.querySelectorAll('.faq-item.open').forEach(i=>i.classList.remove('open'));if(!isOpen)item.classList.add('open');}
        function filterFaq(cat,btn){document.querySelectorAll('.faq-cat-btn').forEach(b=>b.classList.remove('active'));btn.classList.add('active');document.querySelectorAll('.faq-item').forEach(item=>{item.style.display=(cat==='all'||item.dataset.cat===cat)?'':'none';});}
        function selectPriority(el,cls){document.querySelectorAll('.priority-pill').forEach(p=>{p.classList.remove('selected-low','selected-medium','selected-high');});el.classList.add(cls);}
        function trackOrder(){const val=document.getElementById('trackInput').value.trim();if(!val){showToast('âÂ ï¸Â Entrez un numéro de commande');return;}document.getElementById('trackNum').textContent=val;document.getElementById('trackSteps').style.display='flex';document.getElementById('trackMsg').style.display='block';showToast('âÂÂ Commande trouvée !');}
        function submitTicket(){const name=document.getElementById('f_name').value.trim();const email=document.getElementById('f_email').value.trim();const type=document.getElementById('f_type').value;const desc=document.getElementById('f_desc').value.trim();if(!name||!email||!type||!desc){showToast('âÂ ï¸Â Veuillez remplir tous les champs obligatoires');return;}showToast('âÂÂ Ticket envoyé ! Référence : #TK-'+Math.floor(Math.random()*9000+1000));['f_name','f_email','f_phone','f_order','f_product','f_desc'].forEach(id=>{document.getElementById(id).value='';});document.getElementById('f_type').value='';}
        function handleSearch(){const q=document.getElementById('heroSearch').value.trim().toLowerCase();if(!q)return;document.getElementById('faq').scrollIntoView({behavior:'smooth'});setTimeout(()=>{let found=false;document.querySelectorAll('.faq-item').forEach(item=>{const text=item.querySelector('.faq-question span').textContent.toLowerCase();if(text.includes(q)){item.style.display='';if(!found){item.querySelector('.faq-question').click();found=true;}}else{item.style.display='none';}});if(!found)showToast('Aucun résultat pour "'+q+'"');document.querySelectorAll('.faq-cat-btn').forEach(b=>b.classList.remove('active'));},600);}
        document.getElementById('heroSearch').addEventListener('keydown',e=>{if(e.key==='Enter')handleSearch();});
        function scrollToFaq(cat){document.getElementById('faq').scrollIntoView({behavior:'smooth'});setTimeout(()=>{const btn=document.querySelector('.faq-cat-btn[data-cat="'+cat+'"]');if(btn)btn.click();},700);}
        function showToast(msg){const t=document.getElementById('toast');t.textContent=msg;t.classList.add('show');setTimeout(()=>t.classList.remove('show'),3500);}
    </script>
</body>
</html>
