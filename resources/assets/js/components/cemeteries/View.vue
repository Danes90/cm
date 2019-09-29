<template>
    <div class="cemetery-view" v-if="cemetery">
        <div class="user-info">
            <table class="table">
                <tr>
                    <th>Név</th>
                    <td>{{ cemetery.title }}</td>
                </tr>
                <tr>
                    <th>Cím</th>
                    <td>{{ cemetery.address }}</td>
                </tr>
            </table>
            <router-link to="/cemeteries">Vissza</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'view',
        created() {
            if (this.cemeteries.length) {
                this.cemetery = this.cemeteries.find((cemetery) => cemetery.id == this.$route.params.id);
            } else {
                axios.get(`/api/cemeteries/${this.$route.params.id}`)
                    .then((response) => {
                        this.cemetery = response.data.cemetery
                    });
            }
        },
        data() {
            return {
                cemetery: null
            };
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser;
            },
            cemeteries() {
                return this.$store.getters.cemeteries;
            }
        }
    }
</script>

