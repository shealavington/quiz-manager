<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <slot name="title">
                            Example Component
                        </slot>
                    </div>
                    <div class="card-body">
                        <slot>
                            I'm an example component.
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
