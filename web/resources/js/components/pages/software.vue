<template>
    <div class="d-flex flex-column">
        <div class="m-1">
            <a class="btn btn-primary float-right" href="/uploadSW">新增資料</a>
        </div>

        <div class="p-3 table-responsive-sm">
            <vue-good-table 
            max-height="600px" :fixed-header="true"
            :search-options="{
                enabled: true,
                placeholder: '請輸入欲查詢的關鍵字',
            }"
            :pagination-options="{
                enabled: true,
                mode: 'records',
                position: 'top',
            }"
            :columns="columns" :rows="swDatas"
            :compactMode="false"
             >
            </vue-good-table>
            <!-- @on-row-click="get" -->
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                swDatas: [],
                columns: [
                            {
                                label: '編號',
                                field: 'number',
                                type: 'number',
                            },
                            {
                                label: '名稱',
                                field: 'name'
                            },
                            {
                                label: '對象',
                                field: 'parties',
                            },
                            {
                                label: '歸屬部門',
                                field: 'department'
                            },
                            {
                                label: '開始日期',
                                field: 'fromDate',
                                type: 'date',
                                dateInputFormat: 'yyyy/MM/dd',
                                dateOutputFormat: 'yyyy/MM/dd',
                            },
                            {
                                label: '到期日期',
                                field: 'toDate',
                                type: 'date',
                                dateInputFormat: 'yyyy/MM/dd',
                                dateOutputFormat: 'yyyy/MM/dd',
                            },
                            {
                                label: '狀態',
                                field: 'status',
                            },
                            {
                                label: '更新日期',
                                field: 'updateDate',
                                type: 'date',
                                dateInputFormat: 'yyyy/MM/dd',
                                dateOutputFormat: 'yyyy/MM/dd',
                            },
                            {
                                label: '維護人員',
                                field: 'Owner',
                            },
                        ],

            }
      
        },
        methods: {

            openModal () {
                this.$modal.show('my-first-modal')
                axios.get('https://httpbin.org/get').then(function(response){
                    alert(response);
                })
            }
        },
        components: {
        },
        created() {
            axios.get('/api/getswData').then(
                response => {
                    this.swDatas = response.data
                    console.log(this.swDatas)
                }
            )
        }
    }
</script>