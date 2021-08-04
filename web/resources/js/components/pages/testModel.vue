<template>
    <div class="p-3 border border-white">
        <div class="row">
            <input type="button" value="-" @click="decrease" />
                <span>{{ count }}</span>
            <input type="button" value="+" @click="increase" />
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                count: 1,
            }
        },
        methods: {
            decrease: function () {
                if (this.count > 0) {
                    this.count--;
                } else {
                    alert('out of stock');
                }
            },
            increase: function () {
            // 庫存50
                if (this.count < 50) {
                    this.count++;
                } else {
                    alert('all sele, out of stock');
                }
            },

            
        },
        
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
