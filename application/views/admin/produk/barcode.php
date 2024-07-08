<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url('produk') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Barcode Generator</h1>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
            <div class=" float-right">
                <a href="<?= site_url('produk/barcode_pdf/' . $result->id_brg) ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-print"> Print</i></a>
            </div>
            <div class="card-body p-0 m-3">
                <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($result->kode_brg, $generator::TYPE_CODE_128)) . '"style = "width:300px;">';
                ?>
                <br>
                <?= $result->kode_brg ?>
            </div>

        </div>
    </section>
</div>