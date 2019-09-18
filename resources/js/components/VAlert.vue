<template>
    <div class="alert" :class="[{'d-none':!control.visible},alertType]" role="alert">
        <span v-html="control.message"></span>
        <button type="button" class="close" aria-label="close" @click="control.visible=false">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                required: true,
                type: String,
            },
            type: {
                default: 'primary',
                type: String,
            },
            visible: {
                default: false,
                type: Boolean,
            }
        },
        data() {
            return {
                control: {
                    message: this.data,
                    type: this.type,
                    visible: this.visible,
                }
            }
        },
        computed: {
            alertType() {
                return this.control.type ? `alert-${this.control.type}` : false;
            }
        }
    }
</script>
