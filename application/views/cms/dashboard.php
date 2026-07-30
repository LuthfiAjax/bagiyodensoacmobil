<style>
    /* Font dan Variabel */
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --info: #4895ef;
        --warning: #f72585;
        --danger: #e63946;
        --light: #f8f9fa;
        --dark: #212529;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --card-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
        --gradient-primary: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        --gradient-secondary: linear-gradient(135deg, #7209b7 0%, #560bad 100%);
        --gradient-success: linear-gradient(135deg, #4cc9f0 0%, #4895ef 100%);
        --gradient-warning: linear-gradient(135deg, #f72585 0%, #b5179e 100%);
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7fb;
        color: #333;
    }

    .dashboard-container {
        padding: 20px;
    }

    /* Header Dashboard */
    .dashboard-header {
        margin-bottom: 30px;
    }

    .dashboard-header h1 {
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 5px;
    }

    .dashboard-header p {
        color: #6c757d;
        font-size: 1.1rem;
    }

    /* Card Styles */
    .stat-card {
        background: white;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 24px;
        border: none;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-hover);
    }

    .card-gradient-1 {
        background: var(--gradient-primary);
        color: white;
    }

    .card-gradient-2 {
        background: var(--gradient-secondary);
        color: white;
    }

    .card-gradient-3 {
        background: var(--gradient-success);
        color: white;
    }

    .card-gradient-4 {
        background: var(--gradient-warning);
        color: white;
    }

    .card-light-1 {
        background: white;
        border-left: 4px solid var(--primary);
    }

    .card-light-2 {
        background: white;
        border-left: 4px solid var(--warning);
    }

    .card-light-3 {
        background: white;
        border-left: 4px solid var(--success);
    }

    /* Card Content */
    .card-body {
        padding: 24px;
        display: flex;
        align-items: center;
        height: 100%;
    }

    .stat-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        border-radius: 12px;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .gradient-icon {
        background: rgba(255, 255, 255, 0.2);
    }

    .light-icon {
        background: rgba(67, 97, 238, 0.1);
        color: var(--primary);
    }

    .light-icon.warning {
        background: rgba(247, 37, 133, 0.1);
        color: var(--warning);
    }

    .light-icon.success {
        background: rgba(76, 201, 240, 0.1);
        color: var(--success);
    }

    .stat-icon i {
        font-size: 28px;
    }

    .stat-content {
        flex: 1;
    }

    .stat-text {
        font-size: 2.2rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 5px;
    }

    .stat-heading {
        font-size: 1rem;
        font-weight: 500;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Layout */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -12px;
        margin-left: -12px;
    }

    .col-lg-6,
    .col-md-6,
    .col-xl-4 {
        padding-right: 12px;
        padding-left: 12px;
        margin-bottom: 24px;
    }

    .col-lg-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .col-xl-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }

    /* Animasi */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animated {
        animation: fadeIn 0.6s ease forwards;
    }

    .delay-1 {
        animation-delay: 0.1s;
    }

    .delay-2 {
        animation-delay: 0.2s;
    }

    .delay-3 {
        animation-delay: 0.3s;
    }

    .delay-4 {
        animation-delay: 0.4s;
    }

    .delay-5 {
        animation-delay: 0.5s;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .col-xl-4 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 768px) {

        .col-lg-6,
        .col-xl-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .stat-text {
            font-size: 1.8rem;
        }

        .card-body {
            padding: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            margin-right: 15px;
        }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Dashboard Overview</h1>
        <p>Ringkasan statistik dan aktivitas terbaru</p>
    </div>

    <div class="animated fadeIn">
        <!-- ROW 1 - Cards dengan gradient background -->
        <div class="row">
            <!-- Postingan -->
            <div class="col-lg-6 col-xl-4 animated delay-1">
                <div class="stat-card card-gradient-1">
                    <div class="card-body">
                        <div class="stat-icon gradient-icon">
                            <i class="pe-7s-news-paper"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-text"><span class="count"><?= $totalpost; ?></span></div>
                            <div class="stat-heading">Postingan</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Klik WA -->
            <div class="col-lg-6 col-xl-4 animated delay-2">
                <div class="stat-card card-gradient-2">
                    <div class="card-body">
                        <div class="stat-icon gradient-icon">
                            <i class="pe-7s-chat"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-text"><span class="count"><?= $totalklikwa; ?></span></div>
                            <div class="stat-heading">Klik Whatsapp</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking -->
            <div class="col-lg-6 col-xl-4 animated delay-3">
                <div class="stat-card card-gradient-3">
                    <div class="card-body">
                        <div class="stat-icon gradient-icon">
                            <i class="pe-7s-chat"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-text"><span class="count"><?= $totalbooking; ?></span></div>
                            <div class="stat-heading">Booking</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengunjung -->
            <div class="col-lg-6 col-xl-4 animated delay-4">
                <div class="stat-card card-gradient-4">
                    <div class="card-body">
                        <div class="stat-icon gradient-icon">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-text"><span class="count"><?= $totalpengunjung; ?></span></div>
                            <div class="stat-heading">Pengunjung</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cabang -->
            <div class="col-lg-6 col-xl-4 animated delay-5">
                <div class="stat-card card-light-1">
                    <div class="card-body">
                        <div class="stat-icon light-icon">
                            <i class="pe-7s-map-marker"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-text"><span class="count"><?= $totalcabang; ?></span></div>
                            <div class="stat-heading">Cabang</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promo -->
            <div class="col-lg-6 col-xl-4 animated delay-1">
                <div class="stat-card card-light-2">
                    <div class="card-body">
                        <div class="stat-icon light-icon warning">
                            <i class="pe-7s-ticket"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-text"><span class="count"><?= $totalpromo; ?></span></div>
                            <div class="stat-heading">Promo Aktif</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ROW 2 - Cards dengan border accent -->
        <div class="row">
            <!-- Slider -->
            <div class="col-lg-6 col-xl-4 animated delay-2">
                <div class="stat-card card-light-3">
                    <div class="card-body">
                        <div class="stat-icon light-icon success">
                            <i class="pe-7s-photo-gallery"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-text"><span class="count"><?= $totalslider; ?></span></div>
                            <div class="stat-heading">Slider</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Animasi counter (opsional)
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.count');

        counters.forEach(counter => {
            const target = +counter.innerText;
            let count = 0;
            const increment = target / 100;

            const updateCount = () => {
                if (count < target) {
                    count += increment;
                    counter.innerText = Math.ceil(count);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target;
                }
            };

            // Mulai animasi setelah delay
            setTimeout(updateCount, 500);
        });
    });
</script>