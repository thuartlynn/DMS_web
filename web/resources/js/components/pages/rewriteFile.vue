<template>
    <div class="p-3 border border-white">
        <form class="m-5" enctype="multipart/form-data" @submit.prevent="submit" >
            <template v-for="(item,index) in contractDatas" >
                <p>
                    <label for="name" :key="index"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約名稱：{{ item.name }}</label>
                    <input id="name" type="text" class="form-control" v-model="item.name" required="required" />
                </p>

                <p>
                    <label for="date" :key="index"><i class="fab fa-connectdevelop fa-1x mr-1"></i>原始合約時間(起迄)：{{ item.fromDate }} ~ {{ item.toDate }}</label>
                    <br><i class="fas fa-angle-double-right fa-1x mr-1 ml-4"></i>需要更改，請選擇：<date-picker id="date" v-model="newItem.date" valueType="format" range required="required" ></date-picker>
                </p>

                <p>
                    <label for="parties"><i class="fab fa-connectdevelop fa-1x mr-1"></i>合約相對人：{{ item.parties }}</label>
                    <input id="parties" type="text" class="form-control" v-model="item.parties" required="required" />
                </p>

                <p>
                    <label for="persons"><i class="fab fa-connectdevelop fa-1x mr-1"></i>聯絡電子信箱：{{ item.Mails }}</label>
                    <input id="persons" type="text" class="form-control" v-model="item.Mails" required="required" />
                </p>

                <p>
                    <label for="status"><i class="fab fa-connectdevelop fa-1x mr-1"></i>狀態：</label>
                    <select class="form-control" id="status" v-model="item.status" required="required">
                        <option value="0" disabled selected>--請選擇--</option>
                        <option v-for="(item, index) in statusO" :value="item" :key="index">{{ item }}</option>
                    </select>
                </p>

                <p>
                    <label for="status"><i class="fab fa-connectdevelop fa-1x mr-1"></i>維護人員：</label>
                    <select class="form-control" id="Owner" v-model="item.Owner_ID" required="required">
                        <option value="0" disabled selected>--請選擇--</option>
                        <option v-for="(staff, index) in maintenanceStaffs" :key="index" :value="index">
                            {{ staff }}
                        </option>
                    </select>
                </p>

                <p>
                    <label for="file"><i class="fab fa-connectdevelop fa-1x mr-1"></i>已上傳的檔案名稱：</label>
                    <ul id="inline" v-if="files.length>0">
                        <li v-for="(file, index) in files" :key="index">
                            <i class="fas fa-file-pdf fa-1x ml-1"></i> <a v-bind:href="file.link" target="_blank" >{{ file.filename }}/</a>
                        </li>
                    </ul>
                </p>

                <p>
                    <!-- <label for="newFile"><i class="fab fa-connectdevelop fa-1x mr-1"></i>需要更改，請選擇：</label>
                    <input id="newFile" type="file" ref="newFile" accept=".pdf" multiple="multiple"> -->
                    <label for="files"><i class="fab fa-connectdevelop fa-1x mr-1"></i>上傳檔案：</label>
                    <input id="files" type="file" ref="file" accept=".pdf" multiple="multiple">
                    
                </p>

                <p>
                    <button type="button" class="btn btn-primary float-right"  @click="rewriteC()">Submit</button>
                </p>
            </template>

            <!--
        

            <div class="form-group">
                <p>
                    <i class="fab fa-connectdevelop fa-1x mr-1"></i>最近更新日期：
                </p>
            </div>    -->

            <!-- input v-for法 <input v-for="(key, index) in objKeys" :key="index" v-model="contractDatas[key]" /> -->

            
        </form>
    </div>
</template>

<script>
    
    import 'vue2-datepicker/index.css';

    export default {
        data() {
            return {
                contractDatas: [],
                date: null,
                newItem: {
                    date: '',
                },
                statusO: ['有效','無效','送簽中','洽談中'],
                maintenanceStaffs: [],
                
                files: [
                    {
                        id: 1, 
                        filename: "ER##$!#$^$",
                        link: "https://drive.google.com/file/d/17iIsr29YeQMxo-MYskuDXG3N0V5Wc8zk/view?usp=sharing" 
                    },
                    {
                        id: 2, 
                        filename: "HHHHHHHHHHHHHHHH",
                        link: "https://drive.google.com/file/d/17iIsr29YeQMxo-MYskuDXG3N0V5Wc8zk/view?usp=sharing" 
                    }
                ]
                              
            }
        },
        methods: {

            // clickDirectory () {
            //     // this.$nextTick(() => {
            //     //     console.log(this.$refs.file)
            //     // })
            //     setTimeout(function(){
            //         console.log(this.$refs.file)
            //     },9000)
            // },

            rewriteC () {
                
                let formData = new FormData()

                console.log(this.$refs[file])
                // for( var i = 0; i < this.$refs.file.files.length; i++ ){
                //     let file = this.$refs.file.files[i];
                //     if (file.size > 30000000){
                //         alert ('超過30MB! 請重新選取')
                //     } else {
                //         formData.append('files[' + i +']', file)
                //     }
                // }
                    
                formData.append('DATA - ', JSON.stringify(this.contractDatas))
                formData.append('Other - ', JSON.stringify(this.newItem))

                axios.put('/api/rewriteFile/'+this.$route.params.id, formData)
                .then((response) => {
                    this.$router.push('/contracts')
                })
                .catch((err) => {
                    console.error(err)
                    // alert ('有錯誤，請洽管理員！')
                })
            },
            
        },
        created() {
            // Get此頁合約ID資料
            let id = this.$route.params.id
            
            axios.get('/api/MaintenanceStaffs').then(
                response => {
                    this.maintenanceStaffs = response.data
                    console.log(this.maintenanceStaffs)
                }
            )

            axios.get('/api/getInfo/'+id).then(
                response => {
                    // this.contractDatas = response.data[0]
                    this.contractDatas = response.data
                    console.log(this.contractDatas)
                }
            )
        },
        mounted() {
            
        },
        computed: {
            objKeys() {
                return Object.keys(this.contractDatas);

            },
            // evenNumbers: function () {
            //     return this.list.filter(function (key) {
            //     return key === 'na'
            //     })
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

#inline{
    padding-left:1.1rem;

}

#inline li{
    display:inline;
}

</style>
