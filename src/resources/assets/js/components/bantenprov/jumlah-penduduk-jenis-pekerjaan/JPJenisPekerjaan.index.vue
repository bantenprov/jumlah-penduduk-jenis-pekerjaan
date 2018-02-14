
<template>
  <div>
        <div class="col-md-12 col-lg-9 dashboard-main">
        <!-- ===================================================================== --> 
            <b-card header="Jumlah Penduduk Berdasarkan Jenis Pekerjaan" header-tag="h4" class="bg-primary-card">
                <div class="table-responsive">
                    <datatable title="Data Jumlah Jumlah Penduduk Berdasarkan Jenis Pekerjaan" :rows="tableData" :columns="columndata"></datatable>
                </div>
            </b-card> 
        <!-- ===================================================================== -->
        
      </div><!-- /col -->
    </div><!-- /.row --> 
</template> 


<script>
import Vue from 'vue';
import {
    ClientTable,
    Event
} from 'vue-tables-2'; 
import datatable from "./JPJenisPekerjaanTable.vue";
Vue.use(ClientTable, {}, false);

//import miniToastr from 'mini-toastr';
//miniToastr.init();
export default {
    name: "Jumlah Penduduk Berdasarkan Jenis Pekerjaan_list",
    components: {
        datatable
    },
    data() {
        return {
            tableData: [],
            columndata: [{
                label: 'ID',
                field: 'id',
                numeric: true,
                html: false,
            }, {
                label: 'Tahun',
                field: 'tahun',
                numeric: true,
                html: false,
            }, {
                label: 'Tanggal',
                field: 'tanggal',
                numeric: true,
                html: false,
            }, {
                label: 'Jumlah',
                field: 'count',
                numeric: true,
                html: false,
            }, {
                label: 'Kategori',
                field: 'get_opd.name',
                numeric: true,
                html: false,
            }, {
                label: 'Kota',
                field: 'get_city.name',
                numeric: true,
                html: false,
            }, {
                label: 'User',
                field: 'user_id',
                numeric: false,
                html: false,
            }, {
                label: 'Via',
                field: 'via',
                numeric: false,
                html: false,
            }, {
                label: 'Created',
                field: 'created_at',
                numeric: true,
                html: false,
            }, {
                label: 'Updated',
                field: 'updated_at',
                numeric: true,
                html: false,
            }, {
                label: 'Actions',
                field: 'action',
                numeric: false,
                html: true,
            }]
        }
    },
    mounted() {
        axios.get("/Jumlah Penduduk Berdasarkan Jenis Pekerjaan").then(response => {
            this.tableData = response.data.result;
            this.tableData.forEach((item, index) => {
                this.$set(item, "action", "<a class='btn btn-warning btn-sm' href='#/Jumlah Penduduk Berdasarkan Jenis Pekerjaan/" + item.id + "/edit'><i class='leftmenu_icon ti-pencil-alt' class='icon'></i> Edit</a> <a class='btn btn-danger btn-sm' onclick='return confirm(\"Are Youu Sure?\")' href='#/Jumlah Penduduk Berdasarkan Jenis Pekerjaan/" + item.id + "/destroy'><i class='leftmenu_icon ti-close' class='icon'></i> Delete</a>");
            });
        })
        .catch(function(error) {miniToastr.error(error, "Error")});
    }
}
</script>