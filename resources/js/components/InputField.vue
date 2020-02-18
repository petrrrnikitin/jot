<template>
    <div class="relative pb-4">
        <label class=" pt-2 absolute text-blue-500 uppercase text-xs font-bold" :for="name">{{label}}</label>
        <input class="focus:outline-none focus:border-blue-400 pt-8 w-full border-b pb-2 text-gray-900"
               :id="name" :placeholder="placeholder" v-model="value" type="text" @input="updateField()">
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: [
            'name', 'label' , 'placeholder'
        ],
        data: function(){
            return {
                value: ''
            }
        },
        methods: {
            updateField: function () {
                this.$emit('update:field', this.value)
            }
        }
    }
</script>

<style scoped>

</style>
