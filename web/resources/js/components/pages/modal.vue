<template>
    <modal name="my-first-modal">
        <transition>
            <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                <div class="modal-header">
                    <slot name="header">
                    default header
                    </slot>
                </div>

                <div class="modal-body">
                    <slot name="body">
                    default body
                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                    default footer
                    <button class="modal-default-button" @click="hide">
                        CLOSE
                    </button>
                    </slot>
                </div>
                </div>
            </div>
            </div>
        </transition>     
    </modal>
</template>
<script>
    export default {
        // name: 'MyComponent',
        methods: {
        //     show () {
        //         this.$modal.show('my-first-modal');
        //     },
            hide () {
                this.$modal.hide('my-first-modal');
            }
        }
        // mount () {
        //     this.show()
        // }
    }
</script>

<style lang="scss" scoped>
</style>
