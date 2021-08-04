<template>

    <div class="row">
        <div class="col-md-8">
            <h1 class="lineHeight-6 ml-2">Teco Image Systems</h1>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="pro_pic">
                <img class="img-circle " src="../../../public/images/member.png" alt="個人img">
                
                <a class="btn btn-outline-secondary btn-sm btn-6rem mx-2" href="/">Log off</a>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            // console.log('This is banner.')
        }
    }
</script>

<style lang="scss" scoped>

    .lineHeight-6 {
        line-height:6rem;
    }

    .img-circle {
        width: 3.2rem;
        height: 3.2rem;
        border: 1px solid #ffffff;
        border-radius: 50%;
    }

    .pro_pic {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-6rem {
        width: 6rem;
        padding: .1rem;
    }
    
</style>
