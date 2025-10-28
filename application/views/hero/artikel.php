<!-- Page Header Start -->
<style>
    /* Hero */
    .page-header {
        background-size: cover;
        background-position: center;
        position: relative;
        min-height: 320px;
        display: grid;
        place-items: center;
        overflow: hidden;
    }

    .page-header::after {
        content: "";
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(0, 0, 0, .45), rgba(0, 0, 0, .35));
        z-index: 1;
    }

    .page-header-inner {
        position: relative;
        z-index: 2;
    }

    .page-title {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        letter-spacing: .3px;
        text-shadow: 0 4px 18px rgba(0, 0, 0, .35);
    }

    /* Search */
    .search-wrap {
        position: relative;
        width: 100%;
        max-width: 560px;
        margin: 14px auto 0;
    }

    .search-input {
        height: 48px;
        border-radius: 999px;
        padding-left: 46px;
        /* for icon */
        padding-right: 16px;
        border: 1px solid rgba(255, 255, 255, .2);
        background: rgba(255, 255, 255, .12);
        color: #fff;
        backdrop-filter: blur(6px);
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, .85);
    }

    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #fff;
        opacity: .9;
    }

    .search-results {
        position: absolute;
        left: 0;
        right: 0;
        top: 58px;
        z-index: 1070;
        background: #fff;
        border-radius: 12px;
        box-shadow: var(--shadow);
        max-height: 320px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .search-results .result-item a {
        display: block;
        padding: 10px 14px;
        color: var(--text);
        text-decoration: none;
    }

    .search-results .result-item a:hover {
        background: #f2f6ff;
        color: var(--primary);
    }

    /* Article Grid */
    .articles-section {
        padding: 60px 0;
    }

    .article-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: none;
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .article-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0, 101, 255, 0.15);
    }

    /* Stagger animation delay */
    .col-lg-4:nth-child(1) .article-card {
        animation-delay: 0.1s;
    }

    .col-lg-4:nth-child(2) .article-card {
        animation-delay: 0.2s;
    }

    .col-lg-4:nth-child(3) .article-card {
        animation-delay: 0.3s;
    }

    .col-lg-4:nth-child(4) .article-card {
        animation-delay: 0.4s;
    }

    .col-lg-4:nth-child(5) .article-card {
        animation-delay: 0.5s;
    }

    .col-lg-4:nth-child(6) .article-card {
        animation-delay: 0.6s;
    }

    .article-image-wrapper {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        /* 16:9 Aspect Ratio */
        overflow: hidden;
        background: #e9ecef;
    }

    .article-card img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .article-card:hover img {
        transform: scale(1.08);
    }

    .article-card .card-body {
        padding: 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .article-title {
        font-size: 19px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #212529;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .article-title:hover {
        color: #0065FF;
    }

    .article-date {
        color: #6c757d;
        font-size: 13px;
        font-weight: 400;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 16px;
    }

    .article-date i {
        color: #0065FF;
    }

    .article-description {
        font-size: 14px;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        flex-grow: 1;
    }

    .btn-read-more {
        padding: 10px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        border: 2px solid #0065FF;
        color: #0065FF;
        background: transparent;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        align-self: flex-start;
    }

    .btn-read-more:hover {
        background: #0065FF;
        color: white;
        transform: translateX(4px);
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        padding: 0px 0 60px;
    }

    .pagination {
        display: flex;
        gap: 8px;
    }

    .pagination a,
    .pagination strong {
        padding: 10px 16px;
        border-radius: 8px;
        border: 1px solid #dee2e6;
        background: white;
        color: #212529;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .pagination a:hover {
        background: #0065FF;
        color: white;
        border-color: #0065FF;
    }

    .pagination strong {
        background: #0065FF;
        color: white;
        border-color: #0065FF;
    }

    /* ================= MOBILE FIX ONLY ================= */
    @media (max-width: 767px) {

        /* Supaya seluruh konten tidak nempel ke tepi */
        .container,
        .articles-section .container,
        .pagination-wrapper {
            padding-left: 16px !important;
            padding-right: 16px !important;
        }

        /* Perkecil jarak antar kolom dan pastikan tidak menabrak */
        .articles-section .row {
            margin-left: -8px;
            margin-right: -8px;
        }

        .articles-section [class*="col-"] {
            padding-left: 8px;
            padding-right: 8px;
        }

        /* Perbaiki jarak antar kartu */
        .article-card {
            margin-bottom: 20px;
            border-radius: 14px;
        }

        /* Supaya gambar tidak keluar dari layar */
        .article-image-wrapper {
            border-radius: 14px 14px 0 0;
            overflow: hidden;
        }

        /* Judul dan teks lebih nyaman dibaca di layar kecil */
        .article-title {
            font-size: 16px;
            line-height: 1.4;
        }

        .article-description {
            font-size: 13.5px;
            line-height: 1.6;
        }

        /* Tombol read more agar tidak terlalu besar */
        .btn-read-more {
            font-size: 13px;
            padding: 8px 18px;
            border-radius: 6px;
        }

        /* Pagination tengah dan tidak nempel ke bawah */
        .pagination-wrapper {
            padding-bottom: 40px !important;
            margin-top: 20px;
        }

        .pagination {
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination a,
        .pagination strong {
            padding: 8px 14px;
            font-size: 13px;
        }

        /* Header search agar tidak terpotong */
        .search-wrap {
            width: 100%;
            max-width: 100%;
            padding: 0 12px;
        }

        .search-input {
            height: 44px;
            font-size: 14px;
        }

        .page-header h1.page-title {
            font-size: 1.8rem !important;
        }

        /* Pastikan tidak nempel ke bawah layar */
        body {
            padding-bottom: 60px;
        }
    }
</style>

<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url('assets/img/about.jpg'); ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="page-title display-3 fs-1 text-white mb-3">Artikel BAGIYO DENSO</h1>

            <!-- Search with icon -->
            <div class="search-wrap">
                <i class="search-icon fas fa-search"></i>
                <input type="search" class="form-control search-input" id="search_input" placeholder="Cari artikel, topik, atau kata kunci...">
                <div id="search_results" class="search-results"></div>
            </div>
        </div>
    </div>
</div>

<div class="container articles-section">
    <div class="row">
        <?php $this->load->library('indonesian_date'); ?>
        <?php foreach ($articles as $row) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card article-card">
                    <a href="<?= base_url('artikel/' . $row['slug_article_id']); ?>" class="article-image-wrapper">
                        <img src="<?= base_url('assets/img/events/' . $row['thumbnail']); ?>" alt="<?= htmlspecialchars($row['title_article_id']); ?>">
                    </a>
                    <div class="card-body">
                        <a href="<?= base_url('artikel/' . $row['slug_article_id']); ?>" class="article-title">
                            <?= $row['title_article_id']; ?>
                        </a>
                        <div class="article-date">
                            <i class="fas fa-calendar-alt"></i>
                            <?= $this->indonesian_date->format_date($row['publish']); ?>
                        </div>
                        <p class="article-description">
                            <?= $row['deskripsi_id']; ?>
                        </p>
                        <a href="<?= base_url('artikel/' . $row['slug_article_id']); ?>" class="btn-read-more">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container pagination-wrapper">
    <?= $this->pagination->create_links(); ?>
</div>

<!-- Page Header End -->