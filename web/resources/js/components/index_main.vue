<template>

    <div class="row" >
        <div class="leftContent col-md-3 py-3">
            <h4>合約</h4>
            <hr>
            <div >
                <ul class="selfnav">
                    <li>
                        <router-link to="/uploadfile">上傳文件</router-link>
                    </li>
                    <li>
                        <router-link to="/contracts">合約資訊</router-link>
                    </li>

                    <hr>

                    <li>
                        <router-link to="/software">軟體續約狀況</router-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 py-5" style="background:#eee;">
            <router-view></router-view>
        </div>
    </div>

</template>

<script>

    export default {
        mounted() {
            // console.log('main.')
        }
    }
</script>

<style lang="scss" scoped>
    .leftContent {
        background-color: #490586;
        background-image: linear-gradient(158deg, #574A89 0%, #946B90 46%, #F4BB1A 100%);
        color: #fafafa;
    }

    .selfnav {
        padding: .5rem;
        list-style: none;
    }
    .selfnav > li{
        margin: .5rem;
        font-size: 1.2rem;
    }
    .selfnav > li > a{
        color: #fafafa;
    }
    // .selfnav > li:hover {
    //     border-bottom:none;
    // }
    .selfnav > li > a:hover{
        color: #969696;
        border-bottom: #969696 1px solid;
        padding-bottom: .1rem;
        text-decoration: none;
    }
</style>