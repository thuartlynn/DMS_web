<template>
    <div class="modal-backdrop">
        <div class="modal">  <!-- :style="mainStyles" -->
            <div class="modal-header">
            <h3>合約內容</h3>
            </div>
            <div class="modal-body">
                <form class="m-5" enctype="multipart/form-data" @submit.prevent="submit">
                    <div class="form-group">
                        <label for="name"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約名稱：</label>
                        <input id="name" type="text" class="form-control" placeholder="" v-model="name" required="required" />
                        <!--  -->
                    </div>

                    <div class="form-group">
                        <label for="date"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約時間：</label>
                        <date-picker id="date" range required="required" ></date-picker>
                        <!-- v-model="date"<date-picker v-model="time1" valueType="format"></date-picker>
                        <date-picker v-model="time2" type="datetime"></date-picker> -->
                    </div>

                    <div class="form-group">
                        <label for="parties"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約相對人：</label>
                        <input id="parties" type="text" class="form-control" placeholder="輸入多人時請使用半形逗點, 做區隔" required="required"/>
                        <!-- v-model="parties" -->
                    </div>

                    <div class="form-group">
                        <label for="persons"><i class="fab fa-connectdevelop fa-1x mr-1"></i>聯絡電子信箱：</label>
                        <input id="persons" type="text" class="form-control" placeholder="example1@gmail.com, example2@gmail.com" required="required" />
                        <!-- v-model="persons" -->
                    </div>

                    <div class="form-group">
                        <label for="status"><i class="fab fa-connectdevelop fa-1x mr-1"></i>狀態：</label>
                        <select class="form-control" id="status" required="required">
                            <option value="On">有效</option>
                            <option value="Off">無效</option>
                            <option value="Ongoing">送簽中</option>
                            <option value="discuss">洽談中</option>
                        </select>
                        <!-- v-model="status" -->
                    </div>

                    <div class="form-group">
                        <label for="maintenanceStaff"><i class="fab fa-connectdevelop fa-1x mr-1"></i>維護人員：</label>
                        <input id="maintenanceStaff" type="text" class="form-control" placeholder="人員名稱" required="required">
                        <!-- v-model="maintenanceStaff" -->
                    </div>

                    <div class="form-group">
                        <!-- <input type="file" id="file-uploader" data-target="file-uploader" accept=".pdf" multiple="multiple"/> -->
                        <label for="files"><i class="fab fa-connectdevelop fa-1x mr-1"></i>上傳檔案：</label>
                        <input id="files" type="file" ref="file" accept=".pdf" multiple="multiple">

                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary float-right"  @click="uploadContract()">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="closeSelf">關閉</button>
            </div>
        </div>
 
    </div>
</template>
<script>
    export default {
        name: 'Modal',
        data() {
            return {     
                name: '原先合約名稱'  
            }
        }, 
        methods: {    
            closeSelf() {
                this.$emit("closeme");      
            },
            // contractInfo() {
            //     const ContractIDb = JSON.parse(localStorage.getItem('暫存合約ID/ '))
            //     console.log('跳窗顯示點選的合約ID/ ' + ContractIDb)
            //     axios.get('/api/Contractinfo',ContractIDb).then(
            //         response => {
            //             this.contractInfos = response.data
            //             // console.log(this.contractDatas)
            //         }
            //     )
            // }
        },
        created() {
            // this.contractInfo()
        },
        mounted () {
                
        }
    }
</script>

<style lang="scss" scoped>
.modal-backdrop { 
    position: fixed; 
    top: 0; 
    right: 0; 
    bottom: 0; 
    left: 0; 
    background-color: rgba(0,0,0,.6); 
    display: flex; 
    justify-content: center; 
    align-items: center; 
}
.modal { 
    background-color: #fff; 
    box-shadow: 2px 2px 20px 1px; 
    overflow-x:auto; 
    display: flex; 
    flex-direction: column;
    border-radius: 16px;
    width: 50vw;
    position: absolute;
    left: 25vw;
} 
.modal-header { 
    border-bottom: 1px solid #eee; 
    color: #313131; 
    justify-content: space-between;
    padding: 15px; 
    display: flex; 
} 
.modal-footer { 
    border-top: 1px solid #eee; 
    justify-content: flex-end;
    padding: 15px; 
    display: flex; 
} 
.modal-body { 
    position: relative; 
    padding: 20px 10px;
    overflow-y: auto;
}
.btn-close, .btn-confirm {    
    border-radius: 8px;
    margin-left:16px;
    width:56px;
    height: 36px;
    border:none;
    cursor: pointer;
}
.btn-close {
    color: #313131;
    background-color:transparent;
}
.btn-confirm {
    color: #fff; 
    background-color: #2d8cf0;
}
</style>
