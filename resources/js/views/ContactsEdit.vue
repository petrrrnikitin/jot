<template>
    <div>
        <div class="flex justify-between">
            <a href="#" @click="$router.back()" class="text-blue-400">
                < Back
            </a>
        </div>
        <form @submit.prevent="submitForm">
            <InputField name="name" @update:field="form.name = $event" :data="form.name" :errors="errors" label="Contact Name"
                        placeholder="Contact Name"/>
            <InputField name="email" @update:field="form.email = $event" :data="form.email" :errors="errors" label="Contact Email"
                        placeholder="Contact Email"/>
            <InputField name="company" @update:field="form.company = $event" :data="form.company" :errors="errors" label="Company"
                        placeholder="Company"/>
            <InputField name="birthday" @update:field="form.birthday = $event" :data="form.birthday" :errors="errors" label="Birthday"
                        placeholder="MM/DD/YYYY"/>

            <div class="flex justify-end">
                <button class="rounded text-red-700 py-2 px-4 border mr-5 hover:border-red-700"> Cancel</button>
                <button class="bg-blue-500 rounded text-white py-2 px-4 hover:bg-blue-400"> Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default {
        name: "ContactsCreate",
        components: {InputField},

        mounted() {
            axios.get('/api/contacts/' + this.$route.params.id)
                .then(response => {
                    this.form = response.data.data;

                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                    if(error.response.status === 404){
                        this.$router.push('/contacts');
                    }
                })
        },

        data: function () {
            return {
                form: {
                    'name': '',
                    'email': '',
                    'company': '',
                    'birthday': '',
                },

                errors: null,
            }
        },
        methods: {
            submitForm: function () {
                axios.patch('/api/contacts/' + this.$route.params.id, this.form)
                    .then(response => {
                        this.$router.push(response.data.links.self);
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
