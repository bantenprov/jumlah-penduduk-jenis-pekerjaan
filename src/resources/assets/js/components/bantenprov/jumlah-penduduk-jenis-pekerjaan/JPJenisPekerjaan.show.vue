<template>
  <div>

    <div class="card mb-3">
      <div class="card-header">Grafik Produk Domestik Regional Bruto</div>
      <div class="card-body">
        <echarts-jumlah-penduduk-jenis-pekerjaan></echarts-jumlah-penduduk-jenis-pekerjaan>
      </div><!-- /.card-body -->
    </div><!-- /.card -->

    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Kota</div>
          <div class="card-body">
            <echarts-jumlah-penduduk-jenis-pekerjaan-kota></echarts-jumlah-penduduk-jenis-pekerjaan-kota>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Tahunan</div>
          <div class="card-body">
            <echarts-jumlah-penduduk-jenis-pekerjaan-tahun></echarts-jumlah-penduduk-jenis-pekerjaan-tahun>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
    </div>

  </div>
</template>
