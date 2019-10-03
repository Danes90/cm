<template>
    <div class="btn-wrapper">
        <router-link to="/cemeteries/new" class="btn btn-primary btn-sm">Új</router-link>
        <table class="table">
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Cím</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="!cemeteries.length">
                    <td colspan="3" class="text-center">Nincs Adat!</td>
                </template>
                <template v-else>
                    <tr v-for="cemetery in cemeteries" :key="cemetery.id">
                        <td>{{ cemetery.title }}</td>
                        <td>{{ cemetery.address }}</td>
                        <td>
                            <router-link :to="`/cemeteries/${cemetery.id}`">Megtekintés</router-link>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'list',
        mounted() {
            if (this.cemeteries.length) {
                return;
            }

            this.$store.dispatch('getCemeteries');
        },
        computed: {
            cemeteries() {
                return this.$store.getters.cemeteries;
            }
        }
    }
</script>

<style scoped>
    .btn-wrapper {
        text-align: right;
        margin-bottom: 20px;
    }
</style>
