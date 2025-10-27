<style>
    /* Global Styles */
    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        color: #333;
        background-color: #f8f9fa;
    }

    /* Header Section */
    .article-header {
        background-size: cover;
        background-position: center;
        position: relative;
        padding: 80px 0;
        margin-bottom: 40px;
    }

    .article-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .article-header-content {
        position: relative;
        z-index: 1;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .article-meta {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
    }

    /* Main Content Area */
    .article-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Article Content */
    .article-main {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .article-cover {
        width: 100%;
        height: auto;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .article-body {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #333;
    }

    .article-body h2 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-top: 40px;
        margin-bottom: 20px;
        color: #1a1a1a;
    }

    .article-body h3 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-top: 30px;
        margin-bottom: 15px;
        color: #2a2a2a;
    }

    .article-body p {
        margin-bottom: 20px;
    }

    .article-body img {
        width: 100% !important;
        height: auto !important;
        border-radius: 8px;
        margin: 25px 0;
    }

    .article-body blockquote {
        border-left: 4px solid #007BFF;
        padding-left: 20px;
        margin: 30px 0;
        font-style: italic;
        color: #555;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 4px;
    }

    .article-body table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
    }

    .article-body table th,
    .article-body table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .article-body table th {
        background: #f8f9fa;
        font-weight: 600;
    }

    /* Sidebar */
    .sidebar-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .sidebar-card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .sidebar-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: #1a1a1a;
        padding-bottom: 10px;
        border-bottom: 2px solid #007BFF;
    }

    /* Share Buttons */
    .share-buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 10px;
    }

    .share-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        transition: all 0.3s ease;
        color: white;
        text-decoration: none;
    }

    .share-btn:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .share-btn.whatsapp {
        background: #25D366;
    }

    .share-btn.facebook {
        background: #1877F2;
    }

    .share-btn.twitter {
        background: #1DA1F2;
    }

    .share-btn.linkedin {
        background: #0A66C2;
    }

    /* Table of Contents */
    .toc-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .toc-list li {
        margin-bottom: 12px;
    }

    .toc-list a {
        color: #333;
        text-decoration: none;
        display: block;
        padding: 8px 12px;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .toc-list a:hover {
        background: #f0f7ff;
        color: #007BFF;
    }

    .toc-list .toc-h3 {
        padding-left: 20px;
        font-size: 0.9rem;
    }

    /* Related Articles */
    .related-item {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        transition: all 0.3s;
        border: 1px solid #f0f0f0;
    }

    .related-item:hover {
        background: #f8f9fa;
        border-color: #007BFF;
    }

    .related-item a {
        color: #1a1a1a;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: block;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .related-item a:hover {
        color: #007BFF;
    }

    .related-date {
        color: #666;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .article-main {
            padding: 25px;
        }

        .article-title {
            font-size: 2rem;
        }

        .sidebar-card {
            margin-top: 20px;
        }
    }

    @media (max-width: 576px) {
        .article-main {
            padding: 20px;
        }

        .article-title {
            font-size: 1.6rem;
        }

        .article-body {
            font-size: 1rem;
        }

        .share-buttons {
            flex-wrap: wrap;
        }

        .share-btn {
            width: 45px;
            height: 45px;
        }
    }
</style>

<!-- Article Header -->
<div class="article-header" style="background-image: url(<?= base_url('assets/img/about.jpg'); ?>);">
    <div class="container article-header-content text-center">
        <h1 class="article-title"><?= $articles->title_article_id; ?></h1>
        <?php $this->load->library('indonesian_date'); ?>
        <div class="article-meta">
            <i class="fa fa-calendar-check-o"></i>
            <?= $this->indonesian_date->format_date($articles->publish); ?>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="article-container pb-5">
    <div class="row">
        <!-- Main Article Content (Left Column) -->
        <div class="col-lg-8 order-1 order-lg-1">
            <div class="article-main">
                <img class="article-cover"
                    src="<?= base_url('assets/img/events/' . $articles->thumbnail); ?>"
                    alt="Cover Blog Bagiyo Denso <?= $articles->title_article_id; ?>">

                <article class="article-body">
                    <?= $articles->body_id; ?>
                </article>
            </div>
        </div>

        <!-- Sidebar (Right Column) -->
        <div class="col-lg-4 order-2 order-lg-2">
            <!-- Share Social Media -->
            <div class="sidebar-card">
                <h3 class="sidebar-title">Bagikan Artikel</h3>
                <div class="share-buttons">
                    <a href="https://api.whatsapp.com/send?text=<?= $articles->title_article_id . ' ' . base_url('artikel/' . $articles->slug_article_id); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="share-btn whatsapp">
                        <i class="fab fa-whatsapp fa-lg"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('artikel/' . $articles->slug_article_id); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="share-btn facebook">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= base_url('artikel/' . $articles->slug_article_id); ?>&text=<?= urlencode($articles->title_article_id); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="share-btn twitter">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= base_url('artikel/' . $articles->slug_article_id); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="share-btn linkedin">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Table of Contents -->
            <div class="sidebar-card">
                <h3 class="sidebar-title">Daftar Isi</h3>
                <ul class="toc-list" id="tableOfContents">
                    <!-- Generated by JavaScript -->
                </ul>
            </div>

            <!-- Related Articles -->
            <div class="sidebar-card">
                <h3 class="sidebar-title">Artikel Terkait</h3>
                <?php foreach ($realated as $row) : ?>
                    <div class="related-item">
                        <a href="<?= base_url('artikel/' . $row['slug_article_id']); ?>">
                            <?= $row['title_article_id']; ?>
                        </a>
                        <span class="related-date">
                            <i class="fa fa-calendar"></i>
                            <?= $this->indonesian_date->format_date($row['publish']); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Table of Contents Generator Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const articleBody = document.querySelector('.article-body');
        const tocList = document.getElementById('tableOfContents');
        const navbarHeight = 80; // ubah sesuai tinggi navbar kamu (px)

        if (articleBody && tocList) {
            const headings = articleBody.querySelectorAll('h2, h3');

            if (headings.length > 0) {
                headings.forEach((heading, index) => {
                    const headingId = 'heading-' + index;
                    heading.id = headingId;

                    const li = document.createElement('li');
                    const a = document.createElement('a');
                    a.href = '#' + headingId;
                    a.textContent = heading.textContent;

                    if (heading.tagName === 'H3') {
                        a.classList.add('toc-h3');
                    }

                    li.appendChild(a);
                    tocList.appendChild(li);

                    a.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Hitung posisi heading - tinggi navbar
                        const targetPosition = heading.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    });
                });
            } else {
                const sidebarCard = tocList.closest('.sidebar-card');
                if (sidebarCard) sidebarCard.style.display = 'none';
            }
        }
    });
</script>