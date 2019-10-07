<template>
    <div v-if="cemetery">
        <form @submit.prevent="update">
            <div class="form-group">
                <label for="title">Név</label>
                <input type="text" class="form-control" name="title" v-model="cemetery.title">
            </div>
            <div class="form-group">
                <label for="address">Cím</label>
                <input type="text" class="form-control" name="address" v-model="cemetery.address">
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-success">Mentés</button>
                </div>
                <div class="col-lg-6">
                    <router-link to="/cemeteries" class="btn btn-primary">Vissza</router-link>
                </div>
            </div>
            <div class="errors" v-if="errors">
                <ul>
                    <li v-for="(fieldsError, fieldName) in errors" :key="fieldName">
                        <strong>{{ fieldName }}</strong> {{ fieldsError.join('\n') }}
                    </li>
                </ul>
            </div>
        </form>
    </div>
</template>

<script>
    import validate from 'validate.js';

    export default {
        name: 'update',
        created() {
            axios.get(`/api/cemeteries/${this.$route.params.id}`)
                .then((response) => {
                    this.cemetery = response.data.cemetery
                });
        },
        data() {
            return {
                cemetery: {
                    id: this.$route.params.id,
                    title: '',
                    address: ''
                },
                errors: null
            };
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser;
            },
            cemeteries() {
                return this.$store.getters.cemeteries;
            }
        },
        methods: {
            update() {

                this.errors = null;

                const constraints = this.getConstraints();

                const errors = validate(this.$data.cemetery, constraints);

                if (errors) {
                    this.errors = errors;
                    return;
                }

                console.log(this.$data.cemetery);

                axios.post('/api/cemeteries/update/', this.$data.cemetery)
                    .then((response) => {
                        //this.$router.push('/cemeteries');
                    });


            },
            getConstraints() {
                return {
                    title: {
                        presence: true,
                        length: {
                            minimum: 3,
                            message: 'Mimimum 3 karakter hosszó nevet adjon meg!'
                        }
                    },
                    address: {
                        presence: true,
                        length: {
                            minimum: 3,
                            message: 'Mimimum 3 karakter hosszó nevet adjon meg!'
                        }
                    }
                };
            }
        }
    }
</script>
<style scoped>
    .errors {
        background: lightcoral;
        border-radius: 5px;
        padding: 21px 0 2px 0;
    }
</style>
