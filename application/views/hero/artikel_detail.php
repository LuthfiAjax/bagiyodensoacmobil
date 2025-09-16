<style>
    .rounded-search-input {
        border-radius: 20px;
        padding: 10px 15px; 
        border: none; 
        outline: none; 
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
        width: 300px; 
    }
</style>

<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url('assets/img/about.jpg'); ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 fs-2 text-white mb-3 animated slideInDown"><?= $articles->title_article_id; ?></h1>
            <?php $this->load->library('indonesian_date'); ?>
            <span class="p-date fs-5 text-white"><i class="fa fa-calendar-check-o"></i> <?= $this->indonesian_date->format_date($articles->publish); ?></span>
        </div>
    </div>
</div>

<!-- Blog Section Start -->
<div class="rs-inner-blog pt-80 pb-120 md-pt-60 md-pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 order-last">
                <div class="widget-area">
                    <div class="search-widget mb-5">
                        <div class="search-wrap">
                            <a href="https://api.whatsapp.com/send?text= <?= $articles->title_article_id . ' ' . base_url('artikel/'. $articles->slug_article_id); ?>"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-whatsapp fa-3x mx-3"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('artikel/'. $articles->slug_article_id); ?>"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook fa-3x mx-3"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?= base_url('artikel/'. $articles->slug_article_id); ?>&text=Apa itu LOI (Letter of intent)? Fungsi, Jenis dan Cara Membuatnya"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-twitter fa-3x mx-3"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= base_url('artikel/'. $articles->slug_article_id); ?>"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-linkedin fa-3x mx-3"></i>
                            </a>
                        </div>
                    </div>
                    <div class="recent-posts mb-50">
                        <div class="widget-title">
                            <h3 class="title">Artikel Terkait</h3>
                        </div>
                        <?php foreach ($realated as $row) : ?>
                        <div class="recent-post-widget">
                            <div class="post-desc">
                                <a href="<?= base_url('artikel/'. $row['slug_article_id']); ?>"><?= $row['title_article_id']; ?></a>
                                <span class="date"> <i class="fa fa-calendar"></i>
                                    <?= $this->indonesian_date->format_date($row['publish']); ?>
                                </span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pr-35 md-pr-15">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-details">
                            <div class="bs-img mb-35">
                                <img class="bs-img" src="<?= base_url('assets/img/events/'.$articles->thumbnail); ?>" alt="Cover Blog Bagiyo Denso <?= $articles->title_article_id; ?>">
                            </div>
                            <div class="blog-full">
                                <article class="mt-5">
                                <style>
                                    p img {
                                        width: 100% !important;
                                        height: auto !important;
                                    }
                                </style>
                                    <?= $articles->body_id; ?>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End -->