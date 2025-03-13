<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <?= $content ?>
        </div>
    </section>
</div>
<style>
  /* RESET STYLE */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* BODY */
body {
    background-color: #f4f6f9;
    display: flex;
    flex-direction: column;
}

/* NAVBAR */
.main-header {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background: #343a40;
    color: white;
    padding: 15px;
    text-align: center;
    z-index: 1000;
}

/* SIDEBAR */
.main-sidebar {
    width: 250px;
    position: fixed;
    left: 0;
    top: 60px; /* Pastikan sidebar tidak menutupi navbar */
    height: calc(100vh - 60px);
    background: linear-gradient(135deg, rgb(0, 224, 30), #8e2de2);
    color: white;
    box-shadow: 5px 0px 15px rgba(0, 0, 0, 0.3);
    padding-top: 20px;
}

/* Sidebar Links */
.main-sidebar a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px 20px;
}

.main-sidebar a:hover {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}

/* KONTEN DASHBOARD */
.content-wrapper {
    margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
    padding-top: 80px; /* Agar tidak tertutup navbar */
    width: calc(100% - 250px);
    transition: all 0.3s ease-in-out;
}

/* JIKA SIDEBAR DISEMBUNYIKAN */
.sidebar-mini.sidebar-collapse .main-sidebar {
    width: 0;
    overflow: hidden;
}

.sidebar-mini.sidebar-collapse .content-wrapper {
    margin-left: 0;
    width: 100%;
}

/* CARD STYLE */
.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
}

.card-title {
    font-size: 1.1rem;
    font-weight: 500;
}

.card-body {
    padding: 1.25rem;
}

/* FOOTER */
.main-footer {
    background: linear-gradient(135deg, rgb(0, 224, 30), #8e2de2);
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}
</style>
<?php $this->load->view('layout/footer'); ?>