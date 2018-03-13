<template>
  <div>

    <div class="card mb-3">
      <div class="card-header">Grafik Rasio Grup Kesenian
      <button class="btn btn-primary btn-sm" role="button" @click="back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button></div>

      <div class="card-body">

        <echarts-rasio-grup-kesenian></echarts-rasio-grup-kesenian>
      </div><!-- /.card-body -->
    </div><!-- /.card -->

    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Kota</div>
          <div class="card-body">
            <echarts-rasio-grup-kesenian-kota></echarts-rasio-grup-kesenian-kota>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Tahunan</div>
          <div class="card-body">
            <echarts-rasio-grup-kesenian-tahun></echarts-rasio-grup-kesenian-tahun>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
    </div>

  </div>
</template>
<script>
export default {
  data() {
    return {
      state: {},
      model: {
        label: "",
        description: ""
      }
    }
  },
  methods: {
    onSubmit: function() {
      let app = this;

    },
    back() {
      window.location = '#/admin/rasio-grup-kesenian';
    }
  }
}
</script>
