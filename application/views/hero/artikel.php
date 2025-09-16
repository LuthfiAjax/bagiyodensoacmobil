<!-- Page Header Start -->
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
            <h1 class="display-3 fs-1 text-white mb-3 animated slideInDown">Artikel BAGIYO DENSO</h1>
            <div class="d-flex justify-content-center">
                <input type="search" class="form-control rounded-search-input" id="search_input" placeholder="Cari Artikel Disini . . . ">
            </div>
            <style>
                    #search_results {
                        position: absolute;
                        z-index: 999;
                        background-color: transparent;
                        margin-top: 5px;
                        padding: 0;
                        list-style: none;
                    }

                    #search_results .result-item a {
                        color: #000;
                        text-decoration: none;
                        text-align: left;
                    }

                    #search_results .result-item a:hover {
                        color: #12A5E8;
                    }
            </style>
            <div class="d-flex justify-content-center">
                <div id="search_results" class="search-results"></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <style>
            #deskripsi {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            #title{
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        </style>
        <?php $this->load->library('indonesian_date'); ?>
        <?php foreach ($articles as $row) : ?>
            <div class="col-lg-4 my-3">
                <div class="card" style="border: 1px solid #ddd; border-radius: 4px; overflow: hidden;">
                    <a href="<?= base_url('artikel/'.$row['slug_article_id']); ?>">
                        <img src="<?= base_url('assets/img/events/'.$row['thumbnail']); ?>" class="card-img-top" alt="Article Image">
                    </a>
                    <div class="card-body">
                        <a href="<?= base_url('artikel/'.$row['slug_article_id']); ?>" id="title">
                            <h5 class="card-title" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;"><?= $row['title_article_id']; ?></h5>
                        </a>
                        <small class="my-3"><i class="fas fa-calendar-alt"></i> 
                            <?= $this->indonesian_date->format_date($row['publish']); ?>
                        </small>
                        <div class="my-3" id="deskripsi">
                            <p class="card-text" style="font-size: 14px;"><?= $row['deskripsi_id']; ?></p>
                        </div>
                        <div class="text-end">
                            <a href="<?= base_url('artikel/'.$row['slug_article_id']); ?>" class="btn btn-sm btn-secondary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container">
    <?= $this->pagination->create_links(); ?>
</div>

<!-- Page Header End -->