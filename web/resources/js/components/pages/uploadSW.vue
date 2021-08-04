<template>
    <div class="p-3 border border-white">
        <form class="m-5" enctype="multipart/form-data" @submit.prevent="submit">
            <div class="form-group">
                <label for="name"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約名稱：</label>
                <input id="name" type="text" class="form-control" placeholder="請輸入" v-model="name" required="required" />
                <!-- 測試 v-bind:class="{ 'error': contract.name.length < 1 }" -->
            </div>

            <div class="form-group">
                <label for="date"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約時間：</label>
                <date-picker id="date" v-model="date" valueType="format" range required="required" ></date-picker>
                <!-- <date-picker v-model="time1" valueType="format"></date-picker>
                <date-picker v-model="time2" type="datetime"></date-picker> -->
            </div>

            <div class="form-group">
                <label for="parties"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約相對人：</label>
                <input id="parties" type="text" class="form-control" placeholder="輸入多人時請使用半形逗點, 做區隔" v-model="parties" required="required" />
            </div>

            <div class="form-group">
                <label for="persons"><i class="fab fa-connectdevelop fa-1x mr-1"></i>聯絡電子信箱：</label>
                <input id="persons" type="text" class="form-control" placeholder="example1@gmail.com, example2@gmail.com" v-model="persons" required="required" />
            </div>

            <div class="form-group">
                <label for="status"><i class="fab fa-connectdevelop fa-1x mr-1"></i>狀態：</label>
                <select class="form-control" id="status" v-model="status" required="required">
                    <option value="0" disabled selected>--請選擇--</option>
                    <option :value="item" v-for="(item, index) in statusO" :key="index">{{ item }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="maintenanceStaff"><i class="fab fa-connectdevelop fa-1x mr-1"></i>維護人員：</label>
                <select class="form-control" id="maintenanceStaff" v-model="maintenanceStaff" required="required"> <!-- v-model="maintenanceStaff"-->
                    <option value="0" disabled selected>--請選擇--</option>
                    <option v-for="(staff, index) in maintenanceStaffs" :key="index" :value="index">
                        {{ staff }}
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="files"><i class="fab fa-connectdevelop fa-1x mr-1"></i>上傳檔案：</label>
                <input id="files" type="file" ref="file" accept=".pdf" multiple="multiple">
                <!--  @change="fileChange"-->

            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary float-right"  @click="uploadContract()">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
    
    import 'vue2-datepicker/index.css';

    export default {
        
        data() {
            return {
                date: null,
                name: '',
                date: '',
                parties: '',
                persons: '',
                status: 0,
                maintenanceStaff: 0,
                maintenanceStaffs: [],
                statusO: ['有效','送簽中','洽談中']
            }
        },
        methods: {

            uploadContract () {
                let formData = new FormData()

                for( var i = 0; i < this.$refs.file.files.length; i++ ){
                    let file = this.$refs.file.files[i];
                    if (file.size > 30000000){
                        alert ('超過30MB! 請重新選取')
                    } else {
                        formData.append('files[' + i +']', file)
                    }
                }
                formData.append('name', this.name)
                formData.append('date', this.date)
                formData.append('parties', this.parties)
                formData.append('persons', this.persons)
                formData.append('status', this.status)
                formData.append('maintenanceStaff', this.maintenanceStaff)

                let config = {
                    headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                }
                axios.post('/api/AddNewSW', formData, config)
                .then((response) => {
                    this.$router.push('/software')
                })
                .catch((err) => {
                    // console.error(err)
                    alert ('有錯誤，請洽管理員！')
                })
            }
        },
        created() {
            var today = new Date();
            axios.get('/api/MaintenanceStaffs').then(
                response => {
                    this.maintenanceStaffs = response.data
                    console.log(this.maintenanceStaffs)
                }
            )
        },
        mounted() {
            // isValid: function () {
            //     return this.contract.name.length > 1;
            // },
            // msgStyle: function () {
            //     return {
            //         'border': this.isValid ? '': 'red solid 1px',
            //         'color': this.isValid ? '': 'red'
            //     }
            // }
        }
    }
</script>

<style lang="scss" scoped>

.form-control::-moz-placeholder {
  color: #d2d2d2;
  opacity: .8;
}

.form-control:-ms-input-placeholder {
  color: #d2d2d2;
  opacity: .8;
}

.form-control::placeholder {
  color: #d2d2d2;
  opacity: .8;
}

.btn {
  display: inline-block;
  font-weight: 400;
  color: #212529;
  text-align: center;
  vertical-align: middle;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  line-height: 1.6;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-primary {
  color: #fff;
  background-color: #3490dc;
  border-color: #3490dc;
}

.btn-primary:hover {
  color: #fff;
  background-color: #227dc7;
  border-color: #2176bd;
}

.btn-primary:focus,
.btn-primary.focus {
  color: #fff;
  background-color: #227dc7;
  border-color: #2176bd;
  box-shadow: 0 0 0 0.2rem rgba(82, 161, 225, 0.5);
}

.error {
  border: red solid 1px;
  color: red;
}

</style>
