<template>
    <div>
        <!-- <ol> For 測試使用
            <li v-for="contractData in contractDatas" :key="contractData.number">
                {{ contractData.name }}
            </li>
        </ol> -->

        <!-- <div class="p-3 table-responsive-sm">
            <table id="contentTable" class="table table-hover table-secondary"> 
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:6.5rem;">編號</th>
                        <th scope="col" style="width:14rem;">名稱</th>
                        <th scope="col" style="width:14rem;">對象</th>
                        <th scope="col">開始日期</th>
                        <th scope="col">到期日期</th>
                        <th scope="col">合約狀態</th>
                        <th scope="col">更新日期</th>
                        <th scope="col">維護人員</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="contractData in contractDatas" :key="contractData.number">
                        <td>{{ contractData.number }}</td>
                        <td>{{ contractData.name }}</td>
                        <td>{{ contractData.parties }}</td>
                        <td>{{ contractData.fromDate }}</td>
                        <td>{{ contractData.toDate }}</td>
                        <td>{{ contractData.status }}</td>
                        <td>{{ contractData.updateDate }}</td>
                        <td>{{ contractData.maintenanceStaff }}</td>
                    </tr>
                </tbody>
            </table>
        </div>  -->

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
            :columns="columns" :rows="contractDatas"
            :compactMode="false"
            @on-row-click="get" >
            </vue-good-table>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                contractDatas: [],
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
                                label: '合約狀態',
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
                                field: 'maintenanceStaff',
                            },
                        ],
            }
            
        },
        methods: {
            get (data) {
                let Contract_ID = data.row.number;
                // console.log(Contract_ID);
                this.$router.push({ path: `/rewritefile/${Contract_ID}` }) // rewritefile+帶合約編號
                
            },
        },
        components: {
        },
        created() {
            axios.get('/api/Contractinfo').then(
                response => {
                    this.contractDatas = response.data
                    console.log(this.contractDatas)
                }
            )
        }
    }
</script>

<style lang="scss" scoped>
    // #contentTable{
	// 	table-layout:fixed; /* bootstrap-table設定colmuns中某列的寬度無效時，需要給整個表設定css屬性 */
	// 	word-break:break-all; word-wrap:break-all; /* 自動換行 */
	// }

</style>