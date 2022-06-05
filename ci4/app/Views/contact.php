
<?= $this->include('template/header'); ?>

<div class="col-sm-8">
    <div class="row">
        <div class="col-sm-12">
            <h1 style="font-weight: bold;"><?= $title; ?></h1>
                <hr>
            <p><?= $content; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </div>

</div>

<?= $this->include('template/footer'); ?>